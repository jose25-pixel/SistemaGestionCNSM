/**
 * Autor:: Jose zabaleta::::::::
 * ::::Implementado: 01-10-2023:::::::::::
 * :::: github: @jose-pixel:::::::::
 * ::::::Versión:1.0.0::::::
 * ::::::: Code Licence Copyleft
 */

// Funcion para mostrar los pacientes con datatables
document.addEventListener('DOMContentLoaded', () => {
  listarCitaspacientes();
})


function listarCitaspacientes() {
  let url = window.location.origin + '/pacientes/datatable';
  dataTable('tabla-pacientes', url);
}


 //Funcion para obtener los datos del cosultante mediante el id
function updatepaciente(idPaciente) {
  let url = window.location.origin + "/paciente/edit/" + idPaciente;
  console.log(idPaciente);
  axios.post(url)
    .then((response) => {
      // Mostrar el modal
      $("#modal_paciente_editar").modal('show');
      let datos = response.data.data;
      console.log(datos);
      // Asignar valores a los campos en el modal
      //document.getElementById('nombrecita').value = datos.cita.paciente;
      //document.getElementById('emailc').value = datos.cita.email;
      //document.getElementById('celularc').value = datos.cita.celular;
      document.getElementById('fecha_nacie').value = datos.fecha_naci;
      document.getElementById('edade').value = datos.edad;
      document.getElementById('generoe').value = datos.genero;
      document.getElementById('ocupacione').value = datos.ocupacion;
      document.getElementById('lugar_estudioe').value = datos.lugar_estudio;
      document.getElementById('direccione').value = datos.direccion;
      document.getElementById('gradoe').value = datos.grado;
      document.getElementById('nivel_educativoe').value = datos.nivel_educativo;
      document.getElementById('departamentoe').value = datos.departamento;
      document.getElementById('municipioed').value = datos.municipio;
      document.getElementById('celular_dose').value = datos.celular_dos;
      document.getElementById('celular_trese').value = datos.celular_tres;
      document.getElementById('nu_hermanoe').value = datos.nu_hermano;
      document.getElementById('lugar_ocupae').value = datos.lugar_ocupa;
      document.getElementById('nu_hijoe').value = datos.nu_hijo;
      document.getElementById('edad_hijoe').value = datos.edad_hijo;
      document.getElementById('ano_casadoe').value = datos.ano_casado;
      //tabla parentesco
      document.getElementById('nombre_madree').value = datos.parentesco.nombre_madre;
      document.getElementById('edad_madree').value = datos.parentesco.edad_madre;
      document.getElementById('estado_civilme').value = datos.parentesco.estado_civilm;
      document.getElementById('nivel_educativome').value = datos.parentesco.nivel_educativom;
      document.getElementById('ocupacionme').value = datos.parentesco.ocupacionm;
      document.getElementById('viveme').value = datos.parentesco.vivem;
      document.getElementById('duime').value = datos.parentesco.duim;
      document.getElementById('notame').value = datos.parentesco.notam;
      document.getElementById('viveaunme').value = datos.parentesco.viveaunm;
      document.getElementById('nombrepe').value = datos.parentesco.nombrep;
      document.getElementById('edadpe').value = datos.parentesco.edadp
      document.getElementById('estado_civilpe').value = datos.parentesco.estado_civilp;
      document.getElementById('ocupacionpe').value = datos.parentesco.ocupacionp;
      document.getElementById('nivel_educativope').value = datos.parentesco.nivel_educativop;
      document.getElementById('vivepe').value = datos.parentesco.vivep;
      document.getElementById('duipe').value = datos.parentesco.duip;
      document.getElementById('notape').value = datos.parentesco.notap;
      document.getElementById('viveaunpe').value = datos.parentesco.viveaunp;
      //tabla conyuge
      document.getElementById('nombrece').value = datos.conyuge.nombre;
      document.getElementById('nivel_educativoce').value = datos.conyuge.nivel_educativo;
      document.getElementById('ocupacionce').value = datos.conyuge.ocupacion;
      document.getElementById('edadce').value = datos.conyuge.edad;
      document.getElementById('notace').value = datos.conyuge.notac;
      //datos responsable
      document.getElementById('nombrere').value = datos.responsable.nombrer;
      document.getElementById('estado_civilre').value = datos.responsable.estado_civilr;
      document.getElementById('nivel_educativore').value = datos.responsable.nivel_educativor;
      document.getElementById('edadre').value = datos.responsable.edadr;
      document.getElementById('ocupacionre').value = datos.responsable.ocupacionr;
      document.getElementById('duire').value = datos.responsable.duir;
      // tabla Antecedentes de salud

      document.getElementById('patologiase').value = datos.atecedente.patologias;
      document.getElementById('enfergeneticae').value = datos.atecedente.enfergenetica;
      document.getElementById('otrose').value = datos.atecedente.otros;
      document.getElementById('iniciotrabajare').value = datos.atecedente.iniciotrabajar;
      document.getElementById('trabajae').value = datos.atecedente.trabaja;
      document.getElementById('trabaja_actualmentee').value = datos.atecedente.trabaja_actualmente;
      document.getElementById('duracion_empleoe').value = datos.atecedente.duracion_empleo;
      document.getElementById('despedidoe').value = datos.atecedente.despedido;
      document.getElementById('causae').value = datos.atecedente.causa;
      document.getElementById('satisfechoe').value = datos.atecedente.satisfecho;
    })
    .catch((err) => console.log(err));
}

