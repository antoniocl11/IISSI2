<?php
	session_start();

	//importar
	require_once("gestionBD.php");
	require_once("gestionar_admin.php");
	//comprobamos que hemos llegado porque venimos del login
	
	if(isset($_SESSION["formulario"])){
		$conexion = crearConexionBD();
		$nuevoLogin["email"]=$_REQUEST["email"];
		$nuevoLogin["contrasena"]=$_REQUEST["contrasena"];		
		
		//Guardar la variable local con los datos del formulario en la sesión
		$_SESSION["formulario"] = $nuevoLogin;
	}else{
		Header("Location: login_admin.php");
	}

	//Validamos el formulario en el servidor
	$errores = validaDatosLogin($conexion, $nuevoLogin);
	
	//Si se han detectado errores
	if(count($errores)>0){
		//Guardo en la sesion los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header("Location: login_admin.php");
	}else{
		//Sí todo va bien vamos a la pagina de inicio
		$_SESSION["accion"] = TRUE;
		Header("Location: accion_login.php");
	}
	
	//Validacion en servidor del formulario de login
	function validaDatosLogin($conexion, $nuevoLogin){
		$errores=array();
		
		if(concideDatos($conexion, $nuevoLogin)==FALSE){
			$errores[] = "Email y/o contraseña incorrectos.";
		
		}
		return $errores;
		}
	
	
	function concideDatos($conexion, $nuevoLogin){
				
			$admins = consultarAdmin($conexion);
		foreach ($admins as $admin) {
			if($admin["EMAIL"]==$nuevoLogin["email"] && $admin["CONTRASENA"]==$nuevoLogin["contrasena"]){
				return true;
			}
			else{
				return false;
			}
		}
			
		
	}
	

	cerrarConexionBD($conexion);
	
?>