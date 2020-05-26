
function validacion_fecha(){
    
    var tablaFecha = document.getElementById("fecha");
    var fecha = tablaFecha.value;
    var hoy = new Date();
    var error;
    
    
    if(fecha == "" || fecha == null){
        error = "El campo fecha no puede estar vacío";
    }
    
    else if(hoy <= fecha){
        error="El campos fecha no es válido. La fecha debe ser posterior o igual a la fecha actual";
    }

    else{
        error="" 
    }

    tablaFecha.setCustomValidity(error);
    

    return error;

}


function validacion_producto(){
    var tablaProducto = document.getElementById("producto");
    var producto = tablaProducto.value;
    
    var error;

    if(!(/^[a-zA-ZÑñÁÉÍÓÚáéíóú0-9,.\s]*$/.test(producto))){
        error = "El campo producto no posee el formato correcto.";
    }
    else if(producto=="" || producto==null){
        error = "El campo producto no puede estar vacío";
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

    var error;

    if(email=="" || email==null){
        error = "El campo email no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaEmail.setCustomValidity(error);
    return error;
}

function validacion_nombre(){
    var tablaNombre = document.getElementById("nombre");
    var nombre = tablaNombre.value;

    var error;

    if(!(/^[a-zA-ZñÑÁÉÍÓÚáéíóú0-9\s\º\,\''\-\/\.\s]*$/.test(nombre))){
        error = "El campo nombre no posee el formato correcto.";
    }

    else if(nombre == "" || nombre == null){
        error = "El campo nombre no puede estar vacío";
    }

    else{
        error="";
    }

    tablaNombre.setCustomValidity(error);
    return error;
}