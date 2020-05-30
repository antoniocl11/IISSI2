<?php
    session_start();

    
    require_once("gestionBD.php");  
    require_once("gestionar_reserva.php");

    if(isset($_SESSION["reserva"])){
        $reserva = $_SESSION["reserva"];
        unset($_SESSION["reserva"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_reserva($conexion,$reserva["OID_RES"],$reserva["FECHA"],$reserva["PRODUCTO"],$reserva["EMAIL"],$reserva["NOMBRE"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "reservas.php";
            Header("Location: excepcion.php");
        }
        else{
            Header("Location: reservas.php");
        }
    }
    else{
        Header("Location: reservas.php");
    }
    
    ?>
