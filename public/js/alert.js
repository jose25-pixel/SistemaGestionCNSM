try{
    document.addEventListener('DOMContentLoaded', ()=>{
        alertCitasHoy();
    })
}catch(err){
    //console.log(err)
}

function alertCitasHoy(){
    let url = window.location.origin + "/citas/contador/dia"
    axios.get(url)
    .then((response)=> {
        let counter = response.data;
        if(parseInt(counter) > 0){
            let urlAlerCitastDias = window.location.origin + "/citas/alert-hoy";
            dataTable('dt_list_citas_current',urlAlerCitastDias,{},12);
            $("#listCitasHoy").modal('show');
        }
    })
    .catch((err)=>console.log(err))
}