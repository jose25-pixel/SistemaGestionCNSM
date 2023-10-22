/**
 * Autor:: Jose zabaleta
 * ::::Implementado: 01-10-2023
 * 
 */
/**
 $(document).ready(function() {
  $('#cita_id').select2();
}); */


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
// funcion para agregar datos de paciente

function Agregar(element) {
  $("#modalIngresoPaciente").modal('show');


}



/**
 * window.onload = function () {
 getSelectcitas();
};
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
}*/


function mayupaciente(element) {
  element.value = element.value.toUpperCase();
}


// fucnion para enviar los datos a guardar
document.addEventListener('DOMContentLoaded', function () {
  var formulario = document.getElementById('pacienteForm');
  const departamentoSelect = document.getElementById('departamento');// para la funcion de selecion de los departamentos
  const municipioSelect = document.getElementById('municipio');
  const fechaNacimiento = document.getElementById('fecha_naci');//funcion para calular la edad segun fecha nacimiento
  const edadOutput = document.getElementById('edad');

  // Escucha el evento input en el campo de fecha de nacimiento
  fechaNacimiento.addEventListener('input', function() {
      // Obtén la fecha de nacimiento del campo de entrada
      const fechaNacimientoValor = new Date(fechaNacimiento.value);
      
      // Calcula la fecha actual
      const fechaActual = new Date();
      
      // Calcula la diferencia de años
      const diferenciaAnios = fechaActual.getFullYear() - fechaNacimientoValor.getFullYear();
      
      // Verifica si ya pasó el cumpleaños de este año
      if (fechaActual.getMonth() < fechaNacimientoValor.getMonth() || (fechaActual.getMonth() === fechaNacimientoValor.getMonth() && fechaActual.getDate() < fechaNacimientoValor.getDate())) {
          // Si no ha pasado, resta un año
          edadOutput.value = diferenciaAnios - 1;
      } else {
          // Si ya pasó, muestra la edad actual
          edadOutput.value = diferenciaAnios;
      }
  });

  // Define un objeto con los municipios para cada departamento
  const municipiosPorDepartamento = {
    'San Salvador': ['San Salvador', 'Santiago Texacuangos', 'San Marcos', 'Santo Tomas', 'Tonacatepeque', 'Apopa', 'Ayutuxtepeque', 'Cuscatancingo', 'Delgado', 'Ilopango', 'Mejicanos', 'Nejapa', 'Panchimalco', 'Rosario de Mora', 'San Martín'],
    'Santa Ana': ['Santa Ana', 'Candelaria de la Frontera', 'Chalchuapa', 'Coatepeque', 'El Congo', 'El Porvenir', 'Masahuat', 'Metapán', 'San Antonio Pajonal', 'San Sebastián Salitrillo', 'Santa Rosa Guachipilín', 'Santiago de la Frontera', 'Texistepeque'],
    'La Libertad': ['Santa Tecla', 'Antiguo Cuscatlán', 'Chiltiupán', 'Ciudad Arce', 'Colón', 'Comasagua', 'Huizúcar', 'Jayaque', 'Jicalapa', 'Nuevo Cuscatlán', 'Panchimalco', 'Puerto de La Libertad', 'San Juan Opico', 'Sacacoyo', 'San Matías'],
    'San Miguel': ['San Miguel', 'Carolina', 'Chapeltique', 'Chinameca', 'Chirilagua', 'Ciudad Barrios', 'Comacarán', 'El Tránsito', 'Lolotique', 'Moncagua', 'Nueva Guadalupe', 'Nuevo Edén de San Juan', 'Quelepa', 'San Antonio del Mosco', 'San Gerardo', 'San Jorge', 'San Luis de la Reina', 'San Rafael', 'Sesori', 'Uluazapa'],
    'Usulutan': ['Usulután', 'Alegría', 'Berlín', 'California', 'Concepción Batres', 'El Triunfo', 'Ereguayquín', 'Estanzuelas', 'Jiquilisco', 'Jucuapa', 'Jucuarán', 'Mercedes Umaña', 'Nueva Granada', 'Ozatlán', 'Puerto El Triunfo', 'San Agustín', 'San Buenaventura', 'San Dionisio', 'San Francisco Javier', 'Santa Elena', 'Santa María', 'Santiago de María', 'Tecapán', 'Usulután'],
    'La Paz': ['Zacatecoluca', 'Cuyultitán', 'El Rosario', 'Jerusalén', 'Mercedes La Ceiba', 'Olocuilta', 'Paraíso de Osorio', 'San Antonio Masahuat', 'San Emigdio', 'San Francisco Chinameca', 'San Juan Nonualco', 'San Juan Talpa', 'San Juan Tepezontes', 'San Luis La Herradura', 'San Luis Talpa', 'San Miguel Tepezontes', 'San Pedro Masahuat', 'San Pedro Nonualco', 'San Rafael Obrajuelo', 'Santa María Ostuma', 'Santiago Nonualco', 'Tapalhuaca'],
    'Cuscatlán': ['Cojutepeque', 'Candelaria', 'El Carmen', 'El Rosario', 'Monte San Juan', 'Oratorio de Concepción', 'San Bartolomé Perulapía', 'San Cristóbal', 'San José Guayabal', 'San Pedro Perulapán', 'San Rafael Cedros', 'San Ramón', 'Santa Cruz Analquito', 'Santa Cruz Michapa', 'Suchitoto', 'Tenancingo'],
    'Chalatenango': ['Chalatenango', 'Agua Caliente', 'Arcatao', 'Azacualpa', 'Cancasque', 'Citalá', 'Comalapa', 'Concepción Quezaltepeque', 'Dulce Nombre de María', 'El Carrizal', 'El Paraíso', 'La Laguna', 'La Palma', 'La Reina', 'Las Vueltas', 'Nombre de Jesús', 'Nueva Concepción', 'Nueva Trinidad', 'Ojos de Agua', 'Potonico', 'San Antonio de la Cruz', 'San Antonio Los Ranchos', 'San Fernando', 'San Francisco Lempa', 'San Francisco Morazán', 'San Ignacio', 'San Isidro Labrador', 'San José Cancasque', 'San José Las Flores', 'San Luis del Carmen', 'San Miguel de Mercedes', 'San Rafael', 'Santa Rita', 'Tejutla'],
    'San Vicente': ['San Vicente', 'Apastepeque', 'Guadalupe', 'San Cayetano Istepeque', 'San Esteban Catarina', 'San Ildefonso', 'San Lorenzo', 'San Sebastián', 'Santa Clara', 'Santo Domingo', 'Tecoluca', 'Tepetitán', 'Verapaz'],
    'Morazán': ['San Francisco Gotera', 'Arambala', 'Cacaopera', 'Chilanga', 'Corinto', 'Delicias de Concepción', 'El Divisadero', 'El Rosario', 'Gualococti', 'Guatajiagua', 'Joateca', 'Jocoaitique', 'Jocoro', 'Lolotiquillo', 'Meanguera', 'Osicala', 'Perquín', 'San Carlos', 'San Fernando', 'San Isidro', 'San Simón', 'Segundo Montes', 'Sensembra', 'Sociedad', 'Torola', 'Yamabal'],
    'Union': ['Anamorós', 'Bolívar', 'Concepción de Oriente', 'Conchagua', 'El Carmen', 'El Sauce', 'Intipucá', 'Lislique', 'Meanguera del Golfo', 'Nueva Esparta', 'Pasaquina', 'Polorós', 'San Alejo', 'San José', 'Santa Rosa de Lima', 'Yayantique', 'Yucuaiquín'],
    'Cabañas': ['Sensuntepeque', 'Cinquera', 'Dolores', 'Guacotecti', 'Ilobasco', 'Jutiapa', 'San Isidro', 'Tejutepeque', 'Victoria'],
    'Sonsonate': ["Sonsonate", "Nahuizalco", "Izalco", "Juayúa", "Acajutla", "Armenia", "Caluco", "Cuisnahuat", "San Antonio del Monte", "San Julián", "Santo Domingo de Guzmán"],
    'Ahuachapan': ["Ahuachapán", "Apaneca", "Atiquizaya", "Concepción de Ataco", "El Refugio", "Guaymango", "Jujutla", "San Francisco Menéndez", "San Lorenzo", "San Pedro Puxtla", "Tacuba", "Turín"],

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
      console.log('Departamento seleccionado:', departamentoSeleccionado);

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
          'Datos del paciente agregado exitosamente.',
          'success'
        )

        $("#modalIngresoPaciente").modal("hide");
        pacienteForm.reset();
        listarCitaspacientes();
        getSelectcitas();

        window.location.href = window.location.href;


      })
      .catch(function (error) {
        // Maneja los errores si ocurren durante la solicitud
        console.error(error);
      });
  });
});


