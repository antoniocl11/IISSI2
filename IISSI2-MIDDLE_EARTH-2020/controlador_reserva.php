<?php
session_start();

if (isset($_REQUEST["OID_RES"])) {
		$reserva["OID_RES"] = $_REQUEST["OID_RES"];
        $reserva["FECHA"] = $_REQUEST["FECHA"];
        $reserva["PRODUCTO"] = $_REQUEST["PRODUCTO"];
		$reserva["EMAIL"] = $_REQUEST["EMAIL"];
        $reserva["NOMBRE"] = $_REQUEST["NOMBRE"];
		
		$_SESSION["reserva"] = $reserva;

		if (isset($_REQUEST["editar"])) {
			Header("Location: reservas.php");
        }
        else if(isset($_REQUEST["atras"])){
			Header("Location: reservas.php");
		}
		else if(isset($_REQUEST["grabar"])){
			Header("Location: modificar_reserva.php");
        }
        else if(isset($_REQUEST["borrar"])){
			Header("Location: borrar_reserva.php");
		}
}	

else{
	Header("Location: reservas.php");
}
?>