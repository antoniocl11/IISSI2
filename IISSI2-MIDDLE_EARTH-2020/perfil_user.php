<?php
// Creamos la conexian con la BD.
require_once("gestionBD.php");
include_once('esqueleto_web.php');
$conexion = crearConexionBD();
session_start();
// Si el usuario no esta logeado, redirige a la pantalla de login.
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
} else {
	try {
		$stmt = $conexion->prepare('SELECT * FROM usuario WHERE OID_U = :iduser');
		$stmt->bindParam(':iduser', $_SESSION['id']);
		$stmt->execute();

		$stmt->bindColumn('NOMBRE', $no);
		$stmt->bindColumn('APELLIDOS', $ap);
		$stmt->bindColumn('TELEFONO', $tele);
		$stmt->bindColumn('ESSOCIO', $soci);
		$stmt->bindColumn('DIRECCION', $dire);
		$stmt->bindColumn('FECHANACIMIENTO', $fechana);

		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			$nom = $no;
			$ape = $ap;
			$telef = $tele;
			$direc = $dire;
			$fechanac = $fechana;

			if ($soci == 0) {
				$socio = 'No';
			} else {
				$socio = 'Si';
			}
		}
	} catch ( PDOException $e ){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
	//$stmt->bind_result($id, $password);
	
}



   headermain();
   footermain();
?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Middle Earth</title>
        <link type="text/css" href="css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para detectar el tamaño de pantalla-->
        <script type="text/javascript" src="js/javascript.js"></script>
        <script src="https://kit.fontawesome.com/b3de7dbd0c.js" crossorigin="anonymous"></script>
	</head>
<body>
	<div class="profile-box">
	<a href="https://www.youtube.com/watch?v=Bautq-iiTlg">
		<img class="profilepic" src="images/roundgandalf.png">
	</a>
				<table>
					<tr>
						<td>&#128100;&nbsp;&nbsp;  </td>
						<td><?=$nom?></td>
					</tr>
					<tr>
						<td>&#9782;  </td>
						<td><?=$ape?></td>
					</tr>
					<tr>
						<td>&#9993;  </td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>&#9742;  </td>
						<td><?=$telef?></td>
					</tr>
					<tr>
						<td>&#10162;  </td>
						<td><?=$direc?></td>
					</tr>
					<tr>
						<td>&#10070;  </td>
						<td><?=$fechanac?></td>
					</tr>
					<tr>
						<td>&#9876;  </td>
						<td><?=$socio?></td>
					</tr>
				</table>
				<button id="btnres" style="text-align:center;background-color:#007ac3;"><a onclick="mostrarReservas()" style="color:white;padding:6px;font-weight:500;">Mostrar reservas</a></button>
				<div style="height:100px;" id="ajaxtry"></div>
				<?php
				// BOTON ADMIN PANEL
				if($_SESSION['name'] == 'admin@middleearth.es') {
					echo '<button><a style="background-color:red;color:white;padding:3px;" href="admin.php">Panel Administrador</a></button>';
				}

				?>
				
	</div>
</body>


<script>


function mostrarReservas() {
  var xhttp;
		if (document.getElementById("ajaxtry").innerHTML != ""){
			document.getElementById("btnres").style.backgroundColor = "#007ac3";
			document.getElementById("ajaxtry").innerHTML = "";
	} else {
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() { 
	if (this.readyState == 4 && this.status == 200) {
    document.getElementById("ajaxtry").innerHTML = this.responseText;
    }
  };
  document.getElementById("btnres").style.backgroundColor = "red";
  xhttp.open("GET", "mostrar_reservasuser.php", true);
  xhttp.send();
   ;}
}
</script>





</html>