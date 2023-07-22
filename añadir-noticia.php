<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' ||  $guardar != "Administrador"){
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

<link rel="stylesheet" href="style/nueva-noticia.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <div class="login-page">
        <div class="form">
          <h2>Nueva Noticia </h2>
         
          <form class="login-form"  action="base de datos/guardar-noticia.php" method="POST" enctype="multipart/form-data">


            <textarea  id="mensaje" placeholder="Nombre noticia (MAX 200 caracteres)" name="nombre" required maxlength="300"></textarea> 
            <textarea id="mensaje" placeholder="Descripcion (MAX 1000 caracteres)" name="descripcion" required maxlength="1000"></textarea> 
            <input type="url"  id="mostrar" placeholder="link" name="link" required>   
            <input type="hidden" value="<?php echo $varsesion?>" name="usuario"/>
            <input type="file"  name="foto" required />
            <br>

            </br>
       
            <input  name="Guardar" type="submit" value="guardar" />
           

          </form>
    
        </div>
      </div>
    
    </body>
    <html>
