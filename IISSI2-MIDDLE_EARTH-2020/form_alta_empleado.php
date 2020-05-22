<?php
    if(isset($_SESSION["login"]))
    error_reporting(E_ERROR|E_WARNING|E_PARSE);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
        <script type="text/javascript" src="js/validacion_alta_empleado.js"></script>
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
			<a href="clientes.php">Clientes</a>
            <a class="active" href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
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
                $formulario["id"] = "";
                $formulario["nif"] = "";
                $formulario["nombre"] = "";
                $formulario["apellidos"] = "";
                $formulario["turno"] = "";
                $formulario["sueldo"] = "";

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
            
                <form class="altaEmpleado" method="get" action="validacion_alta_empleado.php">
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="id">ID<em>*</em></label>
                    <input id="id" name="id" type="number" class="id" placeholder="9 dígitos numéricos"
                    title="El ID asociado debe contener 9 dígitos numéricos" value="<?php echo @$formulario["id"];?>" 
                    oninput="validacion_id()"><!--required Quitado para probar validacion js-->
                    </div>
                    <div class="campos"><label for="nif">NIF<em>*</em></label>
                    <input id="nif" class="nif" name="nif" type="text" placeholder="12345678X" 
                    title="Ocho dígitos seguidos de una letra mayúscula" value="<?php echo @$formulario["nif"];?>"
                    oninput="validacion_nif()"><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input id="nombre" name="nombre" type="text" size="25"  value="<?php echo @$formulario["nombre"];?>" 
                    oninput="validacion_nombre()"><!--required Quitado para probar validacion js-->
                    </div>

                    <div class="campos"><label for="apellidos">Apellidos<em>*</em></label>
                    <input id="apellidos" name="apellidos" type="text"   value="<?php echo @$formulario["apellidos"];?>" 
                    oninput="validacion_apellidos()"><!--required Quitado para probar validacion js-->
                    </div>

                    <div class="campos"><label for="turno">Turno<em>*</em></label>
                    <input id="turno" type="text" name="turno" placeholder="M(Mañana) o T(Tarde) o P(Parcial)" 
                    value="<?php echo @$formulario["turno"];?>">
                    <!--required Quitado para probar validacion js-->
                    </div>

                    <div class="campos"><label for="sueldo">Sueldo<em>*</em></label>
                    <input id="sueldo" type="text" name="sueldo" value="<?php echo @$formulario["sueldo"];?>" 
                    oninput="validacion_sueldo()"><!--required Quitado para probar validacion js-->
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