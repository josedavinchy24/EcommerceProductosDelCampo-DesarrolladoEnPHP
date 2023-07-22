<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['email'];
if ($varsesion != null || $varsesion != ''){
    header("location:bienvenido.php");
    die();
}
?>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style/iniciar-sesion.css">
<div class="login-page" >
    <div class="form">
      <h2>Iniciar Sesión</h2>
      
      <form class="login-form" action="base de datos/validar.php" method="post">
        <div class="form-group">
          <input type="text" placeholder="Usuario" name = "email" required />
          <input type="password" placeholder="Contraseña" name ="password" maxlength="10" required/>
      </div>
        
        <p class="message"><a href="registro.php">Registrarse</a></p>
        <p class="message"><a href="recuperar-contraseña.php">Olvidaste tu contraseña </a></p>
        <button type="submit">Entrar </button>
        
      </form>
      
    </div>
  </div>
 
</body>
