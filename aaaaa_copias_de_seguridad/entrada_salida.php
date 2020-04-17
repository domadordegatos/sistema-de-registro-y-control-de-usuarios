<?php
date_default_timezone_set('America/Mexico_City');
require_once "conexion.php";
require_once "prueba.php";
$conexion=conexion();
$id="";
$carrera=$_POST['form1'];
$semestre=$_POST['form2'];
$actividad=$_POST['form3'];
$acti_spcf=$_POST['form4'];
$codigo=$_POST['form5'];
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');

      //buscar si el usuario existe en la tabla usuarios
      $sqll = "SELECT * from usuarios_registrados where documento_cc='$codigo'";
      $result = mysqli_query($conexion, $sqll);
      if(mysqli_num_rows($result)>0){

        // como existe se registra la actividad
          echo 1;
        regitrodeactividad($id,$carrera,$semestre,$actividad,$acti_spcf,$codigo,$time,$hora,$fecha);




      }else{

        //como no existe, se registra en base de datos y se agrega el registro
        echo "el usuario no existe";
        registrarusuarionuevo($id,$codigo,$carrera);
        regitrodeactividad($id,$carrera,$semestre,$actividad,$acti_spcf,$codigo,$time,$hora,$fecha);
        return 1;

    }

    function iddelacedula($codigo){
      require_once "conexion.php";
      $conexion=conexion();
      $busquedaid="SELECT iduser from usuarios_registrados where documento_cc='$codigo'";
      $result=mysqli_query($conexion,$busquedaid);
      $ver=mysqli_fetch_row($result);
      $iddelusuario=$ver[0];
      return $iddelusuario; //id de la cedula
    }


    function registrarusuarionuevo($id,$codigo,$carrera){
      require_once "conexion.php";
      $conexion=conexion();
      $sql2="INSERT INTO usuarios_registrados VALUES ('$id','$codigo','$carrera')";
      $ejecutar2=mysqli_query($conexion, $sql2);
      if(!$ejecutar2){
        echo "hubo algun error en el registro del nuevo usuario";
        return 0;
      }else{
        echo "el usuario nuevo se registro exitosamente";
        return 1;
      }
    }


      function regitrodeactividad($id,$carrera,$semestre,$actividad,$acti_spcf,$codigo,$time,$hora,$fecha){
        require_once "conexion.php";
        $conexion=conexion();
        $ccid = iddelacedula($codigo);

        $sql7="INSERT INTO registro_actividad VALUES ('$id',
                                                     '$ccid',
                                                     '$carrera',
                                                     '$semestre',
                                                     '$actividad',
                                                     '$acti_spcf',
                                                     '$hora',
                                                     '$fecha')";

                                                     $ejecutar=mysqli_query($conexion, $sql7);
      }


 ?>
