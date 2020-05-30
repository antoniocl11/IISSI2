/*Funcion para que no se invoque la validacion al servidor si hay errores de validación en js*/
function validacionEmpleado(){
    var noValidate = document.getElementById("#altaEmpleado").noValidate;
    var error1, error2, error3, error4, error5;

    var res = true;

    if(!noValidate){
        error1 = validacion_id();
        error2 = validacion_nif();
        error3 = validacion_nombre();
        error4 = validacion_nombre();
        error5 = validacion_sueldo();

        if(!(error1.length==0 && error2.length==0 && error3.length==0 && error4.length==0 && error5.length==0)){
            res = false;
        }
    }

    return res;
}


/*Validcion de id*/
function validacion_id(){
    var tablaId = document.getElementById("id");
    var id = tablaId.value;

    var error;

    if(!(/^[0-9]{9}$/.test(id))){
        error = "El ID no posee el formato correcto";
    }

    else if(id =="" || id ==null){
        error = "El campo ID no puede estar vacío";
    }

    else{
        error = "";
    }

    tablaId.setCustomValidity(error);
    return error;
}

/*Validacion nif(dni)*/
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

//Validacion Sueldo
function validacion_sueldo(){
    var tablaSueldo = document.getElementById("sueldo");
    var sueldo = tablaSueldo.value;

    var error;

    if(sueldo == "" || sueldo == null){
        error = "El campo sueldo no puede estar vacío";
    }

    else if (/^[a-zA-ZÑñÁÉÍÓÚáéíóú.\s]*$/.test(sueldo)){
        error = "El campo sueldo no puede contener letras";
    }

    else{
        error="";
    }

    tablaSueldo.setCustomValidity(error);
    return error;
}
