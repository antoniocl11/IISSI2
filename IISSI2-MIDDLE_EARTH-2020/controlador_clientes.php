<?php
session_start();

if (isset($_REQUEST["OID_U"])) {
        $CIF["OID_U"] = $_REQUEST["OID_U"];
        $CIF["NIF"] = $_REQUEST["NIF"];
        $CIF["NOMBRE"] = $_REQUEST["NOMBRE"];
		$CIF["APELLIDOS"] = $_REQUEST["APELLIDOS"];
        $CIF["EMAIL"] = $_REQUEST["EMAIL"];
        $CIF["TELEFONO"] = $_REQUEST["TELEFONO"];
        $CIF["ESSOCIO"] = $_REQUEST["ESSOCIO"];
        $CIF["DIRECCION"] = $_REQUEST["DIRECCION"];
        $CIF["FECHANACIMIENTO"] = $_REQUEST["FECHANACIMIENTO"];
		
		$_SESSION["cliente"] = $CIF;
}	
		if (isset($_REQUEST["editar"])) {
			Header("Location: clientes.php");
        }
        /*Para después poder modificar los clientes
		if(isset($_REQUEST["grabar"])){
			Header("Location: editarCliente.php");
        }
        */else {
			Header("Location: clientes.php");
		}
		?>