<?php
    /*Consultar tickets de contacto*/
    function consultarTodosTickets($conexion){
        $consulta = "SELECT * FROM TICKET";
        return $conexion->query($consulta); 
    }

    function añadir_ticket($conexion, $nuevoTicket){
        $fecha = date('d/m/Y', strtotime($nuevoTicket["fecha"]));
        try{
            $consulta = 'CALL NUEVO_TICKET(:FECHA,:COMENTARIO,:OID_U,:OID_E,:RESUELTO,:NOMBRE,:EMAIL)';

            $stmt = $conexion -> prepare($consulta);

            $stmt -> bindParam(':FECHA', $fecha);
            $stmt -> bindParam(':COMENTARIO', $nuevoTicket["comentario"]);
            $stmt -> bindParam(':OID_U', $nuevoTicket["oid_u"]);
            $stmt -> bindParam(':OID_E', $nuevoTicket["oid_e"]);
            $stmt -> bindParam(':RESUELTO', $nuevoTicket["resuelto"]);
            $stmt -> bindParam(':NOMBRE', $nuevoTicket["nombre"]);
            $stmt -> bindParam(':EMAIL', $nuevoTicket["email"]);
            
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            $_SESSION['excepcion'] = $e -> GetMessage();
            Header("Location: excepcion.php");
        }
    }

    /*Modificar ticket*/
    function modificar_ticket($conexion,$OID_TICKET,$FECHA,$COMENTARIO,$OID_U,$OID_E,$RESUELTO,$NOMBRE,$EMAIL){
        try{
            $stmt = $conexion -> prepare('CALL ACTUALIZAR_TICKET(:OID_TICKET,:FECHA,:COMENTARIO,:OID_U,:OID_E,:RESUELTO,:NOMBRE,:EMAIL)');
            
            $stmt -> bindParam(':OID_TICKET', $OID_TICKET);
            $stmt -> bindParam(':FECHA', $FECHA);
            $stmt -> bindParam(':COMENTARIO', $COMENTARIO);
            $stmt -> bindParam(':OID_U', $OID_U);
            $stmt -> bindParam(':OID_E', $OID_E);
            $stmt -> bindParam(':RESUELTO', $RESUELTO);
            $stmt -> bindParam(':NOMBRE', $NOMBRE);
            $stmt -> bindParam(':EMAIL', $EMAIL);   
            
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar ticket*/

    function eliminar_ticket($conexion,$OID_TICKET){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_TICKET(:OID_TICKET)');

            $stmt-> bindParam(':OID_TICKET', $OID_TICKET);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }
?>