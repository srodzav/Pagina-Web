var email = document.getElementById("email");
var pswrd = document.getElementById("psw");
var pswrdr = document.getElementById("psw-repeat");

function registrarse(e) {
    localStorage.nombre = document.getElementById("email").value;
    localStorage.password = document.getElementById("password").value;
    localStorage.passwordrepeat = document.getElementById("password-repeat").value;

    if(localStorage.password == localStorage.passwordrepeat){
        console.log(nombre);
        console.log(password);
    } else {
        alert("ERROR CONTRASEÑAS INCORRECTAS");
    }
}