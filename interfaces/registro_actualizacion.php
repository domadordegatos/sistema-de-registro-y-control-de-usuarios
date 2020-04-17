<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "./menu_admin.php"?>
    <?php require_once "../procesos/funciones_reportes.php" ?>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "../procesos/registro_habilitacion.php" ?>
    <link rel="stylesheet" href="../diseño/margen.css">
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/cssmenuadmin.css">
    <title></title>
  </head>
  <body>
    <div class="contenedor" style="padding-right:1.5%;">
      <div class="inicio text-white" style="display:flex;">
        <div class="titulo" style="width:60%;">
          <h3>Actualizacion y Registro de Base de Datos</h1>
        </div>
        <div class="intro" style="width:40%; text-align:justify; padding-right:1%;">
          <p>En este menu podras crear y actualizar registros como, docentes, aulas, clases, materias, actividades y demas. Para poder actualizar solo debes seleccionar el primer campo que desees de la columna actualizar, para registrar nuevos eventos, debes ingresar todos los datos en la columna de Ingreso correspondiente.</p>
        </div>
      </div>
      <div class="tabla">
        <table class="table table-bordered text-white">
          <tr style="text-align:center;">
            <th style="width:5rem;"></th>
            <th style="width:50%;">Registro de datos</th>
            <th style="width:50%;">Actualización de datos</th>
          </tr>
          <tr>
            <th style="vertical-align:middle;">Docentes</th>
            <th class="agregar_docente">
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="">
                    <label style="margin:0;">Nombres</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ag_docente_nom" style="width:10rem;">
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Apellidos</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ag_docente_ape" style="width:10rem;">
                  </div>
                </div>
                <div class="form-inline">
                  <div class="form-group" style="padding-right:1%;">
                    <label>Estado</label>
                    <select class="form-control form-control-sm" id="ag_docente_est" name="" style="width:8rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <input type="button"class="btn btn-sm btn-success" onclick="agregar_docente();" name="" value="Agregar" style="margin-top:4%;">
                </div>
              </div>
            </th>
            <th>
              <div class="form-group" id="actualizar_doce">
                <div class="" style="display:inline-flex;">
                  <div class="">
                    <label style="margin:0;">Seleccionalo</label>
                    <select class="form-control form-control-sm" id="ac_docente_id" name="" style="width:8rem;">
                      <option value="A">Docente</option>
                      <?php $sql="SELECT id_docente, nombre, apellido, state FROM docentes";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo $ver[1]." ".$ver[2]; ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Nombres</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ac_docente_nom" style="width:10rem;">
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Apellidos</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ac_docente_ape" style="width:10rem;">
                  </div>
                </div>
                <div class="form-inline">
                  <div class="form-group" style="padding-right:1%;">
                    <label>Estado</label>
                    <select class="form-control form-control-sm" name="" style="width:8rem;" id="ac_docente_est">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <input type="button"class="btn btn-sm btn-info" onclick="actualizar_docente();" name="" value="Actualizar" style="margin-top:4%;">
                </div>
              </div>
            </th>
          </tr>
          <tr>
            <th style="vertical-align:middle;">Aulas</th>
            <th>
              <div class="form-group" >
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Numero de salon</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ag_aula_nom" style="width:10rem;" placeholder="A-103">
                  </div>
                  <div class="">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ag_aula_est" name="" style="width:8rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                  <input type="button"class="btn btn-sm btn-success" onclick="agregar_aula();" name="" value="Agregar" style="margin-top:11.5%; margin-left:1%;">
              </div>
            </th>
            <th>
              <div class="form-group" >
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Seleccionala</label>
                    <select class="form-control form-control-sm" id="ac_aula_id" name="" style="width:8rem;">
                      <option value="A">Aula</option>
                      <?php $sql="SELECT id_salon, numero_salon FROM salones";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo $ver[1]; ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Numero de salon</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ac_aula_nom" style="width:10rem;">
                  </div>
                  <div class="">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ac_aula_est" name="" style="width:8rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div><br>
                  <input type="button"class="btn btn-sm btn-info" name="" onclick="actualizar_aula();" value="Actualizar" style="margin-top:2%;">
              </div>
            </th>
          </tr>
          <tr>
            <th style="vertical-align:middle;">Materias</th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" hidden>
                    <label style="margin:0;">#Id</label>
                    <?php $sql="SELECT id_materia FROM materias
                                order by id_materia DESC";
                                $result=mysqli_query($conexion,$sql);
                                $ver=mysqli_fetch_row($result);
                                $id=$ver[0]; $id_f=$id+1;?>
            <input class="form-control form-control-sm" type="text" name="" value="<?php echo $id_f ?>" id="ag_mat_id" style="width:4rem;">
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Nombre Materia</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ag_mat_nom" style="width:13rem;">
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ag_mat_est" name="" style="width:8rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-inline">
                  <input type="button"class="btn btn-sm btn-success" name="" onclick="agregar_materia();" value="Agregar" style="margin-top:1%;">
                </div>
              </div>
            </th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Seleccionala</label>
                    <select class="form-control form-control-sm" id="ac_materia_id" name="" style="width:8rem;">
                      <option value="A">Materia</option>
                      <?php $sql="SELECT id_materia, descripcion_m FROM materias";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Nombre Materia</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ac_materia_nom" style="width:13rem;">
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ac_materia_est" name="" style="width:6rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-inline">
                  <input type="button"class="btn btn-sm btn-info" name="" onclick="actualizar_materia();" value="Actualizar" style="margin-top:1%;">
                </div>
              </div>
            </th>
          </tr>
          <tr>
            <th style="vertical-align:middle;">Actividades Centuria</th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" hidden>
                    <?php $sql1="SELECT COUNT(idactividad_spcf) FROM actividad_especifica";
                                $result1=mysqli_query($conexion,$sql1);
                                $ver1=mysqli_fetch_row($result1);
                                $id1=$ver1[0]; $id_f1=$id1+1;?>
                    <label style="margin:0;">#Id</label>
                    <input class="form-control form-control-sm" type="text" name="" value="<?php echo 'l'.$id_f1; ?>" id="ag_actividad_id" style="width:4rem;">
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Dscrip. Actividad</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ag_actividad_nom" style="width:13rem;">
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Modulo</label>
                    <select class="form-control form-control-sm" id="ag_actividad_mod" name="" style="width:8rem;">
                      <option value="A">Modulo</option>
                      <?php $sql="SELECT id_modulo, spcf_modulo FROM modulos_centuria";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="form-group">
                    <label style="margin:0;">Grupo</label>
                    <select class="form-control form-control-sm" id="ag_actividad_gru" name="" style="width:8rem;">
                      <option value="A">Grupo</option>
                      <?php $sql="SELECT idactividad, actividad FROM actividades";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ag_actividad_est" name="" style="width:6rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-inline" style="padding-left:3%; padding-top:1%;">
                    <input type="button"class="btn btn-sm btn-success" onclick="agregar_actividad();" name="" value="Agregar" style="margin-top:1%;">
                  </div>
                </div>
              </div>
            </th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Seleccionala</label>
                    <select class="form-control form-control-sm" id="ac_actividad_id" name="" style="width:8rem;">
                      <option value="A">Actividad</option>
                      <?php $sql="SELECT idactividad_spcf, actividad_spcf FROM actividad_especifica";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">Dscrip. Actividad</label>
                    <input class="form-control form-control-sm" type="text" name="" value="" id="ac_actividad_nom" style="width:13rem;">
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Modulo</label>
                    <select class="form-control form-control-sm" id="ac_actividad_mod" name="" style="width:6.5rem;">
                      <option value="A">Modulo</option>
                      <?php $sql="SELECT id_modulo, spcf_modulo FROM modulos_centuria";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="form-group">
                    <label style="margin:0;">Grupo</label>
                    <select class="form-control form-control-sm" id="ac_actividad_gru" name="" style="width:8rem;">
                      <option value="A">Grupo</option>
                      <?php $sql="SELECT idactividad, actividad FROM actividades";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ac_actividad_est" name="" style="width:6rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-inline" style="padding-left:3%; padding-top:1%;">
                    <input type="button"class="btn btn-sm btn-info" onclick="actualizar_actividad();" name="" value="Actualizar" style="margin-top:1%;">
                  </div>
                </div>
              </div>
            </th>
          </tr>
          <tr>
            <th style="vertical-align:middle;">Clase</th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Materia</label>
                    <select class="form-control form-control-sm" id="ag_clase_mat" name="" style="width:8rem;">
                      <option value="A">Materia</option>
                      <?php $sql="SELECT id_materia, descripcion_m FROM materias";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Dia</label>
                    <select class="form-control form-control-sm" id="ag_clase_dia" name="" style="width:8rem;">
                      <option value="A">Día</option>
                      <?php $sql="SELECT id_dia, dia FROM dias_semana";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">H. Inicio</label>
                    <input class="form-control form-control-sm" type="time" name="" value="" id="ag_clase_hin" style="width:7rem;">
                  </div>
                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="">
                    <label style="margin:0;">H. Final</label>
                    <input class="form-control form-control-sm" type="time" name="" value="" id="ag_clase_hfi" style="width:7rem;">
                  </div>
                  <div class="" style="margin-right:1%; padding-left:1%;">
                    <label style="margin:0;">Salon</label>
                    <select class="form-control form-control-sm" id="ag_clase_sal" name="" style="width:8rem;">
                      <option value="A">Salon</option>
                      <?php $sql="SELECT id_salon, numero_salon FROM salones";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="margin-right:1%; padding-left:1%;">
                    <label style="margin:0;">Docente</label>
                    <select class="form-control form-control-sm" id="ag_clase_doc" name="" style="width:8rem;">
                      <option value="A">Docente</option>
                      <?php $sql="SELECT id_docente, nombre, apellido FROM docentes";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]." ".$ver[2]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>

                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ag_clase_est" name="" style="width:6rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-inline" style="padding-left:3%; padding-top:1%;">
                    <input type="button"class="btn btn-sm btn-success" name="" onclick="agregar_clase();" value="Agregar" style="margin-top:1%;">
                  </div>
                </div>
              </div>
            </th>
            <th>
              <div class="form-group">
                <div class="" style="display:inline-flex;">
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Materia</label>
                    <select class="form-control form-control-sm" id="ac_clase_mat" name="" style="width:8rem;">
                      <option value="A">Materia</option>
                      <?php $sql="SELECT asignacion_materias.id_asignacion,
			                                    materias.descripcion_m
					                                     FROM asignacion_materias
			                                            JOIN materias ON materias.id_materia = asignacion_materias.materia";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo ($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="margin-right:1%;">
                    <label style="margin:0;">Dia</label>
                    <select class="form-control form-control-sm" id="ac_clase_dia" name="" style="width:8rem;">
                      <option value="A">Día</option>
                      <?php $sql="SELECT id_dia, dia FROM dias_semana";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="padding-left:1%;">
                    <label style="margin:0;">H. Inicio</label>
                    <input class="form-control form-control-sm" type="time" name="" value="" id="ac_clase_hin" style="width:7rem;">
                  </div>
                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="">
                    <label style="margin:0;">H. Final</label>
                    <input class="form-control form-control-sm" type="time" name="" value="" id="ac_clase_hfi" style="width:7rem;">
                  </div>
                  <div class="" style="margin-right:1%; padding-left:1%;">
                    <label style="margin:0;">Salon</label>
                    <select class="form-control form-control-sm" id="ac_clase_sal" name="" style="width:8rem;">
                      <option value="A">Salon</option>
                      <?php $sql="SELECT id_salon, numero_salon FROM salones";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="" style="margin-right:1%; padding-left:1%;">
                    <label style="margin:0;">Docente</label>
                    <select class="form-control form-control-sm" id="ac_clase_doc" name="" style="width:8rem;">
                      <option value="A">Docente</option>
                      <?php $sql="SELECT id_docente, nombre, apellido FROM docentes";
                                  $result=mysqli_query($conexion,$sql);
                                  while ($ver=mysqli_fetch_row($result)):?>
                        <option value=<?php echo $ver[0]; ?>><?php echo utf8_encode($ver[1]." ".$ver[2]); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>

                </div>
                <div class="form-group" style="display:inline-flex;">
                  <div class="form-group" style="padding-left:2%;">
                    <label style="margin:0;">Estado</label>
                    <select class="form-control form-control-sm" id="ac_clase_est" name="" style="width:6rem;">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-inline" style="padding-left:3%; padding-top:1%;">
                    <input type="button"class="btn btn-sm btn-info" name="" onclick="actualizar_clase();" value="Actualizar" style="margin-top:1%;">
                  </div>
                </div>
              </div>
            </th>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
