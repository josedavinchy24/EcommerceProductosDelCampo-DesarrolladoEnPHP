<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $guardar=="Administrador"){
    echo 'Usted no tiene autorizacion';
    die();
}

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
</body>
<link rel="stylesheet" href="style/ver-producto.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<?php

$id=$_POST['id'];
$con = "SELECT * FROM `producto` WHERE `idproducto`='$id'";
$resultado=mysqli_query($conexion,$con); 
$row = mysqli_fetch_array($resultado);
?>
<div class="filtro2">
<div class="contenido">
<h2 class="titulo"><?php echo $row['nombre']?></h2>
<div class="imagen">
<?php
echo '
<img class="card-img-top img-fluid"  src="data:'.$row['tipo'].';base64,'.base64_encode($row['imagen']).'" alt="Card image cap">
';
?>
</div>
<?php
$sql2="SELECT * FROM `usuario` WHERE id_usuario=".$row['id_usuario']."";
$resultado2=mysqli_query($conexion,$sql2);
$row2 = mysqli_fetch_array($resultado2);
?>
<br>

</br>
<h2>Información</h2>
<br>

</br>
<label>Vendedor: <?php echo $row2['nombre']?>  <?php echo $row2['apellido']?></label>
<br>

</br>
<label>Correo: <?php echo $row2['correo']?></label>
<br>

</br>
<label>Celular: <?php echo $row2['celular']?></label>
<br>

</br>
<label>Cantidad: <?php echo $row['cantidad']?>  <?php echo $row['peso']?></label>
<br>

</br>
<label>Precio: <?php echo $row['precio']?></label>
<br>

</br>
<label>Descripcion: <?php echo $row['descripcion']?></label>
<br>

</br>

<a class="btn"  href="bienvenido.php" style="background-color: #43A047;color: #ffffff;" name="boton">Volver</a>


</div>
</div>
</html>