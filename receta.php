<?php
session_start();
require("config.php");
interfaz();
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	if($_POST){
			$codE=$_POST["codE"];
	$codC=$_POST["codC"];
	$des=$_POST["des"];
	$comando="select * from expediente where cod_expediente='$codE'";
	
	conectar();
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);

	$nombre=$aDatos["primer_Nombre"]." ".$aDatos["segundo_Nombre"]." ".$aDatos["primer_Apellido"]." 
	".$aDatos["segundo_Apellido"];
	$Fecha_nac = $aDatos["Fecha_nac"];
			$genero = $aDatos["genero"];

	
	$array= explode("-",$Fecha_nac);
    $actual = fechaActual();
    $array2=explode("-",$actual);
	
	$resultado= $array2[0]-$array[0];
	
	$f=fechaActualn();
	
	$comando="select * from historial where id_historial='$codC'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$id_doctor=$aDatos["id_doctor"];
	
	$comando="select * from doctor where cod_doctor='$id_doctor'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$nombreD=$aDatos["nombre_doctor"]." ".$aDatos["apellido_doctor"];
	
	

		
		
		
		
		
		$fechaA=fechaActual();
		$comando="insert into receta (fecha_creacion_hora,contenido,id_doctor,id_consulta,estado)
		values ('$fechaA','$des',$id_doctor,$codC,1)
		";
		
		$consulta=mysql_query($comando);
	
		
		
		
		echo"
		<script>
		alert('Receta guardada con exito');
	window.print();
		</script>
		<table align='center'>
	<tr>
	
	<td>
	<h2>Unidad De Salud Perquin </h2>
	</td>
	
	</tr>
	<tr>
	<td>
	<h3>Nombre: $nombre</h3>
	</td>
	</tr>
	
	<tr>
	<td>
	<h3>Fecha: $f</h3>
	</td>
	<td>
	<h3>N Exp: $codE</h3>
	</td>
	
	
	</tr>
	
	<tr>
	<td>
	<h4>Edad: $resultado</h4>
	</td>
	<td>
	<h4>Genero: $genero</h4>
	</td>
	
	
	</tr>
	<tr>
	<td colspan='2'>
	<h4>Descripcion: $des</h4>
	</td>
	</tr>
	<tr>
	<td> <h3>Nombre medico: $nombreD </h3></td>
	</tr>
	<tr>
	<td> <h3>Firma: _________________</h3></td>
	</tr>
	
	</table>";
		
		
		}
	
	
	
if($_GET){
	$codE=$_GET["cod"];
	$codC=$_GET["cons"];
	
	$comando="select * from expediente where cod_expediente='$codE'";
	
	conectar();
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);

	$nombre=$aDatos["primer_Nombre"]." ".$aDatos["segundo_Nombre"]." ".$aDatos["primer_Apellido"]." 
	".$aDatos["segundo_Apellido"];
	$Fecha_nac = $aDatos["Fecha_nac"];
			$genero = $aDatos["genero"];

	
	$array= explode("-",$Fecha_nac);
    $actual = fechaActual();
    $array2=explode("-",$actual);
	
	$resultado= $array2[0]-$array[0];
	
	$f=fechaActualn();
	
	$comando="select * from historial where id_historial='$codC'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$id_doctor=$aDatos["id_doctor"];
	
	$comando="select * from doctor where cod_doctor='$id_doctor'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$nombreD=$aDatos["nombre_doctor"]." ".$aDatos["apellido_doctor"];
	echo "
	<form action='receta.php' method='post'>
	<input type='hidden' value='$codC' name='codC'>
	
	<input type='hidden' value='$codE' name='codE'>
	<table>
	<tr>
	
	<td>
	<h2 class='h2'>Unidad De Salud Perquin </h2>
	</td>
	
	</tr>
	<tr>
	<td>
	<b>Nombre: </b>$nombre
	</tr>
	<tr>
	<td>
	<b>Fecha:</b> $f
	</td>
	<td>
	<b>N° Exp:</b> $codE
	</td>
	
	
	</tr>
	
	<tr>
	<td>
	<b>Edad:</b> $resultado
	</td>
	<td>
	<b>Genero:</b> $genero
	</td>
	
	
	</tr>
	<tr>
	<td colspan='2'>
	<h2 class='h2'>Descripción: </h2><textarea style='resize:none;' rows='10' cols='50' required name='des'></textarea>
	</td>
	</tr>
	<tr>
	<td> <b>Nombre medico:</b> $nombreD</td><td>
	<input type='submit' class='boton' value='Guardar Receta' name='receta'>
	</td>
	</tr>
	</table>
	
	</form>
	
	";
	
	}

	
?>