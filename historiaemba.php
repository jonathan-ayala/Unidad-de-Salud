<?php
	session_start();
	require('config.php');
	if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];
	conectar();
	$comando ="select * from usuario where nombre_user='$user'";
	$consulta =mysql_query($comando); 
	$aDatos= mysql_fetch_array($consulta);
	$id_doc=$aDatos["cod_doctor"];
	$nombre=$aDatos["nombre_usuario"];
	$id_usuario = $aDatos["id_usuario"];
	$apellido=$aDatos["apellido_usuario"];
	$cod_expediente="";
	$foto=$aDatos['foto'];
	interfaz();
	echo"
<div class='menu'>
	<table align='center'>";	
	
			if( $foto == '1' ){
 		echo"
 		<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70px\" height='70px'  alt=\"\"><br><h3 class='usuario'>[$nombre $apellido] </td>
          ";
	       }else{
     echo"
        <td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"iconos/m.jpg\" width=\"70px\" height='70px' alt=\"\"><br>$nombre $apellido</td>
          
          ";
}
?>
	<?php echo"
	<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home1.php' class='items'>Inicio</a></td>
			<td width='150px'><a href='agregar.doctor.php' class='items'>Agregar Doctor</a></td>
			<td width='150px'><a href='agregar.usuario.php'class='items'>Agregar Usuario</a></td>
			<td width='150px'><a href='mapa.php' class='items'>Mapa de Embarazadas</a></td>
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a></td>
		</tr>
	</table>
</div>
";
$cod_expediente="";
	if($_GET){
		$cod_expediente=$_GET['historial'];
	}
	$comando3="SELECT *, expediente.*,tag.* from taghistorial,expediente,tag WHERE historial_id=$cod_expediente and expediente.cod_expediente=taghistorial.cod_expediente and expediente.cod_expediente=tag.cod_expediente";
	$consulta3= mysql_query ($comando3);
	$nf=mysql_num_rows($consulta3);
	while($aDatos= mysql_fetch_array($consulta3)){
			conectar();
			//TABLA EXPEDIENTE
			$nombre1= $aDatos['primer_Nombre'];
			$nombre2=$aDatos['segundo_Nombre'];
			$apellido1=$aDatos['primer_Apellido'];
			$apellido2=$aDatos['segundo_Apellido'];
			$unir=$nombre1 ." ".$nombre2." ".$apellido1." ".$apellido2;
			//FIN DE DATOS DE TABLA EXPEDIENTE
			$fecha = $aDatos['fecha'];
			$meses = $aDatos['meses'];
			$estadoEmba=$aDatos['estado'];
			$estado=$aDatos['embarazo'];

			//TABLA TAGHISTORIAL
			/*
			Necesito Nombre(viene tabla expediente)
			Cod_expediente
			Fecha.
			Estado
			Meses
			Estado Bebé
			*/
			echo"
			<br><br>
			<h2 class='h2'>Historial de: $unir, Fecha/hora: $fecha</h2>
			<table align='center'>
			<tr>
				<td class='txt'>Nombre:
				<td>$unir
			</tr>
			<tr>
				<td class='txt'>Fecha / Hora:
				<td>$fecha
			</tr>
			<tr>
				<td class='txt'>Semana:
				<td>$meses semana(s)
			</tr>
			<tr>
				<td class='txt'>Diagnostico:
				<td><p>$estadoEmba</p>
			</tr>
			<tr>
				<td class='txt'>Estado del Embarazo:
				<td>$estado
			</tr>
			</table>
			<center><a href='mapa.php' class='link2'><-REGRESAR</a>
			";
			//FIN TAGHISTORIAL


		}
piedx();
?>