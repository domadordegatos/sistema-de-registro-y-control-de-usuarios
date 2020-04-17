<?php
require_once "conexion.php";
$conexion=conexion();
date_default_timezone_set('America/Mexico_City');
$codigo = $_POST['form1'];
$time = time();
$hora = date("H:i:s",$time);
$fecha = date('Y-m-d');

    //verificacion de usuario registrado
    $sql0 = "SELECT * from usuarios_registrados where documento_cc='$codigo'";//pendiente a modificar entrada
    $result = mysqli_query($conexion, $sql0);
    $sql1 = "SELECT * from usuarios_registrados where documento_cc='$codigo' AND carrera = 'c13'";
    $result2 = mysqli_query($conexion, $sql1);
    if(mysqli_num_rows($result)>0){//encontro al usuario
      if(mysqli_num_rows($result)>0 && mysqli_num_rows($result2)>0){//es administrativo
             $mov=tipo_movimiento($conexion,$codigo); //validamos su movimiento
               if($mov==1){//lo ultimo que hizo fue entrar, hay que duplicar sus datos
                 duplicar_administrativo($conexion, $codigo, $fecha, $hora);
               }else{ //va de entrada
                 $nu_reg=numero_de_registros($codigo);
                 if($nu_reg>=100){ //verificamos la cantidad de ingreso en el dia
                  duplicar_administrativoo($conexion, $codigo, $fecha, $hora); //la cantidad es alta
                 }else{ //los ingresos son bajos, puede seguir registrando
                  echo 2;
                 }
               }
      }else{//usuario normal
        $mov=tipo_movimiento($conexion,$codigo); //validamos su movimiento
          if($mov==1){//lo ultimo que hizo fue entrar, hay que duplicar sus datos
            duplicar_administrativo($conexion, $codigo, $fecha, $hora);
          }else{ //va de entrada
            $nu_reg=numero_de_registros($codigo);
            if($nu_reg>=100){ //verificamos la cantidad de ingreso en el dia
             duplicar_administrativoo($conexion, $codigo, $fecha, $hora); //la cantidad es alta
            }else{ //los ingresos son bajos, puede seguir registrando
             echo 2;
            }
          }
      }
    }else if($codigo == '1118568814'){
      echo 3;//codigo especial
    }else{   //no esta registrado
      echo 2;
    }
    function tipo_movimiento($conexion,$codigo){
      $sql="SELECT registro_actividad.movimiento, usuarios_registrados.iduser from registro_actividad
             JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_actividad.documento
             WHERE usuarios_registrados.documento_cc = '$codigo'
             ORDER BY registro_actividad.idregistro DESC LIMIT 0,1";
             $result1=mysqli_query($conexion,$sql);
             $ver=mysqli_fetch_row($result1);
             $movimiento=$ver[0];
             return $movimiento;
    } function duplicar_administrativo($conexion, $codigo, $fecha, $hora){
      $sql="SELECT * FROM registro_actividad
            JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_actividad.documento
            WHERE usuarios_registrados.documento_cc = '$codigo'
            ORDER BY registro_actividad.idregistro DESC LIMIT 0,1";
            $result1=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result1);
            $a1=$ver[1]; $a2=$ver[2]; $a3=$ver[3]; $a4=$ver[4]; $a5=$ver[5];
            if($a5==1){
              $sql="INSERT INTO registro_actividad VALUES ('', '$a1', '$a2', '$a3', '$a4', '0', '$hora', '$fecha')";
              $result1=mysqli_query($conexion,$sql);
              if(!$result1){
                echo "hubo un error al ingresar, llama a soporte";
              }
              echo 1;
            }else{
              echo 2;
            }

    }function duplicar_administrativoo($conexion, $codigo, $fecha, $hora){
      $sql="SELECT * FROM registro_actividad
            JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_actividad.documento
            WHERE usuarios_registrados.documento_cc = '$codigo'
            ORDER BY registro_actividad.idregistro DESC LIMIT 0,1";
            $result1=mysqli_query($conexion,$sql);
            $ver=mysqli_fetch_row($result1);
            $a1=$ver[1]; $a2=$ver[2]; $a3=$ver[3]; $a4=$ver[4]; $a5=$ver[5];
            if($a5==1){
              $sql="INSERT INTO registro_actividad VALUES ('', '$a1', '$a2', '$a3', '$a4', '0', '$hora', '$fecha')";
              $result1=mysqli_query($conexion,$sql);
              if(!$result1){
                echo "hubo un error al ingresar, llama a soporte";
              }
              echo 1;
            }else{
              $sql="INSERT INTO registro_actividad VALUES ('', '$a1', '$a2', '$a3', '$a4', '1', '$hora', '$fecha')";
              $result1=mysqli_query($conexion,$sql);
              if(!$result1){
                echo "hubo un error al ingresar, llama a soporte";
              }
              echo 1;
            }

    }
    function numero_de_registros($codigo){
    require_once "../procesos/conexion.php";
    $conexion=conexion();
    $fecha = date('Y-m-d');
    $cc=iddelacedula($codigo);
    $sql="SELECT COUNT(fecha) FROM registro_actividad
    WHERE documento = '$cc' AND fecha = '$fecha' AND movimiento = '1'";
    $result=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);
    $cant_registros=$ver[0];
    return $cant_registros;
  }
  function iddelacedula($codigo){
      require_once "../procesos/conexion.php";
      $conexion=conexion();
      $busquedaid="SELECT iduser from usuarios_registrados where documento_cc='$codigo'";
      $result=mysqli_query($conexion,$busquedaid);
      $ver=mysqli_fetch_row($result);
      $iddelusuario=$ver[0];
      return $iddelusuario; //identficador unico de la cedula
    }
 ?>
