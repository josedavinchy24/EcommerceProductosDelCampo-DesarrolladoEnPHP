<?php
session_start();
$varsesion = $_SESSION['email'];

if ($varsesion == null || $varsesion == ''){
    echo 'Usted no tiene autorizacion';
    die();
}
include("base de datos/conexion.php");
$conexion=conectar();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
include ("navbar.php");
?>
</head>
<body>
<link rel="stylesheet" href="style/reportarcss.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<div class="login-page">
    <div class="form">
      <h2>Reportar</h2>
      
      <form class="login-form" action="base de datos/enviar-reportar.php" method="post">
        <input type="email" placeholder="Usuario" name="email" required/>
        <input type="text" placeholder="Nombre" name="nombre" required/>
        <input type="text" placeholder="Asunto" name="asunto" required/>
        <textarea id="mensaje" placeholder="Mensaje" name="mensaje" required></textarea>
        
        <input class="boton" type="submit" value="Enviar" style="background: #4CAF50;">
      </form>
  
    </div>
  </div>
</body>
</html>