<?php
function conectar(){
    $conexion=mysqli_connect("localhost","root","","proyectoaula");
    return $conexion;
}
?>