<?php
    /*Consultar empleados*/
    function consultarEmpleados($conexion){
        $consulta = "SELECT * FROM EMPLEADO";
        return $conexion -> query($consulta);
    }

    /*Añadir empleados*/
    
    function añadir_empleado($conexion, $nuevoEmpleado){
        try{
            $consulta = 'CALL PK_EMPLEADO.NUEVO_EMPLEADO(:NIF,:NOMBRE,:APELLIDOS,:TURNO,:SUELDO,:ID)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':NIF', $nuevoEmpleado["nif"]);
            $stmt -> bindParam(':NOMBRE', $nuevoEmpleado["nombre"]);
            $stmt -> bindParam(':APELLIDOS', $nuevoEmpleado["apellidos"]);
            $stmt -> bindParam(':TURNO', $nuevoEmpleado["turno"]);
            $stmt -> bindParam(':SUELDO', $nuevoEmpleado["sueldo"]);
            $stmt -> bindParam(':ID', $nuevoEmpleado["id"]);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
            Header("Location: excepcion.php");
        }
    }

    /*Modificar empleados*/
    function modificar_empleado($conexion,$OID_E,$NIF,$NOMBRE,$APELLIDOS,$TURNO,$SUELDO,$ID){
        try{
            $stmt = $conexion -> prepare('CALL pk_empleado.actualizar_empleado(:OID_E,:NIF,:NOMBRE,:APELLIDOS,:TURNO,:SUELDO,:ID)');
            $stmt -> bindParam(':OID_E', $OID_E);
            $stmt -> bindParam(':NIF', $NIF);
            $stmt -> bindParam(':NOMBRE', $NOMBRE);
            $stmt -> bindParam(':APELLIDOS', $APELLIDOS);
            $stmt -> bindParam(':TURNO', $TURNO);
            $stmt -> bindParam(':SUELDO', $SUELDO);
            $stmt -> bindParam(':ID', $ID);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    /*Eliminar empleado*/

    function eliminar_empleado($conexion,$OID_E){
        try{
            $stmt = $conexion -> prepare('CALL ELIMINAR_empleado(:OID_E)');

            $stmt-> bindParam(':OID_E', $OID_E);
            $stmt -> execute();
            return "";
        }

        catch(PDOException $e){
            return $e -> getMessage();
        }
    }
?>