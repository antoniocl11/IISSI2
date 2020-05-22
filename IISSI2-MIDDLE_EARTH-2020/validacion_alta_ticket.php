<?php
    session_start();

    //Importo los archivos necesarios para la gestion del nuevo ticket
    require_once("gestionBD.php");

    //Si la variable formulario está definida
    if(isset($_SESSION["formulario"])){
        //Recojo los datos del formulario
        $nuevoTicket["fecha"] = $_REQUEST["fecha"];
        $nuevoTicket["comentario"] = $_REQUEST["comentario"];
        $nuevoTicket["nombre"] = $_REQUEST["nombre"];
        $nuevoTicket["email"] = $_REQUEST["email"];

        $_SESSION["formulario"] = $nuevoTicket;
    }

    else{
        header("Location: form_alta_ticket.php");
    }
    //Validamos el formulario en el servidor
    $conexion = crearConexionBD();
    $errores = validarDatosTicket($conexion, $nuevoTicket);
    cerrarConexionBD($conexion);

    
    //Si se han detectado errores
    if (count($errores)>0) {
        // Guardo en la sesión los mensajes de error y volvemos al formulario
        $_SESSION["errores"] = $errores;
        Header('Location: form_alta_ticket.php');
    } else{
        // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
        
        Header('Location: accion_alta_ticket.php');
    }


    function validarDatosTicket($conexion, $nuevoTicket){
        $errores = array();
        
        //Validacion fecha, no puede estar vacío
        if($nuevoTicket["fecha"]=="" || $nuevoTicket["fecha"]==null)
        $errores[] = "<p>El campo fecha no puede estar vacío</p>";
                
        
        //El campo comentario no puede estar vacío
        if($nuevoTicket["comentario"]=="" || $nuevoTicket["comentario"]==null){
            $errores[] = "<p>El campo comentario no puede estar vacío</p>";
        }
        

        //El campo nombre no puede estar vacío
        if($nuevoTicket["nombre"]=="" || $nuevoTicket["nombre"]==null)
            $errores[] = "<p>El campo nombre no puede estar vacío</p>";
        else if(!preg_match("/^[a-zA-ZÑñÁÉÍÓÚáéíóú0-9,.\s]*$/", $nuevoTicket["nombre"])){
            $errores[] = "El campo nombre no posee el formato correcto.";
        }
        
        //El campo email no puede estar vacío
        if($nuevoTicket["email"]=="" || $nuevoTicket["email"] == null){
            $errores[] = "<p>El campo email no puede estar vacío</p>";
        }
        

        return $errores;
    }
    
    ?>