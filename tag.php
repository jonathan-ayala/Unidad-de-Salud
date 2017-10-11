<?php
	require('config.php');
	conectar();
	
	$name = $_POST['name'];
	$top = $_POST['top'];
	$left = $_POST['left'];
	$meses = $_POST['meses'];
	$estado = $_POST['estado'];

	
	mysql_query("INSERT INTO tag VALUES('','$name', '$top', '$left','$meses','$estado')");

?>
