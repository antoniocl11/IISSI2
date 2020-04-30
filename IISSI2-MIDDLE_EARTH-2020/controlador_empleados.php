<?php
session_start();

if (isset($_REQUEST["OID_E"])) {
		$empleado["OID_E"] = $_REQUEST["OID_E"];
        $empleado["ID"] = $_REQUEST["ID"];
        $empleado["NIF"] = $_REQUEST["NIF"];
		$empleado["NOMBRE"] = $_REQUEST["NOMBRE"];
        $empleado["APELLIDOS"] = $_REQUEST["APELLIDOS"];
        $empleado["TURNO"] = $_REQUEST["TURNO"];
        $empleado["SUELDO"] = $_REQUEST["SUELDO"];
		
		$_SESSION["empleado"] = $empleado;

		if (isset($_REQUEST["editar"])) {
			Header("Location: empleados.php");
        }
        
		else if(isset($_REQUEST["grabar"])){
			Header("Location: modificar_empleados.php");
        }
        else if(isset($_REQUEST["borrar"])){
			Header("Location: borrar_empleado.php");
		}
}	

else{
	Header("Location: empleados.php");
}
?>