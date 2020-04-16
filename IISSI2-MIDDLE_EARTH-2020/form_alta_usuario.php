
<!DOCTYPE html>
<html lang = "es">
    <head>
    <meta charset="utf-8">
        <title>Registrarse</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link type="text/css" href="css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para detectar el tamaño de pantalla-->
        <script type="text/javascript" src="js/javascript.js"></script>
        <script src="https://kit.fontawesome.com/b3de7dbd0c.js" crossorigin="anonymous"></script>
    </head>
        

    <header>
    <div class="contenedor">
            <div class="espacio">
                <div class="colheader">
                    <a href="index.html" title="Middle-Earth"><img src="images/logo.png"></a>
                    
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
                            <li><a href="index.html">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            
                <div class="colheader">
                    <div class="botones">
                        <a class="login" href="index.html">Entrar</a>
                        <a href="index.html">Registrarse</a>
                    </div>
                </div>
            </div>
    </div>
    
    </header>
    
        <body>
        <?php
            session_start();
            
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario['nif'] = "";
                $formulario['nombre'] = "";
                $formulario['apellidos'] = "";
                $formulario['telefono'] = "";
                $formulario['direccion'] = "";

                $_SESSION["formulario"] = $formulario;
            }
            //si ya existían valores se usan para inicializar el formulario
            else
                $formulario = $_SESSION["formulario"];
                
            //si hay errores de validacion hay que mostrarlos y marcar los datos
            if (isset($_SESSION["errores"])){
                    $errores = $_SESSION["errores"];
                    unset($_SESSION["errores"]);
            }
        ?>

        <?php
            if(isset($errores) && count($errores) > 0){
                echo "<div id\"div_errores\" class=\"error\">";
                echo "<h4> Errores en el formulario:</h4>";
                foreach($errores as $error){
                    echo $error;
                }

                echo "</div";
            }
        ?>
            <section class="formulario_alta_usuario">
                <form class="altaUsuario" method="get" action="validacion_alta_usuario.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="nif">NIF<em>*</em></label>
                    <input class="nif" name="nif" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" 
                    title="Ocho dígitos seguidos de una letra mayúscula" value="<?php echo $formulario['nif'];?>" required>
                    </div>
                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input class="nombre" name="nombre" type="text" size="25"  value="<?php echo $formulario['nombre'];?>" required>
                    </div>
                    <div class="campos"><label for="apellidos">Apellidos<em>*</em></label>
                    <input class="apellidos" name="apellidos" type="text"   value="<?php echo $formulario['apellidos'];?>" required>
                    </div>
                    <div class="campos"><label for="direccion">Dirección<em>*</em></label>
                    <input class="direccion" name="direccion" type="text"   value="<?php echo $formulario['direccion'];?>" required>
                    </div>
                    
                    
                    <div class="campos"><label for="telefono">Teléfono<em>*</em></label>
                    <input class="telefono" name="telefono" type="phone" value="<?php echo $formulario['telefono'];?>" required>
                    </div>
    
                    <div class="botones"><input type="submit" value="Enviar"/></div>
                    <p><a href="#">¿Ya tienes una cuenta?</a></p>
                </form>
            </section>    
        
        
        
        
        </body>
            
            
            
            
       
   
             <footer>  
           <div class="contenedor">
            <div class="footercol">
                <div class="copyright">© 2020. Todos los derechos reservados</div>
                
            </div>
            <div class="footercol centrar">
                <div class="telefono">&#x2706; 958958744</div>
            </div>

            <div class="footercol derecha">
                <div class="email">&#x2709; info@middleearth.com</div>
            </div>
        </div>
        </div>
             </footer>
    
       
        
            
</html>
