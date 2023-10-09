/**
 * Autor:: Jose zabaleta
 * ::::Implementado: 01-10-2023
 * 
 */

// Funcion para mostrar los pacientes con datatables
document.addEventListener('DOMContentLoaded', () => {
  listarCitaspacientes();
})
function listarCitaspacientes() {
  let url = window.location.origin + '/pacientes/datatable';
  dataTable('tabla-pacientes', url);
}

//Funcion para abrir modal y agragar mas informacion
function Ingresar(element) {
  $("#modal_paciente").modal('show');


}


function Agregar(element) {
  $("#modalIngresoPaciente").modal('show');


}

window.onload = function () {
  getSelectcitas();
};

//SELECT citas 
function getSelectcitas(callback = '') {
  let url = window.location.origin + "/citas/select";
  axios.get(url)
    .then((response) => {
      if (response.status === 200) {
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
          option.textContent = element.paciente + ' (DUI. ' + element.dui + ')' + ' (fecha: ' + element.fecha + ')' + '(hora:' + element.hora + ') ';
          selectT.appendChild(option);
        });
        if (callback !== '') {
          callback(response.status);
        }
      }
    })
    .catch((err) => console.log(err))
}


// fucnion para enviar los datos a guardar
document.addEventListener('DOMContentLoaded', function () {
  var formulario = document.getElementById('pacienteForm');
  const departamentoSelect = document.getElementById('departamento');// para la funcion de selecion de los departamentos
  const municipioSelect = document.getElementById('municipio');

  // Define un objeto con los municipios para cada departamento
  const municipiosPorDepartamento = {
    'San Salvador': ['Santiago texacuangos', 'San Marcos', 'Santo Tomas'],
    'Santa Ana': ['Santa Ana', 'El congo', 'Metapan'],
    'San Miguel': ['Municipio4', 'Municipio5', 'Municipio6'],
    // Agrega más departamentos y sus municipios según sea necesario
  };

  // Función para actualizar el campo de selección de municipios
  function actualizarMunicipios() {
    // Obtiene el departamento seleccionado
    const departamentoSeleccionado = departamentoSelect.value;

    // Limpia el campo de selección de municipios
    municipioSelect.innerHTML = '';

    // Verifica si se ha seleccionado un departamento válido
    if (departamentoSeleccionado !== '') {
      // Obtiene los municipios correspondientes al departamento seleccionado
      const municipios = municipiosPorDepartamento[departamentoSeleccionado];

      // Agrega las opciones de municipios al campo de selección
      municipios.forEach(municipio => {
        const opcion = document.createElement('option');
        opcion.value = municipio;
        opcion.textContent = municipio;
        municipioSelect.appendChild(opcion);
      });
    }
  }

  // Agrega un event listener para el cambio en el campo de selección de departamentos
  departamentoSelect.addEventListener('change', actualizarMunicipios);

  // Llama a la función para asegurar que los municipios se actualicen al cargar la página
  actualizarMunicipios();


  formulario.addEventListener('submit', function (event) {
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
    axios.post(url, datosFormulario)
      .then(function (response) {

        Swal.fire(
          'Agregado!',
          'Datos del paciente agragdo exitosamente.',
          'success'
        )

        $("#modalIngresoPaciente").modal("hide");
        pacienteForm.reset();
      

      })
      .catch(function (error) {
        // Maneja los errores si ocurren durante la solicitud
        console.error(error);
      });
  });
});











