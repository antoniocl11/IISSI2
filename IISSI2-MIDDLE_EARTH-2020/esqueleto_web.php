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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para detectar el tama�o de pantalla-->
        <script src="https://kit.fontawesome.com/b3de7dbd0c.js" crossorigin="anonymous"></script>
    </head>    
    ';
    if (!isset($_SESSION['loggedin'])) {
    echo '
    <header>
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
                            <li><a href="index_dos.php">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Contacto</a></li>
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
     <header>
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
                            <li><a href="index_dos.php">Inicio</a></li>
                            <li><a href="productos_principal.php">Productos</a></li>
                            <li><a href="sobre_nosotros.php">Sobre Nosotros</a></li>
                            <li><a href="form_alta_ticket.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                    <div class="colheader">
                         <div class="botones">
                        <a id="perfil_activo" href="perfil_user.php">&#x2659;Perfil</a>
				        <a href="logout.php">&#x2716;Logout</a>
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
                            <div class="copyright">Copyright&#169;2020 - M.E S.R.L</div>
                            <a href="privacidad.html">Privacidad</a>
                        </div>
                        <div class="footercol centrar">
                            <div class="telefono">&#x2706; 958958744</div>
                        </div>
                        <div class="footercol derecha">
                            <div class="email">&#x2709; info@middleearth.com</div>
                        </div>
                    </div>
          </footer>';
  }
    ?>