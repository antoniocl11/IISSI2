<?php	
	session_start();	
	
	if (isset($_SESSION["proveedor"])) {
		$proveedor = $_SESSION["proveedor"];
		unset($_SESSION["proveedor"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_proveedores.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_proveedor($conexion,$libro["CIF"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "proveedores.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: proveedores.php");
	}
	else Header("Location: proveedores.php"); // Se ha tratado de acceder directamente a este PHP
?>