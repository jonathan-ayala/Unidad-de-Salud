<?php
require("config.php");
session_start();
interfaz();

if (!isset($_SESSION["farmacia"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["farmacia"];
	$horai=fechai();

	$horaf=fechaf();
	
conectar();
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
	$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];









	echo"

<div class='menu'>

	<table align='center'>

			<tr>

				<td width='850px'><img src='000.png'><h1 class='h1'>Perquin</h1>

				<td align=center><img src=\"fotos/".$user.".jpg\" width=\"70px\" height='70px'  alt=\"\"><br><h3 class='usuario'>[$nombre $apellido] </td>

			</tr>

	</table>

<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home4.php' class='items'>Inicio</a>
			<td width='150px'><a href='verR.php' class='items'>Ver Recetas</a>
			
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>
<table align='center'>
	




";

if($_GET){
conectar();
	$cod=$_GET["cod"];
	$codE=$_GET["codE"];
	$codC=$_GET["codC"];
	
	$c="select * from receta where id_receta=$cod";
	$Co=mysql_query($c);
	$Da=mysql_fetch_array($Co);
	$des=$Da["contenido"];
	
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
	
	$comando="select * from consulta where id_consulta='$codC'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$id_doctor=$aDatos["id_doctor"];
	
	$comando="select * from doctor where cod_doctor='$id_doctor'";
	
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$nombreD=$aDatos["nombre_doctor"]." ".$aDatos["apellido_doctor"];
	
	

		
		
		
		
		
		
		
		
		echo"
		<script>
		
		//window.print();
		</script>
		<h2 class='h2'>RECETA</h2>
		<br>
		<table align='center'>
	<tr>
	
	<td>
	<h2 class='h2'>Unidad De Salud Perquin </h2>
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
	
	
	</table>";
		
		
		}
	piedx();
	?>