<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $guardar!="Administrador"){
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
<body >
<link rel="stylesheet" href="style/editarproducto.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <div class="login-page">
        <div class="form">
          <h2>Noticia</h2>
          <form class="login-form" action="base de datos/editar-noticia-bd.php" method="POST" enctype="multipart/form-data">
            <?php
            $noticia=$_POST['id'];
            $sql="SELECT * FROM `noticia` Where id_noticia='$noticia'";
                $resultado=mysqli_query($conexion,$sql);
                $valores = mysqli_fetch_array($resultado);
                
            ?>
           
            <label>Nombre:</label>   
            <textarea id="mensaje" name="nombre" ><?php echo $valores['nombre']?></textarea>
            <input type="hidden" class="minimo" value='<?php echo $noticia;?>' name="noticia" />
            <br>

</br> 

            <label>Descripcion:</label>   
            <textarea id="mensaje" name="descripcion" ><?php echo $valores['descripcion']?></textarea>
            <br>

</br> 
             <label>Link:</label>
             <input type="url"  name="link" value="<?php echo $valores['link']?>" class="minimo"  />
             <br>

</br> 
             
             <label>Nombre archivo Actual:  <?php echo $valores['nombre_imagen']?></label>
            <br>

            </br>
            <input type="file"  name="foto" />
            <br>

            </br>
       
            <input  name="Editar" type="submit" value="editar" />
            <input  name="Eliminar" type="submit" value="eliminar" />
            <input  name="Volver" type="submit" value="volver" />
           

          </form>
         
    
        </div>
      </div>
    
    </body>
    <html>
 