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
      <h3 class="titulo_sobre_nosotros">MIDDLE-EARTH SEVILLA TU TIENDA DE COMICS ESPECIALIZADA</h3>
      <p  class="texto_sobre_nosotros">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, quam cum. Libero modi reprehenderit laudantium? Enim necessitatibus beatae nisi eligendi quos perspiciatis facilis non nihil illum. Quibusdam, atque. Impedit, veritatis.</p>
   
</body>
