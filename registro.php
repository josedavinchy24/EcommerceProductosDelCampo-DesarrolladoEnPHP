<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">   
<link rel="stylesheet" href="style/regitro-css.css">
<div class="login-page">
    <div class="form">
      <h2>Registro</h2>
      <form class="login-form" action= "base de datos/bd-registro.php" method="post">
      
        <input type="text" placeholder="Nombres" name="nombre" required/>
        <input type="text" placeholder="Apellidos" name="apellido" required/>
        <input type="date" placeholder="Fecha nacimiento" name="fecha" required/>
        <input type="email" placeholder="Correo electronico" name="email" required/>
        <input type="password" placeholder="Contraseña" name="contraseña" maxlength="10" required/>
        <input type="tel" placeholder="Celular" name="celular" required/>
        <label id=label1>Direccion:</label>
        <select name="departamento" id="minimo1" required>
        <option value="">Departamento</option>
            <?php
                include("base de datos/departamento.php");
            ?>
            
        </select>
        <select name="ciudad" id="minimo1" required >
        <option value="">Ciudad</option>
            <?php
                include("conexion.php");
                $conexion=conectar();
                                
                                $sql="SELECT `id_municipio`,`municipio` FROM `municipios`";
                                $resultado=mysqli_query($conexion,$sql);
                                while ($valores = mysqli_fetch_array($resultado)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';
                                }
                 mysqli_close($conexion);         
                
            ?>
            
        </select>
        <input type="text" placeholder="Direccion" name='direccion'/>
        <label>Genero: </label>
        <div class="radion">  
        <label><input type='radio' name='Genero' value='Hombre' /> Hombre &nbsp;&nbsp; </label>
        <label><input type='radio' name='Genero' value='Mujer' /> Mujer &nbsp;&nbsp;</label>
        <label><input type='radio' name='Genero' value='Neutro' /> Neutro &nbsp;&nbsp;  </label> 
        </div>
        <label>Tipo de usuario: </label>
        <div class="radion">  
        <label><input type='radio' name='Usuario' value='Vendedor' /> Vendedor &nbsp;&nbsp; </label>
        <label><input type='radio' name='Usuario' value='Comprador' /> Comprador &nbsp;&nbsp;</label>
        </div>
        <input class="btn" type="submit" value="Ingresar Usuario"/>
        <p class="message">Ya tienes cuenta? <a href="index.php">iniciar sesion</a></p>
        
      </form>

    </div>
  </div>

</body>
</html>