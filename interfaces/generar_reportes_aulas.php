<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "./menu_admin.php"?>
    <?php require_once "../procesos/funciones_reportes.php" ?>
    <?php require_once "../procesos/cdn.php" ?>
    <link rel="stylesheet" href="../diseño/margen.css">
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/cssmenuadmin.css">
    <title>Reportes Aulas</title>
  </head>
  <body onload="r_cc();">
    <div class="contenedor">
      <div class="aviso" style="color:white; display:flex; text-align:justify;">
        <div class="titulo" style="width:55%;">
          <h2 >¿Que tipo de reporte deseas generar?</h2>
          <span style="text-decoration:underline; padding-top:3%;">¿Que fecha deseas?</span>
          <form class="row">
          <div class="form-group" style="padding-left: 1rem;">
            <label for="esp_d">Dia</label>
            <select class="form-control form-control-sm" id="esp_d" name="esp_d" style="width:4rem;">
              <option value="14">14</option>
              <?php $i=1; while ($i <= 31) {  ?>
              <option value=<?php echo $i; ?>><?php echo $i; ?></option>
            <?php $i++; } ?>
            </select>
          </div>

          <div class="form-group" style="padding-left:1rem;">
            <label for="esp_m">Mes</label>
            <select class="form-control form-control-sm" id="esp_m" name="esp_m" style="width:6rem;">
              <option value="8">Agosto</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>

              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div>

          <div class="form-group" style="padding-left:1rem;">
            <label for="esp_a">Año</label>
            <select class="form-control form-control-sm" id="esp_a" name="esp_a" style="width:6rem;">
              <option value="2019">2019</option>
            <?php $año=2025; $i=1; while ($i <= 10) {  ?>
              <option value=<?php echo $año; ?>><?php echo $año; ?></option>
            <?php $i++; $año=$año-1; } ?>
            </select>
          </div>
         </form>
        </div>

        <div class="pasos" style=" padding:0 4% 0 5%; width:45%; left:0;">
          <p style="text-decoration:underline;">Para poder generar exitosamente tu reporte deberas realizar los siguientes pasos. </p>
          <ul>
            <li>1. Seleccionar la fecha del dia especifico que deseas.</li>
            <li>2. Si el reporte es de un usuario; escribe el numero de documento, si es de un aula selecciona el aula</li>
            <li>3. Da click en la opcionar de "Solicitar" segun el reporte que desees, ya sea de usuario o de aula.</li>
          </ul>
        </div>
      </div>
      <div class="reportes" style="color:white; display:flex; padding-top:2%;">
        <div class="tip_usuario" style="width:50%;">
          <span style="text-decoration:underline;">Reporte de usuario</span>
          <form class="form-inline">
            <div class="form-group mx-sm-2 mb-2">
              <input required type="number" class="form-control form-control-sm" placeholder="Ingresa la cedula" id="his_c" name="his_c">
            </div>
            <button type="button" class="btn btn-success mb-2 btn-sm" id="b_his" onclick="r_cc();">Solicitar</button>
          </form>
        </div>
        <div class="tip_aula" style="width:50%;">
          <div class="form-group" style="padding-left:1rem;">
            <label for="esp_a" style="margin:0; text-decoration:underline;">Reporte de aula</label>
            <form class="row">
              <select class="form-control form-control-sm" id="aula_select" name="aula_select" style="width:14rem;">
                <option value="A">Selecciona el salon</option>
              <?php $sql="SELECT id_salon, numero_salon
                          FROM salones";
                          $result=mysqli_query($conexion,$sql);
                          while ($ver=mysqli_fetch_row($result)):?>
                <option value=<?php echo $ver[0]; ?>><?php echo $ver[1]; ?></option>
              <?php endwhile; ?>
              </select>
              <div class="form-inline"style="padding-left:0.6rem;">
              <button type="button" class="btn btn-success mb-2 btn-sm" id="b_ext" name="b_ext" onclick="r_aula();">Solicitar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="tabla" id="tabla" style="padding-right:2%; color:white;">

      </div>
    </div>

  </body>
</html>
