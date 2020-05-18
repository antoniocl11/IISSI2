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
		<title>Admin Empleados</title>
	</head>
	<body>
		<div class = "topnav" id ="titulo">
        <a id="cerrar" href="#" class="button">Cerrar Sesión</a>
        <a id="pagina" href="index_dos.php" class="button">Ver Web</a>
			<h2>Admin Panel Middle-Earth</h2>
		</div>
		<div class="topnav" id = "menu">
            <div class="dentroMenu">
			<a href="admin.php">Inicio</a>
			<a href="clientes.php">Clientes</a>
            <a class="active" href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>
			<a href="reservas.php">Reservas</a>
			<a href="#">Tickets</a>
            </div>
        </div>
        
		<?php
			session_start();
			require_once("gestionBD.php");
			require_once("gestionar_empleados.php");
    		require_once("paginacion_consulta.php");

    if(isset($_SESSION["empleado"])){
        $empleado = $_SESSION["empleado"];
        unset($_SESSION["empleado"]);
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
    $query = 'SELECT * FROM EMPLEADO';


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
    var respuesta= confirm ("¿Está seguro que deseas eliminar el Empleado?");

    if (respuesta == true){
        return true;
    }

    else{
        return false;
    }
}
</script>
<!------------------------------------------------------------->
<!--Script alerta para actualizado-->
<script>
function actualizado_correcto(){
    var respuesta=alert("Empleado modificado correctamente");
    print_r(respuesta);
    
}
</script>

<main>
<nav>
        <div class="botones" ><a href="form_alta_empleado.php">Nuevo empleado</a></div>
        
        <div class="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a class="paginas" href="empleados.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="empleados.php">
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
				<th>ID</th>
                <th>NIF</th>
				<th>Nombre</th>
                <th>Apellidos</th>
				<th>Turno</th>
				<th>Sueldo</th>
				<th></th>
			</tr>
    
    <?php
        foreach($filas as $fila){
    ?>
        <tr><!--Muestra los datos recogidos de la base de datos en cada campo-->
                <td><?php echo $fila["ID"]?></td>
				<td><?php echo $fila["NIF"]?></td>
				<td><?php echo $fila["NOMBRE"]?></td>
                <td><?php echo $fila["APELLIDOS"]?></td>
				<td><?php echo $fila["TURNO"]?></td>
				<td><?php echo $fila["SUELDO"]?></td>
            <td>
            <form method="post" action="controlador_empleados.php">
                    
                        
                    <input id="OID_E" name="OID_E" type="hidden" value="<?php echo $fila["OID_E"]; ?>"/>

                         
            <?php        
                if(isset($empleado) and ($empleado["OID_E"]== $fila["OID_E"])){ ?>
                    <!--Editando los campos del GRID-->
                    <h5>ID: <input id="ID" name="ID" type="number" value="<?php echo $fila["ID"]; ?>"required/></h5>
                    <h5>NIF: <input id="NIF" name="NIF" type="text" value="<?php echo $fila["NIF"]; ?>"required/></h5>
                    <h5>Nombre: <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"required/></h5>
                    <h5>Apellidos: <input id="APELLIDOS" name="APELLIDOS" type="text" value="<?php echo $fila["APELLIDOS"]; ?>"required/></h5>
                    <h5>Turno: <input id="TURNO" name="TURNO" type="text" value="<?php echo $fila["TURNO"]; ?>"required/></h5>
                    <h5>Sueldo: <input id="SUELDO" name="SUELDO" type="text" value="<?php echo $fila["SUELDO"]; ?>"required/></h5>

            <?php }  else { ?>
            
                    <input id="ID" name="ID" type="hidden" value="<?php echo $fila["ID"]; ?>"/>
                    <input id="NIF" name="NIF" type="hidden" value="<?php echo $fila["NIF"]; ?>"/>
                    <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
                    <input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $fila["APELLIDOS"]; ?>"/>
                    <input id="TURNO" name="TURNO" type="hidden" value="<?php echo $fila["TURNO"]; ?>"/>
                    <input id="SUELDO" name="SUELDO" type="hidden" value="<?php echo $fila["SUELDO"]; ?>"/>

                
                    
                <?php } ?>

                <div id="botones_fila">

                        <?php if (isset($empleado) and ($empleado["OID_E"] == $empleado["OID_E"])) { ?>
                                
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


    </body>
</html>
