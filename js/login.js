'use strict'

window.onload = "myFunction()";


let enviar = document.querySelector("#solicitar"),
    login = document.querySelector("#formulario-user"),
    draw = document.querySelector('.draw'),
    response = document.querySelector('.response');

login.addEventListener('submit', e => {
    e.preventDefault();
    let dataFor = new FormData(login);
    document.querySelector('.carga').classList.add('visible');

    fetch('php/login.php', {
        method: "POST",
        body: dataFor
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        }
            else {
                throw "No se ha podido acceder a este recurso. Status" + response.status;
            }
        })
        .then(data => {
            console.log(data);
            document.querySelector('.carga').classList.remove('visible');

            if (data == 1) {
                console.log(data);
                location.href="home.php";
            }
            else {
                response.innerHTML = `<p class="alert alert-danger" role="alert">Usuario o Contraseña Incorrecta<p>`;
            }
        })

        .catch(error=>{
            document.querySelector('.carga').classList.remove('visible');
            console.log(error);
        })
});