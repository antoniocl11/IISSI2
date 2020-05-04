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
			<a class="active" href="admin.php">Inicio</a>
			<a href="#">Clientes</a>
            <a href="#">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a href="#">Proveedores</a>
			<a href="#">Reservas</a>
			<a href="#">Tickets</a>
            </div>
        </div>
        <?php
            session_start();
            
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario['id'] = "";
                $formulario['fecha'] = "";
                
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
                foreach($errores as $error){
                    echo $error;
                }

                echo "</div>";
            }
        ?>
        
                <form class="altaPedido" method="get" action="validacion_alta_pedido.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="id">NIF<em>*</em></label>
                    <input class="id" name="id" type="text" placeholder="123456789" pattern="^[0-9]{9}" 
                    title="Nueve dígitos seguidos" value="<?php echo $formulario['nif'];?>" required>
                    </div>

                    <div class="campos"><label for="fecha">Fecha de Pedido <em>*</em></label>
                    <input class="fecha" name="fecha" type="date" placeholder="01/01/1900"
                    value="</?php echo $formulario['fecha'];?>" required>
                    </div>

                    <div class="botones"><input type="submit" value="Confirmar"/>
                    </div>
                </form>
            </section>    
        
        
        </body>
    </body>
</html>