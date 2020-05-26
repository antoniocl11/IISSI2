/*Funcion para que no se invoque la validacion al servidor si hay errores de validación en js*/
function validacionPedido(){
    var noValidate = document.getElementById("#altaPedido").noValidate;
    var error1, error2, error3;

    var res = true;

    if(!noValidate){
        error1 = validacion_fecha;
        error2 = validacion_id;

        if(!(error1.length==0 && error2.length==0)){
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


function validacion_id(){
    var tablaId = document.getElementById("id");
    var id = tablaId.value;

    var error;

    if(id == "" || id == null){
        error= "El id no puede estar vacío";
    }

    else if (!(/^[0-9]{9}$/.test(id))){
        error = "El campo id no posee el formato correcto";
    }

    tablaId.setCustomValidity(error);
    return error;
}

