<?php

function headermain() {
    echo '
    <!DOCTYPE html>
    <html lang = "es">
    <head>
    <meta charset="utf-8">
        <title>Middle Earth</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link type="text/css" href="css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para detectar el tama�o de pantalla-->
        <script src="https://kit.fontawesome.com/b3de7dbd0c.js" crossorigin="anonymous"></script>
    </head>  
    <header>
    <div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
  <a href="#" class="google"><i class="fa fa-google"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>
    <script> // FUNCIÓN PARA EL ELEMENTO ACTIVO DEL NAVBAR
    jQuery(function($) {
        var path = window.location.href; // 
        $("ul li a").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
                $(this).parent().addClass("active-menu");
                }
            });
        $(".botones a").each(function() {
            if (this.href === path) {
                $(this).addClass("active-boton");
                
                }
            });
        });
    </script>
    ';
    if (!isset($_SESSION['loggedin'])) {
    echo '
        <div class="contenedor">
                <div class="espacio"> 
                    <div class="colheader">
                        <a href="index_dos.php" title="Middle-Earth"><img src="images/logo.png"></a> 
                </div>
                <div class="colheader">
                    <!--
                    <div class="menu_bar">
                        <a href="#" class="bt-menu"><span class="icono-menu"></span><i class="fas fa-bars"></i></a>
                    </div>
                    -->
                    <input type="checkbox" id="btn-menu">
                    <label for="btn-menu"><img src="images/icono-menu.png"></label>
                    <nav class="menu-principal">    
                        <ul>
                            <li><a class="menu-style" href="index_dos.php" id="cinicio">Inicio</a></li>
                            <li><a class="menu-style" href="productos_dinamico.php" id="cproducto">Productos</a></li>
                            <li><a class="menu-style" href="sobre_nosotros.php" id="cabout">Sobre Nosotros</a></li>
                            <li><a class="menu-style" href="form_alta_ticket.php" id="ccontacto">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                    <div class="colheader">
                        <div class="botones">
                            <a class="login" href="login.php">Entrar</a>
                            <a href="form_alta_usuario.php">Registrarse</a>
                     </div>
                </div>
            </div>
        </div>
    </header>';} else {
     echo '   
        <div class="contenedor">
                <div class="espacio">
                    <div class="colheader">
                        <a href="index_dos.php" title="Middle-Earth"><img src="images/logo.png"></a> 
                </div>
                <div class="colheader">
                    <!--
                    <div class="menu_bar">
                        <a href="#" class="bt-menu"><span class="icono-menu"></span><i class="fas fa-bars"></i></a>
                    </div>
                    -->
                    <input type="checkbox" id="btn-menu">
                    <label for="btn-menu"><img src="images/icono-menu.png"></label>
                    <nav class="menu-principal">    
                        <ul>
                            <li><a class="menu-style" href="index_dos.php" id="cinicio">Inicio</a></li>
                            <li><a class="menu-style" href="productos_dinamico.php" id="cproducto">Productos</a></li>
                            <li><a class="menu-style" href="sobre_nosotros.php" id="cabout">Sobre Nosotros</a></li>
                            <li><a class="menu-style" href="form_alta_ticket.php" id="ccontacto">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                    <div class="colheader">
                         <div class="botones">
                        <a id="perfil_activo" style="font-weight:500;" href="perfil_user.php">&#x2659;&nbspPerfil</a>
				        <a href="logout.php"style="font-weight:500;">&#x2716;&nbsp;Logout</a>
                        </div>
                    </div>
            </div>
        </div>
    </header>';
	}
}

function footermain() {
    echo '<footer>  
                    <div class="contenedor">
                        <div class="footercol">
                            <div class="copyright">Copyright&#169;2020 - M.E S.R.L -<a style="font-weight:700;" href="privacidad.php">&nbsp;Privacidad</a></div>
                            
                        </div>
                        <div class="footercol centrar">
                            <div style="font-weight:700;" class="telefono">&#x2706; 958958744</div>
                        </div>
                        <div class="footercol derecha">
                            <div style="font-weight:700;" class="email">&#x2709; info@middleearth.com</div>
                        </div>
                    </div>
          </footer>';
  }
    ?>