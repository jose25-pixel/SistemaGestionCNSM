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
    document.getElementById("labelTitleConsult").textContent = "NUEVO USUARIO";
    document.getElementById('btnLabelUser').textContent = 'Registrar'
    clsInputs("cls-input");
    $("#modalUser").modal("show");
    //Set method post
    document.getElementById("_methodConsult").value = "post"; 
}

function datatable_consultas() {
    let url = window.location.origin + "/usuarios/datatable";
    dataTable("dt_users_lists", url, {}, 5);
}

function mayusuario(element) {
    element.value = element.value.toUpperCase();
}


//ABRIR MODAL
try {
    //Save consulta
    const userForm = document.getElementById('formUser');
    userForm.addEventListener("submit", (e) => {
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
        let formData = new FormData(userForm);
        //Validacion para guardar o actualizar
        if (_method === "post") {
            let url = window.location.origin + "/usuarios/save";
            axios
                .post(url, formData)
                .then((res) => {
                    let data = res.data;
                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Registrado",
                            text: data.message,
                        });
                        $("#modalUser").modal("hide");
                        $("#dt_users_lists")
                            .DataTable()
                            .ajax.reload(null, false);
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        } else if (_method === "put") {
            let url = window.location.origin + "/usuarios/update";
            axios
                .post(url, formData)
                .then((res) => {
                    let data = res.data;
                    if (data.status === "updated") {
                        Swal.fire({
                            icon: "success",
                            title: "Registro",
                            text: data.message,
                        });
                        sintomas = [];
                        $("#modalUser").modal("hide");
                        $("#dt_users_lists")
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
 * Funcion para editar
 */
function editUser(element) {
    //Set title modal
    document.getElementById('labelTitleConsult').textContent = 'Actualizar información del usuario'
    document.getElementById("btnLabelUser").textContent = "Guardar cambios";
    let id = element.dataset.id;
    let url = window.location.origin + "/usuarios/edit";
    axios
        .post(url, { id })
        .then((response) => {
            //Set method put
            let data = response.data;
            document.getElementById("_methodConsult").value = "put";
            document.getElementById("categoria").value = data.categoria;
            document.getElementById("cod").value = data.codigo;
            document.getElementById("nombre").value = data.nombre;
            document.getElementById("direccion").value = data.direccion;
            document.getElementById("dui").value = data.dui;
            document.getElementById("telefono").value = data.telefono;
            document.getElementById("email").value = data.email;
            document.getElementById("usuario").value = data.usuario;
            document.getElementById("password").value = data.viewPassword;
            $("#modalUser").modal("show");
        })
        .catch((err) => {
            console.log(err);
        });
}

/**
 * Eliminar consulta
 */
function disabledUser(element,estado) {
    let id = element.dataset.id;
    let url = window.location.origin + "/usuarios/disabled";
    let formData = new FormData();
    let accion = estado == 1 ? "habilitar" : "Desabilitar";
    formData.append("id", id);
    formData.append("_method", "post");
    formData.append("estado",estado);
    Swal.fire({
        title: estado == 0 ? "¿Desabilitar usuario?" : "¿Habilitar usuario?",
        text: "Esta acción "+ accion +" el acceso al usuario!",
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
                    if (data.status === "disabled") {
                        Swal.fire(
                            "Usuario",
                            "Acción realizada",
                            "success"
                        );
                        $("#dt_users_lists")
                            .DataTable()
                            .ajax.reload(null, false);
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
