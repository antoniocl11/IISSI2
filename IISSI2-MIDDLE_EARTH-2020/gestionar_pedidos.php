<?php  


    /*Consultar pedidos*/
    function consultarTodosPedidos($conexion){
        $consulta = "SELECT * FROM PEDIDO";
        return $conexion->query($consulta);
       
    }

    /*Añadir pedidos*/

    function añadir_pedido($conexion, $nuevoPedido){
        try{
            $consulta = 'CALL NUEVO_PEDIDO(:ID,:FECHA)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':ID', $nuevoPedido["id"]);
            $stmt -> bindParam(':FECHA', $nuevoPedido["fecha"]);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Modificar pedidos*/
    function modificar_pedidos($conexion, $OID_PEDIDO, $ID, $FECHA){
        try{
            $stmt = $conexion -> prepare('CALL pk_proveedor.actualizar_proveedor(:OID_PV,:CIF,:NOMBRE,:TELEFONO,:DIRECCION)');
            $stmt -> bindParam(':OID_PEDIDO', $OID_PEDIDO);
            $stmt -> bindParam(':ID', $ID);
            $stmt -> bindParam(':FECHA', $FECHA);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar proveedor*/

    function eliminar_proveedor($conexion,$OID_PEDIDO){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_PEDIDO(:OID_PEDIDO)');

            $stmt-> bindParam(':OID_PEDIDO', $OID_PEDIDO);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }