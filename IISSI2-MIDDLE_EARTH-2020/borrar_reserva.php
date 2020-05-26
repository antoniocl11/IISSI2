<?php	
	session_start();	
	
	if (isset($_SESSION["reserva"])) {
		$pedido = $_SESSION["reserva"];
		unset($_SESSION["reserva"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_reserva.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_pedido($conexion,$pedido["OID_RES"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "reservas.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: reservas.php");
	}
	else Header("Location: reservas.php"); 
?>