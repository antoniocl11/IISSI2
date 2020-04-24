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
        Header("Location: form_alta_empleado.php");
    }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Middle-Earth: Empleado agregado con éxito</title>
</head>

<body>


	<main>
			
		<div id="div_exito">
		  <h1>Hola <?php echo $nuevoEmpleado["nombre"]; ?>, gracias por registrarte</h1>
			<div id="div_volver">	
			   Pulsa <a href="empleados.php">aquí</a> para ir a la lista de empleados.
			</div>
		</div>

		<h2>El nuevo empleado ha sido agregado con los siguientes datos.</h2>
		<ul>
			<li><?php echo "ID: " . $nuevoEmpleado["id"]; ?></li>
			<li><?php echo "NIF: " . $nuevoEmpleado["nif"]; ?></li>
			<li><?php echo "Nombre: " . $nuevoEmpleado["nombre"]; ?></li>
			<li><?php echo "Apellidos: " . $nuevoEmpleado["apellidos"]; ?></li>
			<li><?php echo "Turno: " . $nuevoEmpleado["turno"]; ?></li>
			<li><?php echo "Sueldo: " . $nuevoEmpleado["sueldo"]; ?></li>

			
		</ul>		
	</main>

</body>
</html>

