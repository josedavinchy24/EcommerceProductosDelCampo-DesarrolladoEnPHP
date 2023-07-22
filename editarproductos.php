<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $guardar=="Administrador" || $guardar=="Comprador"){
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
          <h2>Producto </h2>
          <form class="login-form" action="base de datos/editarproducto-bd.php" method="POST" enctype="multipart/form-data">
            <?php
            $producto=$_POST['id'];
            $sql="SELECT * FROM `producto` Where idproducto='$producto'";
                $resultado=mysqli_query($conexion,$sql);
                $valores = mysqli_fetch_array($resultado);
                $gua= $valores['peso'];
                $guard=$valores['id_nombre_producto'];
            $sql2="SELECT * FROM `lista_producto` where `id_nombre_producto`='$guard'";
            $resultado2=mysqli_query($conexion,$sql2);
                $valores2 = mysqli_fetch_array($resultado2);
            ?>
           
            <label>Producto: <?php echo $valores2['nombre_producto'] ?></label>  
            <br>

            </br> 
            <label>Nombre:</label>   
            <input type="text" class="minimo" value='<?php echo $valores['nombre']; ?>' name="nombre" />
            <input type="hidden" class="minimo" value='<?php echo $producto;?>' name="producto" />
            <input type="hidden" class="minimo" value='<?php echo $valores['peso']?>' name="peso2" />
            <br>

</br> 
            <label>Peso: <?php echo $gua ?></label>
            <div id="elegir">
                <select class="form-select" aria-label="select example" name="peso3">
                <option value="">Peso</option>
                    <option value="Libra">Libra</option>
                    <option value="Kilogramo">Kilogramo</option>
                    <option value="Tonelada">Tonelada</option>
                    <option value="Arroba">Arroba</option>
                    <option value="Gramo">Gramo</option>
                    <option value="Bulto">Bulto</option>
                </select>
                
              </div>
              <br>

            </br>
            <label>Cantidad:</label>   
            <input type="number" class="minimo" value='<?php echo $valores['cantidad'];?>' name="cantidad" />
            <br>

</br> 
             <label>Precio:</label>
             <input type="number" placeholder="precio" name="precio" value="<?php echo $valores['precio']?>" class="minimo"  />
             <br>

</br> 
             <label>Descripcion: </label>
             <textarea id="mensaje" name="descripcion" ><?php echo $valores['descripcion']?></textarea>
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
