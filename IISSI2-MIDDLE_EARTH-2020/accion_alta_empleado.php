<?php
	session_start();
	
	//Importo archivos necesarios para la gestion del empleado
    require_once("gestionBD.php");
	require_once("gestionar_empleados.php");
	
    //Aqui comprobamos que hemos llegado a esta página porque se ha rellenado el formulario.
    if(isset($_SESSION["formulario"])){
        $nuevoEmpleado = $_SESSION["formulario"];
        $_SESSION["formulario"] = null;
        $_SESSION["errores"] = null;
    }
    //sino volvemos al formulario
    else{
        Header("Location: form_alta_empleado.php");
	}
	
	$conexion=crearConexionBD();

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Middle-Earth: Empleado agregado con éxito</title>
</head>

<body>

<main>
      <?php
        if(añadir_empleado($conexion, $nuevoEmpleado)==""){
      ?>
            <div id="div_exito">
              <h1>Empleado <?php echo $nuevoEmpleado["nombre"]; ?>, añadido con éxito</h1>
              <div id="div_volver">	
                Pulsa <a href="empleados.php">aquí</a> para ir a la lista de Empleados.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>El Empleado ya existe en la base de datos.</h2>
                  
              <div>
                Pulsa <a href="form_alta_Empleado.php"> aquí</a> para volver al formulario o pulsa <a href="empleados.php">aquí</a> para ir a la lista de Empleados
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>

<?php
  cerrarConexionBD($conexion);
?>

