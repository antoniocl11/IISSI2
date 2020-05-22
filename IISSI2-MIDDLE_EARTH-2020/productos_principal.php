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
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s0.jpg" ></img></a>
                    <h5>Comic Marvel: The Incredible Hulk</h5>
                </div>
                <div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s1.jpg" ></img></a>
                    <h5>Juego de Mesa: El señor de los anillos</h5>
                </div><div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s2.jpg" ></img></a>
                    <h5>Camiseta Marvel Oficial</h5>
                </div><div class="productos">
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s3.jpg"></img></a>
                    <h5>Figura SpiderMan Traje Avanzado</h5>
                </div>
</div>
</html>

