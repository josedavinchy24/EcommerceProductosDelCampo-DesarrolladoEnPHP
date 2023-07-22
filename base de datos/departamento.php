<?php
include("conexion.php");
$conexion=conectar();
                
                $sql="SELECT `id_departamento`,`departamento` FROM `departamentos`";
                $resultado=mysqli_query($conexion,$sql);
                while ($valores = mysqli_fetch_array($resultado)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_departamento'].'">'.$valores['departamento'].'</option>';
                }
     
?>

