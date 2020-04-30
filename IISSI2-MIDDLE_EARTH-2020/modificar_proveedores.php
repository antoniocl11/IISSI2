<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo proveedor
    require_once("gestionBD.php");  //Gestiona las conexiones de la base de datos
    require_once("gestionar_proveedores.php");

    if(isset($_SESSION["proveedor"])){
        $proveedor = $_SESSION["proveedor"];
        unset($_SESSION["proveedor"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_proveedor($conexion,$proveedor["OID_PV"],$proveedor["CIF"],$proveedor["NOMBRE"],$proveedor["TELEFONO"],$proveedor["DIRECCION"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "proveedores.php";
            Header("Location: excepcion.php");
        }
        else{
            Header("Location: proveedores.php");
        }
    }
    else{
        Header("Location: proveedores.php");
    }
    
    ?>