function validacion_email(){
    var tablaEmail = document.getElementById("email");
    var email = tablaEmail.value;

    var error;

    if(!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i)){
        error = "El formato del campo email no es correcto";
    }

    else if (email=="" || email == null){
        error = "El campo email no puede estar vacío";
    }

    else {
        error = "";
    }

    tablaEmail.setCustomValidity(error);
    return error;
}

function validacion_contrasena(){
    var tablaContrasena = document.getElementById("contrasena");
    var contrasena = tablaContrasena.value;

    var error;

    if(contrasena=="" || contrasena == null){
        error = "El campo contraseña no puede estar vacío";
    }

    else if(/^[" "]&/.test(contrasena)/*contrasena == " "*/){
        error="La contraseña no puede contener espacios vacíos";
    }

    else{
        error = "";
    }

    tablaContrasena.setCustomValidity(error);
    return error;
}