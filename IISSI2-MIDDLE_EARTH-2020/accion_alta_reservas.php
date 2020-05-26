<?php

    session_start();

        require_once("gestionBD.php")
        require_once("gestionar_reservas.php");

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
              <h1>Reserva <?php echo $nuevaReserva["nombre"]; ?>, añadido con éxito</h1>
              <div id="div_volver">	
                Pulsa <a href="reservas.php">aquí</a> para ir a la lista de reserva.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>La reserva ya existe en la base de datos.</h2>
                  
              <div>
                Pulsa <a href="form_alta_reserva.php"> aquí</a> para volver al formulario o pulsa <a href="reservas.php">aquí</a> para ir a la lista de reservas
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>
<?php
  cerrarConexionBD($conexion);
?>

