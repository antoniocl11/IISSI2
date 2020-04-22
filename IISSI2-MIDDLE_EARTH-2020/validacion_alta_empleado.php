<?php
    session_start();

    if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoEmpleado["nif"] = $_REQUEST["nif"];
		$nuevoEmpleado["nombre"] = $_REQUEST["nombre"];
        $nuevoEmpleado["apellidos"] = $_REQUEST["apellidos"];
        $nuevoEmpleado["turno"] = $_REQUEST["turno"];
        $nuevoEmpleado["sueldo"] = $_REQUEST["sueldo"];

        $_SESSION["formulario"] = $nuevoEmpleado;
    }

    else
        Header("Location: form_alta_empleado.php");
    
    $errores = validarDatosEmpleado($nuevoEmpleado);
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_empleado.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
            Header('Location: accion_alta_empleado.php');
    
    
    /////////Validacion del formulario
    function validarDatosEmpleado($nuevoEmpleado){
            $errores = array();
        //Validacion DNI, no puede estar vacio ni ser nulo
        if($nuevoEmpleado["nif"]=="" || $nuevoEmpleado["nif"]==null)
            $errores = "<p>El campo NIF no puede estar vacío</p>";
        //el DNI debe contener 8 numero y una letra mayuscula al final
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoEmpleado["nif"])){
            $errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula" . $nuevoEmpleado["nif"] . "</p>";
        }
        //El campo nombre no puede estar vacio ni ser nulo
        if($nuevoEmpleado["nombre"]=="" || $nuevoEmpleado["nombre"]==null) 
            $errores[] = "<p>El nombre no puede estar vacío</p>";
        
        //El campo apellidos no puede estar vacio ni ser nulo
        if($nuevoEmpleado["apellidos"]=="" || $nuevoEmpleado["apellidos"]==null) 
            $errores[] = "<p>Los apellidos no pueden estar vacíos</p>";
        
        //El campo teléfono no puede estar vacío ni ser nulo, además sólo debe contener
        //9 números y ninguna letra 
        if($nuevoEmpleado["telefono"]=="" || $nuevoEmpleado["telefono"]==null)
            $errores[] = "<p>El teléfono no puede estar vacío ni ser nulo</p>";
        else if(!preg_match("/^[0-9]{9}$/", $nuevoEmpleado["telefono"])){
            $errores[] = "<p>El teléfono debe contener 9 números</p>";
        }
        else if (preg_match("/^{a-z}{A-Z}$/", $nuevoEmpleado["telefono"])) {
			$errores[] = "<p>El número de teléfono no puede contener letras.</p>";
        }
        
        
        

        



            return $errores;
        
        
    }
?>