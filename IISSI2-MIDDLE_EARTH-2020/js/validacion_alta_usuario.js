//Validación número NIF(DNI)
function validacion_nif(){
    //Obtiene el elemento con la id nif, es decir lo que contiene
    //el campo nif, cuando el usuario introduzca el valor
    var tablaDNI = document.getElementById("nif");
    var dni = tablaDNI.value;

    var error;
    
    
    if(!(/^[0-9]{8}[A-Z]$/.test(dni))){
        error="El campos DNI no es válido. Su longitud debe ser de 9 caracteres, 8 números y una letra mayúscula al final";
    }
    
    else if(dni == "" || dni == null){
        error = "El campo DNI no puede estar vacío";
    }

    else{
        error="" //Campo sin errores
    }

    tablaDNI.setCustomValidity(error);
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

//Validacion Apellidos
function validacion_apellidos(){
    var tablaApellidos = document.getElementById("apellidos");
    var apellidos = tablaApellidos.value;
    
    var error;

    if(!/^[a-zA-ZÑñÁÉÍÓÚáéíóú0-9,.\s]*$/.test(apellidos)){
        error = "El campo apellidos no posee el formato correcto.";
    }
    else if(apellidos=="" || apellidos==null){
        error = "El campo apellidos no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaApellidos.setCustomValidity(error);
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

    if(!(/^[a-zA-ZñÑÁÉÍÓÚáéíóú0-9\s\º\,\''\-\_\.]*$/.test(direccion))){
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

//Validacion fecha de nacimiento (en construccion)
function validacion_fechaNacimiento(){
    var tablaFechaNacimiento = document.getElementById(fechaNacimiento);
    var fechaNacimiento = tablaFechaNacimiento.value;

    var error;
    
    if(fechaNacimiento == "" || fechaNacimiento == null){
        error = "El campo fecha de nacimiento no puede estar vacío";
    }


    tablaFechaNacimiento.setCustomValidity(error);
    return error;
}

//Validacion email
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

//Validacion contraseña
function validacion_contrasena(){
    var tablaContrasena = document.getElementById("contraseña");
    var contrasena = tablaContrasena.value;

    var error;

    if(contrasena=="" || contrasena == null){
        error = "La contraseña no puede contener espacios vacíos";
    }

    else if(/^[" "]&/.test(contrasena)/*contrasena == " "*/){
        error="El campo contraseña no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaContrasena.setCustomValidity(error);
    return error;
}