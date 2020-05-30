<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo usuario
    require_once("gestionBD.php");

    if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["nif"] = $_REQUEST["nif"];
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
        $nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
        $nuevoUsuario["telefono"] = $_REQUEST["telefono"];
        $nuevoUsuario["direccion"] = $_REQUEST["direccion"];
        $nuevoUsuario["esSocio"] = $_REQUEST["esSocio"];
        $nuevoUsuario["fechaNacimiento"] = $_REQUEST["fechaNacimiento"];
        $nuevoUsuario["email"] = $_REQUEST["email"];
        $nuevoUsuario["contrasena"] = $_REQUEST["contrasena"];

        $_SESSION["formulario"] = $nuevoUsuario;
    }

    else{
        Header("Location: form_alta_usuario.php");
    }
    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosUsuario($conexion, $nuevoUsuario);
    cerrarConexionBD($conexion);
    
    
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_usuario.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
            Header('Location: accion_alta_usuario.php');
    
    
    /////////Validacion del formulario
    function validarDatosUsuario($conexion,$nuevoUsuario){
            $errores = array();
         
        //Validacion DNI, no puede estar vacío
        if($nuevoUsuario["nif"]=="" || $nuevoUsuario["nif"]==null)
            $errores[] = "<p>El campo NIF no puede estar vacío</p>";
        //el DNI debe contener 8 numero y una letra mayuscula al final
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
            $errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula</p>";
        }
        
        //El campo nombre no puede estar vacío
        if($nuevoUsuario["nombre"]=="" || $nuevoUsuario["nombre"]==null) 
            $errores[] = "<p>El nombre no puede estar vacío</p>";
        
        //Validacion formato incorrecto nombre
        else if(!preg_match("/^[a-zA-ZÑÁÉÍÓÚáéíóú,.\s]*$/", $nuevaReserva["nombre"])){
            $errores[] = "El campo nombre no posee el formato correcto.";
        }
        //El campo apellidos no puede estar vacio
        if($nuevoUsuario["apellidos"]=="" || $nuevoUsuario["apellidos"]==null) {
            $errores[] = "<p>Los apellidos no pueden estar vacíos</p>";
        }
        //Validacion formato incorrecto apellidos
        else if(!preg_match("/^[a-zA-ZÑÁÉÍÓÚáéíóú,.\s]*$/", $nuevaReserva["apellidos"])){
            $errores[] = "El campo apellidos no posee el formato correcto.";
        }
        /*
        //El campo teléfono no puede estar vacío, además sólo debe contener
        //9 números y ninguna letra 
        if($nuevoUsuario["telefono"]=="" || $nuevoUsuario["telefono"]==null)
            $errores[] = "<p>El teléfono no puede estar vacío</p>";
        else if(!preg_match("/^[0-9]{9}$/", $nuevoUsuario["telefono"])){
            $errores[] = "<p>El teléfono debe contener 9 números</p>";
        }
        else if (preg_match("/^{a-z}{A-Z}$/", $nuevoUsuario["telefono"])) {
			$errores[] = "<p>El número de teléfono no puede contener letras.</p>";
        }
        */

        //El campo direccion no puede estar vacío
        if($nuevoUsuario["direccion"]=="" || $nuevoUsuario["direccion"] == null){
            $errores[] = "<p>El campo dirección no puede estar vacío</p>";
        }
        //El campo direccion debe tener el formato adecuado
        else if(!preg_match("/^[a-zA-ZñÑÁÉÍÓÚáéíóú0-9\s\º\,\''\-\_\.]*$/", $nuevoUsuario["direccion"])){
            $errores[] = "El campo direccion no posee el formato correcto.";
        }
/*
        //El campo fecha de nacimiento no puede estar vacio
        if($nuevoUsuario["fechaNacimiento"]=="" || $nuevoUsuario["fechaNacimiento"] == null){
            $errores[] = "<p>El campo fecha de nacimiento no puede estar vacío</p>";
        }
*/

        //El campo email no puede estar vacio
        if($nuevoUsuario["email"]=="" || $nuevoUsuario["email"] == null){
            $errores[] = "<p>El campo email no puede estar vacío</p>";
        }

        //El campo contraseña no puede estar vacío
        if($nuevoUsuario["contrasena"]=="" || $nuevoUsuario["contrasena"==null]){
            $errores[] = "<p>El campo contraseña no puede estar vacío</p>";
        }
        else if(preg_match("/^[/s]$/", $nuevoUsuario["contraseña"])){
            $errores[] = "<p>La contraseña no puede contener espacios</p>";
        }
    
        return $errores;
        
        
    }
?>