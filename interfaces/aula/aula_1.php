<?php
require_once "../../procesos/conexion.php";
$salon='1';
$conexion=conexion();
date_default_timezone_set('America/Mexico_City');
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');
setlocale(LC_ALL,"es_ES");
$dias = array("7","1","2","3","4","5","6");
$el_dia=$dias[date("w")];
    $sql="SELECT asignacion_materias.id_asignacion,
          asignacion_materias.h_inicio,
          asignacion_materias.h_final,
          dias_semana.dia,
          materias.descripcion_m,
          materias.state_materia,
          salones.numero_salon,
          docentes.nombre,
          docentes.apellido,
          materias.id_materia
          FROM asignacion_materias
          JOIN docentes  ON docentes.id_docente = asignacion_materias.docente
          JOIN salones ON salones.id_salon = asignacion_materias.salon
          JOIN materias ON materias.id_materia = asignacion_materias.materia
          JOIN dias_semana ON dias_semana.id_dia = asignacion_materias.dia
          WHERE '$hora' >= asignacion_materias.h_inicio
          AND '$hora' <= asignacion_materias.h_final
          AND salones.id_salon = '$salon' AND asignacion_materias.dia = '$el_dia'";
          $result=mysqli_query($conexion,$sql);
          $ver=mysqli_fetch_row($result);
           ?>
<html lang="es" dir="ltr">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../diseño/bootstrap.css">
    <link rel="stylesheet" href="../../diseño/cssaulas.css">
    <?php require_once "../../procesos/sub_menus_biblioteca.php"; ?>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="../../diseño/jquery-3.4.1.js">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Aula</title>
  </head>
  <body>
    <div class="contenedor">
      <input type="number" name="cedula" id="cedula" value="" autofocus>
      <div class="titulo_aula">
        <h1 id="t_aula"><?php echo $ver[6]; ?></h1>
      </div>
      <div class="tabla_datos">
        <table class="table table-bordered">
          <tr>
            <th colspan="3"><?php echo utf8_encode($ver[4]); ?></th>
          </tr>
          <tr>
            <th><?php echo utf8_encode($ver[7])." ".utf8_encode($ver[8]); ?></th>
            <th><?php echo $ver[1]; ?></th>
            <th><?php echo $ver[2]; ?></th>
          </tr>
        </table>
        <div class="horario">
          <a data-toggle="modal" data-target="#exampleModalLong" ><img id="horario" src="https://i.ibb.co/Q6dNGYk/result-6.png" alt="image-horario" border="0"><br>Horario</a>
          <div class="codigo">
              <input type="text" name="materia" id="materia" value="<?php echo $ver[9] ?>" hidden>
              <input type="text" name="aula" id="aula" value="<?php echo $salon ?>" hidden>
          </div>
        </div>
        <div class="scanner">
          <img id="scan" src="../../diseño/imagenes/scan.gif" alt="">
        </div>
      </div>
      <div class="logo">
        <img class="logo2" src="../../diseño/imagenes/unisangil.png" alt="">
      </div>
      <input type="text" id="aula_spcf" name="aula_spcf" value="S_101_1=ON" hidden>

    </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongLabel">Horario semanal <?php echo $ver[6]; ?></h5>
            </div>
            <div class="modal-body">
              <table id="modal_table">
                <?php function horarios($dia){
                  $salon='1';
                  $conexion=conexion();
                  $sql2="SELECT asignacion_materias.id_asignacion,
                        asignacion_materias.h_inicio,
                        asignacion_materias.h_final,
                        dias_semana.dia,
                        materias.descripcion_m,
                        materias.state_materia,
                        salones.numero_salon,
                        docentes.nombre,
                        docentes.apellido
                        FROM asignacion_materias
                        JOIN docentes  ON docentes.id_docente = asignacion_materias.docente
                        JOIN salones ON salones.id_salon = asignacion_materias.salon
                        JOIN materias ON materias.id_materia = asignacion_materias.materia
                        JOIN dias_semana ON dias_semana.id_dia = asignacion_materias.dia
                        WHERE salones.id_salon = '$salon' AND asignacion_materias.dia = '$dia'
                        ORDER BY asignacion_materias.h_inicio ASC";
                         $result=mysqli_query($conexion,$sql2);
                         while($mostrar=mysqli_fetch_assoc($result)){?>
                           <div class="cuadro_materia">
                             <label class="clase"><?php echo utf8_encode($mostrar['descripcion_m']); ?></label>
                             <label class="clase"><?php echo utf8_encode($mostrar['nombre']); ?></label>
                             <label class="clase"><?php echo utf8_encode($mostrar['apellido']); ?></label>
                             <label class="clase"><?php echo utf8_encode($mostrar['h_inicio']); ?></label>
                             <label class="clase"><?php echo utf8_encode($mostrar['h_final']); ?></label>
                           </div>

                <?php }} ?>
                <tr>
                  <th class="celdas">Lunes</th>
                  <th class="celdas">Martes</th>
                  <th class="celdas">Miercoles</th>
                  <th class="celdas">Jueves</th>
                  <th class="celdas">Viernes</th>
                  <th class="celdas">Sabado</th>
                </tr>
                <tr>
                  <th class="celdas"><?php echo horarios(1); ?></th>
                  <th class="celdas"><?php echo horarios(2); ?></th>
                  <th class="celdas"><?php echo horarios(3); ?></th>
                  <th class="celdas"><?php echo horarios(4); ?></th>
                  <th class="celdas"><?php echo horarios(5); ?></th>
                  <th class="celdas"><?php echo horarios(6); ?></th>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $("input[name=cedula]").change(function(){
      cadena="form1=" + $('#cedula').val() +
            "&form2=" + $('#materia').val() +
            "&form3=" + $('#aula').val();
            $.ajax({
              type:"POST",
              url:"../../procesos/aulas.php", //validacion de datos de registro
              data:cadena,
              success:function(r){
                if(r==1){
                  abrir_puerta();
                  console.log("bien");
                  reset();
                }else if(r==2){
                  console.log("mal");
                  reset();
                }else{
                  console.log("error");
                  reset();
                }
              }
            });
            });
          });
          function reset(){
            document.getElementById('cedula').value = "";
          }
</script>
