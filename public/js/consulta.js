/**
 * Autor: Jose Deodanes
 * ::::Implementado:::::01-10-2023:::::
 * github: @jose-developer-start
 * ::::Versión:1.0.0:::::::::::
 * ::::::Code licence Copyleft
 */
//Init function
datatable_consultas();

//Function para abrir modal
try{
    const btnNewConsult = document.getElementById('btnNewConsult');
    btnNewConsult.addEventListener('click',openModalNewConsulta);
}catch(err){
    console.log(err);
}

function openModalNewConsulta(){
    document.getElementById('labelTitleConsult').textContent = 'NUEVA CONSULTA';
    $("#modalConsulta").modal('show');
}

function datatable_consultas(){
    let url = window.location.origin + "/consultas/pacientes/datatable";
    dataTable('dt_listado_general_consulta',url,{},5);
}

//Carga la imagen en tiempo real
const inputImagen = document.getElementById('genograma');
  const imagenSeleccionada = document.getElementById('imagenSeleccionada');

  inputImagen.addEventListener('change', function() {
    const file = inputImagen.files[0]; // Obtén el archivo seleccionado
    if (file) {
      const reader = new FileReader(); // Crea un objeto FileReader

      reader.onload = function(e) {
        // Cuando se complete la lectura del archivo
        imagenSeleccionada.src = e.target.result; // Asigna la imagen al elemento <img>
      };

      reader.readAsDataURL(file); // Lee el archivo como una URL de datos
    }
  });

//ABRIR MODAL
try{
    const btnAddSelectedPaci = document.getElementById('btnAddPaci')
    btnAddSelectedPaci.addEventListener('click', ()=>{
        $("#modal_selected_pacientes").modal('show');
        //Mostrar datatable
        let url = window.location.origin + "/consultas/seleccionar/pacientes";
        dataTable('dt_pacientes',url);
    })
    function selectedPac(element){
        console.log(element)
    }
}catch(err){
    console.log(err)
}