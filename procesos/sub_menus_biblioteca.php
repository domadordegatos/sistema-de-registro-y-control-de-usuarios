<script type="text/javascript">
function frm12() {
 if ($('input[name=rating1-2]:checked').length > 0) {
 document.getElementById("frm2").style.display = '';
}}
function desplegarsemestre() {
 if ($('input[name=rating1]:checked').length > 0) {
 document.getElementById("frm1-2").style.display = '';
}}
  function frm3() {
 document.getElementById("frm3").style.display = '';
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = "none";
} function frm4(){
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm4").style.display = '';
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = "none";
} function frm5(){
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm5").style.display = '';
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = "none";
} function frm6(){
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm6").style.display = '';
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = "none";
} function frm7(){
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = '';
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = "none";
} function frm8(){
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = '';
 document.getElementById("frm9").style.display = "none";
} function frm9(){
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm6").style.display = "none";
 document.getElementById("frm7").style.display = "none";
 document.getElementById("frm8").style.display = "none";
 document.getElementById("frm9").style.display = '';
} function mesage_wellcome(){
  document.getElementById("mesage").style.display = '';
}
 function enviar(){
   if ($('input[name=rating1]:checked').length > 0) {
     validardocenteoinvitado();
     if ($('input[name=rating1-2]:checked').length > 0) {
      if ($('input[name=rating2]:checked').length > 0) {
       if ($('input[name=rating3]:checked').length > 0) {
         extraeryenviar();
     }
    }
   }
 }
  validarseleccionespacio(); //valida la seleccion de espacio como ultima seleccion y redirecciona
}
    function extraeryenviar(){
      var fm1 = $('input[name="rating1"]:checked').val();
      var fm2 = $('input[name="rating1-2"]:checked').val();
      var fm3 = $('input[name="rating2"]:checked').val();
      var fm4 = $('input[name="rating3"]:checked').val();
      var fm5 = $('#codigo').val();
      var fm6 = $('#modulo').val();
      // document.write(fm2);
      // console.log("funciona");
      cadena="form1=" + fm1 +
      "&form2=" + fm2 +
      "&form3=" + fm3 +
      "&form4=" + fm4 +
      "&form5=" + fm5 +
      "&form6=" + fm6 ;

      $.ajax({
        type:"POST",
        url:"../procesos/entrada_salidaa.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
            mesage_wellcome();
            abrir_puerta();
            setTimeout ("redireccionarpaginacarnet();", 2000); //falta mensaje de entrada
            console.log("redirecionando... funciona el registro");
           }else{
            console.log("no funciona el registro");
          }
        }
      });
    }

    function redireccionarpaginacarnet(){
     window.location="../interfaces/ingresocarnet.php";
     }

     function usuarioregistrado(){ //prueba de onload
       if(($('input[name=rating1]:checked').length > 0) && ($('input[name=rating1-2]:checked').length > 0)){
         console.log("me llamaron");
         document.getElementById("frm1").style.display = "none";
         document.getElementById("frm1-2").style.display = "none";
         document.getElementById("frm2").style.display = '';
                // validarseleccionespacio();
              }
     }
     function estudianteregistrado(){ //prueba de onload
       if(($('input[name=rating1]:checked').length > 0) && ($('input[name=rating1-2]:checked').length > 0)){
         console.log("me llamaron y soy estudiante");
         document.getElementById("frm2").style.display = '';
                // validarseleccionespacio();
              }
     }

     function validardocenteoinvitado(){
       if($('input[name=rating1]:checked').length > 0){  //funcion independiente
         if(($('input[id=docente]:checked').length > 0) || ($('input[id=invitado]:checked').length > 0)){
           console.log("docente o invitado");
           document.getElementById("frm2").style.display = '';
           document.getElementById("na").checked = true;
         }else{
           console.log("eres estudiante");
           if(($('input[name=rating1]:checked').length > 0) && ($('input[name=rating1-2]:checked').length > 0)){
             estudianteregistrado();
             console.log("funciona esta vaina");
           }else{
           desplegarsemestre();
         }
       }
     }
   }

     function validarseleccionespacio(){
       if (($('input[name=rating1]:checked').length > 0) && ($('input[id=espacio]:checked').length > 0)) {
                 document.getElementById("rb18").checked = true;
               extraeryenviar();
         }
     }

     function abrir_puerta(){
       var ip = 11;
       var link = $('#aula_spcf').val();
       // console.log("http://192.168.0.30/?"+link+"");
       // fetch('http://192.168.0.30/?LED10=ON')
       fetch("http://192.168.0."+ip+"/?"+link+"")
        .then(
          function(response) {
            if (response.status !== 200) {
              console.log('Looks like there was a problem. Status Code: ' +
              response.status);
              return;
            }
            // Examine the text in the response
            response.json().then(function(data) {
              console.log(data);
            });
          }
        )
        .catch(function(err) {
          console.log('Fetch Error :-S', err);
        });
     }
     function abrir_centuria(){
       var ip = 11;
       var link = 'P_PRINCIPAL=ON';
       fetch("http://192.168.0."+ip+"/?"+link+"")
        .then(
          function(response) {
            if (response.status !== 200) {
              console.log('Looks like there was a problem. Status Code: ' +
              response.status);
              return;
            }
            // Examine the text in the response
            response.json().then(function(data) {
              console.log(data);
            });
          }
        )
        .catch(function(err) {
          console.log('Fetch Error :-S', err);
        });
     }
</script>
