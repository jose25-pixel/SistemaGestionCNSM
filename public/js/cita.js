document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        themeSystem: "bootstrap",
        events: [
            {
                title: "Cita: 3",
                start: "2023-09-01",
                backgroundColor: "#f56954", //red
                borderColor: "#f56954", //red
                allDay: true,
            },
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        eventDrop: function (info) {
            // Handle event drop here
        },
        dateClick: function (info) {
            // Se ejecutará cuando un usuario haga clic en cualquier día del calendario
            var dateClicked = info.date;
            var formattedDate = moment(dateClicked).format("YYYY-MM-DD");
            $("#fecha").val(formattedDate); // Llena el campo de fecha con el dia selecionado automaticamente
            // Por ejemplo, puedes mostrar un modal de Bootstrap
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

try{
  const formCita = document.getElementById('citaForm');
  formCita.addEventListener('submit', (e)=>{
    e.preventDefault();
    let formData = new FormData(formCita);
    let url = window.location.origin + "/citas/guardar";
    axios.post(url,formData)
    .then((response)=>{
      console.log(response)
      if(response.data.status === "inserted"){
        Swal.fire({
          icon: 'success',
          title: 'Consulta registrada',
          text: 'La consulta se ha registrado exitosamente!',
        })
        $("#citaModal").modal('hide');
      }
    }).catch((err)=>{
      console.log(err)
    })
  })
}catch(err){

}