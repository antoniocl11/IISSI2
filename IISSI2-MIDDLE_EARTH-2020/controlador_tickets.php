<?php
session_start();

if (isset($_REQUEST["OID_TICKET"])) {
		$ticket["OID_TICKET"] = $_REQUEST["OID_TICKET"];
        $ticket["FECHA"] = $_REQUEST["FECHA"];
        $ticket["COMENTARIO"] = $_REQUEST["COMENTARIO"];
		$ticket["OID_U"] = $_REQUEST["OID_U"];
		$ticket["OID_E"] = $_REQUEST["OID_E"];
		$ticket["RESUELTO"] = $_REQUEST["RESUELTO"];
        $ticket["NOMBRE"] = $_REQUEST["NOMBRE"];
        $ticket["EMAIL"] = $_REQUEST["EMAIL"];
		
		$_SESSION["ticket"] = $ticket;

		if (isset($_REQUEST["editar"])) {
			Header("Location: tickets.php");
        }
        else if(isset($_REQUEST["atras"])){
			Header("Location: tickets.php");
		}
		else if(isset($_REQUEST["grabar"])){
			Header("Location: modificar_ticket.php");
        }
        else if(isset($_REQUEST["borrar"])){
			Header("Location: borrar_ticket.php");
		}
}	

else{
	Header("Location: tickets.php");
}
?>