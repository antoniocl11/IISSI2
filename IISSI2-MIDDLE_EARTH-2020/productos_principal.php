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
            <h4 class="titulo_reservas">Elige un producto para reservar...</h4>
            <div class="contenedor1">
                <div class="productos">
                    <h5 class="titprod">Comic Marvel: The Incredible Hulk</h5>
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s0.jpg" ></img></a>
                    <p class="preciores">10,00€ </p>
                    <p><button class="breserva">Reservar</button></p>
                </div>
                <div class="productos">
                    <h5 class="titprod">Juego de Mesa: El señor de los anillos</h5>
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s1.jpg" ></img></a>
                    <p class="preciores">10,00€</p>
                    <p><button class="breserva">Reservar</button></p>          
                </div><div class="productos">
                    <h5 class="titprod">Camiseta Marvel Oficial</h5>
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s2.jpg" ></img></a>
                    <p class="preciores">10,00€ </p>
                    <p><button class="breserva">Reservar</button></p>
                </div><div class="productos">
                    <h5 class="titprod">Figura SpiderMan Traje Avanzado</h5>
                    <a href="form_alta_reserva.php"><img class="imagenes" src="images/s3.jpg"></img></a>
                    <p class="preciores">10,00€</p>
                    <p><button class="breserva">Reservar</button></p>
                </div>
</div>
<button class="breserva"><a style="color:white;padding:3px;" href="productos_dinamico.php">Productos con BBDD</a></button>
</html>

