<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<script src="js/desp_imagenes.js" type="text/javascript"></script>
		<title>Pedidos</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
			<a id="cerrar" href="#" class="button">Cerrar Sesión</a>
			<h2>Admin Panel Middle-Earth(Sevilla)</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a  href="admin.php">Inicio</a>
			<a class="active" href="pedidos.php">Pedidos</a>
            <a href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>
			<a href="#">Reservas</a>
			<a href="#">Tickets</a>
            </div>
        </div>
<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionar_pedido.php");
    require_once("paginacion_consulta.php");

    if(isset($_SESSION["pedido"])){
        $pedido = $_SESSION["pedido"];
        unset($_SESSION["pedido"]);
    }

    /*Aqui comprobamos si venimos de cambiar de página o de haber seleccionado un registro
    Tambien comprobamos si hay alguna sesión activa */
    if(isset($_SESSION["paginacion"])) $paginacion = $_SESSION["paginacion"];
    $pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:
                                    (isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);

    $pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:
                                    (isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5); //Declaro la cantidad de datos que me mostrará la paginacion

    if($pagina_seleccionada < 1) $pagina_seleccionada = 1;
    if($pag_tam < 1) $pag_tam = 5;

    //Eliminamos varibles de sesion
    unset($_SESSION["paginacion"]);
    $conexion = crearConexionBD();

    //consulta a la base de datos que ha de paginarse
    $query = 'SELECT * FROM PEDIDO';

    //Comprobamos el tamaño de página, página seleccionada y total de registros
    $total_registros = total_consulta($conexion,$query);

    //Total consulta es una funcion del script paginacion_consulta
	$total_paginas = (int) ($total_registros / $pag_tam);
    
    if ($total_registros % $pag_tam > 0) {
        $total_paginas++; 
    }
    if ($pagina_seleccionada > $total_paginas) {
        $pagina_seleccionada = $total_paginas;
    }
    
    //Valores de sesión para página e intervalo para volver a ella después de una operación
    $paginacion["PAG_NUM"] = $pagina_seleccionada;
    $paginacion["PAG_TAM"] = $pag_tam;
    $_SESSION["paginacion"] = $paginacion;

    //Declaro variable fila
    $filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);

    cerrarConexionBD($conexion);
?>
<main>
<nav>
		<div id="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a href="pedidos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		<form method="get" action="pedidos.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando <!--Te pone el número de resultados que está mostrando y el total encontrado en la tabla-->
			<input id="PAG_TAM" name="PAG_TAM" type="number" 
				min="1" max="<?php echo $total_registros;?>" 
				value="<?php echo $pag_tam?>" autofocus="autofocus" /> 
            entradas de <?php echo $total_registros?>
            <!--Botón para cambiar el número de valores que te muestra-->
			<div class="botones"><input type="submit" value="Cambiar"></div>
		</form>
	</nav>

    <table >
			<tr>
                <th>ID_U</th>
                <th>Fecha</th>
				<th></th>
			</tr>
    <?php
        foreach($filas as $fila){
    ?>
        <tr><!--Muestra los datos recogidos de la base de datos en cada campo-->
                <td><?php echo $fila["ID"]?></td>
                <td><?php echo $fila["Fecha"]?></td>
                <th></th>
        </tr>
            <?php } ?>
        </main>
    </body>
</html>