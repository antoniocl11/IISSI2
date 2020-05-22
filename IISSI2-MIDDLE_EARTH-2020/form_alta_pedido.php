<?php
    if(isset($_SESSION["login"]))

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<title>Alta Pedido</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
			<a id="cerrar" href="#" class="button">Cerrar Sesión</a>
			<h2>Admin Panel Middle-Earth(Sevilla)</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a href="admin.php">Inicio</a>
			<a href="clientes.php">Clientes</a>
            <a href="empleados.php">Empleados</a>
			<a class="active" href="pedidos.php">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>
			<a href="reservas.php">Reservas</a>
			<a href="tickets.php">Tickets</a>
            </div>
        </div>
        <?php
            session_start();

            require_once("gestionBD.php");
            
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario["fecha"] = "";
                $formulario["id"] = "";
                $formulario["oid_u"] = "";
                
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
        
                <form class="altaPedido" method="get" action="validacion_alta_pedido.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="fecha">Fecha de Pedido<em>*</em></label>
                    <input class="fecha" name="fecha" type="date" title="Fecha en la que se realizó el pedido"
                    value="<?php echo @$formulario["fecha"];?>" required>
                    </div>

                    <div class="campos"><label for="id">ID<em>*</em></label>
                    <input class="id" name="id" type="text" placeholder="123456789" pattern="^[0-9]{9}" 
                    title="Nueve dígitos seguidos" value="<?php echo @$formulario["id"];?>" required>
                    </div>

                    <div class="campos"><label for="oid_u">OID_USUARIO<em>*</em></label>
                    <input class="oid_u" name="oid_u" type="number" title="OID del Usuario que realizó el pedido"
                    value="<?php echo @$formulario["oid_u"];?>">
                    </div>

                    <div class="botones"><input type="submit" value="Confirmar"/>
                    </div>
                </form>
            </section>    
            
            <?php 
                cerrarConexionBD($conexion);
            ?>
        
        </body>
    </body>
</html>