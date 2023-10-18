document.getElementById("ciCliente").addEventListener("keyup", getciCliente)
//cuando se pulse una letra se ejecuta el metodo keyup //gestciCliente es como el alias
function getciCliente(){
    let inputCP = document.getElementById("ciCliente").value
    let idCliente = document.getElementById("idCliente").value

    let url="<?php echo base_url(); ?>administration/venta/agregarCliente.php"
    let formData = new FormData()
    formData.append("ciCliente", inputCP) 
    //api de javascript nativo
    fetch(url, {
        method: "POST",
        body: formData,
        mode: "cors"
    }).then(response => response.json())
    .then(data => {
        idCliente.style.display = 'block'
        idCliente.innerHTML = data

    })
    .catch(err => console.log(err)) //que se impriman todos los errores
}