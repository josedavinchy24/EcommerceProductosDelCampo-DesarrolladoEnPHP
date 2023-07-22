<?php
session_start();
include("base de datos/conexion.php");
$conexion=conectar();
$varsesion = $_SESSION['email'];
$consulta = "SELECT `tipo_usuario` FROM `usuario` WHERE correo='$varsesion'";
            $resul=mysqli_query($conexion,$consulta); 
            $valor = mysqli_fetch_array($resul);
            $guardar= $valor['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $guardar=="Administrador"){
    echo 'Usted no tiene autorizacion';
    die();
}


error_reporting(0);

$cadena='';

$cadenapeso="";
$cadenaprecio="";
$cadenaproducto="";
$cadenanombre="";
$texto= "where ";
$nombre=$_POST['nombrebuscador'];
$producto=$_POST['producto'];
$peso=$_POST['peso'];
$precio=$_POST['pre'];

if(isset($_POST['buscarfilt'])){
  $cuenta=0;
if ($peso=="" || $peso == null){
  $cadenapeso="";
}else{
  $cadenapeso=" peso='$peso' ";
}
if ($producto=="" || $producto == null){
  $cadenaproducto="";
}else if($cadenapeso==""){
  $cadenaproducto=" id_nombre_producto='$producto' ";
}else{
  $cadenaproducto=" and id_nombre_producto='$producto' ";
}
if ($precio=="" || $precio == null){
  $cadenaprecio="";
}else if($cadenapeso !="" || $cadenaproducto !="" ){
  $cadenaprecio=" and precio='$precio' ";
}else{
  $cadenaprecio=" precio='$precio' ";
}
if($nombre == "" || $nombre== null){
   $cadenanombre="";
}else if ($cadenapeso !="" || $cadenaproducto !="" || $cadenaprecio !="") {
    $cadenanombre=" and nombre Like '%".$nombre."%'";
  
}else{
  $cadenanombre=" nombre Like '%".$nombre."%'";
}

$cadena=$texto.$cadenapeso.$cadenaproducto.$cadenaprecio.$cadenanombre;

if (($peso=="" || $peso == null) && ($producto=="" || $producto == null ) && ($precio=="" || $precio == null) && ($nombre == "" || $nombre== null)){
  $cadena="";
}
}else{
  $cadena="";
  
}

$sql="SELECT * FROM `producto` $cadena";
                $resultado=mysqli_query($conexion,$sql);
                $articuloporpagina =12;
                $cont=mysqli_num_rows($resultado);
                $paginas=ceil($cont/$articuloporpagina);
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
  header('location:bienvenido.php?pagina=1');

}
if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
  header('location:bienvenido.php?pagina=1');
}

?>

<link rel="stylesheet" href="style/bienvenidocss.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<div class="filtro">
<h2>Filtro</h2>
<form class="filt" method="POST">
<label>Nombre:  </label>
<input class="sel" type="search" placeholder="Buscar nombre" aria-label="Search" name="nombrebuscador"> 
 <label>Peso del producto: </label>
<select class="sel" name="peso" aria-label="select example">
      <option value="" >Peso</option>
      <option value="Libra">Libra</option>
      <option value="Kilogramo">Kilogramo</option>
      <option value="Tonelada">Tonelada</option>
      <option value="Arroba">Arroba</option>
      <option value="Gramo">Gramo</option>
      <option value="Bulto">Bulto</option>
    </select>
    <label>Precio del producto:  </label>
    <input class="sel" type="number" placeholder="Precio" name="pre">  

        <label>Nombre del producto: </label>
    <select class="sel"  name="producto" aria-label="select example">
    <option value="">Producto</option>
    <?php
                $sql="SELECT `id_nombre_producto`, `nombre_producto` FROM `lista_producto`";
                $resultado=mysqli_query($conexion,$sql);
                while ($valores = mysqli_fetch_array($resultado)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['id_nombre_producto'].'">'.$valores['nombre_producto'].'</option>';
                }
   
?>
    </select>

 
        <button class="boton" type="submit" name='buscarfilt' >Buscar</button>


              </form>
              </div>
<div class="filtro2">
<h2>Productos</h2>

<div class="row row-cols-1 row-cols-md-4 g-4" style="padding:3%;">

<?php
              
                
                
                $iniciar=($_GET['pagina']-1)*$articuloporpagina;
                $string1 = strval($iniciar);
                $string2 = strval($articuloporpagina);
                $sql2="SELECT * FROM `producto` $cadena LIMIT $string1,$string2";
                $resultado2=mysqli_query($conexion,$sql2);
               
                while ($valores = mysqli_fetch_array($resultado2)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '
                    <form class="col" action="verproducto.php" method="post">
                    <div class="card h-100" >
                      <img class="card-img-top img-fluid"  style="margin:0; height:60%" src="data:'.$valores['tipo'].';base64,'.base64_encode($valores['imagen']).'" alt="Card image cap">
                      <div class="card-body">
                        <input type="hidden" value='.$valores["idproducto"].' name="id">
                        <h5 class="card-title">'.$valores['nombre'].'</h5>
                        <p class="card-text">Peso :  '.$valores['peso'].'</p>
                        <p class="card-text">Cantidad :  '.$valores['cantidad'].'</p>
                        <p class="card-text">Precio :  '.$valores['precio'].'</p>
                      </div>
                      <input type="submit" "class="btn" style="text-transform: uppercase; outline: 0; background: #4CAF50;width: 100%; border: 0; padding: 10px;color: #FFFFFF; font-size: 14px;
                      -webkit-transition: all 0.3 ease; transition: all 0.3 ease; cursor: pointer; " value="VER">
                      </div>
                    </form>
                    ';
                }
              
                
   
?>
</div>




<nav aria-label="Page navigation example">

  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''?>" >
      <a class="page-link" href="bienvenido.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous" style="background: #43A047;color:white">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
    
    for ($i=0;$i<$paginas;$i++): ?>
    <li class="page-item  <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?>"  ><a class="page-link" href="bienvenido.php?pagina=<?php echo $i+1 ?>" ><?php echo $i+1 ?></a></li>
    <?php endfor?>
    <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''?>">
      <a class="page-link" href="bienvenido.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next" style="background: #43A047;color:white">
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
