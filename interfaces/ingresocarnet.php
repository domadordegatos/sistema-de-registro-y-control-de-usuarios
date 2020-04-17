<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "../procesos/sub_menus_biblioteca.php" ?>
    <link rel="stylesheet" href="../diseño/csscarnet.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../diseño/imagenes/ico.png" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Inicio</title>
  </head>
  <body>

    <!-- <form class="" action="../procesos/validaciontiposcodigo.php" method="post"> -->
      <h1 style="text-align:center; font-family: 'Comfortaa', cursive; font-size:3rem; color:rgb(156, 143, 142);">Bienvenido</h1>
      <h1 style="text-align:center; font-family: 'Comfortaa', cursive; font-size:3rem; color:rgb(156, 143, 142);">Pasa tu carnet por el escaner</h1>
      <div class="centrar">

        <img id="carnet" src="../diseño/imagenes/giff.gif" alt="Pasa tu carnet por el scanner">
        <input type="number" id="codigo" autofocus name="codigo" value="">
        <input type="text" hidden id="aula_spcf" value="P_PRINCIPAL=ON"
      </div>
    <!-- </form> -->

  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $("input[name=codigo]").change(function(){
      var cod = $('#codigo').val();
      cadena="form1=" + $('#codigo').val();
            $.ajax({
              type:"POST",
              url:"../procesos/validaciontiposcodigo.php", //validacion de datos de registro
              data:cadena,
              success:function(r){
                if(r==1){
                  reset();
                  abrir_puerta();
                  console.log("funciona");
                }else if(r==2){
                  document.location.href = "../interfaces/seleccion_de_modulos.php?codigo=" + cod + "&";
                  console.log("otra cosa");
                }else if(r==3){
                  document.location.href = "../interfaces/login.php";
                }else{
                  console.log("error");
                  reset();
                }
              }
            });
            });
          });
          function reset(){
            document.getElementById('codigo').value = "";
          }
</script>
