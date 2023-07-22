<?php

include("conexion.php");
$conexion=conectar();
        $producto=$_POST['producto'];
          $nombre=$_POST['nombre'];
          $peso=$_POST['peso2'];

          if(empty($_POST['peso3'])){
              $peso=$_POST['peso2'];
          }else{
            $peso=$_POST['peso3'];  
          }

          $cantidad=$_POST['cantidad'];
          $precio=$_POST['precio'];

          $descripcion=$_POST['descripcion'];

          if(isset($_POST['Editar'])){
            $tipoArchivo = $_FILES['foto']['type'];
              if($tipoArchivo != null || $tipoArchivo!= ""){
                $tipoArchivo = $_FILES['foto']['type'];
                $permitidos = array("imagen/png","image/jpeg");
                if(in_array($tipoArchivo,$permitidos)==false){
                    echo '<script>
            alert("Archivo no permitido");
            window.history.go(-1);
            </script>
        ';
                    die();
                    
                }
                $nombreArchivo = $_FILES['foto']['name'];
                $tamanoArchivo = $_FILES['foto']['size'];
                $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                $binariosImagen = mysqli_escape_string($conexion, $binariosImagen); 
                $editar="UPDATE `producto` SET `nombre`='$nombre',`peso`='$peso',`cantidad`='$cantidad',`precio`='$precio',`descripcion`='$descripcion',`nombre_imagen`='$nombreArchivo',`tipo`='$tipoArchivo',`imagen`='$binariosImagen' WHERE `idproducto`='$producto'";
                $ed=mysqli_query($conexion,$editar);
              }else{
                $editar="UPDATE `producto` SET `nombre`='$nombre',`peso`='$peso',`cantidad`='$cantidad',`precio`='$precio',`descripcion`='$descripcion' WHERE `idproducto`='$producto'";
                $ed=mysqli_query($conexion,$editar);
              }
          }
          if(isset($_POST['Eliminar'])){
                $borrar="DELETE FROM `producto` WHERE `idproducto`='$producto'";
                $ed=mysqli_query($conexion,$borrar);

          }
          if(isset($_POST['Volver'])){
            header('location:../productosvendedor.php');
          }
          if(!$ed){
            echo '<script>
            alert("error");
            window.history.go(-1);
            </script>
        ';
        exit;
        }else{
            echo '<script>
            alert("petición exitosa");
            window.location.href = "../productosvendedor.php";
            </script>
        ';
        exit;
        }
          ?>