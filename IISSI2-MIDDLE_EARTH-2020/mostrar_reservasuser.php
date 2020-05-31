<?php
// Creamos la conexian con la BD.
require_once("gestionBD.php");
$conexion = crearConexionBD();
session_start();
// Si el usuario no esta logeado, redirige a la pantalla de login.
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
} else {
	try {
		$stmt = $conexion->prepare('SELECT PRODUCTO.Nombre, PRODUCTO.Precio, Reserva.OID_U,  Reserva.FECHA, Reserva.PRODUCTO, Reserva.EMAIL, Reserva.NOMBRE FROM Producto INNER JOIN Reserva ON Reserva.OID_U = :nombreuser');
		$stmt->bindParam(':nombreuser', $_SESSION['oid_u']);
		$stmt->execute();

		$stmt->bindColumn('FECHA', $fecha);
		$stmt->bindColumn('PRODUCTO', $producto);
		$stmt->bindColumn('EMAIL', $email);
		$stmt->bindColumn('NOMBRE', $nombre);
		
		
		if (!isset($producto)) {
			echo '&#9888;&nbspNinguna reserva... de momento.&nbsp&#9888;';
		} else {
			while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
				echo '<b>&#9733;&nbspProducto:&nbsp</b>'. $producto .'<b>-- Fecha:&nbsp</b>'. $fecha . '<b>-- Email:&nbsp</b>'. $email . '<b>-- Nombre:&nbsp</b>'. $nombre ;
				echo 'Todo va bien!';
				}
		}
	} catch ( PDOException $e ){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
	//$stmt->bind_result($id, $password);
	
}
?>