<?php
session_start();

if (isset($_REQUEST["OID_PV"])) {
		$pedido["OID_PEDIDO"] = $_REQUEST["OID_PEDIDO"];
        $pedido["ID"] = $_REQUEST["ID"];
        $pedido["FECHA"] = $_REQUEST["FECHA"];
		
		$_SESSION["pedido"] = $pedido;

		if (isset($_REQUEST["editar"])) {
			Header("Location: pedidos.php");
        }
        
		else if(isset($_REQUEST["grabar"])){
			Header("Location: modificar_pedido.php");
        }
        else if(isset($_REQUEST["borrar"])){
			Header("Location: borrar_pedido.php");
		}
}	

else{
	Header("Location: pedidos.php");
}
?>