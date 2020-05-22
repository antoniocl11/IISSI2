<?php  


    /*Consultar pedidos*/
    function consultarTodosPedidos($conexion){
        $consulta = "SELECT * FROM PEDIDOS";
        return $conexion->query($consulta);
       
    }

    /*Añadir pedidos*/

    function añadir_pedido($conexion, $nuevoPedido){
        $fecha = date('d/m/Y', strtotime($nuevoPedido["fecha"]));
        
        try{
            $consulta = 'CALL NUEVO_PEDIDO(:FECHA,:ID,:OID_U)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':FECHA', $fecha);
            $stmt -> bindParam(':ID', $nuevoPedido["id"]);
            $stmt -> bindParam(':OID_U', $nuevoPedido["oid_u"]);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            $_SESSION['excepcion'] = $e -> GetMessage();
            Header("Location: excepcion.php");
        }
    }

    /*Modificar pedidos*/
    function modificar_pedidos($conexion, $OID_PEDIDO,$FECHA,$ID,$OID_U){
        try{
            $stmt = $conexion -> prepare('CALL ACTUALIZAR_PEDIDOS(:OID_PEDIDO,:FECHA,:ID,:OID_U)');
            $stmt -> bindParam(':OID_PEDIDO', $OID_PEDIDO);
            $stmt -> bindParam(':FECHA', $FECHA);
            $stmt -> bindParam(':ID', $ID);
            $stmt -> bindParam(':OID_U', $OID_U);
            
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar pedido*/

    function eliminar_pedido($conexion,$OID_PEDIDO){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_PEDIDOS(:OID_PEDIDO)');

            $stmt-> bindParam(':OID_PEDIDO', $OID_PEDIDO);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }