<?php
	session_start();

    require_once("gestionBD.php");
    
		if($_SESSION["accion"]){
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		$nuevoLogin = $_SESSION["formulario"];
		unset($_SESSION["accion"]);
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
		$_SESSION["login"] = $nuevoLogin; 
		
		header("Location: admin.php");
	}
	else {
		Header("Location: login_admin.php");	
	}
	
	}else{
	header("Location: login_admin.php");
}
?>