<?php	
	session_start();	
	
	if (isset($_SESSION["empleado"])) {
		$empleado = $_SESSION["empleado"];
		unset($_SESSION["empleado"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_empleados.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_empleado($conexion,$empleado["OID_E"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "empleados.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: empleados.php");
	}
	else Header("Location: empleados.php"); // Se ha tratado de acceder directamente a este PHP
?>