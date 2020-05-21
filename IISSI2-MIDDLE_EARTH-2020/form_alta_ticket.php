<!DOCTYPE html>
<html lang=es>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/validacion_alta_ticket.js"></script>    
    </head>
<?php
            session_start();
            
            require_once("gestionBD.php");
            // en esqueleto_web.php encontramos las funciones headermain y footermain.
            require_once("gestionBD.php");
            include_once('esqueleto_web.php');
            
            headermain();
            footermain();

            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario["fecha"] = "";
                $formulario["comentario"] = "";
                $formulario["nombre"] = "";
                $formulario["email"] = "";
 

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

            //Creamos la conxion con la base de datos
            $conexion = crearConexionBD();
        ?>

    
    <body>
        


    <section class="formulario_alta_usuario">
            <?php
        //Muestra los errores de validación si ha encontrado alguno
            if(isset($errores) && count($errores) > 0){
                echo "<div id=\"div_errores\" class=\"error\">";
                echo "<h4> Errores en el formulario:</h4>";
                foreach($errores as $error){
                    echo $error;
                }

                echo "</div>";
            }
        ?>
        
                <form class="altaTicket" method="get" action="validacion_alta_ticket.php" >
                    <h4>Abre un ticket de contacto al soporte de Middle earth</h4></br>
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="fecha">Fecha<em>*</em></label>
                    <input id="fecha" class="fecha" name="fecha" type="date"  
                    title="Una letra mayúscula seguida de 8 dígitos numéricos" value="<?php echo @$formulario["fecha"];?>"
                    oninput="validacion_fecha()" ><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="comentario">Comentario<em>*</em></label>
                    <textarea id="comentario" type="number"  class="comentario" name="comentario" value="<?php echo @$formulario["comentario"];?>" 
                    oninput="validacion_comentario()"></textarea><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input id="nombre" class="nombre" name="nombre" type="text" size="25"  value="<?php echo @$formulario["nombre"];?>"
                    oninput="validacion_nombre()" ><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="email">Email<em>*</em></label>
                    <input id="email" class="email" name="email" type="text"   value="<?php echo @$formulario["email"];?>" 
                    oninput="validacion_email()"><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="botones"><input type="submit" value="Confirmar"/></div>
                </form>
            </section>    
        
        <?php
            cerrarConexionBD($conexion);
        ?>
        
        
        </body>
    </body>
</html>