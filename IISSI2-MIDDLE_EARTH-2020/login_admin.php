<?php
session_start();

//Se importan las librerias que son necesarias:
require_once("gestionBD.php");

//Si no existen datos del formulario en la sesion, se crea una entrada con unos valores por defecto

	if(!isset($_SESSION["formulario"])){
		$formulario["email"] = "";
		$formulario["contrasena"] = "";	
		
		$_SESSION["formulario"] = $formulario;
	}else{
		//Si ya existian valores los cogemos por defecto
		$formulario=$_SESSION["formulario"];
	}
	
	//Sí hay errores de validación hay que mostrarlos y marcar los campos
	if(isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
	
	//Creamos conexion con la base de datos
	$conexion = crearConexionBD();

?>
<!DOCTYPE html>
<html>
	<head>
        
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<title>Inicio Admin</title>
	</head>
	<body>
		<h1>Bienvenido a la Gestión de Middle Earth Sevilla</h1>
			 <h2>Por favor identifíquese para poder continuar:</h2>

        <section class="formulario" >
		<?php
         //Muestra los errores de validación si ha encontrado alguno
         if(isset($errores) && is_array($errores)){
            //isset me determina si la variable está definida y
            //is_array, me comprueba que $errores sea un array en el que 
            //posteriormente almacenaré la lista de errores (evitar el warning)
            if(count($errores) > 0){
                echo "<div id=\"div_errores\" class=\"error\">";
                echo "<h4> Errores en el formulario:</h4>";
                
                
                foreach($errores as $error){
                    echo $error;
                }

                echo "</div>";
            }
        }
    ?>
		<form id="login" method="get" action="validacion_login.php">
			<fieldset>
				<legend>Inicio de sesión</legend>
				<div>
					<label for="email">Email: </label>
					<input class="campos" id="email" name="email" type="text" required />
					<br />
				</div>
				<div>
					<label for="contrasena">Contraseña: </label>
					<input class="campos" id="contrasena" name="contrasena" type="password" required />
					<br />
				</div>
			
			</fieldset>
			<div class="botones"><input type="submit" value="Confirmar" /></div>	
        </form>
    </section>
		<?php
		cerrarConexionBD($conexion);
		?>
	</body>
</html>