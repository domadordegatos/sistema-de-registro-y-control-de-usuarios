<script type="text/javascript">
function reporte_historial(){
  check();
  cadena="form1=" + $('#his_c').val() +
        "&form2=" + $('#bibli').val() +
        "&form3=" + $('#lab').val() +
        "&form4=" + $('#dir').val();
  $.ajax({
    type:"POST",
    url:"../controlador/r_historial.php", //validacion de datos de registro
    data:cadena,
    success:function(r){
      if(r==1){
        message_exito();
        uncheck();
      }else if(r==0){
        message_error();
        uncheck();
      }else{
        message_alerta();
        uncheck();
      }
    }
  });
}
function reporte_estatico(){
  if(!document.querySelector('input[name="v_estatico"]:checked')) {
    alertify.error("Debes seleccionar el limite del reporte, a la izquierda del boton presionado");
    return false;
  }else{
    var limite = $('input[name="v_estatico"]:checked').val();
        check();
        cadena="form1=" + $('#his_c').val() +
              "&form2=" + $('#bibli').val() +
              "&form3=" + $('#lab').val() +
              "&form4=" + $('#dir').val() +
              "&form5=" + limite;
        $.ajax({
          type:"POST",
          url:"../controlador/r_estatico.php", //validacion de datos de registro
          data:cadena,
          success:function(r){
            if(r==1){
              alertify.success("Reporte de Dia generado exitosamente");
              uncheck();
              return false;
            }else if(r==2){
              alertify.success("Reporte de Semana generado exitosamente");
              uncheck();
              return false;
            }else if(r==3){
              alertify.success("Reporte de Mes generado exitosamente");
              uncheck();
              return false;
            }else{
              message_alerta();
              uncheck();
            }
          }
        });
    }//fin del sino
}
  function reporte_especifico(){
    check();
    cadena="form1=" + $('#his_c').val() +
          "&form2=" + $('#bibli').val() +
          "&form3=" + $('#lab').val() +
          "&form4=" + $('#dir').val() +
          "&form5=" + $('#esp_d').val() +
          "&form6=" + $('#esp_m').val() +
          "&form7=" + $('#esp_a').val();
    $.ajax({
      type:"POST",
      url:"../controlador/r_especifico.php", //validacion de datos de registro
      data:cadena,
      success:function(r){
        if(r==1){
          message_exito();
          uncheck();
        }else if(r==2){
          alertify.error("No existen reportes de esta fecha");
          uncheck();
          return false;
        }else{
          message_alerta();
          uncheck();
        }
      }
    });
  }


  function reporte_extendido(){
    check();
    cadena="form1=" + $('#his_c').val() +
          "&form2=" + $('#bibli').val() +
          "&form3=" + $('#lab').val() +
          "&form4=" + $('#dir').val() +
          "&form5=" + $('#ext_d_i').val() +
          "&form6=" + $('#ext_d_f').val() +
          "&form7=" + $('#ext_m_i').val() +
          "&form8=" + $('#ext_m_f').val() +
          "&form9=" + $('#ext_a_i').val() +
          "&form10=" + $('#ext_a_f').val();
    $.ajax({
      type:"POST",
      url:"../controlador/r_extendido.php", //validacion de datos de registro
      data:cadena,
      success:function(r){
        if(r==1){
          message_exito();
          uncheck();
        }else if(r==2){
          alertify.error("No existen reportes de esta fecha");
          uncheck();
          return false;
        }else{
          message_alerta();
          uncheck();
        }
      }
    });
  }

  function reporte_correo(){
    cadena="form1=" + $('#correo').val() +
          "&form2=" + $('#id_rep').val();
    $.ajax({
      type:"POST",
      url:"../procesos/reporte_mail.php", //validacion de datos de registro
      data:cadena,
      success:function(r){
        if(r==1){
          alertify.success("el correo se envio exitosamente, verifica tu bandeja de entrada");
          return false;
        }else if(r==2){
          alertify.error("Por alguna rara razon no se puede descargar este reporte");
          return false;
        }else{
          message_alerta();
        }
      }
    });
  }
  function reporte_correo_aula(){
    cadena="form1=" + $('#correo').val() +
          "&form2=" + $('#id_rep').val();
    $.ajax({
      type:"POST",
      url:"../procesos/reporte_mail_aula.php", //validacion de datos de registro
      data:cadena,
      success:function(r){
        if(r==1){
          alertify.success("el correo se envio exitosamente, verifica tu bandeja de entrada");
          return false;
        }else if(r==2){
          alertify.error("Por alguna rara razon no se puede descargar este reporte");
          return false;
        }else{
          message_alerta();
        }
      }
    });
  }