//Funcion para abrir modal y agregar mas informacion
/*function updateCita(element) {

  var idCitaUdate = $(element).data('id_cita');

  $("#modal_paciente_editar").modal('show');

}*/
/*
function updatepaciente(element) {
  let url = window.location.origin + "/paciente/edit";
  let id_paciente = element.dataset.id_paciente;
  guardarIdPaciente(id_paciente);
  console.log(id_paciente);
  let formData = new FormData();
  formData.append('id_paciente', id_paciente);

  axios.post(url, formData)
    .then((response) => {
      // Mostrar el modal
      $("#modal_paciente_editar").modal('show');
      let datos = response.data.data;
      // Obtener los datos de la respuesta JSON
      console.log(datos)
      console.log(datos.edad);
      // Asignar valores a los campos en el modal
      document.getElementById('nombrecita').value = datos.cita.paciente;
      document.getElementById('emailc').value = datos.cita.email;
      document.getElementById('celularc').value = datos.cita.celular;
      document.getElementById('fecha_nacie').value = datos.fecha_naci;
      document.getElementById('edade').value = datos.edad;
      document.getElementById('generoe').value = datos.genero;
      document.getElementById('ocupacione').value = datos.ocupacion;
      document.getElementById('lugar_estudioe').value = datos.lugar_estudio;
      document.getElementById('direccione').value = datos.direccion;
      document.getElementById('gradoe').value = datos.grado;
      document.getElementById('nivel_educativoe').value = datos.nivel_educativo;
      document.getElementById('departamentoe').value = datos.departamento;
      document.getElementById('municipioed').value = datos.municipio;
      document.getElementById('celular_dose').value = datos.celular_dos;
      document.getElementById('celular_trese').value = datos.celular_tres;
      document.getElementById('nu_hermanoe').value = datos.nu_hermano;
      document.getElementById('lugar_ocupae').value = datos.lugar_ocupa;
      document.getElementById('nu_hijoe').value = datos.nu_hijo;
      document.getElementById('edad_hijoe').value = datos.edad_hijo;
      document.getElementById('ano_casadoe').value = datos.ano_casado;

      //tabla parentesco
      document.getElementById('nombre_madree').value = datos.parentesco.nombre_madre;
      document.getElementById('edad_madree').value = datos.parentesco.edad_madre;
      document.getElementById('estado_civilme').value = datos.parentesco.estado_civilm;
      document.getElementById('nivel_educativome').value = datos.parentesco.nivel_educativom;
      document.getElementById('ocupacionme').value = datos.parentesco.ocupacionm;
      document.getElementById('viveme').value = datos.parentesco.vivem;
      document.getElementById('duime').value = datos.parentesco.duim;
      document.getElementById('notame').value = datos.parentesco.notam;

      document.getElementById('viveaunme').value = datos.parentesco.viveaunm;
      document.getElementById('nombrepe').value = datos.parentesco.nombrep;
      document.getElementById('edadpe').value = datos.parentesco.edadp
      document.getElementById('estado_civilpe').value = datos.parentesco.estado_civilp;
      document.getElementById('ocupacionpe').value = datos.parentesco.ocupacionp;
      document.getElementById('nivel_educativope').value = datos.parentesco.nivel_educativop;
      document.getElementById('vivepe').value = datos.parentesco.vivep;
      document.getElementById('duipe').value = datos.parentesco.duip;
      document.getElementById('notape').value = datos.parentesco.notap;
      document.getElementById('viveaunpe').value = datos.parentesco.viveaunp;
      //tabla conyuge
      document.getElementById('nombrece').value = datos.conyuge.nombre;
      document.getElementById('nivel_educativoce').value = datos.conyuge.nivel_educativo;
      document.getElementById('ocupacionce').value = datos.conyuge.ocupacion;
      document.getElementById('edadce').value = datos.conyuge.edad;
      document.getElementById('notace').value = datos.conyuge.notac;

      //datos responsable

      document.getElementById('nombrere').value = datos.responsable.nombrer;
      document.getElementById('estado_civilre').value = datos.responsable.estado_civilr;
      document.getElementById('nivel_educativore').value = datos.responsable.nivel_educativor;
      document.getElementById('edadre').value = datos.responsable.edadr;
      document.getElementById('ocupacionre').value = datos.responsable.ocupacionr;
      document.getElementById('duire').value = datos.responsable.duir;


      // tabla Antecedentes de salud

      document.getElementById('patologiase').value = datos.atecedente.patologias;
      document.getElementById('enfergeneticae').value = datos.atecedente.enfergenetica;
      document.getElementById('otrose').value = datos.atecedente.otros;
      document.getElementById('iniciotrabajare').value = datos.atecedente.iniciotrabajar;
      document.getElementById('trabajae').value = datos.atecedente.trabaja;
      document.getElementById('trabaja_actualmentee').value = datos.atecedente.trabaja_actualmente;
      document.getElementById('duracion_empleoe').value = datos.atecedente.duracion_empleo;
      document.getElementById('despedidoe').value = datos.atecedente.despedido;
      document.getElementById('causae').value = datos.atecedente.causa;
      document.getElementById('satisfechoe').value = datos.atecedente.satisfecho;


      //tabla de adiciones

  
    })
    .catch((err) => console.log(err));
}
*/


