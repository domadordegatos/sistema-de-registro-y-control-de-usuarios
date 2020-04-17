<?php
require_once "conexion.php";
$conexion=conexion();
$codigo=$_POST['form1'];
$modulo=$_POST['form2'];
$acti=$_POST['form3'];
$acti_esp=$_POST['form4'];
date_default_timezone_set('America/Mexico_City');
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');

     $sqll = "SELECT * from usuarios_registrados where documento_cc='$codigo' AND carrera = 'c13'";
              $result = mysqli_query($conexion, $sqll); //validamos que el usuario sea administrativo

     if (mysqli_num_rows($result)>0) {// existe el administrativo
      $sql="SELECT registro_actividad.movimiento, usuarios_registrados.iduser from registro_actividad
			       JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_actividad.documento
			       WHERE usuarios_registrados.documento_cc = '$codigo'
             ORDER BY registro_actividad.idregistro DESC LIMIT 0,1";
             $result1=mysqli_query($conexion,$sql);
               $ver=mysqli_fetch_row($result1);
             $movimiento=$ver[0];
             $id_user=$ver[1];
             if($movimiento==0){
               $sql1="INSERT INTO registro_actividad VALUES ('','$id_user','$modulo',
                                  '$acti','$acti_esp','1','$hora','$fecha')";
                $result2=mysqli_query($conexion,$sql1); // administrativo va hacia su labor
                echo 1;
             }
   }else{ // no existe el administrativo
     echo 2;
   }
 ?>
