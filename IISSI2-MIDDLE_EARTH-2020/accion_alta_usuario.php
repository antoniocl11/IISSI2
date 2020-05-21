<?php
    session_start();
	
	//Importo archivos necesarios para la gestion del usuario
	require_once("gestionBD.php");
	require_once("gestionar_usuario.php");

	//Aqui comprobamos que hemos llegado a esta página porque se ha rellenado el formulario.
    if(isset($_SESSION["formulario"])){
        $nuevoUsuario = $_SESSION["formulario"];
        $_SESSION["formulario"] = null;
        $_SESSION["errores"] = null;
    }
    //sino volvemos al formulario
    else{
        Header("Location: form_alta_usuario.php");
	}
	
	$conexion = crearConexionBD();

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo Usuario</title>
  <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
</head>

<body>


	<main>

	<?php
		if(añadir_usuario($conexion, $nuevoUsuario)){
	?>
			
		<div id="div_exito">
		  <h1>Hola <?php echo $nuevoUsuario["nombre"]; ?>, gracias por registrarte</h1>
			<div id="div_volver">	
			   Pulsa <a href="form_alta_usuario.php">aquí</a> para volver al formulario o pulsa <a href="login.html">aquí</a> para entrar en la página
			</div>
			
		</div>
<?php print_r($nuevoUsuario); ?>
		<?php }

		else { ?>

			<h2>El usuario ya ha sido registrado</h2>
			

			<div>
                Pulsa <a href="form_alta_usuario.php"> aquí</a> para volver al formulario o pulsa <a href="login.html">aquí</a> para entrar en la página
              </div>
			
		<?php } ?>
	</main>

</body>
</html>
<?php 
	cerrarConexionBD($conexion);
?>

