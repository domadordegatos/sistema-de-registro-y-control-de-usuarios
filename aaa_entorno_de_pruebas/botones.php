<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <button type="button" name="button" onclick="abrir_puerta();">abrir</button>
  </body>
</html>
<script type="text/javascript">
function abrir_puerta(){
   fetch('http://192.168.0.10/?P_PRINCIPAL=ON')
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
