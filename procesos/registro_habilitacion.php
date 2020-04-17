<script type="text/javascript">
function agregar_docente(){
  if($('#ag_docente_nom').val()=="" || $('#ag_docente_ape').val()==""){
    alertify.alert("Campos faltantes");
  }else{
  cadena="form1=" + $('#ag_docente_nom').val() +
        "&form2=" + $('#ag_docente_ape').val() +
        "&form3=" + $('#ag_docente_est').val();
  $.ajax({
    type:"POST",
    url:"../controlador/registro_habilitacion/ag_doc.php", //validacion de datos de registro
    data:cadena,
    success:function(r){
      if(r==1){
        message_exito();
        document.getElementById('ag_docente_nom').value = "";
        document.getElementById('ag_docente_ape').value = "";
        setTimeout ("location.reload();", 500);
      }else if(r==0){
        message_error();
      }else{
        message_alerta();
      }
    }
  });
}
}
  function actualizar_docente(){
    if($('#ac_docente_id').val() != 'A'){
      cadena="form1=" + $('#ac_docente_nom').val() +
            "&form2=" + $('#ac_docente_ape').val() +
            "&form3=" + $('#ac_docente_est').val() +
            "&form4=" + $('#ac_docente_id').val();
            $.ajax({
              type:"POST",
              url:"../controlador/registro_habilitacion/ac_doc.php", //validacion de datos de registro
              data:cadena,
              success:function(r){
                if(r==1){
                  message_exito();
                  setTimeout ("location.reload();", 500);
                }else if(r==0){
                  message_error();
                }else{
                  message_alerta();
                }
              }
            });
    }else{
      alertify.error("Selecciona un docente");
    }
    }
        function actualizar_aula(){
          if($('#ac_aula_id').val() != 'A'){
          cadena="form1=" + $('#ac_aula_nom').val() +
                "&form2=" + $('#ac_aula_est').val() +
                "&form3=" + $('#ac_aula_id').val();
                $.ajax({
                  type:"POST",
                  url:"../controlador/registro_habilitacion/ac_aul.php", //validacion de datos de registro
                  data:cadena,
                  success:function(r){
                    if(r==1){
                      message_exito();
                      setTimeout ("location.reload();", 500);
                    }else if(r==0){
                      message_error();
                    }else{
                      message_alerta();
                    }
                  }
                });
              }else{
                alertify.error("Selecciona un aula");
              }
              }
       function actualizar_materia(){
         if($('#ac_materia_id').val() != 'A'){
         cadena="form1=" + $('#ac_materia_id').val() +
               "&form2=" + $('#ac_materia_nom').val() +
               "&form3=" + $('#ac_materia_est').val();
               $.ajax({
                 type:"POST",
                 url:"../controlador/registro_habilitacion/ac_mat.php", //validacion de datos de registro
                 data:cadena,
                 success:function(r){
                   if(r==1){
                     message_exito();
                     setTimeout ("location.reload();", 500);
                   }else if(r==0){
                     message_error();
                   }else{
                     message_alerta();
                   }
                 }
               });
             }else{
              alertify.error("Selecciona una materia");
             }
             }
      function actualizar_actividad(){
        if($('#ac_actividad_id').val() != 'A'){
        cadena="form1=" + $('#ac_actividad_id').val() +
              "&form2=" + $('#ac_actividad_nom').val() +
              "&form3=" + $('#ac_actividad_mod').val() +
              "&form4=" + $('#ac_actividad_gru').val() +
              "&form5=" + $('#ac_actividad_est').val();
              $.ajax({
                type:"POST",
                url:"../controlador/registro_habilitacion/ac_act.php", //validacion de datos de registro
                data:cadena,
                success:function(r){
                  if(r==1){
                    message_exito();
                    setTimeout ("location.reload();", 500);
                  }else if(r==0){
                    message_error();
                  }else{
                    message_alerta();
                  }
                }
              });
            }else{
             alertify.error("Selecciona una actividad");
            }
            }
            function actualizar_clase(){
              if($('#ac_clase_mat').val() != 'A'){
              cadena="form1=" + $('#ac_clase_mat').val() +
                    "&form2=" + $('#ac_clase_dia').val() +
                    "&form3=" + $('#ac_clase_hin').val() +
                    "&form4=" + $('#ac_clase_hfi').val() +
                    "&form5=" + $('#ac_clase_sal').val() +
                    "&form6=" + $('#ac_clase_doc').val() +
                    "&form7=" + $('#ac_clase_est').val();
                    $.ajax({
                      type:"POST",
                      url:"../controlador/registro_habilitacion/ac_cla.php", //validacion de datos de registro
                      data:cadena,
                      success:function(r){
                        if(r==1){
                          message_exito();
                          setTimeout ("location.reload();", 500);
                        }else if(r==0){
                          message_error();
                        }else{
                          message_alerta();
                        }
                      }
                    });
                  }else{
                   alertify.error("Selecciona una clase");
                  }
                  }
        function agregar_aula(){
          if($('#ag_aula_nom').val()==""){
            alertify.alert("Campos faltantes");
          }else{
          cadena="form1=" + $('#ag_aula_nom').val() +
                "&form2=" + $('#ag_aula_est').val();
                $.ajax({
                  type:"POST",
                  url:"../controlador/registro_habilitacion/ag_aul.php", //validacion de datos de registro
                  data:cadena,
                  success:function(r){
                    if(r==1){
                      message_exito();
                      setTimeout ("location.reload();", 500);
                    }else if(r==0){
                      message_error();
                    }else{
                      message_alerta();
                    }
                  }
                });
                }
              }
        function agregar_materia(){
          if($('#ag_mat_nom').val()==""){
            alertify.alert("Campos faltantes");
          }else{
          cadena="form1=" + $('#ag_mat_id').val() +
                "&form2=" + $('#ag_mat_est').val() +
                "&form3=" + $('#ag_mat_nom').val();
                $.ajax({
                  type:"POST",
                  url:"../controlador/registro_habilitacion/ag_mat.php", //validacion de datos de registro
                  data:cadena,
                  success:function(r){
                    if(r==1){
                      message_exito();
                      setTimeout ("location.reload();", 500);
                    }else if(r==0){
                      message_error();
                    }else{
                      message_alerta();
                    }
                  }
                });
                }
              }
      function agregar_clase(){
        if($('#ag_clase_mat').val()=="" || $('#ag_clase_dia').val()=="" || $('#ag_clase_hin').val()=="" || $('#ag_clase_hfi').val()=="" || $('#ag_clase_sal').val()=="" || $('#ag_clase_doc').val()==""){
          alertify.alert("Campos faltantes");
        }else{
        cadena="form1=" + $('#ag_clase_mat').val() +
              "&form2=" + $('#ag_clase_dia').val() +
              "&form3=" + $('#ag_clase_hin').val() +
              "&form4=" + $('#ag_clase_hfi').val() +
              "&form5=" + $('#ag_clase_sal').val() +
              "&form6=" + $('#ag_clase_doc').val() +
              "&form7=" + $('#ag_clase_est').val();
              $.ajax({
                type:"POST",
                url:"../controlador/registro_habilitacion/ag_cla.php", //validacion de datos de registro
                data:cadena,
                success:function(r){
                  if(r==1){
                    message_exito();
                    // setTimeout ("location.reload();", 500);
                  }else if(r==0){
                    message_error();
                  }else{
                    message_alerta();
                  }
                }
              });
              }
            }
        function agregar_actividad(){
          if($('#ag_actividad_nom').val()=="" || $('#ag_actividad_mod').val()=="" || $('#ag_actividad_gru').val()==""){
            alertify.alert("Campos faltantes");
          }else{
          cadena="form1=" + $('#ag_actividad_id').val() +
                "&form2=" + $('#ag_actividad_nom').val() +
                "&form3=" + $('#ag_actividad_mod').val() +
                "&form4=" + $('#ag_actividad_gru').val() +
                "&form5=" + $('#ag_actividad_est').val();
                $.ajax({
                  type:"POST",
                  url:"../controlador/registro_habilitacion/ag_act.php", //validacion de datos de registro
                  data:cadena,
                  success:function(r){
                    if(r==1){
                      message_exito();
                      setTimeout ("location.reload();", 500);
                    }else if(r==0){
                      message_error();
                    }else{
                      message_alerta();
                    }
                  }
                });
                }
              }


