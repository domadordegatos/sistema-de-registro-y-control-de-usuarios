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
$sql="SELECT reporte_ingresos.id_reporte,
		         reporte_ingresos.id_registro,
		         tipos_reporte.reporte,
		         administradores.usuario,
		         reporte_ingresos.fecha,
		         reporte_ingresos.hora,
		         reporte_ingresos.f_inicio,
		         reporte_ingresos.f_final,
		         usuarios_registrados.documento_cc,
		         carrera.nombre_carrera,
		         semestre.semestre_info,
		         modulos_centuria.spcf_modulo,
		         actividades.actividad,
		         actividad_especifica.actividad_spcf,
		         estados_movimiento.estado_spcf
               FROM reporte_ingresos
					JOIN registro_actividad  ON registro_actividad.idregistro = reporte_ingresos.id_registro
					JOIN usuarios_registrados ON usuarios_registrados.iduser = registro_actividad.documento
					JOIN administradores ON administradores.idadmin = reporte_ingresos.admin
					JOIN tipos_reporte ON tipos_reporte.id = reporte_ingresos.tipo_reporte
					JOIN modulos_centuria ON modulos_centuria.id_modulo = registro_actividad.modulo
					JOIN actividades ON actividades.idactividad = registro_actividad.actividad
					JOIN actividad_especifica ON actividad_especifica.idactividad_spcf = registro_actividad.actividad_especifica
					JOIN estados_movimiento ON estados_movimiento.id_estado = registro_actividad.movimiento
					JOIN carrera ON carrera.idcarrera = usuarios_registrados.carrera
					JOIN semestre ON semestre.idsemestre = usuarios_registrados.semestre
               WHERE reporte_ingresos.id_reporte = '$id_report' order by reporte_ingresos.id_registro desc";
               $result=mysqli_query($conexion,$sql);
               $ver=mysqli_fetch_row($result);
               $idreporte=$ver[0];
               $admin=$ver[3];
               $tipo_reporte=$ver[2];
               $f_creacion=$ver[4];
               $h_creacion=$ver[5];
               $f_inicio=$ver[6];
               $f_fin=$ver[7];
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
          <th colspan="4" style="text-align:center;">Reporte de ingresos a modulos Unisangil sede Yopal</th>
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
      <thead>
        <tr>
          <th>Rangos de reporte -></th>
          <th>Fecha Inicio: <?php echo $f_inicio ?></th>
          <th colspan="2">Fecha Fin: <?php echo $f_fin ?></th>
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
          <th scope="col">Modulo</th>
          <th scope="col">Espacio</th>
          <th scope="col">Uso</th>
          <th scope="col">Tpo. Movimiento</th>
        </tr>
        </thead>
        <tbody>
          <?php while ($ver=mysqli_fetch_row($result)):?>
          <tr>
            <th scope="row"><?php echo $ver[1]; ?></th>
            <th><?php echo $ver[8]; ?></th>
            <th><?php echo $ver[11]; ?></th>
            <th><?php echo $ver[12]; ?></th>
            <th><?php echo $ver[13]; ?></th>
            <th><?php echo $ver[14]; ?></th>
          </tr>
          <?php endwhile; ?>
        </tbody>
    </table>
  </body>
</html>
