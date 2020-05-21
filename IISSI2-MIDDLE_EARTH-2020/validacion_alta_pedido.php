<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo pedido
    require_once("gestionBD.php");

    if (isset($_SESSION["formulario"])) {
        // Recogemos los datos del formulario
        $nuevoPedido["fecha"] = $_REQUEST["fecha"];
		$nuevoPedido["id"] = $_REQUEST["id"];
        $nuevoPedido["oid_u"] = $_REQUEST["oid_u"];

        $_SESSION["formulario"] = $nuevoPedido;
    }

    else{
        Header("Location: form_alta_pedido.php");
    }

    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosPedido($conexion, $nuevoPedido);
    cerrarConexionBD($conexion);

    
    //Si se han detectado errores
        if (count($errores)>0) {
            // Guardo en la sesión los mensajes de error y volvemos al formulario
            $_SESSION["errores"] = $errores;
            Header('Location: form_alta_pedido.php');
        } else
            // Si todo va bien, vamos a la página de acción (inserción del Pedido en la base de datos)
            Header('Location: accion_alta_pedido.php');
    
    
    /////////Validacion del formulario
    function validarDatosPedido($conexion,$nuevoPedido){
            $errores = array();

         //El campo fecha no puede estar vacio
         if($nuevoPedido["fecha"]=="" || $nuevoPedido["fecha"] == null){
            $errores[] = "<p>El campo fecha no puede estar vacío</p>";
        }
         
        //Validacion ID, no puede estar vacío
        if($nuevoPedido["id"]=="" || $nuevoPedido["id"]==null)
            $errores[] = "<p>El campo ID no puede estar vacío</p>";
        //el ID debe contener 9 numeros
        else if(!preg_match("/^[0-9]{9}$/", $nuevoPedido["id"])){
            $errores[] = "<p>El ID debe contener 9 dígitos</p>";
        }


        return $errores;
    }
?>