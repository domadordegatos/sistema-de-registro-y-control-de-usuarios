<?php
session_start();
require_once "../../procesos/conexion.php";
require_once "../../procesos/ag_act.php";
$conexion=conexion();

    $obj= new reg_hab();

    echo json_encode($obj->obt_act($_POST['id_act']))
 ?>
