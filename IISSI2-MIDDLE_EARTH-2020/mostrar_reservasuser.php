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
		$stmt = $conexion->prepare('SELECT FECHA, PRODUCTO, EMAIL FROM RESERVA WHERE EMAIL = :correouser');
		$stmt->bindParam(':correouser', $_SESSION['name']);
		$stmt->execute();

		$stmt->bindColumn('FECHA', $fecha);
		$stmt->bindColumn('PRODUCTO', $producto);
		$stmt->bindColumn('EMAIL', $email);

		if (empty($stmt->fetch(PDO::FETCH_BOUND))) {
						echo '&#9888;&nbspNinguna reserva... de momento.&nbsp&#9888;';
					} else {


				while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
					echo '<b>&#9733;&nbsp&nbsp</b>'. $producto .'<b>&nbsp&nbsp  &#x1f4c5;&nbsp&nbsp&nbsp</b>'. $fecha . '<br />';
				}
		}
	} catch ( PDOException $e ){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
	//$stmt->bind_result($id, $password);
	
}
?>