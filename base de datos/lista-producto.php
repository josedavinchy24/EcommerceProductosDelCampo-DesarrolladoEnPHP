<?php
include("conexion.php");
$conexion=conectar();
                
                $sql="SELECT `id_nombre_producto`, `nombre_producto` FROM `lista_producto`";
                $resultado=mysqli_query($conexion,$sql);
                while ($valores = mysqli_fetch_array($resultado)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_nombre_producto'].'">'.$valores['nombre_producto'].'</option>';
                }
mysqli_close($conexion);      
?>