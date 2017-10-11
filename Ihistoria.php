<?php

session_start();
require ("config.php");

if($_POST){
	$expediente=$_POST['id_exp'];	
	
	$id_cola=$_POST['id_cola'];
	
	$id_doctor=$_POST['id_doc'];
	$consultaPor=$_POST['consultaPor'];
	$edad=$_POST['edad'];
	conectar();
	$f=fechaActual();
	
	$comandoi="insert into historial (id_cola,consulta_por,fecha_hora,id_doctor,edad,id_expediente) values
	($id_cola,'$consultaPor','$f',$id_doctor,$edad,'$expediente')
	";
	
	if($consul=mysql_query($comandoi)){
		$comando4="select * from historial where id_expediente=$expediente and id_doctor=$id_doctor and fecha_hora=
			'$f'
			";
			//echo $comando4;
			$con=mysql_query($comando4);
			$aDatos=mysql_fetch_array($con);
			$id_cons=$aDatos["id_historial"];
			
		
		echo "
		
		
		
		
		
		
		
		<script>
		
		alert('DETALLE ALMACENADO EN HISTORIAL');
		window.open('receta.php?cod=$expediente&&cons=$id_cons','Datos de la Consulta','width=500, height=500', 'top=300, left=200');
		 window.print();
	
		</script>";
		}
	
	


$comandol="select * from historial where id_cola=$id_cola";
$consultal=mysql_query($comandol);
$nfl=mysql_num_rows($consultal);

if($nfl==0){
	echo "
	
	<script>
	alert('esta consulta ya fue guardada en un expediente');
	location.replace('cola.php');
	</script>
	
	";
	
	}else{
		
		conectar();
		
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

interfaz();
		
		
		
		echo "
		
		<form method='post' action='Ihistoria.php'>
		
		
		<table align='center' border='1'>
		<tr>
		<td width='200px' >numero expediente:$expediente</td>
		
		<td width='200px'>
		Nombre: $nombre
		</td>
		<td width='100px'>
		Edad: $resultado
		</td>
		
		</td>
		<td width='200px'>
		Sexo: $sexo
		</td>
		
		
		</tr>
		
		</table>
		<table align='center' border='1'>
		<tr>
		<td>Temperatura: (C)$temperatura&nbsp;&nbsp;</td>
		<td>Peso:(Kg) $peso&nbsp;&nbsp;</td>
		<td>Estatura:(m) $altura &nbsp;&nbsp;</td>
		<td>Presion arterial: $presion&nbsp;&nbsp;</td>
		</tr>
		<tr>
		<td colspan='4' align='center'>
		Consulta por:
		<h2>$consultaPor
		</h2>
		<br>
		
		</table>
		
		
		
		
		
		</form>
		
		";
		
		
	
	}
	
	}
	piedx();

?>