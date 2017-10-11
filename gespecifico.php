<?php
	require("config.php");
	conectar();
	echo"
<script>
	window.print();
</script>
	";
	$fechai="";
	$fechaf="";
	$embarazo="";
	if($_POST){
		$fechai=$_POST['fechai'];
		$fechaf=$_POST['fechaf'];
		$embarazo=$_POST['embarazo'];

	}

	interfaz();
	echo"
	<img src='000.png' align=center margin=0> Unidad de Salud de perquin
	<p style='font-size:12px'>* Los datos presentado posteriormente son para uso y exclusivamente para el director de la unidad de perquin, 
	o al asignado para verificación de datos obtenidos</p>
	<h1 style='font-size:16px; font-weight:bold;border-bottom:black 1px solid; text-align:center'>Reportes de embarazadas <br> 
	de: $embarazo <br>
	desde: $fechai, hasta: $fechaf
	<table align='center' width='972px' border=1 style='border-collapse:collapse'>
	<tr>
	<td align='center' class='txt' width='10px'>Nº
	<td align='center' class='txt' width='150px'>Nº Expediente
	<td align='center' class='txt' width='600px'>Nombre
	<td align='center' class='txt' width='250px'>Fecha
	</tr>

	";

	$i="";
	$comando3 = "SELECT tag.*, expediente.* from tag, expediente where tag.cod_expediente= expediente.cod_expediente and embarazo= '$embarazo' and tag.estado_embarazada='1' and tag.fecha  BETWEEN '$fechai' and '$fechaf' ";
	//$comando3="SELECT *, expediente.* from taghistorial,expediente where tag.fecha BETWEEN '$fechai' and '$fechaf'";
	$consulta3= mysql_query ($comando3);
	$nf=mysql_num_rows($consulta3);
	while($aDatos= mysql_fetch_array($consulta3)){
			conectar();
			$i++;
			//TABLA EXPEDIENTE
			$expediente =$aDatos['cod_expediente'];
			$nombre1= $aDatos['primer_Nombre'];
			$nombre2=$aDatos['segundo_Nombre'];
			$apellido1=$aDatos['primer_Apellido'];
			$apellido2=$aDatos['segundo_Apellido'];
			$unir=$nombre1 ." ".$nombre2." ".$apellido1." ".$apellido2;
			//FIN DE DATOS DE TABLA EXPEDIENTE
			$fecha = $aDatos['fecha'];
			$meses = $aDatos['meses'];
			$estadoEmba=$aDatos['estado'];
			
	echo"
	<tr>
		<td align='center'  width='10px'>$i
		<td align='center'  width='150px'>$expediente
		<td align='center'  width='600px'>$unir
		<td align='center'  width='250px'>$fecha
	</tr>

";
}
?>

<?php
echo "</table>";
piedx();
?>