// cerrar borrar informacion selecionada

$(document).ready(function () {
  // Restablecer el formulario cuando se cierra el modal
  $('#modalIngresoPaciente').on('hidden.bs.modal', function () {
    // Obtener el formulario por su ID
    let formulario = document.getElementById('pacienteForm');

    // Restablecer el contenido del formulario
    formulario.reset();
  });

  // Resto de tu código aquí...
});





// Resto de tu código aquí...


// funcion para selecionar los datos de la cita

window.onload = function () {

  const btnAddSelectedPaci = document.getElementById('btnaddcita');
  btnAddSelectedPaci.addEventListener('click', () => {

    $("#citasModal").modal('show');
    console.log('hola');
  });

  getSelectcitas();
};

function getSelectcitas(callback = '') {

  let url = window.location.origin + "/citas/select";
  axios.get(url)
    .then((response) => {
      if (response.status === 200) {
        let data = response.data;
        let table = $('#citasTable').DataTable({
          data: data,
          columns: [
            { data: 'paciente' },
            { data: 'dui' },
            { data: 'fecha' },
            { data: 'hora' },
            {
              data: null,
              render: function (data, type, row) {
     //                return '<button class="btn btn-primary" onclick="selectCita(' + row.id + ')">Seleccionar</button>';
     return '<button class="btn btn-primary" onclick="selectCita(' + row.id + ', \'' + row.paciente + '\', \'' + row.dui + '\' )">Seleccionar</button>';
    
              }
            }
          ]
        });

        if (callback !== '') {
          callback(response.status);
        }
      }
    })
    .catch((err) => console.log(err));

}

