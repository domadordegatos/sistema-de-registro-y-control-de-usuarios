<?php
session_start();
 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered" style="color:white;">
      <tr>
        <th>Id. Acceso</th>
        <th>Id. Usuario</th>
        <th>Carrera</th>
        <th>Aula</th>
        <th>Materia</th>
        <th>Movimiento</th>
        <th>Hora</th>
        <th>Fecha</th>
      </tr>
      <?php
      if (isset($_SESSION['tabla_aulas_temp'])):
        foreach (@$_SESSION['tabla_aulas_temp'] as $key) {
        $dat=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat[0] ?></th>
         <th><?php echo $dat[1] ?></th>
         <th><?php echo $dat[2] ?></th>
         <th><?php echo $dat[3] ?></th>
         <th><?php echo $dat[4] ?></th>
         <th><?php echo $dat[5] ?></th>
         <th><?php echo $dat[6] ?></th>
         <th><?php echo $dat[7] ?></th>
       </tr>

<?php } ?>
<a class="btn btn-success btn-sm" onclick="crear_pdf_aula();"> 
  <img src="https://i.ibb.co/wpnyRqb/result-4.png" alt="result-4" border="0" style="width:1.2rem;">
  -Descargar PDF</a>
<?php endif;?>
   </table>
  </body>
</html>
