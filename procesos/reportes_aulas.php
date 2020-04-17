<?php
class reportes_aulas{
  public function r_cc(){
    $cedula=$_POST['form1'];
    $dia=$_POST['form2'];
    $mes=$_POST['form3'];
    $ano=$_POST['form4'];
    require_once "conexion.php";
    $conexion=conexion();
    unset($_SESSION['tabla_aulas_temp']);

      $sql1="SELECT registro_ingresos_aulas.id_ingreso,
                    usuarios_registrados.documento_cc,
                    carrera.nombre_carrera,
                    salones.numero_salon,
                    materias.descripcion_m,
                    estados_movimiento.estado_spcf,
                    registro_ingresos_aulas.hora,
                    registro_ingresos_aulas.fecha
        FROM registro_ingresos_aulas
             JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_ingresos_aulas.documento
             JOIN materias ON materias.id_materia = registro_ingresos_aulas.materia
             JOIN salones ON salones.id_salon = registro_ingresos_aulas.aula
             JOIN estados_movimiento ON estados_movimiento.id_estado = registro_ingresos_aulas.movimiento
             JOIN carrera ON carrera.idcarrera = usuarios_registrados.carrera
             WHERE registro_ingresos_aulas.fecha = ('$ano''-''$mes''-''$dia')
             AND usuarios_registrados.documento_cc = '$cedula'
             ORDER BY registro_ingresos_aulas.id_ingreso DESC";
              $result1=mysqli_query($conexion,$sql1);
              if(mysqli_num_rows($result1)<=0){
                echo 2;//no existen datos del usuario
              }else{
                while ($ver1=mysqli_fetch_row($result1)){
                $tabla=$ver1[0]."||".
                       $ver1[1]."||".
                       $ver1[2]."||".
                       $ver1[3]."||".
                       $ver1[4]."||".
                       $ver1[5]."||".
                       $ver1[6]."||".
                       $ver1[7]."||";
                   $_SESSION['tabla_aulas_temp'][]=$tabla;
                 }
                 echo 1;
              }
  }  public function r_aulas(){
      $aula=$_POST['form1'];
      $dia=$_POST['form2'];
      $mes=$_POST['form3'];
      $ano=$_POST['form4'];
      require_once "conexion.php";
      $conexion=conexion();
      unset($_SESSION['tabla_aulas_temp']);

        $sql1="SELECT registro_ingresos_aulas.id_ingreso,
                      usuarios_registrados.documento_cc,
                      carrera.nombre_carrera,
                      salones.numero_salon,
                      materias.descripcion_m,
                      estados_movimiento.estado_spcf,
                      registro_ingresos_aulas.hora,
                      registro_ingresos_aulas.fecha
          FROM registro_ingresos_aulas
               JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_ingresos_aulas.documento
               JOIN materias ON materias.id_materia = registro_ingresos_aulas.materia
               JOIN salones ON salones.id_salon = registro_ingresos_aulas.aula
               JOIN estados_movimiento ON estados_movimiento.id_estado = registro_ingresos_aulas.movimiento
               JOIN carrera ON carrera.idcarrera = usuarios_registrados.carrera
               WHERE registro_ingresos_aulas.fecha = ('$ano''-''$mes''-''$dia')
               AND salones.id_salon = '$aula'
               ORDER BY registro_ingresos_aulas.id_ingreso DESC";
                $result1=mysqli_query($conexion,$sql1);
                if(mysqli_num_rows($result1)<=0){
                  echo 2;//no existen datos del usuario
                }else{
                  while ($ver1=mysqli_fetch_row($result1)){
                  $tabla=$ver1[0]."||".
                         $ver1[1]."||".
                         $ver1[2]."||".
                         $ver1[3]."||".
                         $ver1[4]."||".
                         $ver1[5]."||".
                         $ver1[6]."||".
                         $ver1[7]."||";
                     $_SESSION['tabla_aulas_temp'][]=$tabla;
                   }
                   echo 1;
                }
    }
        public function crear_pdf_aula(){
          $aula=$_POST['form2'];
          require_once "conexion.php";
          $conexion=conexion();
          date_default_timezone_set('America/Mexico_City');
          $time = time();
          $hora = date("H:i:s",$time);
          $fecha= date('Y-m-d');
          $id_final=self::ultimo_id();
          $id_admin=self::id_admin();
          $datos=$_SESSION['tabla_aulas_temp'];
          $r=0;
          $tipo=0;
          if($aula=='A'){
            $tipo=5;
          }else{
            $tipo=6;
          }
          for ($i=0; $i < count($datos) ; $i++) {
            $d=explode("||", $datos[$i]);
            $sql="INSERT INTO reportes_ingresos_aulas (id_reporte,
                                                       id_ingreso,
                                                       id_admin,
                                                       tipo_reporte,
                                                       hora,
                                                       fecha)
                                    values ('$id_final',
                                            '$d[0]',
                                            '$id_admin',
                                            '$tipo',
                                            '$hora',
                                            '$fecha')";
                                      $r=$r + $result=mysqli_query($conexion,$sql);
                                    }
                                    // return $r;
                                    if($result){
                                      echo 1;
                                    }else{
                                      echo 2;
                                    }
                                  }

     public function ultimo_id(){
       require_once "conexion.php";
       $conexion=conexion();
       $sql="SELECT id_reporte from reportes_ingresos_aulas group by id_reporte desc";
       $result=mysqli_query($conexion,$sql);
       $id=mysqli_fetch_row($result)[0];
       if($id=="" or $id==null or $id==0){
         return 1;
       }else{
         return $id + 1;
       }
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
