
//Initial variables
var calendar = null; //Library Fullcalendar
var arrayCitasEvents = [];
var horarios = [
    { value: "8:00 AM", status: false },
    { value: "8:30 AM", status: false }, // Nueva entrada
    { value: "9:00 AM", status: false },
    { value: "9:30 AM", status: false }, // Nueva entrada
    { value: "10:00 AM", status: false },
    { value: "10:30 AM", status: false }, // Nueva entrada
    { value: "11:00 AM", status: false },
    { value: "11:30 AM", status: false }, // Nueva entrada
    { value: "1:00 PM", status: false },
    { value: "1:30 PM", status: false },
    { value: "2:00 PM", status: false },
    { value: "2:30 PM", status: false }, // Nueva entrada
    { value: "3:00 PM", status: false },
    { value: "3:30 PM", status: false }, // Nueva entrada
    { value: "4:00 PM", status: false },
    { value: "4:30 PM", status: false }, // Nueva entrada
];
document.addEventListener("DOMContentLoaded", function () {
    CalendarEvents();
});

async function CalendarEvents(){
    var calendarEl = document.getElementById("calendar");
    arrayCitasEvents = await getCantidadCitas();
    let arrayCitas = arrayCitasEvents.map((result)=>{
        return{
            title: 'Citas: ' + result.cantidad_citas,
            start: result.fecha,
            backgroundColor: "#007bff", //red
            borderColor: "#000", //red
            allDay: true,
        }
    })
    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        themeSystem: "bootstrap",
        events: arrayCitas,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        eventDrop: function (info) {
            // Handle event drop here
        },
        eventClick: function(info){
            //Modal para mostrar los pacientes citados ese dia
            //Datatable
            let dateClicked = info.event.start;
            let date = moment(dateClicked).format("YYYY-MM-DD");
            let url = window.location.origin + "/cita/pacientes/datatable/" + date;
            dataTable('dt_listados_paci_cita',url,{});
            $("#listar_citas_dia").modal('show');
        },
        dateClick: function(info) {
            // Se ejecutará cuando un usuario haga clic en cualquier día del calendario
            var dateClicked = info.date;
            var formattedDate = moment(dateClicked).format("YYYY-MM-DD");
            //Validation fecha, si es inferior a la actual
            let fechaActual = moment();
            fechaActual = fechaActual.format("YYYY-MM-DD");
            let dateInf = new Date(formattedDate);
            let dateActual = new Date(fechaActual);
            if(dateInf < dateActual){
                Swal.fire({
                    icon: "warning",
                    title: "Fecha incorrecta",
                    text: "No puede registrar una fecha anterior a la actual!",
                });
                return 0;
            }
            $("#fecha").val(formattedDate); // Llena el campo de fecha con el dia selecionado automaticamente
            // Por ejemplo, puedes mostrar un modal de Bootstrap
            //Verificar disponibilidad
            verifyDispHora(formattedDate);
            //Clear inputs
            clsInput('clear-input')
            //Set method form post
            document.getElementById('_methodCita').value = 'post'; 
            //Set title modal
            document.getElementById('labelTitleModalCita').textContent = "AGENDAR CITA";
            document.getElementById('btnLabelCita').textContent = " REGISTRAR";
            //Add atribute readonly en input type date
            let inputFecha = document.getElementById('fecha');
            if(inputFecha !== undefined){
                inputFecha.setAttribute('readonly',true);
            }
            $("#citaModal").modal("show");
            getSelectTerapeutas(); //Obtenemos todos los terapeutas
        },
    });

    calendar.render();
}

/**
 * Codigo para registrar la cita del paciente
 * :::::::Implementado 09-09-2023
 * ...:::::Desarrollador: Jose Deodanes......::::::
 */

try {
    const formCita = document.getElementById("citaForm");
    formCita.addEventListener("submit", (e) => {
        e.preventDefault();
        let formData = new FormData(formCita);
        /**
         * Obtener method para save or edit
         */
        let _method = document.getElementById('_methodCita').value;
        if(_method === "post"){
            let url = window.location.origin + "/citas/guardar";
            axios.post(url, formData)
            .then((response) => {
                if (response.data.status === "inserted") {
                    Swal.fire({
                        icon: "success",
                        title: "Consulta registrada",
                        text: "La consulta se ha registrado exitosamente!",
                    });
                    $("#citaModal").modal("hide");
                    formCita.reset();
                    //Get Events DB
                    CalendarEvents();
                    //Refresca el calendario
                    calendar.refetchEvents();
                    //Refresh number asider citas
                    counterCitasDay();
                }else{
                    Swal.fire({
                        icon: "error",
                        title: 'Error en solicitud',
                        text: "Upps, ha ocurrido un error, intente nuevamente!",
                    });
                }
            })
            .catch((err) => console.log(err));
        }else if(_method === "put"){
            let url = window.location.origin + "/citas/update";
            axios.post(url, formData)
            .then((response) => {
                if (response.data.status === "update") {
                    Swal.fire({
                        icon: "success",
                        text: "La consulta se ha actualizado exitosamente!",
                    });
                    $("#citaModal").modal("hide");
                    formCita.reset();
                    //Get Events DB
                    CalendarEvents();
                    //Refresca el calendario
                    calendar.refetchEvents();
                    //Actualiza el datatable
                    $("#dt_listados_paci_cita").DataTable().ajax.reload(null,false);
                }else{
                    Swal.fire({
                        icon: "error",
                        title: 'Error en solicitud',
                        text: "Upps, ha ocurrido un error, intente nuevamente!",
                    });
                }
            })
            .catch((err) => {
                console.log(err);
            });
        }
        
    });
} catch (err) {}

