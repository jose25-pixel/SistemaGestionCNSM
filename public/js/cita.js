//Initial variables
var calendar = null; //Library Fullcalendar
var arrayCitasEvents = [];
var horarios = [
    {
        value: "8:00 AM",
        status: false,
    },
    {
        value: "9:00 AM",
        status: false,
    },
    {
        value: "10:00 AM",
        status: false,
    },
    {
        value: "11:00 AM",
        status: false,
    },
    {
        value: "1:00 PM",
        status: false,
    },
    {
        value: "2:00 PM",
        status: false,
    },
    {
        value: "3:00 PM",
        status: false,
    },
    {
        value: "4:00 PM",
        status: false,
    },
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
            console.log(info)
            console.log('clicked')
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
            $("#citaModal").modal("show");
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
        let url = window.location.origin + "/citas/guardar";
        axios
            .post(url, formData)
            .then((response) => {
                console.log(response);
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
                }
            })
            .catch((err) => {
                console.log(err);
            });
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
    console.log(dui)
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
                console.log(response)
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
    axios.post(url,id_cita)
    .then((response)=>{
        console.log(response)
    })
    .catch((err)=>console.log(err))
    document.getElementById('fecha').value;
    document.getElementById('hora').value;
    document.getElementById('paciente').value;
    document.getElementById('dui').value;
    document.getElementById('email').value;
    document.getElementById('celular').value;
    document.getElementById('motivo').value;

}