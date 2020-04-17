<?php
date_default_timezone_set('America/Mexico_City');
require_once "conexion.php";
$conexion=conexion();
$id="";
$aula=$_POST['form3'];
$materia=$_POST['form2'];
$codigo=$_POST['form1'];
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');

    $sqll = "SELECT * from usuarios_registrados where documento_cc='$codigo'";
    $result = mysqli_query($conexion, $sqll);
    if(mysqli_num_rows($result)>0){//si esta registrado en base de datos
      validacion_e_s($codigo,$hora,$fecha,$aula,$materia,$id);
      echo 1;
    }else{
      registrarusuarionuevo($id,$codigo);//si no esta registrado se registra y se ingresa la actividad
      registro_actividad($hora,$fecha,$aula,$materia,$id,$codigo);
      echo 1;
    }


  function registro_actividad($hora,$fecha,$aula,$materia,$id,$codigo){
    require_once "conexion.php";
    $conexion=conexion();
    $cod_cedula=iddelacedula($codigo);

    $sql7="INSERT INTO
           registro_ingresos_aulas VALUES
          ('$id',
           '$cod_cedula',
           '$materia',
           '$aula',
           '1',
           '$hora',
           '$fecha')";
            $ejecutar=mysqli_query($conexion, $sql7);
            if(!$ejecutar){
              echo 2;
            }
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

  function validacion_e_s($codigo,$hora,$fecha,$aula,$materia,$id){
    require_once "conexion.php";
    $conexion=conexion();
    $cc=iddelacedula($codigo);
    $busqueda="SELECT movimiento
               FROM registro_ingresos_aulas
               WHERE documento = '$cc' AND fecha = '$fecha' ORDER BY id_ingreso DESC LIMIT 0,1";
               $result=mysqli_query($conexion,$busqueda);
               $ver2=mysqli_fetch_row($result);
               $movimiento=$ver2[0];

               if($movimiento == '1'){
                 $busqueda2="SELECT documento, materia, aula
                            FROM registro_ingresos_aulas
                            WHERE documento = '$cc' ORDER BY id_ingreso DESC LIMIT 0,1";
                            $result2=mysqli_query($conexion,$busqueda2);
                            $ver=mysqli_fetch_row($result2);
                            $documento=$ver[0];
                            $materia=$ver[1];
                            $aula=$ver[2];
                            $id='';
                            $sql="INSERT INTO
                                   registro_ingresos_aulas VALUES
                                  ('$id',
                                   '$documento',
                                   '$materia',
                                   '$aula',
                                   '0',
                                   '$hora',
                                   '$fecha')";
                                   $result=mysqli_query($conexion,$sql);
                                   if(!$result){
                                     printf("no funciona la salida, debio ser que te colaste");
                                     echo 2;
                                   }
               }else{
                 registro_actividad($hora,$fecha,$aula,$materia,$id,$codigo);
               }
  }

  function registrarusuarionuevo($id,$codigo){
    require_once "conexion.php";
    $carrera="c12";
    $semestre="s12";
    $conexion=conexion();
    $sql2="INSERT INTO usuarios_registrados VALUES ('$id','$codigo','$carrera','$semestre')";
    $ejecutar2=mysqli_query($conexion, $sql2);
  }
 ?>
