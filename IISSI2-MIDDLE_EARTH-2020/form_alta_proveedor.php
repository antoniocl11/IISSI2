<?php
    if(isset($_SESSION["login"]))

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
        <script type="text/javascript" src="js/validacion_alta_proveedor.js"></script>
        <script>
        $(document).ready(funtion()){ //LLamamos a la funcion validacion proveedor para que salte las validaciones
                                    //en servidor si tenemos en cliente
            $("#altaProveedor").on("submit", function(){
                return validacionProveedor();
            });
        }

</script>
		<title>Alta Proveedor</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
			<a id="cerrar" href="logout.php" class="button">Cerrar Sesión</a>
			<h2>Admin Panel Middle-Earth(Sevilla)</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a href="admin.php">Inicio</a>
			<a href="clientes.php">Clientes</a>
            <a href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a class="active" href="proveedores.php">Proveedores</a>
			<a href="reservas.php">Reservas</a>
			<a href="tickets.php">Tickets</a>
            </div>
        </div>
        <?php
            session_start();
            
            require_once("gestionBD.php");
            //Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
            if(!isset($_SESSION["formulario"])){
                $formulario["cif"] = "";
                $formulario["nombre"] = "";
                $formulario["telefono"] = "";
                $formulario["direccion"] = "";
 

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
        
                <form id="altaProveedor" method="get" action="validacion_alta_proveedor.php" >
                    
                    <p class="campos">
                        <i>Los campos obligatorios están marcados con </i><em>*</em>
                    </p>

                    <div class="campos"><label for="cif">CIF<em>*</em></label>
                    <input id="cif" class="cif" name="cif" type="text" placeholder="X12345678" 
                    title="Una letra mayúscula seguida de 8 dígitos numéricos" value="<?php echo @$formulario["cif"];?>"
                    oninput="validacion_cif()" ><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="nombre">Nombre<em>*</em></label>
                    <input id="nombre" class="nombre" name="nombre" type="text" size="25"  value="<?php echo @$formulario["nombre"];?>"
                    oninput="validacion_nombre()" ><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="telefono">Teléfono<em>*</em></label>
                    <input id="telefono" type="number"  class="telefono" name="telefono" value="<?php echo @$formulario["telefono"];?>" 
                    oninput="validacion_telefono()"><!--required Quitado para probar validaciones js-->
                    </div>

                    <div class="campos"><label for="direccion">Dirección<em>*</em></label>
                    <input id="direccion" class="direccion" name="direccion" type="text"   value="<?php echo @$formulario["direccion"];?>" 
                    oninput="validacion_direccion()"><!--required Quitado para probar validaciones js-->
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