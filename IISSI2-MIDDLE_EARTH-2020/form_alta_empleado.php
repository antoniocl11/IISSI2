<?php
    if(isset($_SESSION["login"]))

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<title>Alta Empleado</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
			<a id="cerrar" href="#" class="button">Cerrar Sesión</a>
			<h2>Admin Panel Middle-Earth(Sevilla)</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a  href="admin.php">Inicio</a>
			<a href="#">Clientes</a>
            <a class="active" href="#">Empleados</a>
			<a href="#">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>
			<a href="#">Reservas</a>
			<a href="#">Tickets</a>
            <a href="#">Linea Pedido</a>
            </div>
        </div>
        <?php
            session_start();
            
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario['id'] = "";
                $formulario['nif'] = "";
                $formulario['nombre'] = "";
                $formulario['apellidos'] = "";
                $formulario['turno'] = "";
                $formulario['sueldo'] = "";

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

    
    <body>
        
    <section class="formulario">
    <?php
        //Muestra los errores de validación si ha encontrado alguno
            if(isset($errores) && count($errores) > 0){
                echo "<div id=\"div_errores\" class=\"error\">";
                echo "<h4> Errores en el formulario:</h4>";
                foreach($errores as $error){    //Muestrame cada error de la colección errores
                    echo $error;
                }

                echo "</div>";
            }
    ?>
            
                <form class="altaProveedor" method="get" action="validacion_alta_empleado.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>
                    <div class="campos"><label for="id">ID<em>*</em></label>
                    <input class="id" name="id" type="number"
                    title="El ID asociado debe contener 9 dígitos numéricos" value="<?php echo $formulario['id'];?>" required>
                    </div>
                    <div class="campos"><label for="nif">NIF<em>*</em></label>
                    <input class="nif" name="cif" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" 
                    title="Ocho dígitos seguidos de una letra mayúscula" value="<?php echo $formulario['nif'];?>" required>
                    </div>

                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input class="nombre" name="nombre" type="text" size="25"  value="<?php echo $formulario['nombre'];?>" required>
                    </div>

                    <div class="campos"><label for="apellidos">Apellidos<em>*</em></label>
                    <input class="apellidos" name="apellidos" type="text"   value="<?php echo $formulario['apellidos'];?>" required>
                    </div>
<!--
                    <div class="campos"><label for="telefono">Teléfono<em>*</em></label>
                    <input type="number"  class="telefono" name="telefono" value="<//?php echo $formulario['telefono'];?>" required>
                    </div>
-->
                    <div class="casillasTurnos">Turno
                        <input name="M" type="checkbox" value="1" <?php echo $formulario['turno'];?>/>
                            <label for="M">M</label>
                        <input name="T" type="checkbox" value="2" <?php echo $formulario['turno'];?>/>
                            <label for="T">T</label>
                        <input name="P" type="checkbox" value="3"  <?php echo $formulario['turno'];?>/>
                            <label for="P">P</label>
                    </div>


                    <!--<div class="campos"><label for="turno">Turno<em>*</em></label>
                    <input class="turno" name="turno" type="text" placeholder="T, M o P"  value="<?php echo $formulario['turno'];?>" required>
                    </div>-->

                    <div class="campos"><label for="sueldo">Sueldo<em>*</em></label>
                    <input type="text"  class="sueldo" name="sueldo" value="<?php echo $formulario['sueldo'];?>" required>
                    </div>

                    <div class="botones"><input type="submit" value="Confirmar"/></div>
                </form>
            </section>    
        
        
        
        
        </body>
    </body>
</html>