<?php

session_start();
require ("config.php");

if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["doctor"];
if($_GET){
	$cod_h=$_GET["cod_h"];
conectar();
$comandolo="select * from historial where id_historial=$cod_h";

$consultalo=mysql_query($comandolo);
$nfl=mysql_num_rows($consultalo);

$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario = $aDatos["id_usuario"];
$id_doc=$aDatos["cod_doctor"];
$foto=$aDatos["foto"];

$comando1="select * from doctor where cod_doctor= $id_doc";
$consulta1= mysql_query($comando1);
			
			while ($aDatos1=mysql_fetch_array($consulta1)){
			
$nombre=$aDatos1["nombre_doctor"];
$apellido=$aDatos1["apellido_doctor"];
			}

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
echo"	</table>
	
	<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home2.php' class='items'>Inicio</a>
			<td width='150px'><a href='cola.php' class='items'>Cola de Paciente</a>
			<td width='150px'><a href='reporte_p.php' class='items' >Reporte de Consulta </a>
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>";
		
if($nfl==0){
	
	
	}else{
			conectar();
		$aDatoslo=mysql_fetch_array($consultalo);
		$id_cola=$aDatoslo["id_cola"];
		$edad=$aDatoslo["edad"];
		$expediente=$aDatoslo["id_expediente"];
		$consultapor=$aDatoslo["consulta_por"];
	
		
		$comando="select * from cola where id_cola=$id_cola";
		$consulta=mysql_query($comando);
		$aDatos=mysql_fetch_array($consulta);
		$peso=$aDatos["peso"];
		$temperatura=$aDatos["temperatura"];
		$presion=$aDatos["presion"];
		$altura=$aDatos["altura"];
		$sintoma=$aDatos["simtoma"];
		
		$comando2="select * from expediente where cod_expediente='$expediente'";
		
		$consulta=mysql_query($comando2);
		$aDatos=mysql_fetch_array($consulta);
		$nombre=$aDatos["primer_Nombre"]." ".$aDatos["segundo_Nombre"]." ".$aDatos["primer_Apellido"]." ".$aDatos["segundo_Apellido"];
		
		
		$Fecha_nac = $aDatos["Fecha_nac"];
			$genero = $aDatos["genero"];

	
	$array= explode("-",$Fecha_nac);
    $actual = fechaActual();
    $array2=explode("-",$actual);
	
	$resultado= $array2[0]-$array[0];
	
if ($genero == "M"){
	$sexo = "Masculino";
}elseif ($genero == "F") {
	$sexo = "Femenino";


	}else{
		$sexo = "Indeterminado";

	}


		
		
		echo "
		
		<form method='post' action='Ihistoria.php'>
		
		
		<table align='center'  border='0'>
		<tr>
		<td width='200px' class='txt' align='right'>Numero expediente:
		<td>$expediente
		</tr>
		<tr>
		<td  class='txt' align=right>
		Nombre:
		 <td width='270px'>$nombre
		</tr>
		<tr>
		<td width='100px' class='txt' align='right'>Edad:
		<td> $edad Años
		
		</tr>
		<tr>
		<td width='200px' class='txt' align='right'>
		Sexo: 
		<td>$sexo
		
		
		
		</tr>
		
		</table>
		<table align='center' border='0'>
		<tr>
		<td class='txt'>Temperatura: (C)
		<td>$temperatura&nbsp;&nbsp;
		<td class='txt'>Peso:(Kg) 
		<td>$peso&nbsp;&nbsp;
		<td class='txt'>Estatura:(m) 
		<td>$altura &nbsp;&nbsp;
		<td class='txt'>Presion arterial: 
		<td>$presion&nbsp;&nbsp;
		</tr>
		<tr>
		<td colspan='8' align='center' class='txt'>
		Consulta por:
		</tr>
		<tr>
		<td colspan=8 align='center'>
		$consultapor
		
		
		</tr>
		<tr>
			<td><a href='cola.php' class='link2'><-REGRESAR</a>
		</tr>
		</table>

		
		
		
		
		
		</form>
		
		";
		
		
	
	}
	
	}
piedx();
?>