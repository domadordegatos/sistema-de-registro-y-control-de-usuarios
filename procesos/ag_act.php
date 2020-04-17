<?php
    class reg_hab{
      public function ag_doc(){
        $nombre=$_POST['form1'];
        $apelli=$_POST['form2'];
        $estado=$_POST['form3'];
        $id='';
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT * FROM docentes
         WHERE nombre = '$nombre' AND apellido = '$apelli'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)<=0){
           $sql="INSERT INTO docentes (id_docente,
                                       nombre,
                                       apellido,
                                       state)
                                   values ('$id',
                                           '$nombre',
                                           '$apelli',
                                           '$estado')";
        $result=mysqli_query($conexion,$sql);
        echo 1;
         }else{
           echo 0;
         }
      }
      public function obt_doc($id_doc){
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT id_docente, nombre, apellido, state FROM docentes
        WHERE id_docente='$id_doc'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array( "id_docente" => $ver[0],
                      "nombre" => $ver[1],
                      "apellido" => $ver[2],
                      "state" => $ver[3]
                    );
                    return $datos;
      } public function obt_aul($id_aul){
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT id_salon, numero_salon, state FROM salones
        WHERE id_salon ='$id_aul'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array( "id_salon" => $ver[0],
                      "numero_salon" => $ver[1],
                      "state" => $ver[2]
                    );
                    return $datos;
      } public function obt_mat($id_mat){
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT id_materia, descripcion_m, state_materia FROM materias
        WHERE id_materia ='$id_mat'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array( "id_materia" => $ver[0],
                      "descripcion_m" => $ver[1],
                      "state_materia" => $ver[2]
                    );
                    return $datos;
      } public function obt_act($id_act){
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT idactividad_spcf, actividad_spcf, modulo, card, state FROM actividad_especifica
        WHERE idactividad_spcf ='$id_act'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array( "id_materia" => $ver[0],
                   "actividad_spcf" => $ver[1],
                   "modulo" => $ver[2],
                   "card" => $ver[3],
                   "state" => $ver[4]
                    );
                    return $datos;
      } public function obt_cla($id_cla){
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT id_asignacion, materia, dia, h_inicio, h_final, salon, docente, state
		   	FROM asignacion_materias
        WHERE id_asignacion ='$id_cla'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos=array( "id_asignacion" => $ver[0],
                      "materia" => $ver[1],
                      "dia" => $ver[2],
                      "h_inicio" => $ver[3],
                      "h_final" => $ver[4],
                      "salon" => $ver[5],
                      "docente" => $ver[6],
                      "state" => $ver[7]
                    );
                    return $datos;
      }
      public function ac_doc(){
        $nombre=$_POST['form1'];
        $apelli=$_POST['form2'];
        $estado=$_POST['form3'];
        $id=$_POST['form4'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="UPDATE docentes set nombre='$nombre',
                                  apellido='$apelli',
                                  state='$estado'
                               WHERE id_docente ='$id'";
                $result=mysqli_query($conexion,$sql);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
      }
      public function ac_aul(){
        $numero=$_POST['form1'];
        $state=$_POST['form2'];
        $id=$_POST['form3'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="UPDATE salones set numero_salon='$numero',
                                 state='$state'
                               WHERE id_salon ='$id'";
                $result=mysqli_query($conexion,$sql);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
      }
      public function ac_mat(){
        $id=$_POST['form1'];
        $nombre=$_POST['form2'];
        $estado=$_POST['form3'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="UPDATE materias set descripcion_m='$nombre',
                                 state_materia='$estado'
                               WHERE id_materia ='$id'";
                $result=mysqli_query($conexion,$sql);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
      }
      public function ac_act(){
        $id=$_POST['form1'];
        $nombre=$_POST['form2'];
        $modulo=$_POST['form3'];
        $grupo=$_POST['form4'];
        $estado=$_POST['form5'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="UPDATE actividad_especifica set actividad_spcf='$nombre',
                                                    modulo='$modulo',
                                                    card='$grupo',
                                                    state='$estado'
                               WHERE idactividad_spcf ='$id'";
                $result=mysqli_query($conexion,$sql);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
      } public function ac_cla(){
        $id=$_POST['form1'];
        $dia=$_POST['form2'];
        $hinicio=$_POST['form3'];
        $hfinal=$_POST['form4'];
        $salon=$_POST['form5'];
        $docente=$_POST['form6'];
        $estado=$_POST['form7'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="UPDATE asignacion_materias set dia='$dia',
                                             h_inicio='$hinicio',
                                             h_final='$hfinal',
                                             salon='$salon',
                                             docente='$docente',
                                             state='$estado'
                               WHERE id_asignacion ='$id'";
                $result=mysqli_query($conexion,$sql);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
      }
      public function ag_aul(){
        $aula=$_POST['form1'];
        $estado=$_POST['form2'];
        $id='';
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT * FROM salones
         WHERE numero_salon = '$aula'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)<=0){
           $sql="INSERT INTO salones (id_salon,
                                       numero_salon,
                                       state)
                                   values ('$id',
                                           '$aula',
                                           '$estado')";
        $result=mysqli_query($conexion,$sql);
        echo 1;
         }else{
           echo 0;
         }
      }
      public function ag_mat(){
        $id=$_POST['form1'];
        $materia=$_POST['form3'];
        $estado=$_POST['form2'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT * FROM materias
         WHERE id_materia = '$id' AND descripcion_m = '$materia'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)<=0){
           $sql="INSERT INTO materias (id_materia,
                                       descripcion_m,
                                       state_materia)
                                   values ('$id',
                                           '$materia',
                                           '$estado')";
        $result=mysqli_query($conexion,$sql);
        echo 1;
         }else{
           echo 0;
         }
      }
      public function ag_act(){
        $id=$_POST['form1'];
        $nombre=$_POST['form2'];
        $modulo=$_POST['form3'];
        $grupo=$_POST['form4'];
        $estado=$_POST['form5'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT * FROM actividad_especifica
         WHERE idactividad_spcf = '$id' AND actividad_spcf = '$nombre'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)<=0){
           $sql="INSERT INTO actividad_especifica (idactividad_spcf,
                                       actividad_spcf,
                                       modulo,
                                       card,
                                       state)
                                   values ('$id',
                                           '$nombre',
                                           '$modulo',
                                           '$grupo',
                                           '$estado')";
        $result=mysqli_query($conexion,$sql);
        echo 1;
         }else{
           echo 0;
         }
      }
      public function ag_cla(){
        $id='';
        $materia=$_POST['form1'];
        $dia=$_POST['form2'];
        $hin=$_POST['form3'];
        $hfi=$_POST['form4'];
        $salon=$_POST['form5'];
        $docente=$_POST['form6'];
        $estado=$_POST['form7'];
        require_once "conexion.php";
        $conexion=conexion();
        $sql="SELECT * FROM asignacion_materias
         WHERE dia = '$dia' AND h_inicio <= '$hfi' AND h_final >= '$hin'
         AND salon = '$salon'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)<=0){
           $sql="INSERT INTO asignacion_materias (id_asignacion,
                                                  materia,
                                                  dia,
                                                  h_inicio,
                                                  h_final,
                                                  salon,
                                                  docente,
                                                  state)
                                   values ('$id',
                                           '$materia',
                                           '$dia',
                                           '$hin',
                                           '$hfi',
                                           '$salon',
                                           '$docente',
                                           '$estado')";
        $result=mysqli_query($conexion,$sql);
        echo 1;
         }else{
           echo 0;
         }
      }
    }
 ?>
