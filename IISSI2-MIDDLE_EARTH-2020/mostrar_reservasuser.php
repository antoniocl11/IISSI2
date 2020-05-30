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
		$stmt = $conexion->prepare('SELECT PRODUCTO.Nombre, PRODUCTO.Precio, Reserva.OID_U, Reserva.ID, Reserva.FECHA, Reserva.TENTREGADO FROM Producto INNER JOIN Reserva ON Reserva.OID_U = :iduser');
		$stmt->bindParam(':iduser', $_SESSION['id']);
		$stmt->execute();

		$stmt->bindColumn('NOMBRE', $nombre);
		$stmt->bindColumn('PRECIO', $precio);
		$stmt->bindColumn('FECHA', $fechares);
		$stmt->bindColumn('TENTREGADO', $tentregado);
		$stmt->bindColumn('ID', $resid);
		
		if (!isset($nombre)) {
			echo '&#9888;&nbspNinguna reserva... de momento.&nbsp&#9888;';
		} else {
			while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
				echo '<b>&#9733;&nbspProducto:&nbsp</b>'. $nombre .'<b>-- Precio:&nbsp</b>'. $precio . '<b>-- Fecha:&nbsp</b>'. $fecha . '<b>-- Total Entregado:&nbsp</b>'. $tentregado . '<b>-- ID Reserva:&nbsp</b>'. $resid;
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