function message_exito(){
  alertify.success("Reporte creado exitosamente");
  return false;
} function message_error(){
  alertify.error("Este registro se encuentra ya en base de datos");
  return false;
} function message_alerta(){
  alertify.error("Error en el proceso");
  return false;
}
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#ac_docente_id').change(function(){
        $.ajax({
          type:"POST",
          data:"id_doc=" +$('#ac_docente_id').val(),
          url:"../controlador/registro_habilitacion/ob_doc.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
              $('#ac_docente_nom').val(dato['nombre']);
              $('#ac_docente_ape').val(dato['apellido']);
              $('#ac_docente_est').val(dato['state']);
          }
        });
      });
      $('#ac_aula_id').change(function(){
        $.ajax({
          type:"POST",
          data:"id_aul=" +$('#ac_aula_id').val(),
          url:"../controlador/registro_habilitacion/ob_aul.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
              $('#ac_aula_nom').val(dato['numero_salon']);
              $('#ac_aula_est').val(dato['state']);
          }
        });
      });
      $('#ac_materia_id').change(function(){
        $.ajax({
          type:"POST",
          data:"id_mat=" +$('#ac_materia_id').val(),
          url:"../controlador/registro_habilitacion/ob_mat.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
              $('#ac_materia_nom').val(dato['descripcion_m']);
              $('#ac_materia_est').val(dato['state_materia']);
          }
        });
      });
      $('#ac_actividad_id').change(function(){
        $.ajax({
          type:"POST",
          data:"id_act=" +$('#ac_actividad_id').val(),
          url:"../controlador/registro_habilitacion/ob_act.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
            $('#ac_actividad_nom').val(dato['actividad_spcf']);
            $('#ac_actividad_mod').val(dato['modulo']);
            $('#ac_actividad_gru').val(dato['card']);
            $('#ac_actividad_est').val(dato['state']);
          }
        });
      });
      $('#ac_clase_mat').change(function(){
        $.ajax({
          type:"POST",
          data:"id_cla=" +$('#ac_clase_mat').val(),
          url:"../controlador/registro_habilitacion/ob_cla.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
            $('#ac_clase_dia').val(dato['dia']);
            $('#ac_clase_hin').val(dato['h_inicio']);
            $('#ac_clase_hfi').val(dato['h_final']);
            $('#ac_clase_sal').val(dato['salon']);
            $('#ac_clase_doc').val(dato['docente']);
            $('#ac_clase_est').val(dato['state']);
          }
        });
      });
  });
</script>
