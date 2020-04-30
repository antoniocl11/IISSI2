<?php
    /*Consultar empleados*/
    function consultarEmpleados($conexion){
        $consulta = "SELECT * FROM EMPLEADO";
        return $conexion -> query($consulta);
    }

    /*Añadir empleados*/
    
    function añadir_empleado($conexion, $nuevoEmpleado){
        try{
            $consulta = 'CALL NUEVO_EMPLEADO(:NIF,:NOMBRE,:APELLIDOS,:TURNO,:SUELDO,:ID)';

            $stmt = $conexion -> prepare($consulta);
            $stmt -> bindParam(':CIF', $nuevoEmpleado["nif"]);
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
        }
    }
?>