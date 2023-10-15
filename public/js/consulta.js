/**
 * Autor: Jose Deodanes
 * ::::Implementado:::::01-10-2023:::::
 * github: @jose-developer-start
 * ::::Versión:1.0.0:::::::::::
 * ::::::Code licence Copyleft
 */
//Init function
var sintomas = [];
document.addEventListener('DOMContentLoaded',()=>{
})
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
        let id_paciente = element.dataset.id_paciente;
        let url = window.location.origin + "/consulta/getPaciente/selected";
        let data = {
          'id_paciente':id_paciente
        }
        axios.post(url,data)
        .then((res)=>{
          let data = res.data;
          document.getElementById('cod_clinico').value = data.cod_paciente;
          document.getElementById('paciente').value = data.paciente;
          document.getElementById('dui').value = data.dui;
          document.getElementById('telefono').value = data.telefono;
          $("#modal_selected_pacientes").modal('hide');
        })
        .catch((err)=>{
          console.log(err)
        })
    }
    //Save consulta
    const consultaForm = document.getElementById('consultaForm');
    consultaForm.addEventListener('submit', (e)=>{
      e.preventDefault();
      let formData = new FormData(consultaForm);
      let url = window.location.origin + "/consulta/save";
      axios.post(url,formData)
      .then((res)=>{
        console.log(res);
        let data = res.data;
        if(data.status === "inserted"){
          Swal.fire({
            icon: "success",
            title: "Registro",
            text: data.message,
        });
        $("#modalConsulta").modal('hide');
        }
      })
      .catch((err)=>{
        console.log(err)
      })
    })
}catch(err){
    console.log(err)
}

/**
 * Codigo para añadir sintomas
 */
try{
  const btnAddSintoma = document.querySelector('.add-sintoma');
  let sintoma = document.getElementById('sintomas').value;
  let conflicto = document.getElementById('conflictos').value
  let situacion = document.getElementById('situacion').value;
  btnAddSintoma.addEventListener('click', ()=>{
    let obje = {
      sintoma,
      conflicto,
      situacion
    }
    console.log(sintoma)
    addSintomaArray(obje);
  })
}catch(err){
  console.log(err)
}

function addSintomaArray(objSintoma){
  sintomas.push(objSintoma);
  addSintomaTableRows();
}

function addSintomaTableRows(){
  let rows = ``;
  console.log(sintomas)
  let rowsContentTable = document.getElementById('sintomas-rows');
  sintomas.forEach((sintoma)=>{
    rows = document.createRange().createContextualFragment(/*HTML*/`
    <tr>
    <td>${sintoma.sintoma}</td>
    <td>${sintoma.conflicto}</td>
    <td>${sintoma.situacion}</td>
  </tr>`); 
    rowsContentTable.appendChild(rows);
  })
}