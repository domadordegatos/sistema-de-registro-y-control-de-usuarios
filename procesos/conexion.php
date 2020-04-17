

<?php
	function conexion(){
		return $conexion=mysqli_connect("localhost","sharset","2pzVR4zjez3qSFMy","registro_control");
		mysqli_set_charset($conexion,"utf8");
    // mysqli_close($conexion);
	}

 ?>
