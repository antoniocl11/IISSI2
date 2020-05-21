<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/adminStyles.css" />
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
		<script src="js/desp_imagenes.js" type="text/javascript"></script>
		<title>Admin Clientes</title>
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
			<a class="active" href="clientes.php">Clientes</a>
            <a href="empleados.php">Empleados</a>
			<a href="pedidos.php">Pedidos</a>	
			<a href="proveedores.php">Proveedores</a>
			<a href="reservas.php">Reservas</a>
			<a href="tickets.php">Tickets</a>
            </div>
        </div>
<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionar_usuario.php");
    require_once("paginacion_consulta.php");

    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
        unset($_SESSION["usuario"]);
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
    $query = 'SELECT * FROM USUARIO';

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

<!--Script alerta para delete-->
<script type="text/javascript">
function confirmar_eliminar(){
    var respuesta= confirm ("¿Está seguro que deseas eliminar el Cliente?");

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
    var respuesta=alert("Cliente modificado correctamente");
    print_r(respuesta);
    
}
</script>


<main>
<nav>
    <div class="botones" ><a href="form_alta_usuario.php">Nuevo cliente</a></div>
		<div class="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a class="paginas" href="clientes.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		<form method="get" action="clientes.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando <!--Te pone el número de resultados que está mostrando y el total encontrado en la tabla-->
			<input id="PAG_TAM" name="PAG_TAM" type="number" 
				min="1" max="<?php echo $total_registros;?>" 
				value="<?php echo $pag_tam?>" autofocus="autofocus" /> 
            entradas de <?php echo $total_registros?>
            <!--Botón para cambiar el número de valores que te muestra-->
			<div class="cambiarPagina"><input type="submit" value="Cambiar"></div>
		</form>
	</nav>

    <table >
			<tr>
                <th>NIF</th> 
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>EsSocio</th>
                <th>Dirección</th>
                <th>FechaNacimiento</th>
                <th>Contraseña</th>
				<th></th>
			</tr>
    <?php
        foreach($filas as $fila){
    ?>
        <tr><!--Muestra los datos recogidos de la base de datos en cada campo-->
				<td><?php echo $fila["NIF"]?></td>
				<td><?php echo $fila["NOMBRE"]?></td>
                <td><?php echo $fila["APELLIDOS"]?></td>
                <td><?php echo $fila["EMAIL"]?></td>
                <td><?php echo $fila["TELEFONO"]?></td>
                <td><?php echo $fila["ESSOCIO"]?></td>
                <td><?php echo $fila["DIRECCION"]?></td>
                <td><?php echo $fila["FECHANACIMIENTO"]?></td>
                <td><?php echo $fila["CONTRASENA"]?></td>
                <td>
                <form method="post" action="controlador_clientes.php">
                    
                        
                    <input id="OID_U" name="OID_U" type="hidden" value="<?php echo $fila["OID_U"]; ?>"/>

                         
                        <?php        
                            if(isset($usuario) and ($usuario["OID_U"]== $fila["OID_U"])){ ?>
                                <!--Editando los campos del GRID-->
                                <h5>NIF: <input id="NIF" name="NIF" type="text" value="<?php echo $fila["NIF"]; ?>"required/></h5>
                                <h5>Nombre: <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"required/></h5>
                                <h5>Apellidos: <input id="APELLIDOS" name="APELLIDOS" type="text" value="<?php echo $fila["APELLIDOS"]; ?>"required/></h5>
                                <h5>E-mail: <input id="EMAIL" name="EMAIL" type="text" value="<?php echo $fila["EMAIL"]; ?>"required/></h5>
                                <h5>Teléfono: <input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $fila["TELEFONO"]; ?>"required/></h5>
                                <h5>Es Socio: <input id="ESSOCIO" name="ESSOCIO" type="number" value="<?php echo $fila["ESSOCIO"]; ?>"required/></h5>
                                <h5>Dirección: <input id="DIRECCION" name="DIRECCION" type="text" value="<?php echo $fila["DIRECCION"]; ?>"required/></h5>
                                <h5>Fecha Nacimiento: <input id="FECHANACIMIENTO" name="FECHANACIMIENTO" type="text" value="<?php echo $fila["FECHANACIMIENTO"]; ?>"required/></h5>
                                <h5>Contraseña: <input id="CONTRASENA" name="CONTRASENA" type="text" value="<?php echo $fila["CONTRASENA"]; ?>"required/></h5>

                             

                        <?php }  else { ?>
                        
                            <input id="NIF" name="NIF" type="hidden" value="<?php echo $fila["NIF"]; ?>"/>
                            <input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
                            <input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $fila["APELLIDOS"]; ?>"/>
                            <input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>
                            <input id="TELEFONO" name="TELEFONO" type="hidden" value="<?php echo $fila["TELEFONO"]; ?>"/>
                            <input id="ESSOCIO" name="ESSOCIO" type="hidden" value="<?php echo $fila["ESSOCIO"]; ?>"/>
                            <input id="DIRECCION" name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"]; ?>"/>
                            <input id="FECHANACIMIENTO" name="FECHANACIMIENTO" type="hidden" value="<?php echo $fila["FECHANACIMIENTO"]; ?>"/>
                            <input id="CONTRASENA" name="CONTRASENA" type="hidden" value="<?php echo $fila["CONTRASENA"]; ?>"/>
                
                    
                <?php } ?>

                <div id="botones_fila">

                        <?php if (isset($usuario) and ($usuario["OID_U"] == $usuario["OID_U"])) { ?>
                                
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

                                   <img src="images/icono_editar.png" class="editar_fila" alt="Editar cliente">

                                </button>

                                

                        <?php } ?>

                            <button id="borrar" name="borrar" type="submit" class="boton_borrar" onclick="return confirmar_eliminar()">

                                <img src="images/icono_borrar.png" class="editar_fila" alt="Borrar cliente">

                            </button>

                </div>
                        
            </form>
                
                </td>
        </tr>
            <?php } ?>
            
        </main>
    </body>
</html>