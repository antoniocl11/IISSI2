<?php
    session_start();

    //Importo archivos necesarios para la gestion del ticket de contacto
    require_once("gestionBD.php");
    require_once("gestionar_tickets.php");

      //Aqui comprobamos que hemos llegado a esta página porque se ha rellenado el formulario.
      if(isset($_SESSION["formulario"])){
          $nuevoTicket = $_SESSION["formulario"];
          $_SESSION["formulario"] = null;
          $_SESSION["errores"] = null;
      }
      //sino volvemos al formulario
      else{
          Header("Location: form_alta_ticket.php");
      }

      $conexion = crearConexionBD();


    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo Ticket</title>
  <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
</head>

<body>


	<main>
      <?php
        if(añadir_ticket($conexion, $nuevoTicket)==""){
      ?>
            <div id="div_exito">
              <h2>Hola, <?php echo $nuevoTicket["nombre"]; ?>, se ha registrado su consulta, el administrador se pondrá en contacto con usted lo antes posible.</h2>
              <div id="div_volver">	
                Pulsa <a href="index_dos.php.php">aquí</a> para ir a la página principal.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>Ya ha registrado esa consulta.</h2>
                  
              <div>
                Pulsa <a href="form_alta_ticket.php"> aquí</a> para volver al formulario.
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>
<?php
  cerrarConexionBD($conexion);
?>