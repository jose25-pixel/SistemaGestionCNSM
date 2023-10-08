/**
 * Autor:: Jose zabaleta
 * ::::Implementado: 01-10-2023
 * 
 */

// Funcion para mostrar los pacientes con datatables
document.addEventListener('DOMContentLoaded', ()=>{
  listarCitaspacientes();
})
function listarCitaspacientes(){
    let url = window.location.origin + '/pacientes/datatable';
    dataTable('tabla-pacientes',url);
}

//Funcion para abrir modal y agragar mas informacion
function Ingresar(element){
  $("#modal_paciente").modal('show');

  
}


function Agregar(element){
  $("#modalIngresoPaciente").modal('show');

  
}

window.onload = function(){
  getSelectcitas();
};

//SELECT citas 
function getSelectcitas(callback=''){
  let url = window.location.origin + "/citas/select";
  axios.get(url)
  .then((response)=>{
      if(response.status === 200){
          let data = response.data;
          let selectT = document.getElementById('cita_id');
          selectT.textContent = '';
          let defaultOption = document.createElement('option');
          defaultOption.value = 'none';
          defaultOption.textContent = 'Seleccionar';
          selectT.appendChild(defaultOption);
          data.forEach(element => {
              let option = document.createElement('option');
              option.value = element.id;
              option.textContent = element.paciente + ' (DUI. ' + element.dui + ')';
              selectT.appendChild(option);
          });
          if(callback !== ''){
              callback(response.status);
          }
      }
  })
  .catch((err)=>console.log(err))
}


 // fucnion para enviar los datos a guardar
document.addEventListener('DOMContentLoaded', function() {
  var formulario = document.getElementById('pacienteForm');
  formulario.addEventListener('submit', function(event) {
      // Evita el envío tradicional del formulario
      event.preventDefault();

      // Obtén los datos del formulario
      var datosFormulario = new FormData(formulario);
      console.log(datosFormulario);

      // Itera sobre los datos del formulario y muestra el nombre y el valor en la consola
      for (var pair of datosFormulario.entries()) {
          console.log(pair[0] + ': ' + pair[1]);
      }
      let url = window.location.origin + "/pacientes/save";
      // Realiza la solicitud POST con Axios
      axios.post (url, datosFormulario)
          .then(function(response) {


            if (response.data.status === "inserted") {
              Swal.fire({
                  icon: "success",
                  title: "cliente registrada",
                  text: "cliente se ha registrado exitosamente!",
              });
              $("#modalIngresoPaciente").modal("hide");
              formCita.reset();
            }

              // Maneja la respuesta del servidor si es necesario
              
          })
          .catch(function(error) {
              // Maneja los errores si ocurren durante la solicitud
              console.error(error);
          });
  });
});