//Mayus input

function mayus(element) {
    element.value = element.value.toUpperCase();
}

function verifyDispHora(fecha) {
    let url = window.location.origin + "/cita/verificar/disponibilidad";
    let formData = new FormData();
    formData.append("fecha", fecha);
    axios.post(url, formData)
        .then((response) => {
            let data = response.data;
            horarios.map((horario)=>horario.status = false);
            if (data.length > 0) {
                data.map((item) => {
                    if (item.cantidad_cita === 3) {
                        let index = horarios.findIndex((horario) => horario.value === item.hora);
                        if (index !== -1) {
                            horarios[index].status = true;
                        }
                    }
                });
                createOption(horarios);
            } else {
                createOption(horarios);
            }
        })
        .catch((err) => {
            console.log(err);
        });
}

//Select option horario
function createOption(data) {
    let selectHorario = document.getElementById("hora");
    selectHorario.textContent = "";
    let optionDefault = document.createElement("option");
    optionDefault.value = "";
    optionDefault.textContent = "Seleccionar";
    selectHorario.appendChild(optionDefault);
    data.map((horario) => {
        let option = document.createElement("option");
        option.value = horario.value;
        option.textContent = horario.value;
        option.disabled = horario.status;
        //Propiedades solo para no disponible
        if(horario.status === true){
            option.style.background = "#e9ecef";
            option.style.color = "#020202";
            option.textContent = horario.value + "- No disponible";
        }
        selectHorario.appendChild(option);
    });
}

///Mostrar datos en calendarios
async function getCantidadCitas(){
    let url = window.location.origin + '/citas/cantidades';
    let data = await axios.get(url);
    return data.data
}

/**
 * NEW CODE --- VALIDATION DUI
 * :::: Desarrollador :::: José Deodanes
 * ::::: Implementado:::::16-09-2023::::::
 * ::::::@Jose-developer-start:::GITHUB
 */
try{
    let inputDUI = document.getElementById('dui');
    inputDUI.addEventListener('keyup', (e)=>{
        let dui = e.target.value;
        if(dui.length > 9){
            getValidationDUI(dui);
        }
    })
}catch(err){

}
function getValidationDUI(dui){
    let urlValidDui = window.location.origin + "/cita/validation/dui";
    let formData = new FormData();
    formData.append('dui',dui);
    axios.post(urlValidDui,formData)
    .then((response)=>{
        if(response.data.status === "not-data"){
            document.getElementById('dui').classList.remove('is-invalid');
        }else{
            document.getElementById('dui').classList.add('is-invalid');
            Swal.fire({
                icon: "error",
                title: "Existe DUI",
                text: "Este DUI ya ha sido registrado en el sistema!",
            });
            document.getElementById('dui').value = '';
        }
    })
    .catch((err)=>{
        console.log(err)
    })
}

/**
 * Listar todas las citas
 */
try{
    let btnCitaAll = document.getElementById('btn-citas-all');
    btnCitaAll.addEventListener('click', ()=>{
        listarCitasAll();
    })
    //Cancelar cita

}catch(err){
    console.log(err);
}
function listarCitasAll(){
    let url = window.location.origin + "/citas/all";
    dataTable('dt_listado_general_cita',url,{},5);
    $("#listarCitasAll").modal('show');
}

function cancelarCita(id_cita){
    let url = window.location.origin + "/citas/cancelar";
}

function cancelCita(element){
    Swal.fire({
        title: 'Cancelar cita?',
        text: "La cita se cancelara!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            let url = window.location.origin + "/citas/cancelar";
            let id_cita = element.dataset.id_cita;
            let formData = new FormData();
            formData.append('id_cita',id_cita);
            axios.post(url,formData)
            .then((response)=>{
                let data = response.data;
                if(data.status === "cancelado"){
                    Swal.fire(
                        'Cancelado!',
                        'La cita se ha cancelado exitosamente.',
                        'success'
                    )
                    $("#dt_listados_paci_cita").DataTable().ajax.reload();
                }
            })
            .catch((err)=> console.log(err))
        }
      })
}

