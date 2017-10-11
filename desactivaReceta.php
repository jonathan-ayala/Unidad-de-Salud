<?php

session_start();

require("config.php");

if (!isset($_SESSION["farmacia"])){

		echo "<script>alert('Zona No Autorizada, Inicie Sesion');

		location.replace('index.php');</script>";

	}

$user=$_SESSION["farmacia"];


if ($_GET){

		$cod = $_GET["cod"];

		$comando="update receta set ESTADO='2' where id_receta=$cod";
		

		conectar();

		if (mysql_query($comando)){

			echo "

			<script>alert('RECETA ENTREGADA CON EXITO');

			location.replace('verR.php');

			</script>

			

			";

		}else{

			echo 

			"Error interno - ".mysql_error;

			

			

			}

		

		}



?>