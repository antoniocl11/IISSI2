<?php
    session_start();

    //Importo archivos necesarios para la gestion del proveedor
    require_once("gestionBD.php");
    require_once("gestionar_pedidos.php");

      //Aqui comprobamos que hemos llegado a esta página porque se ha rellenado el formulario.
      if(isset($_SESSION["formulario"])){
          $nuevoPedido = $_SESSION["formulario"];
          $_SESSION["formulario"] = null;
          $_SESSION["errores"] = null;
      }
      //sino volvemos al formulario
      else{
          Header("Location: form_alta_pedido.php");
      }

      $conexion = crearConexionBD();


    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo pedido</title>
  <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
</head>

<body>


	<main>
      <?php
        if(añadir_pedido($conexion, $nuevoPedido)==""){
          
      ?>
            <div id="div_exito">
              <h1>Pedido con ID: <?php echo $nuevoPedido["id"]; ?>, añadido con éxito</h1>
              <div id="div_volver">	
                Pulsa <a href="pedidos.php">aquí</a> para ir a la lista de pedidos.
              </div>
            </div>
        <?php } 
        
        else { ?>
                  <h2>El pedido ya existe en la base de datos.</h2>
                  
              <div>
                Pulsa <a href="form_alta_pedido.php"> aquí</a> para volver al formulario o pulsa <a href="pedidos.php">aquí</a> para ir a la lista de pedidos
              </div>
        <?php } ?>
			
		</ul>		
	</main>

</body>
</html>
<?php
  cerrarConexionBD($conexion);
?>
