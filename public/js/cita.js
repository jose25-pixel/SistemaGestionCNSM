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
document.addEventListener("DOMContentLoaded", async function () {
    var calendarEl = document.getElementById("calendar");
    let results = await getCantidadCitas();
    let arrayCitas = results.map((result)=>{
        return{
            title: 'Citas: ' + result.cantidad_citas,
            start: result.fecha,
            backgroundColor: "#007bff", //red
            borderColor: "#000", //red
            allDay: true,
        }
    })
    var calendar = new FullCalendar.Calendar(calendarEl, {
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
            var dateClicked = info.date;
            var date = moment(dateClicked).format("YYYY-MM-DD");
            let url = window.location.origin + "/cita/pacientes/datatable/" + date;
            dataTable('dt_listados_paci_cita',url,{});
            $("#listar_citas_dia").modal('show');
        },
        dateClick: function(info) {
            // Se ejecutará cuando un usuario haga clic en cualquier día del calendario
            var dateClicked = info.date;
            var formattedDate = moment(dateClicked).format("YYYY-MM-DD");
            $("#fecha").val(formattedDate); // Llena el campo de fecha con el dia selecionado automaticamente
            // Por ejemplo, puedes mostrar un modal de Bootstrap
            //Verificar disponibilidad
            verifyDispHora(formattedDate);
            $("#citaModal").modal("show");
        },
    });

    calendar.render();
});

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