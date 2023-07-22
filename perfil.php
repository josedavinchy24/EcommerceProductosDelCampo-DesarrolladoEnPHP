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
<?php

 $usuario="SELECT * FROM `usuario` WHERE `correo`='$varsesion'";
$resultado=mysqli_query($conexion,$usuario);
$row = mysqli_fetch_array($resultado);

?>
</head>
<body>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">   
<link rel="stylesheet" href="style/perfilcss.css">
<div class="login-page">
    <div class="form">
      <h2>Perfil</h2>
      <form class="login-form" action="base de datos/editar-perfil.php" method="post">
      <input type="hidden" value='<?php echo $row["id_usuario"]; ?>' name="id">
      <label id=label1>Nombre :&nbsp;&nbsp;<a id="info"><?php echo $row["nombre"]; ?></a> </label>
      <label id=label1>Apellidos :<a id="info"><?php echo $row["apellido"]; ?></a> </label>
      <label id=label1>Fecha :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="info"><?php echo $row["fecha_nacimiento"]; ?></a> </label>
      <label id=label1>Correo :&nbsp;&nbsp;&nbsp;&nbsp;<a id="info" ><?php echo $row["correo"]; ?></a> </label>
      <label id=label1>Tipo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="info" ><?php echo $row["tipo_usuario"]; ?></a> </label>
      <label id=label1>Contraseña :<input type="password" value='<?php echo $row["contraseña"]; ?>' maxlength="10" name="contraseña"></label>
      <label id=label1>Celular:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="tel" value='<?php echo $row["celular"]; ?>' name="celular"></label>
      <label id=label1>Direccion:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value='<?php echo $row["direccion"]; ?>'  name="direccion"></label>
      <?php mysqli_free_result($resultado);
      
       ?> 
 
        
      <input class="boton" type="submit" value="Editar" style="background: #4CAF50;width:100%;margin:0%">

        
      </form>

    </div>
  </div>

</body>
</html>