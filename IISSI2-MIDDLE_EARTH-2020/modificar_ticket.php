<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo ticket
    require_once("gestionBD.php");  //Gestiona las conexiones de la base de datos
    require_once("gestionar_tickets.php");

    if(isset($_SESSION["ticket"])){
        $ticket = $_SESSION["ticket"];
        unset($_SESSION["ticket"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_ticket($conexion,$ticket["OID_TICKET"],$ticket["FECHA"],$ticket["COMENTARIO"],$ticket["OID_U"],$ticket["OID_E"],$ticket["RESUELTO"],$ticket["NOMBRE"],$ticket["EMAIL"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "tickets.php";
            Header("Location: excepcion.php");
        }
        else{
            Header("Location: tickets.php");
        }
    }
    else{
        Header("Location: tickets.php");
    }
    
    ?>