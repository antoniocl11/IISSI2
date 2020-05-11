<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo empleado
    require_once("gestionBD.php");  //Gestiona las conexiones de la base de datos
    require_once("gestionar_empleados.php");

    if(isset($_SESSION["empleado"])){
        $empleado = $_SESSION["empleado"];
        unset($_SESSION["empleado"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_empleado($conexion,$empleado["OID_E"],$empleado["NIF"],$empleado["NOMBRE"],$empleado["APELLIDOS"],$empleado["TURNO"],$empleado["SUELDO"],$empleado["ID"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "empleados.php";
            Header("Location: excepcion.php");
        }
        else{
            Header("Location: empleados.php");
        }
    }
    else{
        Header("Location: empleados.php");
    }
    
    ?>