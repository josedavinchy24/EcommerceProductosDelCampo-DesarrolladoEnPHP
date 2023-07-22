<?php
$nombre=$_POST['nombre'];
$asunto=$_POST['asunto'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];
$gmail="josedavidpruebas2@gmail.com";
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Edén <josedavidpruebas2@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 
$contenido = "Nombre: ".$nombre."\nCorreo: ".$email."\nMensaje: ".$mensaje;
$enviando =mail($gmail,$asunto,$contenido,$headers);
echo '<script>
alert("se envio email");
window.location.href = "../reportar.php";
</script>
';
?>
