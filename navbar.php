<?php
error_reporting(0);
include("conexion.php");
          $conexion=conectar();
            $con = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resultado=mysqli_query($conexion,$con); 
            $valores = mysqli_fetch_array($resultado);
            $guard= $valores['tipo_usuario'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="bootstrap/js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link>


</head>
<body>
<nav class="navbar navbar-expand-sm navbar-custom">
<link rel="stylesheet" href="style/navbar-css.css">
<?php if($guard=="Administrador"){?>
    <a class="navbar-brand" href="noticia.php"><img class="img2" src="assets/logo4.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php }else{?>
      <a class="navbar-brand" href="bienvenido.php"><img class="img2" src="assets/logo4.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <?php }?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <?php if($guard=="Administrador"){?>
        <li class="nav-item">
          <a class="nav-link" href="noticia.php">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="reportar.php">Reportar</a>
        </li>
      <?php }else{?>
        <li class="nav-item active">
          <a class="nav-link" href="bienvenido.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="noticia.php">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="reportar.php">Reportar</a>
        </li>
      <?php }?>
      </ul>
      
    </div>

      
      <form class="d-flex" >
      
        
    
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-sm-5 " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img" src="assets/person-circle2.svg"/>Usuario
          </a>
          <div class="container" style="z-index:2; position: relative;">
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php

            if($guard=="Administrador"){
            ?>
            <a class="dropdown-item" href="perfil.php">Editar perfil</a>
            <a class="dropdown-item" href="vermisnoticias.php">Ver mis noticias</a>
            <a class="dropdown-item" href="añadir-noticia.php">Añadir noticia</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="base de datos/salir.php">cerrar sesion</a>
            <?php }else if($guard=="Vendedor"){ ?>
              <a class="dropdown-item" href="perfil.php">Editar perfil</a>
              <a class="dropdown-item" href="productosvendedor.php">Ver mis productos</a>
              <a class="dropdown-item" href="producto.php">Nuevo producto</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="base de datos/salir.php">cerrar sesion</a>
            <?php }else if($guard=="Comprador"){ ?>
              <a class="dropdown-item" href="perfil.php">Editar perfil</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="base de datos/salir.php">cerrar sesion</a>
              <?php } ?>
          </div>
          </div>
        </li>
      </ul>
      </div>
    
      </form>
    
  </nav>
  
</body>
</html>
