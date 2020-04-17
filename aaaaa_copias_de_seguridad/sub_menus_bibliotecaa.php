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
} function frm4(){
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm4").style.display = '';
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm6").style.display = "none";
} function frm5(){
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm5").style.display = '';
 document.getElementById("frm6").style.display = "none";
} function frm6(){
 document.getElementById("frm5").style.display = "none";
 document.getElementById("frm4").style.display = "none";
 document.getElementById("frm3").style.display = "none";
 document.getElementById("frm6").style.display = '';
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
      // document.write(fm2);
      // console.log("funciona");
      cadena="form1=" + fm1 +
      "&form2=" + fm2 +
      "&form3=" + fm3 +
      "&form4=" + fm4 +
      "&form5=" + fm5 ;

      $.ajax({
        type:"POST",
        url:"../procesos/entrada_salidaa.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
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
             console.log("funciona esta popo");
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

</script>
