<?php
    if(isset($_SESSION["login"]))

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<script src="js/desp_imagenes.js" type="text/javascript"></script>
		<title>Admin Middle-Earth</title>
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
            <a href="empleados.php">Empleados</a>
			<a href="#">Pedidos</a>	
			<a href="#">Proveedores</a>
			<a href="#">Reservas</a>
			<a href="#">Tickets</a>
            </div>
        </div>
        <div>Continuar aquí</div>
    </body>
</html>
