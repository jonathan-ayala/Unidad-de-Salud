<?php
	require('config.php');
	conectar();
	interfaz();
	$fecha="";
	$top="";
	$left="";
	$meses="";
	$estado="";
	$cod_expediente="";
	$embarazo="";
	$ubicacion="";
	$estado = "";
	if($_POST){
	
	$top = $_POST['y'];
	$left = $_POST['x'];
	$cod_expediente = $_POST['cod_expediente'];
	$meses = $_POST['meses'];
	$estado = $_POST['estado'];
	$embarazo = $_POST['embarazo'];
	$ubicacion = $_POST['ubicacion'];
	$fecha = fechaActual();
	
	mysql_query("INSERT INTO tag VALUES('','$cod_expediente', '$left', '$top','$meses','$estado','$embarazo','$ubicacion','1','$fecha')");
	mysql_query("INSERT INTO taghistorial VALUES('','$cod_expediente', '$meses','$estado','$embarazo','$fecha')");

	echo"
		<script>alert('Agregado con exito');
		location.replace('mapa.php');
		</script>
	";
	}
?>