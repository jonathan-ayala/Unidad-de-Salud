<?php
session_start();
require("config.php");
interfaz();
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}

	

if($_GET){
	
	$user=$_SESSION["doctor"];
conectar();
	$comando1 ="select * from usuario where nombre_user='$user'";
	
	$consulta =mysql_query($comando1); 
	$aDatos= mysql_fetch_array($consulta);
	
	$id_doctor=$aDatos["cod_doctor"];
	
	$id_usuario=$aDatos["id_usuario"];
	$foto=$aDatos["foto"];
	
	$comando1="select * from doctor where cod_doctor= $id_doctor";
	
	$consulta1= mysql_query($comando1);
		while ($aDatos1=mysql_fetch_array($consulta1)){
			$nombre=$aDatos1["nombre_doctor"];
			$apellido=$aDatos1["apellido_doctor"];
		}
	
	
	$codH=$_GET["cod_h"];
	
	
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
	
	
	
	$comando="select * from receta where id_consulta='$codH'";
	
	conectar();
	$consulta=mysql_query($comando);
	$aDatos=mysql_fetch_array($consulta);
	
	$medicamentos=$aDatos["contenido"];

	echo "
	</table>
	
	<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home2.php' class='items'>Inicio</a>
			<td width='150px'><a href='cola.php' class='items'>Cola de Paciente</a>
			<td width='150px'><a href='reporte_p.php' class='items' >Reporte de Consulta </a>
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
	<br>
	<br>
	<table align='center'> 
	<tr>
	<td align='center'>
	<H3>MEDICAMENTOS RECETADOS</H3>
	
	</td>
	</tr>
	
		<td align='center'>
	<H3><p>$medicamentos</p></H3>
	
	</td>
	</tr>

		<tr>
			<td><a href='cola.php' class='link2'><-REGRESAR</a>
		</tr>
	<table>
	
	";
	
	piedx();
	
	}

	
?>