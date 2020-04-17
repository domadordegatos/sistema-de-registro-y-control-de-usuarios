<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "./menu_admin.php"?>
    <?php require_once "../procesos/funciones_reportes.php" ?>
    <?php require_once "../procesos/cdn.php" ?>
    <link rel="stylesheet" href="../diseño/margen.css">
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/cssmenuadmin.css">
    <title>Descarga reportes</title>
  </head>
  <body>
    <div class="contenedor text-white">
      <h2>Listado de reportes generados de las aulas</h2>
      <div class="enviar_correo form-inline">
      <label for="" style="padding-right:1rem; font-size:0.9rem;">¿Deseas enviar el reporte a algun correo?</label>
      <input placeholder="Escribelo aqui" type="mail" name="correo" id="correo" class="form-control form-control-sm" style="width:15rem; border-radius:0.8rem;" value="">
      </div>
      <label for="" style="font-size:0.9rem; padding:0;margin-top:0.4rem; border:white solid 2px; border-radius:0.6rem; background:white; color:rgb(0, 68, 158);">Para enviar el archivo por correo, escribelo en el campo de arriba
      y presiona en el boton de enviar del reporte que desees</label>
      <div class="tabla" style="padding:0.8rem 5rem 0 0;">
          <table class="table table-sm text-white table-bordered">
            <thead>
              <tr>
                <th scope="col"># Rport</th>
                <th scope="col">Admin Creador</th>
                <th scope="col">Tipo Reporte</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Hora</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                <?php require_once "../procesos/conexion.php";
                      $conexion=conexion();
 $sql="SELECT  reportes_ingresos_aulas.id_reporte,
               administradores.usuario,
               tipos_reporte.reporte,
               reportes_ingresos_aulas.fecha,
               reportes_ingresos_aulas.hora
               FROM reportes_ingresos_aulas AS reportes_ingresos_aulas
					     INNER JOIN administradores AS administradores ON administradores.idadmin = reportes_ingresos_aulas.id_admin
					     INNER JOIN tipos_reporte AS tipos_reporte ON tipos_reporte.id = reportes_ingresos_aulas.tipo_reporte
               GROUP BY  reportes_ingresos_aulas.id_reporte DESC";
               $result=mysqli_query($conexion,$sql);
               while ($ver=mysqli_fetch_row($result)):?>
               <tr>
                <th style="text-align:center;"><?php echo $ver[0]; ?></th>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>
                <td style="text-align:center;">
                  <a href="../procesos/reporte_pdf_aula.php?id_report=<?php echo $ver[0] ?>" class="btn btn-success btn-sm">
                    <img src="https://i.ibb.co/wpnyRqb/result-4.png" alt="result-4" border="0" style="width:1.2rem;">
                    -Descargar</a>
                    <input hidden type="text" name="" id="id_rep" value="<?php echo $ver[0] ?>">
                     <a onclick="reporte_correo_aula();" class="btn btn-info btn-sm">
                       <img src="https://i.ibb.co/KKcn62c/result-5.png" alt="result-5" border="0" style="width:1.2rem;">
                         -Enviar</a></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>

      </div> <!-- end tabla -->
    </div> <!-- end del contenedor -->

  </body>
</html>
