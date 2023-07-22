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
<script type="text/javascript">
    function habilitarinicio(){
      document.getElementById('mostrar').style.display = "none";
      document.getElementById("mostrar").required = false;
			
    }
		function habilitar(value)
		{
      
			if(value==true)
			{
				// habilitamos
				document.getElementById("entrada").disabled=true;
        document.getElementById('mostrar').style.display = "block";
        document.getElementById("mostrar").required = true;
        
        
			}else if(value==false){
				// deshabilitamos
        document.getElementById("entrada").disabled=false;
        document.getElementById('mostrar').style.display = "none";
        document.getElementById("mostrar").required = false;
        document.getElementById("mostrar").value = "";
			}
		};
    
	</script>
</head>
<body onload="habilitarinicio()">
<link rel="stylesheet" href="style/producto.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <div class="login-page">
        <div class="form">
          <h2>Nuevo Producto </h2>
         
          <form class="login-form" action="base de datos/guardar-producto.php" method="POST" enctype="multipart/form-data">
            <div id="elegir">
                <select class="form-select" required aria-label="select example" id="entrada" name="producto">
                  <option value="" >Producto</option>
                  <?php
                                $sql="SELECT `id_nombre_producto`, `nombre_producto` FROM `lista_producto`";
                                $resultado=mysqli_query($conexion,$sql);
                                while ($valores = mysqli_fetch_array($resultado)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores['id_nombre_producto'].'">'.$valores['nombre_producto'].'</option>';
                                }
                   
                ?>
                  ?>
                </select> 
              </div>

                <input type="checkbox" id="check" onchange="habilitar(this.checked);"> Otro

            <input type="text" id="mostrar" placeholder="Producto" name="nombre" required>
            <div id="elegir">
                <select class="form-select" required aria-label="select example" name="peso">
                <option value="" >Peso</option>
                    <option value="Libra">Libra</option>
                    <option value="Kilogramo">Kilogramo</option>
                    <option value="Tonelada">Tonelada</option>
                    <option value="Arroba">Arroba</option>
                    <option value="Gramo">Gramo</option>
                    <option value="Bulto">Bulto</option>
                </select>
                
              </div>
              <input type="text" placeholder="Nombre" name="nom" required>   
            <input type="number" id="mostrar" placeholder="Cantidad" name="cantidad" required>  
            <input type="hidden" value="<?php echo $varsesion?>" name="usuario"/>
            
            <input type="number" placeholder="precio" name="precio"  id=minimo2 required />
            <textarea id="mensaje" placeholder="Descripcion" name="descripcion" required></textarea>
            <br>

            </br>
            <input type="file"  name="foto" required />
            <br>

            </br>
       
            <input  name="Guardar" type="submit" value="guardar" />
           

          </form>
    
        </div>
      </div>
    
    </body>
    <html>
