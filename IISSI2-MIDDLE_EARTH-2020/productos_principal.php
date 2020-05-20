<?php
    session_start();
    include_once('esqueleto_web.php');

    headermain();
    footermain();

    //continuar

?>

<!DOCTYPE html>
<html lang = "es">

<head>
    <script type="text/javascript" src="js/carousel.js"></script>   
    <link type="text/css" href="css/productos.css" rel="stylesheet">
</head>
<div id="carrusel">
            <h4 class="titulo_reservas">Elige un producto para reservar</h4>
            <div class="contenedor1">
                <div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s0.jpg" style="width:70%"></img></a>
                </div>
                <div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s1.jpg" style="width:70%"></img></a>
                </div><div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s2.jpg" style="width:70%"></img></a>
                </div><div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s3.jpg" style="width:70%"></img></a>
                </div>
</div>
</html>

