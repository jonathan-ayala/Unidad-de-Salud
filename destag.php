<?php
	require('config.php');
	conectar();
	$id="";
	if($_GET){
		$id = $_GET['id_embarazada'];
	}

	mysql_query("UPDATE `tag` set `estado_embarazada`=2 where `id` ='$id'");
	echo"
		<script>alert('Desactivado con exito');
		location.replace('mapa.php');
		</script>
	";
?>