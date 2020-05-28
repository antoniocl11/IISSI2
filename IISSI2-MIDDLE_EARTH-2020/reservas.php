<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<script src="js/desp_imagenes.js" type="text/javascript"></script>
		<title>Admin Reservas</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
        <a id="cerrar" href="#" class="button">Cerrar Sesión</a>
			<a id="pagina" href="index_dos.php" class="button">Ver Web</a>
			<h2>Admin Panel Middle-Earth</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a  href="admin.php">Inicio</a>
			<a href="clientes.php">Clientes</a>
                        <a href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>	
			<a class="active" href="reservas.php">Reservas</a>
			<a href="tickets.php">Tickets</a>
            </div>
        </div>
        
<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionar_reserva.php");
    require_once("paginacion_consulta.php");

    if(isset($_SESSION["reserva"])){
        $reserva = $_SESSION["reserva"];
        unset($_SESSION["reserva"]);
    }


    if(isset($_SESSION["paginacion"])) $paginacion = $_SESSION["paginacion"];
    $pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:
                                    (isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);

    $pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:
                                    (isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5); 

    if($pagina_seleccionada < 1) $pagina_seleccionada = 1;
    if($pag_tam < 1) $pag_tam = 5;

   
    unset($_SESSION["paginacion"]);

    $conexion = crearConexionBD();

    $query = 'SELECT * FROM RESERVA';


    $total_registros = total_consulta($conexion,$query);
    
	$total_paginas = (int) ($total_registros / $pag_tam);
    
    if ($total_registros % $pag_tam > 0) {
        $total_paginas++; 
    }
    if ($pagina_seleccionada > $total_paginas) {
        $pagina_seleccionada = $total_paginas;
    }
    
    
    $paginacion["PAG_NUM"] = $pagina_seleccionada;
    $paginacion["PAG_TAM"] = $pag_tam;
    $_SESSION["paginacion"] = $paginacion;

    
    $filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);

    cerrarConexionBD($conexion);
?>

<!--Script alerta para delete-->
<script type="text/javascript">
function confirmar_eliminar(){
    var respuesta= confirm ("¿Está seguro que deseas eliminar la reserva?");

    if (respuesta == true){
        return true;
    }

    else{
        return false;
    }
}
</script>


<main>
<nav>
        <div class="botones" ><a href="form_alta_reserva.php">Nueva reserva</a></div>
        
        <div class="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a class="paginas" href="reservas.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="reservas.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando 
			<input id="PAG_TAM" name="PAG_TAM" type="number" 
				min="1" max="<?php echo $total_registros;?>" 
				value="<?php echo $pag_tam?>" autofocus="autofocus" /> 
            entradas de <?php echo $total_registros?>
            
			<div class="cambiarPagina"><input type="submit" value="Cambiar"></div>
		</form>
	</nav>

    <table >
			<tr>
                <th>Fecha</th>
				<th>Producto</th>
                <th>Email</th>
				<th>Nombre</th>
				<th></th>
			</tr>
    
    <?php
        foreach($filas as $fila){
    ?>
        <tr>
                <td><?php echo $fila["FECHA"]?></td>
				<td><?php echo $fila["PRODUCTO"]?></td>
				<td><?php echo $fila["EMAIL"]?></td>
                <td><?php echo $fila["NOMBRE"]?></td>
            <td>
                

                <form method="post" action="controlador_reserva.php">
                    
                        
                        <input id="OID_RES" name="OID_RES" type="hidden" value="<?php echo $fila["OID_RES"]; ?>"/>

                             
                <?php        
                    if(isset($reserva) and ($reserva["OID_RES"]== $fila["OID_RES"])){ ?>
                        
                        <h5>Fecha: <input id="FECHA" name="FECHA" type="text" value="<?php echo $fila["FECHA"]; ?>" required/></h5>
                        <h5>Producto: <input id="PRODUCTO" name="PRODUCTO" type="text" value="<?php echo $fila["PRODUCTO"]; ?>"required/></h5>
                        <h5>Email: <input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"]; ?>"required/></h5>
                        <h5>Nombre: <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"required/></h5>

                <?php }  else { ?>
                
                    <input id="FECHA" name="FECHA" type="hidden" value="<?php echo $fila["FECHA"]; ?>"/>
                    <input id="PRODUCTO" name="PRODUCTO" type="hidden" value="<?php echo $fila["PRODUCTO"]; ?>"/>
                    <input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>
                    <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>

                    
                        
                    <?php } ?>

                    <div id="botones_fila">

                            <?php if (isset($reserva) and ($reserva["OID_RES"] == $reserva["OID_RES"])) { ?>
                                    
                                    <button id="grabar" name="grabar" type="submit" class="boton_grabar" onclick="return actualizado_correcto()">

                                        <img src="images/icono_guardar.png" class="editar_fila" alt="Guardar modificación">

                                    </button>

                                    <button id="atras" name="atras" type="button" class="boton_atras" >
                                    
                                    <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="link_atras">
                                    <img href="<?=$_SERVER["HTTP_REFERER"]?>" src="images/boton_atras.png" alt="Volver atrás">
                                    </a>
                                    

                                    
                                    
                                </button>

                            <?php } else { ?>
                                    
                                    <button id="editar" name="editar" type="submit" class="boton_editar">

                                       <img src="images/icono_editar.png" class="editar_fila" alt="Editar libro">

                                    </button>

                                    

                            <?php } ?>

                                <button id="borrar" name="borrar" type="submit" class="boton_borrar" onclick="return confirmar_eliminar()">

                                    <img src="images/icono_borrar.png" class="editar_fila" alt="Borrar libro">

                                </button>

                    </div>
                            
                </form>
            </td>
        </tr>

                    
        <?php } ?>
        </table>
        </main>
    </body>
</html>
