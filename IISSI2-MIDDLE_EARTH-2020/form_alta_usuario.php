<!DOCTYPE html>
<html lang=es>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/validacion_alta_usuario.js"></script>    
    </head>
    <?php
            session_start();
            
            require_once("gestionBD.php");

           
            // en esqueleto_web.php encontramos las funciones headermain y footermain.
            require_once("gestionBD.php");
            include_once('esqueleto_web.php');
            $conexion = crearConexionBD();
            
            // Si el usuario no est� logeado, redirige a la pantalla de login.
            
            
               headermain();
               footermain();
           
            
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario["nif"] = "";
                $formulario["nombre"] = "";
                $formulario["apellidos"] = "";
                $formulario["telefono"] = "";
                $formulario["direccion"] = "";
                $formulario["esSocio"] = "";
                $formulario["fechaNacimiento"] = "";
                $formulario["email"] = "";
                $formulario["contrasena"] ="";

                $_SESSION["formulario"] = $formulario;
            }
            //si ya existían valores se usan para inicializar el formulario
            else{
                $formulario = $_SESSION["formulario"];
            }  
            //si hay errores de validacion hay que mostrarlos y marcar los datos
            if (isset($_SESSION["errores"])){
                    $errores = $_SESSION["errores"];
                    unset($_SESSION["errores"]);
            }

            //Creamos la conexion de la base de datos
            $conexion = crearConexionBD();
        ?>

    
    <body>
        


    <section class="formulario_alta_usuario">
            <?php


        //Muestra los errores de validación si ha encontrado alguno
        if(isset($errores) && is_array($errores)){
            //isset me determina si la variable está definida y
            //is_array, me comprueba que $errores sea un array en el que 
            //posteriormente almacenaré la lista de errores (evitar el warning)
            if(count($errores) > 0){
                echo "<div id=\"div_errores\" class=\"error\">";
                echo "<h4> Errores en el formulario:</h4>";
                
                foreach($errores as $error){
                    echo $error;
                }

                echo "</div>";
            }
        }
        ?>
        
                <form class="altaUsuario" method="get" action="validacion_alta_usuario.php" >
                   
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="nif">NIF<em>*</em></label>
                    <input id="nif" class="nif" name="nif" type="text" placeholder="12345678X" 
                    title="Ocho dígitos seguidos de una letra mayúscula" value="<?php echo $formulario["nif"];?>" 
                    oninput="validacion_nif()"><!--required Quitado para validaciones js-->
                    </div>

                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input id="nombre" class="nombre" name="nombre" type="text" size="25"  value="<?php echo $formulario["nombre"];?>" 
                    oninput="validacion_nombre()" ><!--required Quitado para validaciones js-->
                    </div>

                    <div class="campos"><label for="apellidos">Apellidos<em>*</em></label>
                    <input  id="apellidos" class="apellidos" name="apellidos" type="text"   value="<?php echo $formulario["apellidos"];?>" 
                    oninput="validacion_apellidos()" ><!--required Quitado para validaciones js-->
                    </div>

                    <div class="campos"><label for="telefono">Teléfono<em>*</em></label>
                    <input id="telefono" type="text"  class="telefono" name="telefono" value="<?php echo $formulario["telefono"];?>" 
                    oninput="validacion_telefono()" ><!--required Quitado para validaciones js-->
                    </div>

                    <div class="campos"><label for="direccion">Dirección</label>
                    <input  id="direccion" class="direccion" name="direccion" type="text"   value="<?php echo $formulario["direccion"];?>" 
                    oninput="validacion_direccion()">
                    </div>

                    <div class="campos"><label for="essocio">¿Eres socio?<em>*</em></label>
                     <select id="essocio" name="esSocio" value="<?php echo $formulario["esSocio"];?>" ><!--required Quitado para validaciones js-->
                        <option value="1">Sí</option> 
                        <option value="0">No</option> 
                     </select>
                    </div>
                    
                    <div class="campos"><label for="fechaNacimiento">Fecha de Nacimiento<em>*</em></label>
                    <input id="fechaNacimiento" class="fechaNacimiento" name="fechaNacimiento" type="date"  placeholder= "Sólo mayores de 16 años" 
                    value="<?php echo $formulario["fechaNacimiento"];?>" oninput="validacion_fechaNacimiento()" ><!--required Quitado para validaciones js-->
                    </div>
                    

                    <div class="campos"><label for="email">E-Mail<em>*</em></label>
                    <input id="email" class="email" name="email" type="email" placeholder="example@domain.com" value="<?php echo $formulario["email"];?>" 
                    oninput="validacion_email()" ><!--required Quitado para validaciones js-->
                    </div>

                    <div class="campos"><label for="contrasena">Contraseña<em>*</em></label>
                    <input id="contrasena" class="contrasena" name="contrasena" minLength="8" type="password" placeholder="Mínimo 8 caracteres, incluyendo letras y dígitos" 
                    value="<?php echo $formulario["contrasena"];?>" oninput="validacion_contrasena()" ><!--required Quitado para validaciones js-->
                    </div>
                    
                
                    <div class="botones"><input type="submit" value="Enviar"/></div>
                    <p><a href="login.html">¿Ya tienes una cuenta?</a></p>
                </form>
            </section>    

            <?php
                cerrarConexionBD($conexion);
            ?>
        
</html>