let pacienteId = null; // Variable para almacenar el ID del paciente

function guardarIdPaciente(id) {
  pacienteId = id;
}



function otraFuncion() {
  // Usa el ID del paciente almacenado en pacienteId
  console.log('ID del paciente:', pacienteId);
  // Resto del código...
}
/*
//funcion para poder actualizar datos de l abase de datos 

document.addEventListener('DOMContentLoaded', function() {
  let formulario = document.getElementById('formulario_paciente_edit');
  let guardarCambiosBtn = document.getElementById('guardarCambiosBtn');

  formulario.addEventListener('submit', function(event) {
      event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

      // Crea un objeto FormData con los datos del formulario
      let datosPaciente = new FormData(formulario);
      let url = window.location.origin + "/paciente/update/";
      // Enviar los datos al servidor usando una solicitud PUT

      console.log (datosPaciente);
      axios.put(url, datosPaciente)
          .then(function(response) {
              // Manejar la respuesta del servidor si es necesario
              console.log(response.data);
              // Cerrar el modal de edición después de guardar los cambios, si es necesario
              $("#modal_paciente_editar").modal('hide');
          })
          .catch(function(error) {
              // Manejar errores si la solicitud falla
              console.error(error);
          });
  });
});





*/

// funcion para agregar datos de paciente

function Agregar(element) {
  $("#modalIngresoPaciente").modal('show');


}



