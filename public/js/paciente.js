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
  $("#modalNuevaCita").modal('show');

  
}

// Obtener el elemento de selección de departamento
const departamentoSelect = document.getElementById('departamento');

// Obtener el elemento de entrada de texto del municipio
const municipioInput = document.getElementById('municipio');

// Datos de municipios por departamento (puedes obtener estos datos de tu base de datos o de donde sea que estén almacenados)
const municipiosPorDepartamento = {
  'San Salvador': ['San Salvador', 'Soyapango', 'Santa Tecla'],
  'Santa Ana': ['Santa Ana', 'Metapán', 'Chalchuapa']
  // Agrega más municipios según los departamentos aquí
};

// Función para actualizar los municipios cuando se selecciona un departamento
function actualizarMunicipios() {
  const departamentoSeleccionado = departamentoSelect.value;
  const municipios = municipiosPorDepartamento[departamentoSeleccionado] || [];
  // Limpiar opciones existentes
  municipioInput.value = '';
  // Llenar el campo de municipio con las opciones correspondientes
  municipios.forEach(municipio => {
    municipioInput.value += municipio + ', ';
  });
}

// Asociar la función de actualización al evento de cambio en el campo de selección de departamento
departamentoSelect.addEventListener('change', actualizarMunicipios);



function Ing(element){
  let url = window.location.origin + "";
  let id_cita = element.dataset.id_cita;
  let formData = new FormData();
  formData.append('id_cita',id_cita);
  axios.post(url,formData)
  .then((response)=>{
      $("#modal_paciente").modal('show');
      //let data = response.data;
      //document.getElementById('cod_paciente').value = data.cod_paciente;
      //document.getElementById('paciente').value = data.fecha_naci;
      //document.getElementById('fecha_naci').value = data.fecha_naci;
      //document.getElementById('dui').value = data.dui;
      //document.getElementById('celular').value = data.celular;
      //document.getElementById('motivo').value = data.motivo;
     // document.getElementById('fecha').value. format("YYYY-MM-DD")
   //   = data.fecha;
   
    
      //Set method put update cita
      document.getElementById('_methodpaciente').value = "get";
      //Set title modal
      document.getElementById('labelTitleModalpaciente').textContent = "AGREGAR";
      document.getElementById('btnpaciente').textContent = "AGREGAR";
      
  })
  .catch((err)=>console.log(err))

}


//fuccion para abril modal para agragar mas informacion




