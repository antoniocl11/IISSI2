<?php
    session_start();

    //Importo archivos necesarios para la gestion del proveedor
    require_once("gestionBD.php");
    require_once("gestionar_proveedores.php");

      //Aqui comprobamos que hemos llegado a esta página porque se ha rellenado el formulario.
      if(isset($_SESSION["formulario"])){
          $nuevoProveedor = $_SESSION["formulario"];
          $_SESSION["formulario"] = null;
          $_SESSION["errores"] = null;
      }
      //sino volvemos al formulario
      else{
          Header("Location: form_alta_proveedor.php");
      }

      $conexion = crearConexionBD();


    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo proveedor</title>
  <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
</head>

<body>


	<main>
      <?php
        if(añadir_proveedor($conexion, $nuevoProveedor)==""){
      ?>
            <div id="div_exito">
              <h1>Proveedor <?php echo $nuevoProveedor["nombre"]; ?>, añadido con éxito</h1>
              <div id="div_volver">	
                Pulsa <a href="proveedores.php">aquí</a> para ir a la lista de proveedores.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>El proveedor ya existe en la base de datos.</h2>
                  
              <div>
                Pulsa <a href="form_alta_proveedor.php"> aquí</a> para volver al formulario o pulsa <a href="proveedores.php">aquí</a> para ir a la lista de proveedores
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>
<?php
  cerrarConexionBD($conexion);
?>