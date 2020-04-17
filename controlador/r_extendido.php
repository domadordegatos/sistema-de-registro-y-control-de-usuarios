<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/reportes.php";
$conexion=conexion();

$obj= new reportes();

  $result=$obj->r_extendido();
  echo $result;

 ?>
