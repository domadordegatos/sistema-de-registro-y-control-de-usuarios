<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/reportes_aulas.php";
$conexion=conexion();
$obj= new reportes_aulas();

if (count($_SESSION['tabla_aulas_temp'])==0) {
  echo 0;
}else{
  $result=$obj->crear_pdf_aula();
  unset($_SESSION['tabla_aulas_temp']);
  echo $result;
}
 ?>
