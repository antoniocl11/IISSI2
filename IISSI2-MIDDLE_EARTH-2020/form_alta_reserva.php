        <?php
            session_start();
            include_once('esqueleto_web.php');
        
            headermain();
            footermain();
            require_once("gestionBD.php");
            
            
            if(!isset($_SESSION["formulario"])){
                $formulario["fecha"] = "";
                $formulario["producto"] = "";
                $formulario["email"] = "";
                $formulario["nombre"] = "";

                $_SESSION["formulario"] = $formulario;
            }
            
            else
                $formulario = $_SESSION["formulario"];
                
            
            if (isset($_SESSION["errores"])){
                    $errores = $_SESSION["errores"];
                    unset($_SESSION["errores"]);
            }

            $conexion = crearConexionBD();
        ?>

    
    <body>
        
    <section class="formulario">
    <?php
       
         if(isset($errores) && is_array($errores)){
         
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
                    title="La fecha no puede ser posterior al día actual" value="<?php echo @$formulario["fecha"];?>" 
                    oninput="validacion_fecha()">
                    </div>
                    <div class="campos"><label for="producto">Producto<em>*</em></label>
                    <input id="producto" class="producto" name="producto" type="text" placeholder="Nombre del Producto" 
                    value="<?php echo @$formulario["producto"];?>"required>
                    </div>

                    <div class="campos"><label for="email">Email<em>*</em></label>
                    <input id="email" name="email" type="text" size="25"  value="<?php echo @$formulario["email"];?>" 
                    oninput="validacion_email()" placeholder="juanymedio@gmail.com">
                    </div>

                    <div class="campos"><label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text"   value="<?php echo @$formulario["nombre"];?>" 
                    oninput="validacion_nombre()">
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