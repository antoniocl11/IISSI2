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
<body>
      <div style="text-align:center;display:block;">
      <h3 class="titulo_sobre_nosotros">MIDDLE-EARTH SEVILLA TU TIENDA DE COMICS ESPECIALIZADA</h3>
      <p  class="texto_sobre_nosotros">Estamos orgullosos de ofrecer en Sevilla capital, desde 2020, el mayor catálogo de cómics y merchandising de la provincia.</p>
      <p class="texto_sobre_nosotros1">En la página se puede navegar por distintas secciones como Inicio, productos, sobre nosotros y contacto, también el usuario podrá obtener una cuenta para acceder a la web y pertenecer a nuestro grupo de socios.</p>
      <p class="texto_sobre_nosotros2">En inicio se puede ver la página con la que inicia la página, en la sección de productos se puede observar algunos de los productos y se pueden reservar mediante un formulario que llegará directamente a nuestro administrador del sitio, en la seccion sobre nosotros se ve un poco en qué consiste nuestra tienda y donde estamos situados y en contacto si tiene alguna duda podría mandarnos un ticket que también llegaría directamente a nuestro administrador.</p>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.5597365967!2d-5.987073899129565!3d37.400242826807684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126c00578fb215%3A0xda498f9071e1f5cc!2sCalle%20Morera%2C%2041003%20Sevilla!5e0!3m2!1sen!2ses!4v1590522622924!5m2!1sen!2ses" frameborder="0" style="border:2px solid #007ac3;height: 70%; width :50%; margin-left:auto; margin-right:auto;" allowfullscreen aria-hidden="false"></iframe>
      </div>
</body>
