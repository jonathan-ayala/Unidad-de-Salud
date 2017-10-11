<?php
session_start();
require ("config.php");


if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	
	
	$user=$_SESSION["doctor"];

	$comando ="select * from usuario where nombre_user='$user'";

conectar ();
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_doc=$aDatos["cod_doctor"];
$id_usuario = $aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
$comando1="select * from doctor where cod_doctor= $id_doc";
$consulta1= mysql_query($comando1);
			
			while ($aDatos1=mysql_fetch_array($consulta1)){
			
$nombre=$aDatos1["nombre_doctor"];
$apellido=$aDatos1["apellido_doctor"];
			}



$consulta =mysql_query($comando); 

$aDatos= mysql_fetch_array($consulta);

$id_doc=$aDatos["cod_doctor"];


	
if ($_GET){
	$expediente=$_GET['cod_Exp'];	
	
	$id_cola=$_GET['id_cola'];
}

interfaz();
echo"

<div class='menu'>
	<table align='center'>";	
	
			if( $foto == '1' ){
 		echo"
 		<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"100px\"  alt=\"\"><br><h3 class='usuario'>[$nombre $apellido] </td>
          ";
	       }else{
     echo"
        <td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"iconos/m.jpg\" width=\"100px\" alt=\"\"><br>$nombre $apellido</td>
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
conectar();
$comandol="select * from historial where id_cola=$id_cola";
$consultal=mysql_query($comandol);
$nfl=mysql_num_rows($consultal);

if($nfl!=0){
	echo "
	
	<script>
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


		
		
		
		echo "
		
		<form method='post' action='Ihistoria.php'>
		
		<input type='hidden' value='$id_cola' name='id_cola'></input>
		<input type='hidden' value='$id_doc' name='id_doc'></input>
		<input type='hidden' value='$expediente' name='id_exp'></input>
		<input type='hidden' value='$resultado' name='edad'></input>
		
		<table align='center' border=0>
		<tr>
		<td width='200px' align='right' class='txt'>Número expediente:
		<td>$expediente
		</tr>
		<tr>
		<td width='200px'align='right' class='txt'>Nombre: 
		<td>$nombre
		</tr>
		<tr>
		<td width='100px' align='right' class='txt'>
		Edad: 
		<td>$resultado
		</tr>
		<tr>
		</td>
		<td width='200px' align='right' class='txt'>Sexo:
		<td> $sexo
		</tr>
		
		
		</tr>
		
		</table>
		<table align='center' border='0'>
		<tr>
		<td class='txt'>Temperatura: (C)
		<td>$temperatura
		</tr>
		<tr>
		<td class='txt'>Peso:(Kg) 
		<td>$peso
		</tr>
		<tr>
		<td class='txt'>Estatura:(m) 
		<td>$altura
		</tr>
		<tr>
		<td class='txt'>Presion arterial: 
		<td>$presion
		</tr>
		<tr>
		<td colspan='4' align='center'>
		<h2 class='h2'>Consulta por:</h2>
		<br>
		<textarea style='resize:none;' rows='20' cols='60' required name='consultaPor' class='tarea'>$sintoma</textarea>
		
		</td>
		</tr>
		
			<tr>
		<td colspan='4' align='center'>
		<a href='cola.php' class='link2'><-REGRESAR</a>&nbsp;
		<input type='submit' value='Guardar consulta por' class='boton'name='btn'>
		</tr>
		</table>
		
		
		
		
		
		</form>
		
		";
		
		
	
	}

	
	echo"
	
	
	";
	
	
	piedx();
	?>