/**
 * 
 * //funcion para selecionar las citas mediante selec normal!!
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



//Funcion para actualizar datos po id paciente
document.addEventListener('DOMContentLoaded', function (idPaciente) {
  var formularioeditar = document.getElementById('formulario_paciente_edit');
  const departamentoedit = document.getElementById('departamentoe');
  const municipioedit = document.getElementById('municipioed');
  const fechanacimientoeditar = document.getElementById('fecha_nacie');
  const edaedi = document.getElementById('edade')

  var nombre = document.querySelector('select[name="generoe"]').value;



  var ocupacionll = document.getElementsByName('ocupacion')[0];
  var ocupacion = ocupacionll.value;
  var datoseditar = {
    nombre: nombre,
    ocupacion: ocupacion,
    //apellido: apellido,
    // ...otros campos
  };

  console.log("Nombre: " + datoseditar.nombre);
  console.log("Ocupación: " + datoseditar.ocupacion);

  fechanacimientoeditar.addEventListener('input', function () {
    const fechaNacimientoValor = new Date(fechanacimientoeditar.value);
    // Calcula la fecha actual
    const fechaActual = new Date();
    // Calcula la diferencia de años
    const diferenciaAnios = fechaActual.getFullYear() - fechaNacimientoValor.getFullYear();
    // Verifica si ya pasó el cumpleaños de este año
    if (fechaActual.getMonth() < fechaNacimientoValor.getMonth() || (fechaActual.getMonth() === fechaNacimientoValor.getMonth() && fechaActual.getDate() < fechaNacimientoValor.getDate())) {
      // Si no ha pasado, resta un año
      edaedi.value = diferenciaAnios - 1;
    } else {
      // Si ya pasó, muestra la edad actual
      edaedi.value = diferenciaAnios;
    }
  })

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
  function actualizarMunicipiosd() {
    // Obtiene el departamento seleccionado
    const departamentoSeleccionado = departamentoedit.value;
    // Limpia el campo de selección de municipios
    municipioedit.innerHTML = '';
    // Verifica si se ha seleccionado un departamento válido
    if (departamentoSeleccionado !== '') {
      // Obtiene los municipios correspondientes al departamento seleccionado
      const municipios = municipiosPorDepartamento[departamentoSeleccionado];
      //console.log('Departamento seleccionado:', departamentoSeleccionado);
      // Agrega las opciones de municipios al campo de selección
      municipios.forEach(municipio => {
        const opcion = document.createElement('option');
        opcion.value = municipio;
        opcion.textContent = municipio;
        municipioedit.appendChild(opcion);
      });
    }
  }
  // Agrega un event listener para el cambio en el campo de selección de departamentos
  departamentoedit.addEventListener('change', actualizarMunicipiosd);
  // Llama a la función para asegurar que los municipios se actualicen al cargar la página
  actualizarMunicipiosd();

  formularioeditar.addEventListener('submit', function (event) {

    event.preventDefault();
    // var datoseditar =new FormData(formularioeditar);
    console.log(datoseditar);
    let url = window.location.origin + "/paciente/update/" + idPaciente;

    axios.put(url, datoseditar)
      .then(function (response) {
        Swal.fire(
          'Editada',
          'Datos del scosultant editato correctamente',
          'success'
        )

        $("#modal_paciente_editar").on("hidden.bs.modal", function () {
          $(this).find('input,textarea,select').val('').end();
          // También puedes restablecer cualquier otro estado del formulario si es necesario
        });
        //pacienteForm.reset();
        listarCitaspacientes();


      })
  })


});

function mayupaciente(element) {
  element.value = element.value.toUpperCase();
}
// funcion para enviar los datos a guardar del consultante
document.addEventListener('DOMContentLoaded', function () {
  var formulario = document.getElementById('pacienteForm');
  const departamentoSelect = document.getElementById('departamento');// para la funcion de selecion de los departamentos
  const municipioSelect = document.getElementById('municipio');
  const fechaNacimiento = document.getElementById('fecha_naci');//funcion para calular la edad segun fecha nacimiento
  const edadOutput = document.getElementById('edad');
  // Escucha el evento input en el campo de fecha de nacimiento
  fechaNacimiento.addEventListener('input', function () {
    // Obtén la fecha de nacimiento del campo de entrada
    const fechaNacimientoValor = new Date(fechaNacimiento.value);
    // Calcula la fecha actual
    const fechaActual = new Date();
    // Calcula la diferencia de años
    const diferenciaAnios = fechaActual.getFullYear() - fechaNacimientoValor.getFullYear();
    // Verifica si ya pasó el cumpleaños de este año
    if (fechaActual.getMonth() < fechaNacimientoValor.getMonth() || (fechaActual.getMonth()
      === fechaNacimientoValor.getMonth() && fechaActual.getDate() < fechaNacimientoValor.getDate())) {
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
      //console.log('Departamento seleccionado:', departamentoSeleccionado);
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



        $("#modalIngresoPaciente").on("hidden.bs.modal", function () {
          $(this).find('input,textarea,select').val('').end();
          // También puedes restablecer cualquier otro estado del formulario si es necesario
        });
        //pacienteForm.reset();
        listarCitaspacientes();
        $("#citasModal").on("hidden.bs.modal", function () {
          $(this).find('input,textarea,select').val('').end();
          // También puedes restablecer cualquier otro estado del formulario si es necesario
        });

        $("#tabla-pacientes").DataTable().ajax.reload(null, false);
        window.location.href = window.location.href;

      })
      .catch(function (error) {
        // Maneja los errores si ocurren durante la solicitud
        console.error(error);
      });
  });
});



// funcion para selecionar los datos de la cita 


window.onload = function () {

  const btnAddSelectedPaci = document.getElementById('btnaddcita');
  btnAddSelectedPaci.addEventListener('click', () => {

    $("#citasModal").modal('show');
    console.log('hola');
  });

  getSelectcitas();
};


//funcion para mostrar el modal para selecionar los cosultantes de las citas
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
                return '<button class="btn btn-success btn-sm" onclick="selectCita(' + row.id + ', \'' + row.paciente + '\', \'' + row.dui + '\' )"><i style="cursor: pointer" class="fas fa-plus"></i></button>';

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


//  Funcion para poder mostar el nombre del la cita slecionada y poder verificar si la informacion del cosultante ya esta registrado
function selectCita(citaId, pacienteNombre, DUI) {
  // let citaInfo = citaId + ' - ' + pacienteNombre;
  document.getElementById('cita_id').value = citaId;
  document.getElementById('nombre_paciente_referencia').textContent = 'Paciente: ' + pacienteNombre;
  verificarPaciente(citaId, pacienteNombre, DUI);

  $('#citasModal').modal('hide');
}




/**
 * Autor:: Jose zabaleta::::::::
 * ::::Implementado: 15-10-2023:::::::::::
 * :::: github: @jose-pixel:::::::::
 * ::::::Versión:1.0.0::::::
 * ::::::: Code Licence Copyleft
 */

