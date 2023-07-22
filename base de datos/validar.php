<?php
include("conexion.php");
$conexion=conectar();
 $email=$_POST['email'];
 $clave=$_POST['password'];
 session_start();



 $con = "SELECT `correo`,`contraseña`,`tipo_usuario` FROM `usuario` WHERE correo='$email' AND contraseña='$clave'";
 $resultado=mysqli_query($conexion,$con); 
 $valores = mysqli_fetch_array($resultado);
 $fila = mysqli_num_rows($resultado);
 $guar = $valores['tipo_usuario'];
 if($guar=="Administrador"){
   $_SESSION['email'] = $email;
   header("location:../noticia.php");
 }else if($fila>0){
    $_SESSION['email'] = $email;
     header("location:../bienvenido.php");
 }else{
    header("location:../index.php");
 }
 
?>
    
 
