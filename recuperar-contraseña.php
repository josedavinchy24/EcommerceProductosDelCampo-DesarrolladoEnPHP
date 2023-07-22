<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['email'];
if ($varsesion != null || $varsesion != ''){
    header("location:bienvenido.php");
    die();
}
if(isset($_POST['Enviar'])){
  $correo=$_POST['correo'];
  include("base de datos/conexion.php");
  $conexion=conectar();
  $nueva = rand(10000,9999999999);
  $sql="UPDATE `usuario` SET `contraseña`=$nueva WHERE `correo`=$correo";
  $datos=mysqli_query($conexion,$sql);
  $contenido = "Tu nueva contraseña es: ".$nueva;
  if(!$dato){
    echo '<script>
    alert("error");
    window.history.go(-1);
    </script>
';
exit;
}else{
  mail($correo,"Nueva contraseña: ",$contenido);
    echo '<script>
    alert("se envio nueva contraseña a tu correo");
    window.location.href = "index.php";
    </script>
';
exit;

}
}

?>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style/recuperar.css">
<div class="login-page">
    <div class="form">

      <h2>Recuperar contraseña</h2>

      <form class="login-form" method="post">
        <input type="email" placeholder="Usuario" name="correo" required/>

        <input class="boton" type="submit" value="Enviar" style="background: #4CAF50;text-transform: uppercase;outline: 0;color: #FFFFFF;">
        <p class="message">Volver :    <a href="index.php">iniciar sesion</a></p>
      </form>
    </div>
  </div>
</body>
