<?php
session_start();
require_once "conexion.php";
$conexion=conexion();
$Usuario=$_POST['usuario'];
$Clave=$_POST['password'];

   function stado($Usuario,$Clave){
     require_once "conexion.php";
     $conexion=conexion();
     $sqll = "SELECT usuario, password, state from administradores where usuario='$Usuario'
              and password='$Clave'";
              $result = mysqli_query($conexion, $sqll);
              $ver=mysqli_fetch_row($result);
              $state=$ver[2];
              return $state;
   }
     if ($stado=stado($Usuario,$Clave) == '1') {
     $_SESSION['user']=$Usuario;
     echo 1;
    }else{
      if($stado=stado($Usuario,$Clave) == '0'){
        echo 2;
      }else{
        echo 0;
      }
   }
 ?>
