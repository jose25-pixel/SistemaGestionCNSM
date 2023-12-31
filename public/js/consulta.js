/**
 * Autor: Jose Deodanes
 * ::::Implementado:::::01-10-2023:::::
 * github: @jose-developer-start
 * ::::Versión:1.0.0:::::::::::
 * ::::::Code licence Copyleft
 */
//Init function
var sintomas = [];
document.addEventListener("DOMContentLoaded", () => {
    datatable_consultas();
});

//Function para abrir modal
try {
    const btnNewConsult = document.getElementById("btnNewConsult");
    btnNewConsult.addEventListener("click", openModalNewConsulta);
} catch (err) {
    console.log(err);
}

function openModalNewConsulta() {
    document.getElementById("labelTitleConsult").textContent = "NUEVA CONSULTA";
    clsInputs("cls-input");
    sintomas = [];
    addSintomaTableRows();
    document.getElementById("imagenSeleccionada").src =
        window.location.origin + "/img/icon/upload-image.png";
    $("#modalConsulta").modal("show");
    //Set method
    document.getElementById("_methodConsult").value = "post";
    //Set button add paciente
    document.getElementById("btnAddPaci").style.display = "block";
    //Set method post
    document.getElementById("_methodConsult").value = "post";
}

function datatable_consultas() {
    let url = window.location.origin + "/consultas/pacientes/datatable";
    dataTable("dt_listado_general_consulta", url, {}, 5);
}

//Carga la imagen en tiempo real
const inputImagen = document.getElementById("genograma");
const imagenSeleccionada = document.getElementById("imagenSeleccionada");

inputImagen.addEventListener("change", function () {
    const file = inputImagen.files[0]; // Obtén el archivo seleccionado
    if (file) {
        const reader = new FileReader(); // Crea un objeto FileReader

        reader.onload = function (e) {
            // Cuando se complete la lectura del archivo
            imagenSeleccionada.src = e.target.result; // Asigna la imagen al elemento <img>
        };

        reader.readAsDataURL(file); // Lee el archivo como una URL de datos
    }
});

