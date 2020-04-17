<?php
class reportes{

  public function r_historial(){
    $user = $_SESSION['user'];
    date_default_timezone_set('America/Mexico_City');
    require_once "conexion.php";
    $conexion=conexion();
    $codigo=$_POST['form1'];
    $m2=$_POST['form2'];
    $m1=$_POST['form3'];
    $m3=$_POST['form4'];
    $time = time();
    $hora = date("H:i:s",$time);
    $fecha= date('Y-m-d');

    $sqll = "SELECT * from usuarios_registrados where documento_cc='$codigo'";
    $result = mysqli_query($conexion, $sqll);
    if(mysqli_num_rows($result)>0){
      $id_r=self::ultimo_id();
      $id_u=self::id_user_bd();
      $id_a=self::id_admin();
      $t_r=1;
        $sql="INSERT INTO reporte_ingresos
        (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
        SELECT '$id_r', idregistro, '$id_a', '$t_r', '0000-00-00', '0000-00-00', '$hora', '$fecha'
        FROM registro_actividad
        WHERE (documento = '$id_u' AND  modulo = '$m1'
            OR documento = '$id_u' AND  modulo = '$m2'
	          OR documento = '$id_u' AND  modulo = '$m3')";
            $result = mysqli_query($conexion, $sql);
      return 1;
    }else{
      return 0;//usuario no existe
    }
  }

  public function r_estatico(){
    $user = $_SESSION['user'];
    date_default_timezone_set('America/Mexico_City');
    require_once "conexion.php";
    $conexion=conexion();
    $m2=$_POST['form2'];
    $m1=$_POST['form3'];
    $m3=$_POST['form4'];
    $tamaño=$_POST['form5'];
    $time = time();
    $hora = date("H:i:s",$time);
    $fecha= date('Y-m-d');
    if($tamaño=='1'){
      $id_r=self::ultimo_id();
      $id_a=self::id_admin();
      $t_r=4;
      $sql="INSERT INTO reporte_ingresos
      (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
      SELECT '$id_r', idregistro, '$id_a', '$t_r', '0000-00-00', '0000-00-01', '$hora', '$fecha'
      FROM registro_actividad
      where date(fecha)>date(date_sub(NOW(), INTERVAL 1 DAY)) AND modulo = '$m1'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 1 DAY)) AND modulo = '$m2'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 1 DAY)) AND modulo = '$m3'";
          $result = mysqli_query($conexion, $sql);
          echo 1;
    }else if($tamaño=='2'){
      $id_r=self::ultimo_id();
      $id_a=self::id_admin();
      $t_r=4;
      $sql="INSERT INTO reporte_ingresos
      (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
      SELECT '$id_r', idregistro, '$id_a', '$t_r', '0000-00-00', '0000-00-07', '$hora', '$fecha'
      FROM registro_actividad
      where date(fecha)>date(date_sub(NOW(), INTERVAL 7 DAY)) AND modulo = '$m1'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 7 DAY)) AND modulo = '$m2'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 7 DAY)) AND modulo = '$m3'";
          $result = mysqli_query($conexion, $sql);
      echo 2;
    }else{
      $id_r=self::ultimo_id();
      $id_a=self::id_admin();
      $t_r=4;
      $sql="INSERT INTO reporte_ingresos
      (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
      SELECT '$id_r', idregistro, '$id_a', '$t_r', '0000-00-00', '0000-00-30', '$hora', '$fecha'
      FROM registro_actividad
      where date(fecha)>date(date_sub(NOW(), INTERVAL 30 DAY)) AND modulo = '$m1'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 30 DAY)) AND modulo = '$m2'
         OR date(fecha)>date(date_sub(NOW(), INTERVAL 30 DAY)) AND modulo = '$m3'";
          $result = mysqli_query($conexion, $sql);
      echo 3;
    }
  }

  public function r_especifico(){
    $user = $_SESSION['user'];
    date_default_timezone_set('America/Mexico_City');
    require_once "conexion.php";
    $conexion=conexion();
    $m2=$_POST['form2'];
    $m1=$_POST['form3'];
    $m3=$_POST['form4'];
    $dia=$_POST['form5'];
    $mes=$_POST['form6'];
    $ano=$_POST['form7'];
    $tamaño=$_POST['form5'];
    $time = time();
    $hora = date("H:i:s",$time);
    $fecha= date('Y-m-d');
    $id_r=self::ultimo_id();
    $id_a=self::id_admin();
    $t_r=3;
    $sqll="SELECT * FROM registro_actividad where fecha = ('$ano''-''$mes''-''$dia')";
    $result = mysqli_query($conexion, $sqll);
    if(mysqli_num_rows($result)>0){
      $sql="INSERT INTO reporte_ingresos
      (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
      SELECT '$id_r', idregistro, '$id_a', '$t_r', ('$ano''-''$mes''-''$dia'), ('$ano''-''$mes''-''$dia')
      , '$hora', '$fecha'
      FROM registro_actividad
      WHERE fecha = ('$ano''-''$mes''-''$dia') AND modulo = '$m1'
         OR fecha = ('$ano''-''$mes''-''$dia') AND modulo = '$m2'
         OR fecha = ('$ano''-''$mes''-''$dia') AND modulo = '$m3'";
          $result = mysqli_query($conexion, $sql);
          echo 1;
    }else {
      echo 2;// no existen registros de la fecha
    }
  }

  public function r_extendido(){
    $user = $_SESSION['user'];
    date_default_timezone_set('America/Mexico_City');
    require_once "conexion.php";
    $conexion=conexion();
    $m2=$_POST['form2'];
    $m1=$_POST['form3'];
    $m3=$_POST['form4'];
    $d_i=$_POST['form5'];
    $d_f=$_POST['form6'];
    $m_i=$_POST['form7'];
    $m_f=$_POST['form8'];
    $a_i=$_POST['form9'];
    $a_f=$_POST['form10'];
    $time = time();
    $hora = date("H:i:s",$time);
    $fecha= date('Y-m-d');
    $id_r=self::ultimo_id();
    $id_a=self::id_admin();
    $t_r=2;
    $sqll="SELECT * FROM registro_actividad
    WHERE fecha >= ('$d_f''-''$m_i''-''$a_i') AND fecha <= ('$d_i''-''$m_f''-''$a_f') AND modulo = 'm1'";
    $result = mysqli_query($conexion, $sqll);
    if(mysqli_num_rows($result)>0){
      $sql="INSERT INTO reporte_ingresos
      (id_reporte, id_registro, admin, tipo_reporte, f_inicio, f_final, hora, fecha)
      SELECT '$id_r', idregistro, '$id_a', '$t_r', ('$a_i''-''$m_i''-''$d_i'), ('$a_f''-''$m_f''-''$d_f')
      , '$hora', '$fecha'
      FROM registro_actividad
      WHERE fecha >= ('$a_i''-''$m_i''-''$d_i') AND fecha <= ('$a_f''-''$m_f''-''$d_f') AND modulo = '$m1'
         OR fecha >= ('$a_i''-''$m_i''-''$d_i') AND fecha <= ('$a_f''-''$m_f''-''$d_f') AND modulo = '$m2'
         OR fecha >= ('$a_i''-''$m_i''-''$d_i') AND fecha <= ('$a_f''-''$m_f''-''$d_f') AND modulo = '$m3'";
          $result = mysqli_query($conexion, $sql);
      echo "1";
    }else {
      echo 2;// no existen registros de la fecha
    }
  }
  public function ultimo_id(){
  require_once "conexion.php";
  $conexion=conexion();
  $sql="SELECT id_reporte from reporte_ingresos group by id_reporte desc";
  $result=mysqli_query($conexion,$sql);
  $id=mysqli_fetch_row($result)[0];
  if($id=="" or $id==null or $id==0){
    return 1;
  }else{
    return $id + 1;
  }
}
  public function id_user_bd(){
    require_once "conexion.php";
    $conexion=conexion();
    $codigo=$_POST['form1'];
    $sql="SELECT iduser from usuarios_registrados where documento_cc='$codigo'";
    $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);
      $iddelusuario=$ver[0];
      return $iddelusuario;
  }

  public function id_admin(){
    $user = $_SESSION['user'];
    require_once "conexion.php";
    $conexion=conexion();
    $sql="SELECT idadmin from administradores where usuario='$user'";
    $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);
      $ida=$ver[0];
      return $ida;
  }
}
?>
