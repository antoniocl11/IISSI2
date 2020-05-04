<?php
session_start();

// Creamos la conexión con la BD.
require_once("gestionBD.php");

$conexion = crearConexionBD();

// Comprobamos que los datos del form del login se han enviado.
if (!isset($_POST['email'], $_POST['password'])) {
	exit('Introduce email y usuario.');
}

if($stmt = $conexion->prepare('SELECT OID_U,contrasena FROM usuario WHERE email = :usuari')) {
	try {
	$stmt->bindParam(':usuari', $_POST['email']);
	$stmt->execute();
	//$stmt->store_result();
	} catch ( PDOException $e ){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
	//$stmt->bind_result($id, $password);
	$stmt->bindColumn('OID_U', $id);
	$stmt->bindColumn('CONTRASENA', $password);	
	while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
      $data = $password;
    }
	// La cuenta existe, verificamos contraseña. 
	if ($_POST['password'] == $password) {
		// Verificación completa
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['email'];
		$_SESSION['id'] = $id;
		//header('Location: perfil_user.php');
		echo 'Bienvenido,' . $_SESSION['name'];
		header("Location: index_dos.php");
	} else {
		header('Location: login.html');
	}
} else {
	echo 'Nombre de usuario incorrecto!';
}

?>