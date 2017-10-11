<?php
	require('config.php');
	conectar();
	$id="";
	$top="";
	$left="";
	$meses="";
	$estado="";
	$cod_expediente="";
	$embarazo="";
	$ubicacion="";
	$fecha="";

	if($_POST){
	$id = $_POST['id'];
	$top = $_POST['y'];
	$left = $_POST['x'];
	$meses = $_POST['meses'];
	$estado = $_POST['estado'];
	$embarazo = $_POST['embarazo'];
	$ubicacion = $_POST['ubicacion'];
	$cod_expediente=$_POST['cod_expediente'];
	$fecha=fechaActual();

	
	mysql_query("UPDATE `tag` set `top`='$left', `left`='$top', `meses`='$meses', `estado`='$estado',`embarazo`='$embarazo',`ubicacion`='$ubicacion' where `id` ='$id'");
	mysql_query("INSERT INTO taghistorial VALUES('','$cod_expediente', '$meses','$estado','$embarazo','$fecha')");
	echo"
		<script>alert('Actualizado con exito');
		location.replace('mapa.php');
		</script>
	";
	}
?>