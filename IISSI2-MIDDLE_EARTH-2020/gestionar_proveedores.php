<?php  


    /*Consultar proveedores*/
    function consultarTodosProveedores($conexion){
        $consulta = "SELECT * FROM PROVEEDOR";
        return $conexion->query($consulta);
       
    }

    /*Añadir proveedores*/

    function añadir_proveedor($conexion, $nuevoProveedor){
        try{
            $consulta = 'CALL NUEVO_PROVEEDOR(:CIF,:NOMBRE,:TELEFONO,:DIRECCION)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':CIF', $nuevoProveedor["cif"]);
            $stmt -> bindParam(':NOMBRE', $nuevoProveedor["nombre"]);
            $stmt -> bindParam(':TELEFONO', $nuevoProveedor["telefono"]);
            $stmt -> bindParam(':DIRECCION', $nuevoProveedor["direccion"]);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
            Header("Location: excepcion.php");
        }
    }

    /*Modificar proveedores*/
    function modificar_proveedor($conexion, $OID_PV, $CIF, $NOMBRE, $TELEFONO, $DIRECCION){
        try{
            $stmt = $conexion -> prepare('CALL pk_proveedor.actualizar_proveedor(:OID_PV,:CIF,:NOMBRE,:TELEFONO,:DIRECCION)');
            $stmt -> bindParam(':OID_PV', $OID_PV);
            $stmt -> bindParam(':CIF', $CIF);
            $stmt -> bindParam(':NOMBRE', $NOMBRE);
            $stmt -> bindParam(':TELEFONO', $TELEFONO);
            $stmt -> bindParam(':DIRECCION', $DIRECCION);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar proveedor*/

    function eliminar_proveedor($conexion,$OID_PV){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_PROVEEDOR(:OID_PV)');

            $stmt-> bindParam(':OID_PV', $OID_PV);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

