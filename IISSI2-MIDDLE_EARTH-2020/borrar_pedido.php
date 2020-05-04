<?php	
	session_start();	
	
	if (isset($_SESSION["pedidos"])) {
		$proveedor = $_SESSION["pedidos"];
		unset($_SESSION["pedidos"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_pedidos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_pedido($conexion,$libro["CIF"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "pedidos.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: pedidos.php");
	}
	else Header("Location: pedidos.php"); // Se ha tratado de acceder directamente a este PHP
?>