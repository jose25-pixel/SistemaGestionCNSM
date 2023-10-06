//Init function
document.addEventListener('DOMContentLoaded', ()=>{
    counterCitasDay();
})

/**
 * Function para contar cantidad de citas al dia
 */

function counterCitasDay(){
    let url = window.location.origin + "/citas/contador/dia"
    axios.get(url)
    .then((response)=> {
        let counter = response.data;
        document.getElementById('info-count-citas').textContent = parseInt(counter);
    })
    .catch((err)=>console.log(err))
}