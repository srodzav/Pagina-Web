var email = document.getElementById("email");
var pswrd = document.getElementById("psw");
var pswrdr = document.getElementById("psw-repeat");

function registrarse(e) {
    localStorage.nombre = document.getElementById("email").value;
    localStorage.password = document.getElementById("psw").value;
    console.log(nombre);
    console.log(password);
}