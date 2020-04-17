<?php require_once "../procesos/sub_menus_biblioteca.php" ?>
<script type="text/javascript">
  function seleciono_modulo(){
    var mdl1 = $('input[name="radio"]:checked').val();
    var cod = $('#codigo').val();
    var act = 'a13';
    var acte = 'l52';
    if($('input[id=laboratorios]:checked').length > 0){
    document.location.href = "../interfaces/menulaboratorios.php?mdl1=" + mdl1 + "&cod=" + cod + "&";
    }if($('input[id=biblioteca]:checked').length > 0){
    document.location.href = "../interfaces/menubiblioteca.php?mdl1=" + mdl1 + "&cod=" + cod + "&";
    }if($('input[id=directores]:checked').length > 0){
    // document.location.href = "../interfaces/menubiblioteca.php?mdl1=" + mdl1 + "&cod=" + cod + "&";
    cadena="form1=" + $('#codigo').val() +
           "&form2=" + mdl1 +
           "&form3=" + act +
           "&form4=" + acte;
          $.ajax({
            type:"POST",
            url:"../procesos/modulo_administrativos.php", //validacion de datos de registro
            data:cadena,
            success:function(r){
              if(r==1){
                mesage_wellcome();
                abrir_puerta();
                console.log("bien");
                setTimeout ("redireccionarpaginacarnet();", 2000);
              }else if(r==2){
                console.log("no existe el usuario");
                document.getElementById('directores').checked = false;
              }else{
                console.log("error");
              }
            }
          });
    }
  }
</script>
