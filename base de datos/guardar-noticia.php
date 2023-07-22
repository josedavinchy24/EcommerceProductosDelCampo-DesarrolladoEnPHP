<?php 
include("conexion.php");
$conexion=conectar();
$desc= "  ";
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$link=$_POST['link'];
$correo=$_POST['usuario'];
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
        $query3= "SELECT `id_usuario`,`correo` FROM `usuario` WHERE `correo`='$correo'";
        $res3 = mysqli_query($conexion, $query3);
        $valor_id = mysqli_fetch_array($res3);
        $dato2=$valor_id['id_usuario'];
        $insertar="INSERT INTO `noticia`(`id_noticia`, `id_usuario`, `nombre`, `descripcion`, `link`, `nombre_imagen`, `tipo`, `imagen`) VALUES ('','$dato2','$nombre','$descripcion','$link','$nombreArchivo','$tipoArchivo','$binariosImagen')";
        $res3 = mysqli_query($conexion, $insertar);
        if(!$res3){
            echo '<script>
            alert("error");
            window.history.go(-1);
            </script>
        ';
        exit;
        }else{
            echo '<script>
            alert("noticia guardada");
            window.location.href = "../noticia.php";
            </script>
        ';
        exit;
        
        }
    
        
?>