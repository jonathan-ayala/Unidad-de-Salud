<?php
include("clase_conexion.php");
$id=$_POST['id_foto'];//20120214052450.jpg
$cod_exp = $_GET['cod'];
$nombre=$_POST['nombre_foto'];
$des=$_POST['des'];
$sub=(substr($cod_exp));
$id_foto=str_replace(".jpg", "", $sub);//20120214052450
$consul="update fotos set $cod_exp=id_foto, nombre='$nombre', des='$des' where id_foto='$cod_exp'";
$modifica=mysql_query($consul,$c);
print("<script>window.location.replace('index.php');</script>");  
?>