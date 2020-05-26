<?php
    session_start();


    require_once("gestionBD.php");

    if(isset($_SESSION["formulario"])){

        $nuevaReserva["fecha"] = $_REQUEST["fecha"];
        $nuevaReserva["producto"] = $_REQUEST["producto"];
        $nuevaReserva["email"] = $_REQUEST["email"];
        $nuevaReserva["nombre"] = $_REQUEST["nombre"];

        $_SESSION["formulario"] = $nuevaReserva;
    }



    else{
        header("Location: form_alta_reserva.php");
    }
   
    $conexion = crearConexionBD();
    $errores = validarDatosReserva($conexion, $nuevaReserva);
    cerrarConexionBD($conexion);

    if (count($errores)>0) {

        $_SESSION["errores"] = $errores;
        Header('Location: form_alta_reserva.php');
    }
    else{

        Header('Location: accion_alta_reserva.php');

    }

    function validarDatosReserva($conexion, $nuevaReserva){
        $errores = array();
        //La fecha no puede estar vacía
        if($nuevaReserva["fecha"]=="" || $nuevaReserva["fecha"]==null)
        $errores[] = "<p>El campo fecha no puede estar vacío</p>";
        //El producto no puede estar vacío
        if($nuevaReserva["producto"]=="" || $nuevaReserva["producto"]==null){
            $errores[] = "<p>El campo producto no puede estar vacío</p>";
        }
         //El campo email no puede estar vacío
         if($nuevaReserva["email"]=="" || $nuevaReserva["email"] == null){
            $errores[] = "<p>El campo email no puede estar vacío</p>";
            
            }
        }
        //El campo nombre no puede estar vacío
        if($nuevaReserva["nombre"]=="" || $nuevaReserva["nombre"]==null){
            $errores[] = "<p>El campo nombre no puede estar vacío ni ser nulo</p>";
        }
        else if(!preg_match("/^[a-zA-ZÑÁÉÍÓÚáéíóú0-9,.\s]*$/", $nuevaReserva["nombre"])){
            $errores[] = "El campo nombre no posee el formato correcto.";
        }
        return $errores;
    }
    
    ?>





    
