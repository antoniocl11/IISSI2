<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<script src="js/desp_imagenes.js" type="text/javascript"></script>
		<title>Admin Tickets</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
        <a id="cerrar" href="logout.php" class="button">Cerrar Sesión</a>
			<a id="pagina" href="index_dos.php" class="button">Ver Web</a>
			<h2>Admin Panel Middle-Earth</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a  href="admin.php">Inicio</a>
			<a href="clientes.php">Clientes</a>
            <a href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a  href="proveedores.php">Proveedores</a>
			<a href="reservas.php">Reservas</a>
			<a class="active" href="tickets.php">Tickets</a>
            </div>
        </div>
        
<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionar_tickets.php");
    require_once("paginacion_consulta.php");

    if(isset($_SESSION["ticket"])){
        $ticket = $_SESSION["ticket"];
        unset($_SESSION["ticket"]);
    }

    //Aqui comprobamos si venimos de cambiar de página o de haber seleccionado un registro
    //Tambien comprobamos si hay alguna sesión activa

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
    $query = 'SELECT * FROM TICKET';


    //Comprobamos el tamaño de página, página seleccionada y total de registros
    $total_registros = total_consulta($conexion,$query);
    //Total consulta es una funcion del scrip paginacion_consulta
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

<!--Script alerta para delete-->
<script type="text/javascript">
function confirmar_eliminar(){
    var respuesta= confirm ("¿Está seguro que deseas eliminar el Ticket?");

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
        <div class="botones" ><a href="form_alta_ticket.php">Nuevo Ticket</a></div>
        
        <div class="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a class="paginas" href="tickets.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="tickets.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando <!--Te pone el número de resultados que está mostrando y el total encontrado en la tabla-->
			<input id="PAG_TAM" name="PAG_TAM" type="number" 
				min="1" max="<?php echo $total_registros;?>" 
				value="<?php echo $pag_tam?>" autofocus="autofocus" /> 
            entradas de <?php echo $total_registros?>
            <!--Botón para cambiar el número de entradas que te muestra-->
			<div class="cambiarPagina"><input type="submit" value="Cambiar"></div>
		</form>
	</nav>

    <table >
			<tr>
                <th>Fecha</th>
				<th>Comentario</th>
                <th>OID_U</th>
                <th>OID_E</th>
                <th>¿Resuelto?</th>
                <th>Nombre</th>
                <th>Email</th>
				<th></th>
			</tr>
    
    <?php
        foreach($filas as $fila){
    ?>
        <tr><!--Muestra los datos recogidos de la base de datos en cada campo-->
                <td><?php echo $fila["FECHA"]?></td>
				<td><?php echo $fila["COMENTARIO"]?></td>
				<td><?php echo $fila["OID_U"]?></td>
                <td><?php echo $fila["OID_E"]?></td>
                <td><?php echo $fila["RESUELTO"]?></td>
                <td><?php echo $fila["NOMBRE"]?></td>
                <td><?php echo $fila["EMAIL"]?></td>
                
            <td>
                

                <form method="post" action="controlador_tickets.php">
                    
                        
                        <input id="OID_TICKET" name="OID_TICKET" type="hidden" value="<?php echo $fila["OID_TICKET"]; ?>"/>

                             
                <?php        
                    if(isset($ticket) and ($ticket["OID_TICKET"]== $fila["OID_TICKET"])){ ?>
                        <!--Editando los campos del GRID-->
                        <h5>Fecha: <input id="FECHA" name="FECHA" type="text" value="<?php echo $fila["FECHA"]; ?>" required/></h5>
                        <h5>Comentario: <textarea id="COMENTARIO" name="COMENTARIO" type="text" value="<?php echo $fila["COMENTARIO"]; ?>"required></textarea></h5>
                        <h5>OID_U: <input id="OID_U" name="OID_U" type="number" value="<?php echo $fila["OID_U"]; ?>"required/></h5>
                        <h5>OID_E: <input id="OID_E" name="OID_E" type="number" value="<?php echo $fila["OID_E"]; ?>"required/></h5>
                        <h5>¿Resuelto?: <input id="RESUELTO" name="RESUELTO" type="number" value="<?php echo $fila["RESUELTO"]; ?>"required/></h5>
                        <h5>Nombre: <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"required/></h5>
                        <h5>Email: <input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"]; ?>"required/></h5>

                <?php }  else { ?>
                
                    <input id="FECHA" name="FECHA" type="hidden" value="<?php echo $fila["FECHA"]; ?>"/>
                    <input id="COMENTARIO" name="COMENTARIO" type="hidden" value="<?php echo $fila["COMENTARIO"]; ?>"/>
                    <input id="OID_U" name="OID_U" type="hidden" value="<?php echo $fila["OID_U"]; ?>"/>
                    <input id="OID_E" name="OID_E" type="hidden" value="<?php echo $fila["OID_E"]; ?>"/>
                    <input id="RESUELTO" name="RESUELTO" type="hidden" value="<?php echo $fila["RESUELTO"]; ?>"/>
                    <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
                    <input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>

                    
                        
                    <?php } ?>

                    <div id="botones_fila">

                            <?php if (isset($ticket) and ($ticket["OID_TICKET"] == $ticket["OID_TICKET"])) { ?>
                                    
                                    <button id="grabar" name="grabar" type="submit" class="boton_grabar" onclick="return actualizado_correcto()">

                                        <img src="images/icono_guardar.png" class="editar_fila" alt="Guardar modificación">

                                    </button>

                                    <button id="atras" name="atras" type="button" class="boton_atras" >
                                    
                                    <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="link_atras">
                                    <img href="<?=$_SERVER["HTTP_REFERER"]?>" src="images/boton_atras.png" alt="Volver atrás">
                                    </a>
                                    <!--Esto lo que hace es volver atras en caso de que no se quiera editar nada--> 

                                    
                                    
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