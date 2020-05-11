<?php
session_start();

if (isset($_REQUEST["OID_U"])) {
        $usuario["OID_U"] = $_REQUEST["OID_U"];
        $usuario["NIF"] = $_REQUEST["NIF"];
        $usuario["NOMBRE"] = $_REQUEST["NOMBRE"];
		$usuario["APELLIDOS"] = $_REQUEST["APELLIDOS"];
        $usuario["EMAIL"] = $_REQUEST["EMAIL"]; 
        $usuario["TELEFONO"] = $_REQUEST["TELEFONO"];
        $usuario["ESSOCIO"] = $_REQUEST["ESSOCIO"];
        $usuario["DIRECCION"] = $_REQUEST["DIRECCION"];
        $usuario["FECHANACIMIENTO"] = $_REQUEST["FECHANACIMIENTO"];
		
		$_SESSION["usuario"] = $usuario;

		if (isset($_REQUEST["editar"])) {
			Header("Location: clientes.php");
        }
        
        else if(isset($_REQUEST["atras"])) {
			Header("Location: clientes.php");
        }
        else if(isset($_REQUEST["grabar"])) {
			Header("Location: modificar_usuario.php");
        }
        else if(isset($_REQUEST["borrar"])) {
			Header("Location: borrar_usuario.php");
        }
        
    }	

    else{
        Header("Location: clientes.php");
    }
		?>