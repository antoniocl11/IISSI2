<!DOCTYPE html>
<html lang=es>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/validacion_alta_reserva.js"></script>    
    </head>
    <script>
        $(document).ready(funtion()){ //LLamamos a la funcion validacion ticket para que salte las validaciones
                                    //en servidor si tenemos en cliente
            $("#altaTicket").on("submit", function(){
                return validacionTicket();
            });
        }

</script>
<?php
            session_start();
            include_once('esqueleto_web.php');
        
            headermain();
            footermain();
            require_once("gestionBD.php");

            $producto = $_POST['submit'];

            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["loggedin"])){
                $formulario["fecha"] = "";
                $formulario["producto"] = $producto;
                $formulario["email"] = "";
                $formulario["nombre"] = "";

                $_SESSION["formulario"] = $formulario;
            }
            //si ya existían valores se usan para inicializar el formulario
            else{
                $formulario["fecha"] = "";
                $formulario["producto"] = $producto;
                $formulario["email"] = $_SESSION['name'];
                $formulario["nombre"] = $_SESSION['nombre'];
                
                $_SESSION["formulario"] = $formulario;
            }    
            //si hay errores de validacion hay que mostrarlos y marcar los datos
            if (isset($_SESSION["errores"])){
                    $errores = $_SESSION["errores"];
                    unset($_SESSION["errores"]);
            }

            $conexion = crearConexionBD();

            
        ?>

    
    <body>
        
    <section class="formulario">
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
             <section class="formulario_alta_usuario">        
                <form class="altaReserva" method="get" action="validacion_alta_reserva.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="fecha">Fecha<em>*</em></label>
                    <input id="fecha" name="fecha" type="date" class="fecha"
                    title="La fecha no puede ser posterior al día actual" value="<?php echo $formulario["fecha"];?>" 
                    oninput="validacion_fecha()"><!--required Quitado para probar validacion js-->
                    </div>
                    <div class="campos"><label for="producto">Producto<em>*</em></label>
                    <input id="producto" class="producto" name="producto" type="text" placeholder="Nombre del Producto" 
                    value="<?php echo $formulario["producto"];?>" oninput="validacion_producto()">
                    </div>

                    <div class="campos"><label for="email">Email<em>*</em></label>
                    <input id="email" name="email" type="text" size="25"  value="<?php echo $formulario["email"];?>" 
                    oninput="validacion_email()" placeholder="ejemplo@gmail/hotmail/.../.com"><!--required Quitado para probar validacion js-->
                    </div>

                    <div class="campos"><label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Escribe tu nombre..."  value="<?=$formulario["nombre"]?>" 
                    oninput="validacion_nombre()"><!--required Quitado para probar validacion js-->
                    </div>

                    <div class="botones"><input type="submit" value="Confirmar" onclick="return confirm('Seguro que quieres reservar <?php echo $formulario["producto"];?>')" /></div>
                </form>
            </section>    
        
            <?php
            cerrarConexionBD($conexion);
            ?>
        
        
        </body>
    </body>
</html>