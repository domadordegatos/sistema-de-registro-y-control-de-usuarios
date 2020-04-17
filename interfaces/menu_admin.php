<?php
	session_start();
	if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    require_once "../procesos/conexion.php";
    $conexion=conexion();
 ?>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>R&C Menu</title>
      <link rel="stylesheet" href="../diseño/cssmenuadmin.css">
      <link rel="icon" type="image/png" href="../diseño/imagenes/ico.png" />
</head>
<body>
	<header>
		<div class='swanky'>
			<div class='swanky_title'>
			<div class='swanky_wrapper'>

				<input id='inicio' name='radio' type='radio'>
				<label for='inicio'>
					<img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/mess.png'>
					<a href="./inicio.php" style="text-decoration:none; color: inherit;"><span>Inicio</span></a>
				</label>

				<input id='Dashboard' name='radio' type='radio'>
				<label for='Dashboard' id="label">
					<img style="filter: invert(0.99); width:1.4rem;" src="https://i.ibb.co/3hsswpT/result-1.png" alt="" border="0">
					<span>Funcionalidades de registro</span>
					<div class='lil_arrow'></div>
					<div class='bar'></div>
					<div class='swanky_wrapper__content'>
						<ul>
							<a href="./ingresocarnet.php" style="text-decoration:none; color: inherit;"><li>Centuria</li></a>
							<li>Laboratorios</li>
							<li>Biblioteca</li>
						</ul>
					</div>
				</label>

				<input id='Sales' name='radio' type='radio'>
				<label for='Sales' id="label">
					<img style="width:1.4rem;" src="https://i.ibb.co/YdzLkKb/result-2.png" alt="result-2" border="0">
					<span>Reporte Modulos</span>
					<div class='lil_arrow'></div>
					<div class='bar'></div>
					<div class='swanky_wrapper__content'>
						<ul>
							<a href="./generar_reportes.php" style="text-decoration:none; color: inherit;"><li>Generar Reportes Centuria</li></a>
							<a href="./descargar_reportes.php" style="text-decoration:none; color: inherit;"><li>Descargar Reportes Centuria</li></a>
							<a href="./registro_actualizacion.php" style="text-decoration:none; color: inherit;"><li>Actualizacion y Registro</li></a>
						</ul>
					</div>
				</label>

				<input id='hola' name='radio' type='radio'>
				<label for='hola' id="label">
					<img style="width:1.4rem;" src="https://i.ibb.co/YdzLkKb/result-2.png" alt="result-2" border="0">
					<span>Reporte Aulas</span>
					<div class='lil_arrow'></div>
					<div class='bar'></div>
					<div class='swanky_wrapper__content'>
						<ul>
							<a href="./generar_reportes_aulas.php" style="text-decoration:none; color: inherit;"><li>Generar Reportes Aulas</li></a>
							<a href="./descargar_reportes_aulas.php" style="text-decoration:none; color: inherit;"><li>Descargar Reportes Aulas</li></a>
						</ul>
					</div>
				</label>

				<input id='Messages' name='radio' type='radio'>
				<label for='salir' id="label">
					<img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/mess.png'>
					<a href="../procesos/salir.php" style="text-decoration:none; color: inherit;"><span>Log Out</span></a>
				</label>

			</div>
		</div>

	</header>
<div class='love'>
  <p>Hecho por<img src="https://i.ibb.co/XzbJv7j/03a8817a066a6ad204a07af76bc2e680.png" alt="03a8817a066a6ad204a07af76bc2e680" border="0"></a> by  Neyder Neme</p>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
<?php
} else {
	header("location:../interfaces/login.php");
	}
?>
