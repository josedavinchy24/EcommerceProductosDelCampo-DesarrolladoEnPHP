<?php
session_start();
$varsesion = $_SESSION['email'];
include("base de datos/conexion.php");
$conexion=conectar();
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $guardar!="Administrador"){
    echo 'Usted no tiene autorizacion';
    die();
}
$sq="SELECT * FROM `usuario` WHERE correo='$varsesion'";
$resul=mysqli_query($conexion,$sq);
$val = mysqli_fetch_array($resul);
$guard=$val['id_usuario'];


                
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
include ("navbar.php");
?>
</head>
<body>

<?php 

if(!$_GET){
  header('Location:vermisnoticias.php?pagina=1');

}



?>
<link rel="stylesheet" href="style/prodvendedor.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<div class="filtro2">
<h2>Mis noticias</h2>

<div class="row img-fluid" style="padding:3%;">

<?php
$guard=$val['id_usuario'];
$sql="SELECT * FROM `noticia` where id_usuario='$guard'";
$resultado=mysqli_query($conexion,$sql);
$articuloporpagina =7;
$cont=mysqli_num_rows($resultado);
$paginas=ceil($cont/$articuloporpagina);
$iniciar=($_GET['pagina']-1)*$articuloporpagina;
$string1 = strval($iniciar);
$string2 = strval($articuloporpagina);
$sql2="SELECT * FROM `noticia` where `id_usuario`='$guard' LIMIT $string1,$string2";
$resultado2=mysqli_query($conexion,$sql2);

while ($valores = mysqli_fetch_array($resultado2)) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
    echo '
    <form class="card mb-3" style="max-width: 100%;" action="editarnoticia.php" method="post">
    <div class="row no-gutters">
    <div class="col-md-4">
    <img class="card-img-top img-fluid"  style="margin:0; height:100%" src="data:'.$valores['tipo'].';base64,'.base64_encode($valores['imagen']).'" alt="Card image cap">

    </div> 
    <div class="col-md-8">
      <div class="card-body">
      <input type="hidden" value='.$valores["id_noticia"].' name="id">
      <h5 class="card-title">'.$valores['nombre'].'</h5>
      <p class="card-text">'.$valores['descripcion'].'</p>
      
        <input type="submit" "class="btn" style="text-transform: uppercase; outline: 0; background: #4CAF50;width: 20%; border: 0; padding: 10px;color: #FFFFFF; font-size: 14px;
      -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer; " value="VER">
        </div>
    </div>
  </div>
    </form>
    ';
}      
                
   
?>
</div>




<nav aria-label="Page navigation example">

  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''?>" >
      <a class="page-link" href="vermisnoticias.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous" style="background: #43A047;color:white">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
    
    for ($i=0;$i<$paginas;$i++): ?>
    <li class="page-item  <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?>"  ><a class="page-link" href="vermisnoticias.php?pagina=<?php echo $i+1 ?>" ><?php echo $i+1 ?></a></li>
    <?php endfor?>
    <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''?>">
      <a class="page-link" href="vermisnoticias.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next" style="background: #43A047;color:white">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<br>

    </br>
   
</div>

</body>

</html>
