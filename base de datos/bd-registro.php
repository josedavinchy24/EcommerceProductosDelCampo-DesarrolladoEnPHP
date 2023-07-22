<?php
include("conexion.php");
$conexion=conectar();
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$fecha=$_POST['fecha'];
$email=$_POST['email'];
$contraseña=$_POST['contraseña'];
$celular=$_POST['celular'];
$dep=$_POST['departamento'];
$city=$_POST['ciudad'];
$gen=$_POST['Genero'];
$dir=$_POST['direccion'];
$user=$_POST['Usuario'];


$query1 = mysqli_query($conexion,"SELECT * FROM `usuario` WHERE `correo`='$email'");
$resultado1=mysqli_num_rows($query1); 

if($resultado1>0){
    echo '<script>
    alert("El correo ya está registrado");
    window.history.go(-1);
    </script>
    ';
    exit;
   
}
$query = mysqli_query($conexion,"INSERT INTO `usuario`(`id_usuario`, `id_departamento`, `id_municipio`, `nombre`, `apellido`, `fecha_nacimiento`, `correo`, `contraseña`, `celular`, `direccion`, `genero`, `tipo_usuario`) VAlUES ('', '$dep', '$city','$nombre', '$apellido', '$fecha','$email','$contraseña', '$celular', '$dir', '$gen', '$user')");


if(!$query){
    echo '<script>
    alert("error");
    window.history.go(-1);
    </script>
';
exit;
}else{
    echo '<script>
    alert("Usuario registrado");
    window.location.href = "../index.php";
    </script>
';
exit;

}
?>
