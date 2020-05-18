<?php	
	session_start();	
	
	if (isset($_SESSION["pedido"])) {
		$pedido = $_SESSION["pedido"];
		unset($_SESSION["pedido"]);
		
		require_once("gestionBD.php");
		require_once("gestionar_pedidos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminar_pedido($conexion,$pedido["OID_PEDIDO"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "pedidos.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: pedidos.php");
	}
	else Header("Location: pedidos.php"); 
?>