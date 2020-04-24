<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo proveedor
    require_once("gestionBD.php");

    //Si la variable formulario está definida
    if(isset($_SESSION["formulario"])){
        //Recojo los datos del formulario
        $nuevoProveedor["cif"] = $_REQUEST["cif"];
        $nuevoProveedor["nombre"] = $_REQUEST["nombre"];
        $nuevoProveedor["telefono"] = $_REQUEST["telefono"];
        $nuevoProveedor["direccion"] = $_REQUEST["direccion"];

        $_SESSION["formulario"] = $nuevoProveedor;
    }

    else{
        header("Location: form_alta_proveedor.php");
    }
    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosProveedor($conexion, $nuevoProveedor);
    cerrarConexionBD($conexion);

    //Si se han detectado errores
    if (count($errores)>0) {
        // Guardo en la sesión los mensajes de error y volvemos al formulario
        $_SESSION["errores"] = $errores;
        Header('Location: form_alta_proveedor.php');
    } else
        // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
        Header('Location: accion_alta_proveedor.php');

    function validarDatosProveedor($conexion, $nuevoProveedor){
        $errores = array();

        if($nuevoProveedor["nombre"]=="" || $nuevoProveedor["nombre"]==null){
            $errores[] = "<p>El campo nombre no puede estar vacío ni ser nulo</p>";
        }
        return $errores;
    }