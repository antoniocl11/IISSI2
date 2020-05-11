<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo usuario
    require_once("gestionBD.php");  //Gestiona las conexiones de la base de datos
    require_once("gestionar_usuario.php");

    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
        unset($_SESSION["usuario"]);

        $conexion = crearConexionBD();
        $excepcion = modificar_usuario($conexion,$usuario["OID_U"],$usuario["NIF"],$usuario["NOMBRE"],$usuario["APELLIDOS"],$usuario["EMAIL"],$usuario["TELEFONO"],$usuario["ESSOCIO"],$usuario["DIRECCION"],$usuario["FECHANACIMIENTO"],$usuario["CONTRASENA"]);
        cerrarConexionBD($conexion);

        if($excepcion<>""){
            $_SESSION["excepcion"] = $excepcion;
            $_SESSION["destino"] = "clientes.php";
            print_r($usuario);
            
            print_r($_SESSION);
            //Header("Location: excepcion.php");
        }
        else{
            Header("Location: clientes.php");
        }
    }
    else{
        Header("Location: clientes.php");
    }
    
    ?>