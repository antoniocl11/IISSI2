<?php




    function consultarTodasReservas($conexion){
        $consulta = "SELECT * FROM RESERVA";
        return $conexion->query($consulta);

    }


    function añadir_reserva($conexion, $nuevaReserva) {
        try{
            $consulta = 'CALL NUEVA_RESERVA(:FECHA,:PRODUCTO,:EMAIL,:NOMBRE)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':FECHA', $nuevaReserva["fecha"]);
            $stmt -> bindParam(':PRODUCTO', $nuevaReserva["producto"]);
            $stmt -> bindParam(':EMAIL', $nuevaReserva["email"]);
            $stmt -> bindParam(':NOMBRE', $nuevaReserva["nombre"]);
            $stmt -> execute();
            return "";

        }


        catch(PDOException $e){
            $_SESSION['excepcion'] = $e -> GetMessage();
            Header("Location: excepcion.php");
        }
        
    }

    function modificar_reserva($conexion, $OID_RES, $FECHA, $PRODUCTO, $EMAIL, $NOMBRE){
        try{
            $stmt = $conexion -> prepare('CALL pk_reserva.actualizar_reserva(:OID_RES,:FECHA,:PRODUCTO,:EMAIL,:NOMBRE)');
            $stmt -> bindParam(':OID_RES', $OID_RES);
            $stmt -> bindParam(':FECHA', $FECHA);
            $stmt -> bindParam(':PRODUCTO', $PRODUCTO);
            $stmt -> bindParam(':EMAIL', $EMAIL);
            $stmt -> bindParam(':NOMBRE', $NOMBRE);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    function eliminar_reserva($conexion,$OID_RES){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_(:OID_RES)');

            $stmt-> bindParam(':OID_RES', $OID_RES);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }





    
    
