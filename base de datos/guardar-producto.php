<?php
include("conexion.php");
$conexion=conectar();
error_reporting(0);
$producto=$_POST['producto'];
$nombreproducto=$_POST['nombre'];
$nombre=$_POST['nom'];
$peso=$_POST['peso'];
$precio=$_POST['precio'];
$correo=$_POST['usuario'];
$cantidad=$_POST['cantidad'];
$descripcion=$_POST['descripcion'];
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

if ($nombreproducto != "" || $nombreproducto != null){
    $query1 = "SELECT `id_nombre_producto`, `nombre_producto` FROM `lista_producto` WHERE `nombre_producto`='$nombreproducto'";
    $res1 = mysqli_query($conexion, $query1);
    $ver = mysqli_num_rows($res1);
    if($ver > 0){
        $valores1 = mysqli_fetch_array($res1);
        $dato1=$valores1['id_nombre_producto'];
        $query5 = "INSERT INTO `producto`( `idproducto`, `id_nombre_producto`, `id_usuario`, `nombre`, `peso`, `cantidad`, `precio`, `descripcion`, `nombre_imagen`, `tipo`, `imagen`) VALUES ('','$dato1','$dato2','$nombre','$peso','$cantidad','$precio','$descripcion','$nombreArchivo','$tipoArchivo','$binariosImagen')";
        $res5 = mysqli_query($conexion, $query5);
    }else{
    $query1 = "INSERT INTO `lista_producto`(`id_nombre_producto`, `nombre_producto`) VALUES ('','$nombreproducto')";
    $res1 = mysqli_query($conexion, $query1);

    $query2 = "SELECT `id_nombre_producto`, `nombre_producto` FROM `lista_producto` WHERE `nombre_producto`='$nombreproducto'";
    $res2 = mysqli_query($conexion, $query2);
    $valores = mysqli_fetch_array($res2);
    $dato=$valores['id_nombre_producto'];

    $query4 = "INSERT INTO `producto`( `idproducto`, `id_nombre_producto`, `id_usuario`, `nombre`, `peso`, `cantidad`, `precio`, `descripcion`, `nombre_imagen`, `tipo`, `imagen`) VALUES ('','$dato','$dato2','$nombre','$peso','$cantidad','$precio','$descripcion','$nombreArchivo','$tipoArchivo','$binariosImagen')";
    $res4 = mysqli_query($conexion, $query4);
    }
    
}else{
    $query4 = "INSERT INTO `producto`( `idproducto`, `id_nombre_producto`, `id_usuario`, `nombre`, `peso`, `cantidad`, `precio`, `descripcion`, `nombre_imagen`, `tipo`, `imagen`) VALUES ('','$producto','$dato2','$nombre','$peso','$cantidad','$precio','$descripcion','$nombreArchivo','$tipoArchivo','$binariosImagen')";
    $res4 = mysqli_query($conexion, $query4);
    }
    if(!$query4){
        echo '<script>
        alert("error");
        window.history.go(-1);
        </script>
    ';
    exit;
    }else{
        echo '<script>
        alert("producto guardado");
        window.location.href = "../index.php";
        </script>
    ';
    exit;
    
    }
?>