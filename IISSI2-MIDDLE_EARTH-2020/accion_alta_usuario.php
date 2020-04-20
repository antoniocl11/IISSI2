<?php
    session_start();
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
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Middle-Earth: Registro realizado con éxito</title>
</head>

<body>


	<main>
			
		<div id="div_exito">
		  <h1>Hola <?php echo $nuevoUsuario["nombre"]; ?>, gracias por registrarte</h1>
			<div id="div_volver">	
			   Pulsa <a href="form_alta_usuario.php">aquí</a> para volver al formulario de altas de usuarios.
			</div>
		</div>

		<h2>El nuevo usuario ha sido dado de alta con éxito con los siguientes datos:</h2>
		<ul>
			<li><?php echo "NIF: " . $nuevoUsuario["nif"]; ?></li>
			<li><?php echo "Nombre: " . $nuevoUsuario["nombre"]; ?></li>
			<li><?php echo "Apellidos: " . $nuevoUsuario["apellidos"]; ?></li>
			<li><?php echo "Teléfono: " . $nuevoUsuario["telefono"]; ?></li>
			<li><?php echo "¿Es Socio?: " . $nuevoUsuario["esSocio"]; ?></li>
			<li><?php echo "Edad: " . $nuevoUsuario["edad"]; ?></li>
			<!--<li></?php echo "fechaNacimiento: " . $nuevoUsuario["fechaNacimiento"]; ?></li>-->
			<li><?php echo "email: " . $nuevoUsuario["email"]; ?></li>
			

				<ul>

				</ul>
			</li>
		</ul>		
	</main>

</body>
</html>

