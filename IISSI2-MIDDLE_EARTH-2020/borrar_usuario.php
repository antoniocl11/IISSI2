<?php	
	session_start();	
	
	if (isset($_SESSION["usuario"])) {
		$usuario = $_SESSION["usuario"];
		unset($_SESSION["usuario"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_usuario.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_usuario($conexion,$usuario["OID_U"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "clientes.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: clientes.php");
	}
	else Header("Location: clientes.php"); // Se ha tratado de acceder directamente a este PHP
?>