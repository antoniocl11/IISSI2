<?php
    session_start();

    if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["nif"] = $_REQUEST["nif"];
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
		$nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
    

        $_SESSION["formulario"] = $nuevoUsuario;
    }

    else
        Header("Location: form_alta_usuario.php");
    
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_usuario.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
            Header('Location: accion_alta_usuario.php');
    
    function validarDatosUsuario($nuevoUsuario){
            $errores = array();
        //Validacion DNI, no puede estar vacio
        if($nuevoUsuario["nif"]=="")
            $errores = "<p>El campo NIF no puede estar vacío</p>";
        //el DNI debe contener 8 numero y una letra mayuscula al final
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
            $errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula" . $nuevoUsuario["nif"] . "</p>";
        }
        //El campo nombre no puede estar vacio
        if($nuevoUsuario["nombre"]=="") 
            $errores[] = "<p>El nombre no puede estar vacío</p>";
        //El campo apellidos no puede estar vacio
        if($nuevoUsuario["apellidos"]=="") 
            $errores[] = "<p>Los apellidos no pueden estar vacíos</p>";
        
        if($nuevoUsuario["telefono"]=="")
            $errores[] = "<p>El teléfono no puede estar vacío</p>";
        else if(!preg_match("/^[0-9]{9}$/", $nuevoUsuario["telefono"])){
            $errores[] = "<p>El teléfono debe contener 9 números" . $nuevoUsuario["telefono"] . "</p>";
        }
        
        
            return $errores;
        
        
    }
?>