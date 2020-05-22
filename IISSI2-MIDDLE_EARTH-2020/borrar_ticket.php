<?php	
	session_start();	
	
	if (isset($_SESSION["ticket"])) {
		$ticket = $_SESSION["ticket"];
		unset($_SESSION["ticket"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_tickets.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_ticket($conexion,$ticket["OID_TICKET"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "tickets.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: tickets.php");
	}
	else Header("Location: tickets.php"); // Se ha tratado de acceder directamente a este PHP
?>