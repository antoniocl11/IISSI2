<?php
require_once("gestionBD.php");
$conexion = crearConexionBD();
session_start();
include_once('esqueleto_web.php');
   headermain();
   footermain();
?>
<head>
    <script type="text/javascript" src="js/carousel.js"></script>   
    <link type="text/css" href="css/productos.css" rel="stylesheet">
</head>
<body>
<div id="carrusel">
            <h4 class="titulo_reservas">Elige un producto para reservar...</h4>
            <div class="contenedor1">
<?php
// Creamos la conexi�n con la BD.

	try {
		$stmt = $conexion->prepare('SELECT PRODUCTO.nombre, PRODUCTO.precio, FOTO.URL FROM producto INNER JOIN FOTO ON PRODUCTO.OID_PR=FOTO.OID_PR');
		$stmt->execute();

		$stmt->bindColumn('NOMBRE', $no);
		$stmt->bindColumn('PRECIO', $precio);
        $stmt->bindColumn('URL', $url);
		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			
            echo '<div class="productos">
                    <h5 class="titprod">' .$no . '</h5>
                    <a href="form_alta_reserva.php"><img class="imagenes" src="' . $url . '" ></img></a>
                    <p class="preciores">' . $precio . '€</p>
                    <p><button class="breserva">Reservar</button></p>
                  </div>';
			}
		
	} catch ( PDOException $e ){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}

?>
</div>
</body>