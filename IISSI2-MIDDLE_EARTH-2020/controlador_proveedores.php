<?php
session_start();

if (isset($_REQUEST["CIF"])) {
        $CIF["CIF"] = $_REQUEST["CIF"];
        $CIF["NOMBRE"] = $_REQUEST["NOMBRE"];
		$CIF["TELEFONO"] = $_REQUEST["TELEFONO"];
        $CIF["DIRECCION"] = $_REQUEST["DIRECCION"];
		
		$_SESSION["proveedor"] = $CIF;
}	
		if (isset($_REQUEST["editar"])) {
			Header("Location: proveedores.php");
        }
        /*
		if(isset($_REQUEST["grabar"])){
			Header("Location: editarProveedor.php");
        }
        */else {
			Header("Location: proveedores.php");
		}
		?>