</script>


<script type="text/javascript">
function message_exito(){
  alertify.success("Reporte creado exitosamente");
  return false;
} function message_error(){
  alertify.error("El usuario no existe por favor verifique el codigo");
  return false;
} function message_alerta(){
  alertify.error("Error en el proceso");
  return false;
}

  function check(){
   if( $('#bibli').is(':checked') ) {
    document.getElementById('bibli').value = "m2";
  }if( $('#lab').is(':checked') ) {
    document.getElementById('lab').value = "m1";
  }if( $('#dir').is(':checked') ) {
    document.getElementById('dir').value = "m3";
  }
}
  function uncheck(){
    document.getElementById('bibli').value = "";
    document.getElementById('lab').value = "";
    document.getElementById('dir').value = "";
    document.getElementById('inlineRadio1').checked = false;
    document.getElementById('inlineRadio2').checked = false;
    document.getElementById('inlineRadio3').checked = false;
  }
  function button_est(){
   if( $('#bibli').is(':checked') ) {
    document.getElementById('b_est_d').value = "m2";
  }if( $('#lab').is(':checked') ) {
    document.getElementById('b_est_d').value = "m1";
  }if( $('#dir').is(':checked') ) {
    document.getElementById('b_est_d').value = "m3";
  }
}
//codigo para tabla de datos temp aulas
function r_cc(){
  document.getElementById('aula_select').value = "A";
  cadena="form1=" + $('#his_c').val() +
         "&form2=" + $('#esp_d').val() +
         "&form3=" + $('#esp_m').val() +
         "&form4=" + $('#esp_a').val();
  $.ajax({
    type:"POST",
    url:"../controlador/r_cc.php", //validacion de datos de registro
    data:cadena,
    success:function(r){
      if(r==1){
        alertify.success("Registros encontrados");
        $('#tabla').load("temporal_aulas.php");
      }else if(r==2){
        alertify.error("No existen registros");
        $('#tabla').load("temporal_aulas.php");
        return false;
      }else{
        message_alerta();
      }
    }
  });
} function r_aula(){
  document.getElementById('his_c').value = "";
  cadena="form1=" + $('#aula_select').val() +
         "&form2=" + $('#esp_d').val() +
         "&form3=" + $('#esp_m').val() +
         "&form4=" + $('#esp_a').val();
  $.ajax({
    type:"POST",
    url:"../controlador/r_aulas.php", //validacion de datos de registro
    data:cadena,
    success:function(r){
      if(r==1){
        alertify.success("Registros de aula encontrados");
        $('#tabla').load("temporal_aulas.php");
      }else if(r==2){
        alertify.error("No existen registros de esta aula");
        $('#tabla').load("temporal_aulas.php");
        return false;
      }else{
        message_alerta();
      }
    }
  });
} function crear_pdf_aula(){
    cadena="form1=" + $('#his_c').val() +
          "&form2=" + $('#aula_select').val();
  $.ajax({
    type:"POST",
    url:"../controlador/crear_pdf_aula.php",
    data:cadena,
    success:function(r){
      if(r==1){
        alertify.success("Reporte creado exitosamente, revisa los reportes creados");
        $('#tabla').load("temporal_aulas.php");
        document.getElementById('his_c').value = "";
        document.getElementById('aula_select').value = "A";
      }else if(r==2){
        alertify.error("Error del sistema");
      }else{
        message_alerta();
      }
    }
  });
}

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load("temporal_aulas.php");
	});
</script>
