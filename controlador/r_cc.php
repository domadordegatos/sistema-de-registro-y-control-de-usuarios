<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/reportes_aulas.php";
$conexion=conexion();

$obj= new reportes_aulas();

  $result=$obj->r_cc();
  echo $result;

 ?>
