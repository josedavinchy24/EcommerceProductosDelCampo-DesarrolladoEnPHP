<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
if ($varsesion == null || $varsesion == '' ){
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
$con = "SELECT * FROM `noticia` WHERE `id_noticia`='$id'";
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
<br>

</br>
<h2>Informacion</h2>
<br>

</br>
<label>Resumen: </label>
<label><?php echo $row['descripcion']?></label>
<br>

</br>
<label><a href="<?php echo $row['link']?>" target="_blank">LEER MÁS</label>
<br>

</br>
<a class="btn"  href="noticia.php" style="background-color: #43A047;color: #ffffff;" name="boton">Volver</a>




</div>
</div>
</html>