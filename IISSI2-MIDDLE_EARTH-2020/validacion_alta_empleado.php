<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo pedido
    require_once("gestionBD.php");

    if (isset($_SESSION["formulario"])) {
        // Recogemos los datos del formulario
        $nuevoEmpleado["id"] = $_REQUEST["id"];
		$nuevoEmpleado["nif"] = $_REQUEST["nif"];
		$nuevoEmpleado["nombre"] = $_REQUEST["nombre"];
        $nuevoEmpleado["apellidos"] = $_REQUEST["apellidos"];
        $nuevoEmpleado["turno"] = $_REQUEST["turno"];
        $nuevoEmpleado["sueldo"] = $_REQUEST["sueldo"];

        $_SESSION["formulario"] = $nuevoEmpleado;
    }

    else
        
        Header("Location: form_alta_empleado.php");

    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosEmpleado($conexion, $nuevoEmpleado);
    cerrarConexionBD($conexion);
    
    
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_empleado.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del empleado en la base de datos)
            Header('Location: accion_alta_empleado.php');
    
    
    /////////Validacion del formulario
    function validarDatosEmpleado($conexion, $nuevoEmpleado){
            $errores = array();

        //El campo id no puede estar vacío 
        if($nuevoEmpleado["id"]=="" || $nuevoEmpleado["id"]==null)
            $errores[] = "<p>El campo ID no puede estar vacío </p>";
        //El ID del empleado contendrá 9 caracteres numéricos
        else if(!preg_match("/^[0-9]{9}$/", $nuevoEmpleado["id"])){
            $errores[] = "<p>El ID del empleado contiene 9 dígitos numéricos" . $nuevoEmpleado["id"] . "</p>";
        }
        //Validacion DNI, no puede estar vacio 
        if($nuevoEmpleado["nif"]=="" || $nuevoEmpleado["nif"]==null)
            $errores[] = "<p>El campo NIF no puede estar vacío </p>";
        //el DNI debe contener 8 numero y una letra mayuscula al final
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoEmpleado["nif"])){
            $errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula" . $nuevoEmpleado["nif"] . "</p>";
        }

        //El campo nombre no puede estar vacio 
        if($nuevoEmpleado["nombre"]=="" || $nuevoEmpleado["nombre"]==null) 
            $errores[] = "<p>El campo nombre no puede estar vacío </p>";
        
        //El campo apellidos no puede estar vacio 
        if($nuevoEmpleado["apellidos"]=="" || $nuevoEmpleado["apellidos"]==null) 
            $errores[] = "<p>El campo apellidos no puede estar vacío</p>";
            
        
        //El campo turno no puede estar vacío 
        if($nuevoEmpleado["turno"] =="" || $nuevoEmpleado["turno"]==null){
            $errores[] ="<p>El campo Turno no puede estar vacío </p>";
        }
/*
        else if(!(preg_match("/^[M]$/", $nuevoEmpleado["turno"]))) {//|| !(preg_match("/^[T]$/", $nuevoEmpleado["turno"]) || preg_match("/^[P]$/", $nuevoEmpleado["turno"])){
            $errores[] = "<p>El campo Turno solo puede contener los caracteres M, T o P</p>";
        }
*/
        //El campo sueldo no puede estar vacío
        if($nuevoEmpleado["sueldo"]=="" || $nuevoEmpleado["sueldo"]==null){
            $errores[] ="<p>El campo Sueldo no puede estar vacío </p>";
        }
        //El campo sueldo no puede contener letras
        else if(preg_match("/^{a-z}{A-Z}$/", $nuevoEmpleado["sueldo"])){
            $errores[] = "<p>El campo sueldo solo puede contener letras</p>";
        }

            return $errores;
       
        
    }
?>