<?php
session_start();
require('config.php');

if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];
conectar();

if(isset($_GET["id"])){
	$idEstado = $_GET["id"];


$comando ="select * from usuario where id_usuario='$idEstado'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_Usu=$aDatos["id_usuario"];
$nombre_user=$aDatos["nombre_usuario"];
$apellido_user=$aDatos["apellido_usuario"];
$estadoUsu=$aDatos["estado"];

     if($estadoUsu=='1'){
 
  $sql = "UPDATE usuario SET estado=0 WHERE id_usuario = '$idEstado'";
        $consulta=mysql_query($sql);
 		echo"<script>alert('Estado modificado con exito..!');
        location.replace('home1.php')</script>";
 		

}else{

	 $sql2 = "UPDATE usuario SET estado=1 WHERE id_usuario = '$idEstado'";
        $consulta2=mysql_query($sql2);

        

 		echo"<script>alert('Estado modificado con exito..!');
        location.replace('home1.php')</script>";
 		
  }
}
?>
