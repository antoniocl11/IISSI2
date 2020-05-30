/*Funcion para que no se invoque la validacion al servidor si hay errores de validación en js*/
function validacionUsuario(){
    var noValidate = document.getElementById("#altaUsuario").noValidate;
    var error1, error2, error3, error4, error5, error6, error7, error8;

    var res = true;

    if(!noValidate){
        error1 = validacion_nif();
        error2 = validacion_nombre();
        error3 = validacion_apellidos();
        error4 = validacion_telefono();
        error5 = validacion_direccion();
        error6 = validacion_fechaNacimiento();
        error7 = validacion_email();
        error8 = validacion_contrasena

        if(!(error1.length==0 && error2.length==0 && error3.length==0 && error4.length==0 &&
            error5.length==0 && error6.length==0 && error7.length==0 && error8.length==0)){
            res = false;
        }
    }

    return res;
}



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

    if(!(/^[a-zA-ZÑñÁÉÍÓÚáéíóú,.\s]*$/.test(nombre))){
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

    if(!/^[a-zA-ZÑñÁÉÍÓÚáéíóú,.\s]*$/.test(apellidos)){
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

//Validacion email
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

    //tablaEmail.setCustomValidity(error);
    return error;
}

//Validacion contraseña
function validacion_contrasena(){
    var tablaContrasena = document.getElementById("contrasena");
    var contrasena = tablaContrasena.value;

    var espacios = /\s/;

    var error;

    if(espacios.test(contrasena)){
        error="La contraseña no puede contener espacios";
    }

    else{
        error ="";
    }

    tablaContrasena.setCustomValidity(error);
    return error;
}

//Validacion edad (No permitido a menores de 16 años)
function validacion_fechaNacimiento(){
    var tablaFecha = document.getElementById("fechaNacimiento");
    var fecha= tablaFecha.value;

    var error;

    //if(validar_fecha(fecha) == true){
        //si la fecha es correcta calculamos la edad
        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var anyo = values[0];


        var fecha_actual = new Date();
        var año_actual = fecha_actual.getYear();
        var dia_actual = fecha_actual.getDate();
        var mes_actual = fecha_actual.getMonth();

        //Calculo de la edad

        var edad = (año_actual + 1900) - anyo;

        if(mes_actual < (mes-1)){
            edad --;
        }

        if(((mes - 1) == mes_actual) && (dia_actual < dia)){
            edad --;
        }

        if(edad > 1900){
            edad -= 1900
        }

        if(edad < 16){
            error = "No permitido a menores de 16 años";
        }
        else{
            error = "";
        }

        tablaFecha.setCustomValidity(error);
        return error;
            
        
}