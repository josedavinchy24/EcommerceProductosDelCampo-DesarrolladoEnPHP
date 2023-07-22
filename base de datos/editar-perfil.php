<?php
include("conexion.php");
$conexion=conectar();
$id=$_POST['id'];
$contraseña=$_POST['contraseña'];
$celular=$_POST['celular'];
$direccion=$_POST['direccion'];

$query1 = mysqli_query($conexion,"UPDATE `usuario` SET `contraseña`='$contraseña',`celular`='$celular',`direccion`='$direccion' WHERE `id_usuario`='$id'");
if($query1){
    echo '<script>
    alert("cambio realizado");
    window.location.href = "../perfil.php";
    </script>
';
}

?>