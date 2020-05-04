<?php
    session_start();

    if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["id"] = $_REQUEST["id"];
        $nuevoUsuario["fecha"] = $_REQUEST["fecha"];

        $_SESSION["formulario"] = $nuevoUsuario;
    }

    else
        Header("Location: form_alta_pedido.php");
    
    $errores = validarDatosPedido($nuevoPedido);
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_pedido.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
            Header('Location: accion_alta_pedido.php');
    
    
    /////////Validacion del formulario
    function validarDatosPedido($nuevoPedido){
            $errores = array();
         
        //Validacion ID, no puede estar vacío
        if($nuevoPedido["id"]=="" || $nuevoPedido["nif"]==null)
            $errores[] = "<p>El campo ID no puede estar vacío</p>";
        //el ID debe contener 9 numeros
        else if(!preg_match("/^[0-9]{9}$/", $nuevoPedido["id"])){
            $errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula</p>";
        }

        //El campo fecha no puede estar vacio
        if($nuevoUsuario["fecha"]=="" || $nuevoPedido["fecha"] == null){
            $errores[] = "<p>El campo fecha no puede estar vacío</p>";
        }

        return $errores;
    }
?>