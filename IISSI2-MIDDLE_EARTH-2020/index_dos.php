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
                <!--<img src="images/banner.png">-->
                <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="images/slideruno.png" style="width:100%">
    <div class="text">¡Todos tus cómics preferidos!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="images/sliderdos.jpg" style="width:100%">
    <div class="text">¡Tus figuras preferidas, al mejor precio!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="images/slidertres.png" style="width:100%">
    <div class="text">¡Camisetas frikis para toda la familia!</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
                <div class="texto-banner">
                    <h3> Bienvenido a Middle-Earth (Sevilla), tu tienda de comics, juegos de mesa y merchandising</h3>
                </div>
                <div class="botones">
                    <div class="boton1">
                        <a href="productos_principal.php">Ver Productos</a>
                    </div>  
                </div>
            </section>
        </main>

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
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