//ABRIR MODAL
try {
    const btnAddSelectedPaci = document.getElementById("btnAddPaci");
    btnAddSelectedPaci.addEventListener("click", () => {
        $("#modal_selected_pacientes").modal("show");
        //Mostrar datatable
        let url = window.location.origin + "/consultas/seleccionar/pacientes";
        dataTable("dt_pacientes", url);
    });
    function selectedPac(element) {
        console.log(element);
        let id_paciente = element.dataset.id_paciente;
        getPacienteById(id_paciente);
    }
    function getPacienteById(id_paciente) {
        let url = window.location.origin + "/consulta/getPaciente/selected";
        let data = {
            id_paciente: id_paciente,
        };
        axios
            .post(url, data)
            .then((res) => {
                let data = res.data;
                document.getElementById("cod_clinico").value =
                    data.cod_paciente;
                document.getElementById("paciente").value = data.paciente;
                document.getElementById("dui").value = data.dui;
                document.getElementById("telefono").value = data.telefono;
                $("#modal_selected_pacientes").modal("hide");
            })
            .catch((err) => {
                console.log(err);
            });
    }
    //Save consulta
    const consultaForm = document.getElementById("consultaForm");
    consultaForm.addEventListener("submit", (e) => {
        e.preventDefault();
        //Get action method
        let _method = document.getElementById("_methodConsult").value;
        //Validacion de input
        let inputsValidation = document.querySelectorAll(".oblig-input");
        for (let i = 0; i < inputsValidation.length; i++) {
            if (inputsValidation[i].value.trim() === "") {
                inputsValidation[i].classList.add("is-invalid");
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Por favor, rellenar todos los campos!",
                });
                return 0;
                return 0;
            }
            inputsValidation[i].classList.remove("is-invalid");
        }
        let formData = new FormData(consultaForm);
        formData.append("sintomas", JSON.stringify(sintomas));
        //Validacion para evitar enviar datos de sintomas vacios
        if (sintomas.length === 0) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Por favor, ingresar sintomas!",
            });
            return 0;
        }
        //Validacion para guardar o actualizar
        if (_method === "post") {
            let url = window.location.origin + "/consulta/save";
            axios
                .post(url, formData)
                .then((res) => {
                    console.log(res);
                    let data = res.data;
                    if (data.status === "inserted") {
                        Swal.fire({
                            icon: "success",
                            title: "Registro",
                            text: data.message,
                        });
                        sintomas = [];
                        $("#modalConsulta").modal("hide");
                        $("#dt_listado_general_consulta")
                            .DataTable()
                            .ajax.reload(null, false);
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        } else if (_method === "put") {
            let url = window.location.origin + "/consulta/update";
            axios
                .post(url, formData)
                .then((res) => {
                    console.log(res);
                    let data = res.data;
                    if (data.status === "updated") {
                        Swal.fire({
                            icon: "success",
                            title: "Registro",
                            text: data.message,
                        });
                        sintomas = [];
                        $("#modalConsulta").modal("hide");
                        $("#dt_listado_general_consulta")
                            .DataTable()
                            .ajax.reload(null, false);
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    });
} catch (err) {
    console.log(err);
}

/**
 * Codigo para añadir sintomas
 */
try {
    const btnAddSintoma = document.querySelector(".add-sintoma");
    btnAddSintoma.addEventListener("click", () => {
        let sintoma = document.getElementById("sintomas").value;
        let conflicto = document.getElementById("conflictos").value;
        if (sintoma === "" || conflicto === "") {
            return 1;
        }
        let obje = {
            sintoma,
            conflicto,
        };

        addSintomaArray(obje);
        let inputsSintomas = document.querySelectorAll(".cls-sintomas");
        inputsSintomas.forEach((input) => (input.value = ""));
        document.getElementById("sintomas").focus();
    });
} catch (err) {
    console.log(err);
}

function addSintomaArray(objSintoma) {
    sintomas.push(objSintoma);
    addSintomaTableRows();
}

function addSintomaTableRows() {
    let rows = ``;
    let rowsContentTable = document.getElementById("sintomas-rows");
    rowsContentTable.innerHTML = "";
    let counter = 1;
    let index = 0;
    sintomas.forEach((sintoma) => {
        rows += `
    <tr>
    <td style="width:5%">${counter}</td>
    <td style="width:45%">${sintoma.sintoma}</td>
    <td style="width:40%">${sintoma.conflicto}</td>
    <td style="width:10%; text-align:center"><i onclick="removeItem(this)" data-item='${index}' class="fas fa-trash" style="font-size:18px;cursor:pointer"></i></td>
  </tr>`;
        counter++;
        index++;
    });
    rowsContentTable.innerHTML = rows;
}

//Remover items

function removeItem(element) {
    let index = element.dataset.item;
    sintomas.splice(index, 1);
    addSintomaTableRows();
}

/**
 * Funcion para editar
 */
function editConsult(element) {
    document.getElementById("btnAddPaci").style.display = "none";
    //Set title modal
    document.getElementById('labelTitleConsult').textContent = 'Actualizar información de consulta'
    let id_consulta = element.dataset.id_consulta;
    let url = window.location.origin + "/consulta/edit";
    axios
        .post(url, { id_consulta })
        .then((response) => {
            //Set method put
            document.getElementById("_methodConsult").value = "put";
            let data = response.data;
            document.getElementById("consulta").value =
                data.consulta.motivo_consulta;
            document.getElementById("diagnostico").value =
                data.consulta.aprox_diagnostico;
            document.getElementById("situacion_actual").value =
                data.consulta.situacion_actual;
            //Cargar imagen and validation
            if (data.consulta.genograma !== "-") {
                document.getElementById("imagenSeleccionada").src =
                    window.location.origin +
                    "/storage/" +
                    data.consulta.genograma;
            } else {
                document.getElementById("imagenSeleccionada").src =
                    window.location.origin + "/img/icon/upload-image.png";
            }
            //Cargar datos del paciente
            getPacienteById(data.consulta.paciente_id);
            //Recorrer los sintomas y mostrarlo
            sintomas = data.sintomas;
            addSintomaTableRows();
            $("#modalConsulta").modal("show");
        })
        .catch((err) => {
            console.log(err);
        });
}

/**
 * Eliminar consulta
 */
function delConsulta(element) {
    let id = element.dataset.id_consulta;
    let url = window.location.origin + "/consulta/destroy";
    let formData = new FormData();
    formData.append("id", id);
    formData.append("_method", "delete");
    Swal.fire({
        title: "¿Desea eliminar esta consulta?",
        text: "La información se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .post(url, formData)
                .then((response) => {
                    let data = response.data;
                    if (data.status === "delete") {
                        Swal.fire(
                            "Eliminado",
                            "Se ha eliminado correctamente la consulta",
                            "success"
                        );
                        $("#dt_listados_paci_cita")
                            .DataTable()
                            .ajax.reload(null, false);
                        //Refresh fullCalendar
                        //Get Events DB
                        CalendarEvents();
                        //Refresca el calendario
                        calendar.refetchEvents();
                        //Refresh number asider citas
                        counterCitasDay();
                        //Se ha comentado este reload porque no esta funcionando el de eliminar de listado general
                        /* $("#dt_listado_general_cita").DataTable().ajax.reload(null,false); */
                    } else {
                        Swal.fire(
                            "Error",
                            "Ha ocurrido un error inesperado, intente nuevamente dentro de unos minutos",
                            "error"
                        );
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    });
}

/**
 * Clear inputs
 */
function clsInputs(clase) {
    let inputs = document.querySelectorAll("." + clase);
    inputs.forEach((input) => (input.value = ""));
}

/**
 * Codigo para generar pdf
 */
function genrarPDF(element){
    let token = document.querySelector('meta[name="_token"]');
    let tokenValue = token.getAttribute("content");
    let id = element.dataset.id_consulta;
    let form = document.createElement('form');
    form.method = 'post';
    form.target = '_blank';
    form.action = window.location.origin + '/consulta/reporte';
    //Input
    let input = document.createElement('input');
    input.name = 'consulta_id';
    input.type = 'hidden';
    input.value = id;
    form.appendChild(input)
    //Token laravel
    let tokenInput = document.createElement('input');
    tokenInput.name = '_token';
    tokenInput.type = 'hidden';
    tokenInput.value = tokenValue;
    form.appendChild(tokenInput);
    //Creamos en el dom
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}