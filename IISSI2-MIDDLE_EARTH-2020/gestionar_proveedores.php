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
        }
    }

