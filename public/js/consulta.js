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