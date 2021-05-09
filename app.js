function login(e) {
    var username = prompt("Ingrese su USUARIO: ");
    var password = prompt("Ingrese su CONTRASEÑA: ");

    if (username == null || username == "") {
        alert("User cancelled the prompt.");
    } else {
        if (password == null || password == "") {
            alert("User cancelled the prompt.");
        } else {
            alert("Inicio de sesion con exito");
        }
    }
}

function singup(e) {
    var username = prompt("Ingrese su USUARIO: ");
    var password = prompt("Ingrese su CONTRASEÑA: ");
    var repassword = prompt("Repita su CONTRASEÑA: ");

    if (username == null || username == "") {
        alert("User cancelled the prompt.");
    } else {
        if (password == null || password == "") {
            alert("User cancelled the prompt.");
        } else {
            if (password == repassword) {
                alert("Registro Exitoso");
            } else {
                alert("Contraseña Incorrecta");
            }
        }
    }
}

