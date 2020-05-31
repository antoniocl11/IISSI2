<?php

    session_start();

        require_once("gestionBD.php");
        require_once("gestionar_reserva.php");

         if(isset($_SESSION["formulario"])){
            $nuevaReserva = $_SESSION["formulario"];
            $_SESSION["formulario"] = null;
            $_SESSION["errores"] = null;
         }
         
         else{
            Header("Location: form_alta_reserva.php");
         }
  
         $conexion = crearConexionBD();

        ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nueva reserva</title>
  <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
</head>

<body>


	<main>
      <?php
        if(añadir_reserva($conexion, $nuevaReserva)==""){
      ?>
            <div id="div_exito">
              <h1>Reserva <?php echo $nuevaReserva["producto"]; ?>, añadida con éxito</h1>
              <div id="div_volver">	
                Pulsa <a href="productos_principal.php">aquí</a> para ir a los productos.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>La reserva ya se ha realizado.</h2>
                  
              <div>
                Pulsa <a href="form_alta_reserva.php"> aquí</a> para volver al formulario o pulsa <a href="index_dos.php">aquí</a> para ir a la página principal
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>
<?php
  cerrarConexionBD($conexion);
?>

