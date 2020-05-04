<?php
session_start();

if (isset($_REQUEST["OID_PV"])) {
		$proveedor["OID_PV"] = $_REQUEST["OID_PV"];
        $proveedor["CIF"] = $_REQUEST["CIF"];
        $proveedor["NOMBRE"] = $_REQUEST["NOMBRE"];
		$proveedor["TELEFONO"] = $_REQUEST["TELEFONO"];
        $proveedor["DIRECCION"] = $_REQUEST["DIRECCION"];
		
		$_SESSION["proveedor"] = $proveedor;

		if (isset($_REQUEST["editar"])) {
			Header("Location: proveedores.php");
        }
        else if(isset($_REQUEST["atras"])){
			Header("Location: proveedores.php");
		}
		else if(isset($_REQUEST["grabar"])){
			Header("Location: modificar_proveedores.php");
        }
        else if(isset($_REQUEST["borrar"])){
			Header("Location: borrar_proveedor.php");
		}
}	

else{
	Header("Location: proveedores.php");
}
?>