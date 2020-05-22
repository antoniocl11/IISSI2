<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo pedido
    require_once("gestionBD.php");  //Gestiona las conexiones de la base de datos
    require_once("gestionar_pedidos.php");

    if(isset($_SESSION["pedido"])){
        $pedido = $_SESSION["pedido"];
        unset($_SESSION["pedido"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_pedidos($conexion,$pedido["OID_PEDIDO"],$pedido["FECHA"],$pedido["ID"],$pedido["OID_U"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "pedidos.php";
            Header("Location: excepcion.php");
        }
        else{
            Header("Location: pedidos.php");
        }
    }
    else{
        Header("Location: pedidos.php");
    }
    
    ?>