function validacionReserva(){
    var noValidate = document.getElementById("#altaReserva").noValidate;
    var error1, error2, error3, error4;

    var res = true;

    if(!noValidate){
        error1 = validacion_fecha();
        error2 = validacion_producto();
        error3 = validacion_email();
        error4 = validacion_nombre();

        if(!(error1.length==0 && error2.length==0 && error3.length==0 && error4.length==0)){
            res = false;
        }
    }

    return res;
}

function validacion_fecha(){
    var tablaFecha = document.getElementById("fecha");
    var fecha = tablaFecha.value.split('-');

    var fech = new Date(fecha[0] + "-" + fecha[1] + "-" +fecha[2]);
    var hoy = new Date();
    hoy.setHours(0,0,0,0);
    var error;

    if(fech <= hoy){
        error = "La fecha no puede ser anterior a la actual";
    }

    else{
        error = "";
    }

    tablaFecha.setCustomValidity(error);
    return error;

}

function validacion_producto(){
    var tablaProducto = document.getElementById("producto");
    var producto = tablaProducto.value;

    var error;

    if(!(/^[a-zA-ZÑñÁÉÍÓÚáéíóú,.\s]*$/.test(producto))){
        error = "El campo producto no posee el formato correcto";
    }

    else if(producto =="" || producto == null){
        error= "El campo producto no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaProducto.setCustomValidity(error);
    return error;
}

function validacion_email(){
    var tablaEmail = document.getElementById("email");
    var email = tablaEmail.value;

    var validadorCorreo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var res = true;
    var error;

    res = res && validadorCorreo.test(email);

    if(!res){
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

function validacion_nombre(){
    var tablaNombre = document.getElementById("nombre");
    var nombre = tablaNombre.value;
    
    var error;

    if(!(/^[a-zA-ZÑñÁÉÍÓÚáéíóú,.\s]*$/.test(nombre))){
        error = "El campo nombre no posee el formato correcto";
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