function selectCita(citaId, pacienteNombre,DUI) {
 // let citaInfo = citaId + ' - ' + pacienteNombre;
  document.getElementById('cita_id').value = citaId  ;
  document.getElementById('nombre_paciente_referencia').textContent = 'Paciente: ' + pacienteNombre;
  verificarPaciente(pacienteNombre,DUI);

  $('#citasModal').modal('hide');
}

//funtio para verificar si existe relacion entre cita y pacinete
function verificarPaciente(pacienteNombre,DUI){

let url= window.location.origin + "/verificar/paciente";
let data = {
  paciente:pacienteNombre,
  dui:DUI
}
  axios.post(url,data)
  .then((res) => {
    console.log(res)


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
          console.log(datos);
        
              
        }
      })
}else{
  Swal.fire({
   
    text: datos.message,
    icon: 'info',
    background: '#fff', // Define el fondo del cuadro de diálogo
    showCloseButton: false, // Oculta el botón de cierre
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK'
});
    getInputDUI.value = '';
}
    
  })
  .catch((err) => console.log(err));
}






//funcion para ver los datos de un paciente
function ver(element) {
  var idCita = $(element).data('id_cita');
  console.log('buenos dias')

  window.open('/pacientes/ver/' + idCita + "," + "_blank");
  // Realiza una solicitud al servidor para obtener los detalles del paciente

}