//funtio para verificar si existe relacion entre cita y pacinete
function verificarPaciente(citaId, pacienteNombre, DUI) {

  let url = window.location.origin + "/verificar/paciente";
  let data = {
    paciente: pacienteNombre,
    dui: DUI,
    id: citaId
  }
  axios.post(url, data)
    .then((res) => {
      console.log(res)
      let datos = res.data;
      if (datos.status === "exists") {
        Swal.fire({
          title: datos.message,
          text: "La información ya se encuentra en el sistema!",
          icon: 'info',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK',
          //cancelButtonText: 'No'
        }).then((result) => {
          if (result.isConfirmed) {
            console.log(datos);
            $("#modalIngresoPaciente").on("hidden.bs.modal", function () {
              $(this).find('input,textarea,select').val('').end();
              // También puedes restablecer cualquier otro estado del formulario si es necesario
            });
            //pacienteForm.reset();
            listarCitaspacientes();
            $("#citasModal").on("hidden.bs.modal", function () {
              $(this).find('input,textarea,select').val('').end();

            });

            window.location.href = window.location.href;
        
          }
        })
      } else {
        Swal.fire({

          text: datos.message,
          icon: 'info',
          background: '#fff', // Define el fondo del cuadro de diálogo
          showCloseButton: false, // Oculta el botón de cierre
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        });
        //Mas codigo
      }

    })
    .catch((err) => console.log(err));
}







//funcion para ver los datos de un paciente  en formato para descargar en pdf
function ver(element) {
  var idCita = $(element).data('id_cita');
  console.log('buenos dias')

  window.open('/pacientes/ver/' + idCita + "," + "_blank");
  // Realiza una solicitud al servidor para obtener los detalles del paciente

}











