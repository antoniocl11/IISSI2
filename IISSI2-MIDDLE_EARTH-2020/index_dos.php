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
        <head>
         <link type="text/css" href="css/styles.css" rel="stylesheet">
        <style>
        .menu-principal {
    display: inline-flex;
    background-color: #fff;
    position: relative;
    overflow: hidden;
    /*width: 40%;*/
    margin-left: -15%;
    margin-bottom: 6%;
    margin-top: 20px;
    border-radius: 40px;
    padding: 0 20px;
    box-shadow: 0 10px 40px rgba(159, 162, 177, .8);
}

/* NUEVO MENU */
.nav-item {
    color: #83818c;
    padding: 20px;
    text-decoration: none;
    transition: .3s;
    margin: 0 6px;
    z-index: 1;
    font-weight: 500;
    position: relative;
    }
    
    .nav-item:before{
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 100%;
    height: 5px;
    background-color: #dfe2ea;
    border-radius: 8px 8px 0 0;
    opacity: 0;
    transition: .3s;
}


.nav-item:not(.is-active):hover:before {
    opacity: 1;
    bottom: 0;
}


.nav-item:not(.is-active):hover {
    color: #333;
}

.nav-indicator {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    transition: .4s;
    height: 5px;
    z-index: 1;
    border-radius: 8px 8px 0 0;
}
</style>
        </head>
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
        <script>
        const indicator = document.querySelector('.nav-indicator');
const items = document.querySelectorAll('.nav-item');

function handleIndicator(el) {
  items.forEach(item => {
    item.classList.remove('is-active');
    item.removeAttribute('style');
  });
  
  indicator.style.width = `${el.offsetWidth}px`;
  indicator.style.left = `${el.offsetLeft}px`;
  indicator.style.backgroundColor = el.getAttribute('active-color');

  el.classList.add('is-active');
  el.style.color = el.getAttribute('active-color');
}


items.forEach((item, index) => {
  item.addEventListener('click', (e) => { handleIndicator(e.target)});
  item.classList.contains('is-active') && handleIndicator(item);
});
        </script>