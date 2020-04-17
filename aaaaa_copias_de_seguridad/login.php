<?php
	require_once "conexion.php";
	$conexion=conexion();

		$Usuario=$_POST['username'];
		$Clave=$_POST['pass'];

		$sql="SELECT * from administradores where usuario='$Usuario'
		       and password='$Clave' and state = '1'";
		$result=mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result)>0){
		echo 1;
	 }else{
		 echo 0;
	 }
 ?>
