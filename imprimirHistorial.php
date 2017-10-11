<?php
	require("config.php");
	conectar();
	echo"
<script>
	window.print();
</script>
	";

	interfaz();	
	$id="";
	if($_GET){
		$id=$_GET['cod_expediente'];
		
		
	}
	$i="";
	$comando3="SELECT *, expediente.* from taghistorial,expediente where taghistorial.cod_expediente=$id and expediente.cod_expediente=$id";
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
			$estado=$aDatos['descripcion'];
		}



	echo"
	
	<img src='000.png' align=center margin=0> Unidad de Salud de perquin
	<p style='font-size:12px'>* Los datos presentado posteriormente son para uso y exclusivamente para el director de la unidad de perquin, 
	o al asignado para verificación de datos obtenidos</p>
	<h1 style='font-size:16px; font-weight:bold;border-bottom:black 1px solid; text-align:center'>Historial de la paciente: $unir 
	<br>Expediente Nº: $expediente </h1>
	<br><br>
	<table align='center' style='border-collapse:collapse;' border=1 width='972px'>
	<tr>
	<td class='txt' align='center' width='10px'>Nº
	<td class='txt' align='center' width='170px'>Fecha
	<td class='txt' align='center' width='500px'>Estado paciente
	<td class='txt' align='center' width='80px'>Semanas
	<td class='txt' align='center' width='250'>Estado del embarazo
	</tr>
	";
	$i="";
	$comando3="SELECT *, expediente.* from taghistorial,expediente where taghistorial.cod_expediente=$id and expediente.cod_expediente=$id";
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
			$estado=$aDatos['descripcion'];


	echo"
	<tr>
	<td  align='center' width='10px'>$i
	<td  align='center' width='170px'>$fecha
	<td  align='justify' width='500px'><p>$estado</p>
	<td  align='center' width='80px'>$meses semana(s)
	<td  align='center' width='250'>$estadoEmba
	</tr>
";
}
echo"
	</table>

	";

	
	
	piedx();

?>