//Editar datos del paciente y cita
function updateCita(element){
    let url = window.location.origin + "/citas/edit";
    let id_cita = element.dataset.id_cita;
    let formData = new FormData();
    formData.append('id_cita',id_cita);
    axios.post(url,formData)
    .then((response)=>{
        $("#citaModal").modal('show');
        getSelectTerapeutas((codeStatus)=>{
            if(codeStatus === 200){
                let inputFecha = document.getElementById('fecha');
                if(inputFecha !== undefined){
                    inputFecha.removeAttribute('readonly');
                }
                let data = response.data;
                inputFecha.value = data.fecha;
                setTimeout(()=>{
                    document.getElementById('hora').value = data.hora;
                },1200);
                document.getElementById('paciente').value = data.paciente;
                document.getElementById('dui').value = data.dui;
                document.getElementById('email').value = data.email;
                document.getElementById('celular').value = data.celular;
                document.getElementById('motivo').value = data.motivo;
                document.getElementById('terapeuta_id').value = data.terapeuta_id;
                //Este codigo se comento porque ya no se modificara la fecha al actualizar
                /* let fechaActual = moment();
                fechaActual = fechaActual.format("YYYY-MM-DD");
                $("#fecha").val(fechaActual); */
                verifyDispHora(data.fecha);
                //Set method put update cita
                document.getElementById('_methodCita').value = "put";
                //Set title modal
                document.getElementById('labelTitleModalCita').textContent = "ACTUALIZAR DATOS DE LA CITA";
                document.getElementById('btnLabelCita').textContent = " ACTUALIZAR";
            }
        })
        
    })
    .catch((err)=>console.log(err))

}
//Verificar fecha al momento de actualizar
function verifyDate(element){
    let fechaSelected = document.getElementById(element.id).value;
    //Validation fecha, si es inferior a la actual
    let fechaActual = moment();
    fechaActual = fechaActual.format("YYYY-MM-DD");
    let dateInf = new Date(fechaSelected);
    let dateActual = new Date(fechaActual);
    if(dateInf < dateActual){
        $("#fecha").val(fechaActual); // Llena el campo de fecha con el dia selecionado automaticamente
        Swal.fire({
            icon: "warning",
            title: "Fecha incorrecta",
            text: "No puede registrar una fecha anterior a la actual!",
        });
        return 0;
    }
    $("#fecha").val(fechaSelected); // Llena el campo de fecha con el dia selecionado automaticamente
    //Verificar disponibilidad
    verifyDispHora(fechaSelected);
}
//Clear inputs 

function clsInput(input){
    let campos = document.querySelectorAll('.' + input);
    campos.forEach(element => element.value = "");
}

//Verificar DUI

try{
    const getInputDUI = document.querySelector('input[name="verify_dui"]');
    getInputDUI.addEventListener('change', (e)=>{
        let dui = e.target.value;
        if(dui.length > 9){
            let url = window.location.origin + "/citas/verifyExists/dui";
            let data = {
                dui
            }
            axios.post(url,data)
            .then((res)=>{
                let datos = res.data;
                if(datos.status === "exists"){
                    Swal.fire({
                        title: datos.message,
                        text: "La información se cargara automaticamente!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si',
                        cancelButtonText: 'No'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('paciente').value = datos.data.paciente;
                            document.getElementById('dui').value = datos.data.dui;
                            document.getElementById('email').value = datos.data.email;
                            document.getElementById('celular').value = datos.data.celular;
                        }else{
                            getInputDUI.value = '';
                        }
                      })
                }else{
                    Swal.fire(
                        'Error',
                        datos.message,
                        'error'
                    ) 
                    getInputDUI.value = '';
                }
            })
            .catch((err)=>{
                console.log(err)
            })
        }
    })
    //Eliminar cita
    function delCita(element){
        let id = element.dataset.id_cita;
        let url = window.location.origin + "/citas/destroy";
        let formData = new FormData();
        formData.append('id',id);
        formData.append('_method','delete');
        Swal.fire({
            title: 'Desea eliminar esta cita',
            text: "La información se eliminara de forma permanente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
          }).then((result) => {
            if (result.isConfirmed) {
                axios.post(url,formData)
                .then((response)=>{
                    let data = response.data;
                    if(data.status === "delete"){
                        Swal.fire(
                            'Eliminado',
                            'Se ha eliminado correctamente la cita',
                            'success'
                        ) 
                        $("#dt_listados_paci_cita").DataTable().ajax.reload(null,false);
                        //Refresh fullCalendar
                        //Get Events DB
                        CalendarEvents();
                        //Refresca el calendario
                        calendar.refetchEvents();
                        //Refresh number asider citas
                        counterCitasDay();
                        //Se ha comentado este reload porque no esta funcionando el de eliminar de listado general
                        /* $("#dt_listado_general_cita").DataTable().ajax.reload(null,false); */
                    }else if(data.status === "not-delete"){
                        Swal.fire(
                            'AVISO',
                            'Este cliente ya fue atendido',
                            'warning'
                        )
                    }else{
                        Swal.fire(
                            'Error',
                            'Ha ocurrido un error inesperado, intente nuevamente dentro de unos minutos',
                            'error'
                        )
                    }
                })
                .catch((err)=>{
                    console.log(err)
                })
            }
          })
    }
}catch(err){
    console.log()
}