/**
 * New code for terapeuta
 * :::Implementado::::: 28-09-2023::::
 * :::::Desarrollavador: Jose Deodanes
 * :::::Github: Jose-developer-start
 */

function openModalTerapeuta(){
    $("#modal_terapeuta").modal('show');
    //Set title
    document.getElementById('labelTitleTerapeuta').textContent = "NUEVO TERAPEUTA";
    document.getElementById('btnLabelT').textContent = " AGREGAR";
}

try{
    let formTerapeuta = document.getElementById('citaTerapeuta');
    formTerapeuta.addEventListener('submit', (e)=>{
        e.preventDefault();
        let url = window.location.origin + "/terapeuta/save";
        let formData = new FormData(formTerapeuta);
        axios.post(url,formData)
        .then((response)=>{
            let result = response.data;
            if(result.status === "inserted"){
                selectedTerapeutaSelect(result.data);
                Swal.fire({
                    icon: "success",
                    text: result.msg,
                });
                $("#modal_terapeuta").modal("hide");
                formTerapeuta.reset();
            }else if(result.status === "exists"){
                Swal.fire({
                    icon: "error",
                    text: result.msg,
                });
            }else{
                Swal.fire({
                    icon: "error",
                    text: 'Se ha producido un error inesperado!',
                });
            }
        })
        .catch((err)=>console.log(err))
    })
    //SELECT TERAPEUTA OPCIONES ALL
    function getSelectTerapeutas(callback=''){
        let url = window.location.origin + "/terapeuta/all";
        axios.get(url)
        .then((response)=>{
            if(response.status === 200){
                let data = response.data;
                let selectT = document.getElementById('terapeuta_id');
                selectT.textContent = '';
                let defaultOption = document.createElement('option');
                defaultOption.value = 'none';
                defaultOption.textContent = 'Seleccionar';
                selectT.appendChild(defaultOption);
                data.forEach(element => {
                    let option = document.createElement('option');
                    option.value = element.id;
                    option.textContent = element.nombre + ' (Tel. ' + element.telefono + ')';
                    selectT.appendChild(option);
                });
                if(callback !== ''){
                    callback(response.status);
                }
            }
        })
        .catch((err)=>console.log(err))
    }
    //SELECTED TERAPEUTA
    function selectedTerapeutaSelect(data){
        let select = document.getElementById('terapeuta_id');
        select.textContent = '';
        let defaultOption = document.createElement('option');
        /* defaultOption.value = '';
        defaultOption.textContent = "Seleccionar"
         */
        let option = document.createElement('option');
        option.value = data.id;
        option.textContent = data.nombre + " (Tel. " + data.telefono + ")";
        select.appendChild(option);
    }
}catch(err){
    console.log(err)
}