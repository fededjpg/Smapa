'use strict';
window.onload = "myFunction()";

let form = document.querySelector('#form-registro'),
    draw = document.querySelector('.draw'),
    response = document.querySelector('.response');


    form.addEventListener('submit', e => {
        e.preventDefault();
        let dataFor = new FormData(form);
        document.querySelector('.carga').classList.add('visible');
    
        fetch('php/registrar.php', {
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
                    response.innerHTML = `Registro Exitoso`;
                }
                else {
                    response.innerHTML = `Usuario o Contraseña Incorrecta`;
                }
            })
    
            .catch(error=>{
                document.querySelector('.carga').classList.remove('visible');
                console.log(error);
            })
    });

// function validform() {

//     var a = document.forms["my-form"]["full-name"].value;
//     var b = document.forms["my-form"]["email"].value;
//     var c = document.forms["my-form"]["user"].value;


//     if (a==null || a=="")
//     {
//         alert("Please Enter Your Full Name");
//         return false;
//     }else if (b==null || b=="")
//     {
//         alert("Please Enter Your Email Address");
//         return false;
//     }else if (c==null || c=="")
//     {
//         alert("Please Enter Your Username");
//         return false;
//     }else if (d==null || d=="")
//     {
//         alert("Please Enter Your Permanent Address");
//         return false;
//     }else if (e==null || e=="")
//     {
//         alert("Please Enter Your NID Number");
//         return false;
//     }

// }

