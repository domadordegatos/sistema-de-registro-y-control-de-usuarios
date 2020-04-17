<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "./menu_admin.php"?>
    <?php require_once "../procesos/funciones_reportes.php" ?>
    <?php require_once "../procesos/cdn.php" ?>
    <link rel="stylesheet" href="../diseño/margen.css">
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/cssmenuadmin.css">
    <title>Reportes</title>
  </head>
  <body>
    <div class="contenedor" style="color:white; position:absolute;">
      <h3 class="text-white">Generar reportes de acceso</h3>

     <div class="rr1" style="display:flex;">
       <div class="r1">
         <span style="text-decoration:underline;">Reporte Historico de Usuario</span>
         <form class="form-inline">
           <div class="form-group mx-sm-2 mb-2">
             <input type="number" class="form-control form-control-sm" placeholder="Ingresa la cedula" id="his_c" name="his_c">
           </div>
           <button type="button" class="btn btn-primary mb-2 btn-sm" id="b_his" onclick="reporte_historial();">Enviar</button>
         </form>
       </div> <!-- end reporte historio usuario-->

       <div class="r2" style="padding-left: 12.4rem;">
         <span style="text-decoration:underline;">Reporte Estatico</span>
         <div class="checkes">
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="bibli" name="modulos" value="" checked>
             <label class="form-check-label" for="inlineCheckbox2" >Biblioteca</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="lab" name="modulos" value="" checked>
             <label class="form-check-label" for="inlineCheckbox1">Laboratorios</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="dir" name="modulos" value="" checked>
             <label class="form-check-label" for="inlineCheckbox3">Directores</label>
           </div>
           <small class="form-text text-muted">Selecciona de estas opciones para todos los reportes</small>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="v_estatico" id="inlineRadio1" value="1" style="display:block;">
             <label class="form-check-label" for="inlineRadio1">Dia</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="v_estatico" id="inlineRadio2" value="2" style="display:block;">
             <label class="form-check-label" for="inlineRadio2">Semana</label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="v_estatico" id="inlineRadio3" value="3" style="display:block;">
             <label class="form-check-label" for="inlineRadio3">Mes</label>
           </div>
            <button type="button" class="btn btn-primary btn-sm" id="b_est" name="b_est" onclick="reporte_estatico();">Enviar</button>
         </div> <!-- fin del check -->
     </div> <!-- fin de reportes staticos -->
</div> <!-- fin del rr1 -->

        <div class="rr2" style="display:flex; padding-top:4rem;">

          <div class="r3">
            <span style="text-decoration:underline;">Reporte Especifico</span>
            <form class="row">
            <div class="form-group" style="padding-left: 1rem;">
              <label for="esp_d">Dia</label>
              <select class="form-control form-control-sm" id="esp_d" name="esp_d" style="width:4rem;">
                <?php $i=1; while ($i <= 31) {  ?>
                <option value=<?php echo $i; ?>><?php echo $i; ?></option>
              <?php $i++; } ?>
              </select>
            </div>

            <div class="form-group" style="padding-left:1rem;">
              <label for="esp_m">Mes</label>
              <select class="form-control form-control-sm" id="esp_m" name="esp_m" style="width:6rem;">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
              </select>
            </div>

            <div class="form-group" style="padding-left:1rem;">
              <label for="esp_a">Año</label>
              <select class="form-control form-control-sm" id="esp_a" name="esp_a" style="width:6rem;">
              <?php $año=2025; $i=1; while ($i <= 10) {  ?>
                <option value=<?php echo $año; ?>><?php echo $año; ?></option>
              <?php $i++; $año=$año-1; } ?>
              </select>
            </div>
            <div class="form-inline" style="padding:1.5rem 0 0 0.8rem;">
            <button type="button" class="btn btn-primary mb-2 btn-sm" id="b_esp" name="b_esp" onclick="reporte_especifico();">Enviar</button>
            </div>
           </form>
          </div> <!-- end r3 -->

          <div class="r4" style="padding-left: 7rem;">
            <span style="text-decoration:underline;">Reporte Extendido</span>
            <form class="row" style="padding-left:1rem;">
              <div class="form-group">
                <label for="ext_d_i">Inicio</label>
                <select class="form-control form-control-sm" id="ext_d_i" name="ext_d_i" style="width:3.5rem;">
                  <?php $i=1; while ($i <= 31) {  ?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                    <?php $i++; } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ext_d_f">Final</label>
                  <select class="form-control form-control-sm" id="ext_d_f" name="ext_d_f" style="width:3.5rem;">
                    <?php $i=1; while ($i <= 31) {  ?>
                      <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                      <?php $i++; } ?>
                    </select>
                  </div>

                  <div class="form-group" style="padding-left:1rem;">
                    <label for="ext_m_i">Mes Inicial</label>
                    <select class="form-control form-control-sm" id="ext_m_i" name="ext_m_i" style="width:6rem;">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ext_m_f">Mes Final</label>
                    <select class="form-control form-control-sm" id="ext_m_f" name="ext_m_f" style="width:6rem;">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                  </div>

                  <div class="form-group" style="padding-left:1rem;">
                    <label for="ext_a_i">Año Inicial</label>
                    <select class="form-control form-control-sm" id="ext_a_i" name="ext_a_i" style="width:5rem;">
                    <?php $año=2025; $i=1; while ($i <= 10) {  ?>
                      <option value=<?php echo $año; ?>><?php echo $año; ?></option>
                    <?php $i++; $año=$año-1; } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ext_a_f">Año Final</label>
                    <select class="form-control form-control-sm" id="ext_a_f" name="ext_a_f" style="width:5rem;">
                    <?php $año=2025; $i=1; while ($i <= 10) {  ?>
                      <option value=<?php echo $año; ?>><?php echo $año; ?></option>
                    <?php $i++; $año=$año-1; } ?>
                    </select>
                  </div>
            </form>
            <div class="form-inline">
            <button type="button" class="btn btn-primary mb-2 btn-sm" id="b_ext" name="b_ext" onclick="reporte_extendido();">Enviar</button>
            </div>

          </div> <!-- end r4 -->
        </div> <!-- end rr2 -->
    </div><!-- contenedor -->

  </body>
</html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
