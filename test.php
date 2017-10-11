<?php
include("clase_conexion.php");

if(isset($_GET["codigoexpe"])){

$id_foto=$_GET["codigoexpe"];//extraemos la fecha del servidor
$consulta= "UPDATE expedientes SET foto = 1 WHERE cod_expediente = $id_foto";
$inserta_foto=mysql_query($consulta,$c);

$filename = "fotoExpediente/".$id_foto.'.jpg';//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
	print "No se pudo subir al servidor\n";
	exit();
}	

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;//generamos la respuesta como la ruta completa
print "$url\n";//20120214060943.jpg
}

if(isset($_GET["id"])){



	$id_foto=$_GET["id"];//extraemos la fecha del servidor
$consulta= "UPDATE usuario SET foto = 1 WHERE id_usuario = $id_foto";
$inserta_foto=mysql_query($consulta,$c);
$filename = "fotoUsuario/".$id_foto.'.jpg';//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
	print "No se pudo subir al servidor\n";
	exit();
}	

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;//generamos la respuesta como la ruta completa
print "$url\n";//20120214060943.jpg

}
if(isset($_GET["idUsuEditar"])){
$id_foto=$_GET["idUsuEditar"];
/*$dir = "./fotoUsuario/$id_foto";
unlink($dir);*/
echo"<script>alert('yea');</script>";
   
$consulta= "UPDATE usuario SET foto = '1' WHERE id_usuario = $id_foto";
$inserta_foto=mysql_query($consulta,$c);
$filename = "fotoUsuario/".$id_foto.'.jpg';//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
	print "No se pudo subir al servidor\n";
	exit();
}	

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;//generamos la respuesta como la ruta completa
print "$url\n";//20120214060943.jpg

}


?>
