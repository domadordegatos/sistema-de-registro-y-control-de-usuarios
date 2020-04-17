<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
      <meta name="viewport" content="width:device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="../diseño/imagenes/ico.png" />
      <link rel="stylesheet" href="../diseño/csslogin.css" type="text/css">
      <link rel="stylesheet" href="../diseño/bootstrap.css" type="text/css">
      <?php require_once "../procesos/cdn.php" ?>
</head>
<body>
  <div class="form-group" id="titulo" >
    <h1 class="text-white bg-dark">Menu del administador</h1>
  </div>

  <div class="contenedor">
    <form class="form" action="../procesos/login2.php" method="POST">

      <div class="form-group">
        <input type="text" name="usuario" id="usuario" placeholder="Digite su usuario" required class="form-control" maxlength="40" pattern="[A-Za-z0-9]+">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Digite su contraseña" required class="form-control" maxlength="40" pattern="[A-Za-z0-9]+">
      </div>
      <div class="form-group" id="boton">
        <button id="entrarSistema" type="button" class="btn btn-light" name="button">Enviar</button>
      </div>

    </form>

  </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar la contraseña");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() +
					 "&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"../procesos/login2.php",
						data:cadena,
						success:function(r){
							      if(r==1){
								window.location="./inicio.php";
              }else if(r==2){
                alertify.alert("Tu usuario esta inactivo, llama a soporte");
                document.getElementById('usuario').value = "";
                document.getElementById('password').value = "";
                return false;
              }else{
                alertify.alert("El usuario o la contraseña estan mal escritos, o no existen, por favor intentalo nuevamente o contacta a soporte");
                document.getElementById('usuario').value = "";
                document.getElementById('password').value = "";
                return false;
              }
						}
			});
		});
	});
</script>
