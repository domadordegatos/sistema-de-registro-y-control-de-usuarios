<?php
session_start();
require_once "../../procesos/conexion.php";
require_once "../../procesos/ag_act.php";
$conexion=conexion();

    $obj= new reg_hab();

    echo json_encode($obj->obt_doc($_POST['id_doc']))
 ?>
