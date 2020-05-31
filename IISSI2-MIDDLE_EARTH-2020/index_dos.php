<?php
// en esqueleto_web.php encontramos las funciones headermain y footermain.
require_once("gestionBD.php");
include_once('esqueleto_web.php');
$conexion = crearConexionBD();
session_start();

   headermain();
   footermain();
?>
        <main>
            <section class="banner">
                <div class="texto-banner">
                <div class="slideshow-container">
  <!-- SLIDESHOW-->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img class="borderimg" src="images/slideruno.png" style="width:100%">
    <div class="text">¡Todos tus cómics preferidos!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img class="borderimg" src="images/sliderdos.jpg" style="width:100%">
    <div class="text">¡Tus figuras preferidas, al mejor precio!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img class="borderimg" src="images/slidertres.png" style="width:100%">
    <div class="text">¡Camisetas frikis para toda la familia!</div>
  </div>
</div>
<br>

<!-- PUNTOS Y BOTONES -->
<div style="text-align:center">
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<!-- BODY -->
                    <h3> Bienvenido a Middle-Earth (Sevilla), tu tienda de comics, juegos de mesa y merchandising</h3>
                </div>
                <div class="botones">
                    <div class="boton1">
                        <a href="productos_dinamico.php">Ver Productos</a>
                    </div>  
                </div>
            </section>
        </main>

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Controles
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>