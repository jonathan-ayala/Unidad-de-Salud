<?php
	require('config.php');
	conectar();
	$id="";
	if($_GET){
		$id = $_GET['id_embarazada'];
	}

	mysql_query("UPDATE `tag` set `estado_embarazada`=3 where `id` ='$id'");
	
	echo"
		<script>alert('Proceso de embarazo terminado');
		location.replace('mapa.php');
		</script>
	";
?>