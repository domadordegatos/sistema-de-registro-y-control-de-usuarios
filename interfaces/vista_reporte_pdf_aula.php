<?php
require_once "../procesos/conexion.php";
$conexion=conexion();
date_default_timezone_set('America/Mexico_City');
$id_report= $_GET['id_report'];
$time = time();
$hora = date("H:i:s",$time);
$fecha= date('Y-m-d');
$sql1="SELECT  COUNT(reporte_ingresos.id_registro)
               FROM reporte_ingresos
				     	 JOIN registro_actividad  ON registro_actividad.idregistro = reporte_ingresos.id_registro
               WHERE reporte_ingresos.id_reporte = '$id_report' AND registro_actividad.movimiento = '1'";
               $result=mysqli_query($conexion,$sql1);
               $ver2=mysqli_fetch_row($result);
               $can_registros=$ver2[0];
$sql="SELECT reportes_ingresos_aulas.id_reporte,
		         reportes_ingresos_aulas.id_ingreso,
		         usuarios_registrados.documento_cc,
		         carrera.nombre_carrera,
		         salones.numero_salon,
		         estados_movimiento.estado_spcf,
		         registro_ingresos_aulas.hora,
		         registro_ingresos_aulas.fecha,
		         administradores.usuario,
		         tipos_reporte.reporte,
		         reportes_ingresos_aulas.hora,
		         reportes_ingresos_aulas.fecha
               FROM reportes_ingresos_aulas
					JOIN administradores  ON administradores.idadmin = reportes_ingresos_aulas.id_admin
					JOIN tipos_reporte  ON tipos_reporte.id = reportes_ingresos_aulas.tipo_reporte
					JOIN registro_ingresos_aulas ON registro_ingresos_aulas.id_ingreso = reportes_ingresos_aulas.id_ingreso
					JOIN materias ON materias.id_materia = registro_ingresos_aulas.materia
					JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_ingresos_aulas.documento
					JOIN carrera ON carrera.idcarrera = usuarios_registrados.carrera
					JOIN salones ON salones.id_salon = registro_ingresos_aulas.aula
					JOIN estados_movimiento ON estados_movimiento.id_estado = registro_ingresos_aulas.movimiento
          WHERE reportes_ingresos_aulas.id_reporte = '$id_report'
					order by reportes_ingresos_aulas.id_ingreso desc";
               $result=mysqli_query($conexion,$sql);
               $ver=mysqli_fetch_row($result);
               $idreporte=$ver[0];
               $admin=$ver[8];
               $tipo_reporte=$ver[9];
               $f_creacion=$ver[11];
               $h_creacion=$ver[10];
               $id_r=$ver[1];
                 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista pdf</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  </head>
  <body>
    <style media="screen">
      th{
        border:1px solid black;
        padding: 0.3  rem;
      }
    </style>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th colspan="4" style="text-align:center;">Reporte de ingresos Aulas Unisangil sede Yopal</th>
        </tr>
        <tr>
          <th>#Reporte: 00<?php echo $idreporte; ?></th>
          <th colspan="2">#Fecha descarga: <?php echo $fecha ?></th>
          <th>Hora descarga: <?php echo $hora ?></th>
        </tr>
      </thead>
      <thead>
        <tr>
          <th>Rprt. Generado por: <?php echo $admin ?></th>
          <th>Tipo Reporte: <?php echo $tipo_reporte ?></th>
          <th>Fecha Creación: <?php echo $f_creacion ?></th>
          <th>Hora Creación: <?php echo $h_creacion ?></th>
        </tr>
      </thead>
    </table>
    <p>El presente registro contiene información clasificada que solo podra ser usada
    para la entrega de informes de usuarios administrativos, analisis estatidisico para la mejora
    de los entornos, seguimiento a usuarios especificos con el fin de detallar robos, daños u otras
    circunstancias. Tambien esta sujeta a todos los derechos de privacidad y tratamiento de la información
    de Unisangil. </p>
    <table class="table table-bordered table-sm" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th scope="col"># Registro</th>
          <th scope="col">Documento</th>
          <th scope="col">Materia</th>
          <th scope="col">Aula</th>
          <th scope="col">Tpo. Movimiento</th>
          <th scope="col">Hora</th>
          <th scope="col">Fecha</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <th><?php echo $ver[1]; ?></th>
            <th><?php echo $ver[2]; ?></th>
            <th><?php echo $ver[4]; ?></th>
            <th><?php echo $ver[3]; ?></th>
            <th><?php echo $ver[5]; ?></th>
            <th><?php echo $ver[6]; ?></th>
            <th><?php echo $ver[7]; ?></th>
          </tr>
          <?php while ($ver=mysqli_fetch_row($result)):?>
          <tr>
            <th scope="row"><?php echo $ver[1]; ?></th>
            <th><?php echo $ver[2]; ?></th>
            <th><?php echo $ver[4]; ?></th>
            <th><?php echo $ver[3]; ?></th>
            <th><?php echo $ver[5]; ?></th>
            <th><?php echo $ver[6]; ?></th>
            <th><?php echo $ver[7]; ?></th>
          </tr>
          <?php endwhile; ?>
        </tbody>
    </table>
  </body>
</html>
