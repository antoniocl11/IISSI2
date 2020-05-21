function validacion_fecha(){ /*No funciona*/
    var tablaFecha = document.getElementById("fecha");
    var fecha = tablaFecha.value.split('-');

    var fech = new Date(fecha[0] + "-" + fecha[1] + "-" +fecha[2]);
    var hoy = new Date();

    var error;

    if(fech < hoy){
        error = "¡La fecha no puede ser anterior a la de hoy!";
        return false;
    }

    else{
        return true;
    }

}

function validacion_comentario(){
    var tablaComentario = document.getElementById("comentario");
    var comentario = tablaComentario.value;

    var error;

    if(comentario=="" || comentario == null){
        error= "El campo comentario no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaComentario.setCustomValidity(error);
    return error;
}

function validacion_nombre(){
    var tablaNombre = document.getElementById("nombre");
    var nombre = tablaNombre.value;
    
    var error;

    if(!(/^[a-zA-ZÑñÁÉÍÓÚáéíóú0-9,.\s]*$/.test(nombre))){
        error = "El campo nombre no posee el formato correcto.";
    }
    else if(nombre=="" || nombre==null){
        error = "El campo nombre no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaNombre.setCustomValidity(error);
    return error;
}

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
