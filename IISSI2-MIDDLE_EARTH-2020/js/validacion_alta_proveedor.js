function validacionProveedor(){
    var noValidate = document.getElementById("#altaProveedor").noValidate;
    var error1, error2, error3, error4;

    var res = true;

    if(!noValidate){
        error1 = validacion_cif();
        error2 = validacion_nombre();
        error3 = validacion_telefono();
        error4 = validacion_direccion();

        if(!(error1.length==0 && error2.length==0 && error3.length==0 && error4.length==0)){
            res = false;
        }
    }

    return res;
}

//Validación número NIF(DNI)
function validacion_cif(){
    //Obtiene el elemento con la id nif, es decir lo que contiene
    //el campo nif, cuando el usuario introduzca el valor
    var tablaCIF = document.getElementById("cif");
    var cif = tablaCIF.value;

    var error;
    
    
    if(cif == "" || cif == null){
        error = "El campo CIF no puede estar vacío";
    }
    
    else if(!(/^[A-Z][0-9]{8}$/.test(cif))){
        error="El campos CIF no es válido. Su longitud debe ser de 9 caracteres, una letra mayúscula al principio y 8 números";
    }

    else{
        error="" //Campo sin errores
    }

    tablaCIF.setCustomValidity(error);
    //setCustomValidity define el mensaje de validacion personalizado para el elemento
    //seleccionado con el mensaje específico

    return error;

}

//Validacion Nombre
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

//Validacion Teléfono
function validacion_telefono(){
    var tablaTelefono = document.getElementById("telefono");
    var telefono = tablaTelefono.value;

    var error;

    if(telefono=="" || telefono==null){
        error = "El campo teléfono no puede estar vacío";
    }

    else if(!(/^[0-9]{9}$/.test(telefono))){
        error = "El campo telefono no posee el formato correcto";
    }

    else{
        error = "";
    }

    tablaTelefono.setCustomValidity(error);
    return error;
}

//Validacion direccion
function validacion_direccion(){
    var tablaDireccion = document.getElementById("direccion");
    var direccion = tablaDireccion.value;

    var error;

    if(!(/^[a-zA-ZñÑÁÉÍÓÚáéíóú0-9\s\º\,\''\-\/\.\s]*$/.test(direccion))){
        error = "El campo direccion no posee el formato correcto.";
    }

    else if(direccion == "" || direccion == null){
        error = "El campo dirección no puede estar vacío";
    }

    else{
        error="";
    }

    tablaDireccion.setCustomValidity(error);
    return error;
}