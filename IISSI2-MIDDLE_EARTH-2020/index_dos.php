<?php
// en esqueleto_web.php encontramos las funciones headermain y footermain.
require_once("gestionBD.php");
include_once('esqueleto_web.php');
$conexion = crearConexionBD();
session_start();
// Si el usuario no est� logeado, redirige a la pantalla de login.


   headermain();
   footermain();
?>

        <main>
            <section class="banner">
                <img src="images/banner.png">
                <div class="texto-banner">
                    <h3> Bienvenido a Middle-Earth (Sevilla), tu tienda de comics, juegos de mesa y merchandising</h3>
                </div>
                <div class="botones">
                    <div class="boton1">
                        <a href="inicio.html">Ver Productos</a>
                    </div>  
                </div>
            </section>
        </main>