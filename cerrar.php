<?php
require ("config.php");
	session_start();
	conectar();
   if(isset($_GET["id"])){
	$usuario = $_GET["id"];	
	echo"$usuario";
$con= "UPDATE usuario SET actual = '0' WHERE id_usuario='$usuario'";
$consu=mysql_query($con);
          }
session_destroy();
	echo "<script>alert('Sesion Finalizada con exito');
	location.replace('index.php');</script>";
?>
