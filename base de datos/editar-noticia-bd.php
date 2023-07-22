<?php

include("conexion.php");
$conexion=conectar();
        $noticia=$_POST['noticia'];
          $nombre=$_POST['nombre'];
          $descripcion=$_POST['descripcion'];
          $link=$_POST['link'];

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
                $editar="UPDATE `noticia` SET `nombre`='$nombre',`descripcion`='$descripcion',`link`='$link',`nombre_imagen`='$nombreArchivo',`tipo`='tipoArchivo',`imagen`='$binariosImagen' WHERE `id_noticia`='$noticia'";
                $ed=mysqli_query($conexion,$editar);
              }else{
                $editar="UPDATE `noticia` SET `nombre`='$nombre',`descripcion`='$descripcion',`link`='$link' WHERE `id_noticia`='$noticia'";
                $ed=mysqli_query($conexion,$editar);
              }
          }
          if(isset($_POST['Eliminar'])){
                $borrar="DELETE FROM `noticia` WHERE `id_noticia`='$noticia'";
                $ed=mysqli_query($conexion,$borrar);

          }
          if(isset($_POST['Volver'])){
            header('location:../vermisnoticias.php');
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
            window.location.href = "../vermisnoticias.php";
            </script>
        ';
        exit;
        }
          ?>