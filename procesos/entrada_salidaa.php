<?php
date_default_timezone_set('America/Mexico_City');
require_once "conexion.php";
$conexion=conexion();
$id="";
$carrera=$_POST['form1'];
$semestre=$_POST['form2'];
$actividad=$_POST['form3'];
$acti_spcf=$_POST['form4'];
$codigo=$_POST['form5'];
$modulo=$_POST['form6'];
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');

//buscamos si el usuario ya estaba registrado
$sqll = "SELECT * from usuarios_registrados where documento_cc='$codigo'";
$result = mysqli_query($conexion, $sqll);

   //si esta registrado procedemos a ingresar su entrada
   if(mysqli_num_rows($result)>0){
     echo 1;
     regitrodeactividad($id,$actividad,$acti_spcf,$codigo,$time,$hora,$fecha,$modulo);
  }else{
    //si no existe, lo agregamos e ingresamos su entrada
    registrarusuarionuevo($id,$codigo,$carrera,$semestre);
    regitrodeactividad($id,$actividad,$acti_spcf,$codigo,$time,$hora,$fecha,$modulo);
    echo 1;
  }


  function regitrodeactividad($id,$actividad,$acti_spcf,
                              $codigo,$time,$hora,$fecha,$modulo){
    require_once "conexion.php";
    $conexion=conexion();
    $ccid = iddelacedula($codigo);

    $sql7="INSERT INTO
           registro_actividad VALUES
          ('$id',
           '$ccid',
           '$modulo',
           '$actividad',
           '$acti_spcf',
           '1',
           '$hora',
           '$fecha')";
            $ejecutar=mysqli_query($conexion, $sql7);
  }


  function iddelacedula($codigo){
    require_once "conexion.php";
    $conexion=conexion();
    $busquedaid="SELECT iduser from usuarios_registrados where documento_cc='$codigo'";
    $result=mysqli_query($conexion,$busquedaid);
    $ver=mysqli_fetch_row($result);
    $iddelusuario=$ver[0];
    return $iddelusuario; //identficador unico de la cedula
  }

  function registrarusuarionuevo($id,$codigo,$carrera,$semestre){
    require_once "conexion.php";
    $conexion=conexion();
    $sql2="INSERT INTO usuarios_registrados VALUES ('$id','$codigo','$carrera','$semestre')";
    $ejecutar2=mysqli_query($conexion, $sql2);
  }

 ?>
