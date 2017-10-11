
<?php
	session_start();
	require("config.php");

if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
	location.replace('index.php');</script>";
	}
	$user=$_SESSION["registro"];

function seleccionarOpcionTipo($opcionRegistrada,$tipo){
	if ($opcionRegistrada == $tipo) 
		echo "selected";
}
$expediente = "";
if ($_GET){
	$expediente=$_GET['cod_Exp'];	
}

conectar();
$cmd = "SELECT * FROM expediente WHERE cod_expediente ='$expediente'";
$cmd1 = mysql_query($cmd);
$aDatos = mysql_fetch_array($cmd1);
	$primer_Nombre = $aDatos["primer_Nombre"];
	$segundo_Nombre = $aDatos["segundo_Nombre"];
	$primer_Apellido = $aDatos["primer_Apellido"];
	$segundo_Apellido = $aDatos["segundo_Apellido"];
	$tipo_documento = $aDatos["tipo_documento"];
	$numero_documento = $aDatos["numero_documento"];
	$genero = $aDatos["genero"];
	$Fecha_nac = $aDatos["Fecha_nac"];
	$Lugar_nac = $aDatos["Lugar_nac"];
	$observaciones = $aDatos["observaciones"];
	$ocupacion = $aDatos["ocupacion"];
	$telefono = $aDatos["telefono"];
	$estado_civil = $aDatos["estado_civil"];


$sql = "SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='PADRE'";
$cmd2 = mysql_query($sql);
$aDatos2 = mysql_fetch_array($cmd2);
	$nombre_parientep = $aDatos2["nombre_pariente"];
	$apellido_parientep = $aDatos2["apellido_pariente"];
	$numero_documentop = $aDatos2["numero_documento"];
	$domiciliop = $aDatos2["domicilio"];
	$parentescop = $aDatos2["parentesco"];
	$responsablep = $aDatos2["responsable"];

	if($responsablep=="SI"){
		$domicilio=$aDatos2["domicilio"];
		}

$sql = "SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='MADRE'";
$cmd3 = mysql_query($sql);
$aDatos3 = mysql_fetch_array($cmd3);
	$nombre_parientem = $aDatos3["nombre_pariente"];
	$apellido_parientem = $aDatos3["apellido_pariente"];
	$numero_documentom = $aDatos3["numero_documento"];
	$parentescom = $aDatos3["parentesco"];
	$responsablem = $aDatos3["responsable"];
	
	if($responsablem=="SI"){
		$domicilio=$aDatos3["domicilio"];
		}

$sql = "SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='CONYUGUE'";
$cmd4 = mysql_query($sql);
$aDatos4 = mysql_fetch_array($cmd4);
	$nombre_parientec = $aDatos4["nombre_pariente"];
	$apellido_parientec = $aDatos4["apellido_pariente"];
	$numero_documentoc = $aDatos4["numero_documento"];
	$parentescoc = $aDatos4["parentesco"];
	$responsablec = $aDatos4["responsable"];

	if($responsablec=="SI"){
		$domicilio=$aDatos4["domicilio"];
		}


$sql = "SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='OTRO'";
$cmd5 = mysql_query($sql);
$aDatos5 = mysql_fetch_array($cmd5);
	$nombre_parienteo = $aDatos5["nombre_pariente"];
	$apellido_parienteo = $aDatos5["apellido_pariente"];
	$numero_documentoo = $aDatos5["numero_documento"];
	$parentescoo = $aDatos5["parentesco"];
	$responsableo = $aDatos5["responsable"];


	if($responsableo=="SI"){
		$domicilio=$aDatos5["domicilio"];
		}



 if($genero == "M"){
        $genero = "Masculino";
    }elseif($genero == "F"){
        $genero = "Femenino";
    }else{
        $genero = "Inderterminado";
    }
?>


<html>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<head>
		<title>Reporte de Expediente</title>
        <link rel='stylesheet' type='text/css' href='estilo.css'>
		<meta http-equiv='conten-type' content='text/html; charset=utf-8'>
      	<script> window.print();</script>
	</heads>
<body>

<center>
<h2 class='h2'>REPORTE DE EXPEDIENTE</h2>
<fieldset style="width:800px" class='fieldset2' align='center'>
	<legend class='legend'>Datos del Paciente
	</legend>
	<table width="704" border="0" align="center" style="width:750px" >
		<tr>
			<td width="176" class='txt'>Codigo de expediente:</td>
			<td width="192" ><?php echo $expediente; ?></td>
		</tr>
		<tr>
			<td class='txt'>Primer nombre:</td>
			<td ><?php echo $primer_Nombre; ?></td>
			
			<td width="166" class='txt'>Segundo nombre:</td>
			<td width="188" ><?php echo $segundo_Nombre; ?></td>
		</tr>
		<tr>
			<td class='txt'>Primer Apellido:</td>
			<td ><?php echo $primer_Apellido; ?></td>
			
			<td class='txt'>Segundo Apellido:</td>
			<td ><?php echo $segundo_Apellido; ?></td>
		</tr>
		<tr> 
			<td class='txt'>Genero:</td>
			<td><?php echo $genero; ?></td>
			<td class='txt'>Fecha de Nacimiento:</td>
			<td><?php echo $Fecha_nac; ?></td>	
		</tr>
		<tr>
	    	<td class='txt'>Lugar de Nacimiento</td>
			<td><?php echo $Lugar_nac; ?></td>
		</tr>
	</table>
</fieldset>
<br />
<br />

<fieldset style="width:800px" class='fieldset2'>
	<legend class='legend'>Datos Personales
	</legend>
	<table align="center" border="0" style="width:750px">
		<tr>
			<td width="152" class='txt'>Tipo de documento:</td>
			<td width="189"><?php echo $tipo_documento; ?></td>
			<td width="171" class='txt'>Numero de Documento:</td>
			<td width="210"><?php echo $numero_documento; ?></td>
		</tr>
		<tr>
			<td class='txt'>Observaciones:</td>
			<td width="189" colspan="3"><?php echo $observaciones; ?></td>
		</tr>
		<tr>
			<td class='txt'>Ocupacion:</td>
			<td><?php echo $ocupacion; ?></td>
		</tr>
		<tr>
			<td class='txt'>Telefono:</td>
			<td><?php echo $telefono; ?></td>
		</tr>
		<tr>
			<td class='txt'>Estado Civil:</td>
			<td><?php echo $estado_civil; ?></td>
		</tr>
	</table>
	<br>
	<br>
	
	<fieldset style="width:800px" class='fieldset2'>
	  	<legend class='legend'>Datos Familiares:</legend>
		<table border="0" align="center" width="800px">
			<tr>
	    		<td colspan="4"></td>
	    		<td width="101" align="center" class='txt'>N documento</td>
	        	<td width="85" class='txt' align="center">Responsable:</td>
	    	</tr>
	    	<tr>
	   			<td width="174" class='txt'>Nombre del Padre:</td>
				<td width="98"><?php echo $nombre_parientep; ?></td>
	   			<td width="175" class='txt'>Apellido del Padre:</td>
				<td width="127"><?php echo $apellido_parientep; ?></td>
	       		<td align="center"><?php echo $numero_documentop; ?></td>
	       		<td align="center"><?php echo $responsablep; ?></td>
	   		</tr>
	   		<tr>
	   			<td class='txt'>Nombre de la Madre:</td>
				<td><?php echo $nombre_parientem; ?></td>
	       		<td class='txt' >Apellido de la Madre:</td>
				<td><?php echo $apellido_parientem; ?></td>
	   			<td align="center"><?php echo $numero_documentom; ?></td>
	      		<td width="85" align="center"><?php echo $responsablem; ?></td>
	   		</tr>
	   		<tr>
	   			<td class='txt'>Nombre del Conyugue:</td>
				<td><?php echo $nombre_parientec; ?></td>
	   			<td class='txt'>Apellido del Conyugue:</td>
				<td><?php echo $apellido_parientec; ?></td>
	       		<td align="center"><?php echo $numero_documentoc; ?></td>
	   			<td align="center"><?php echo $responsablec; ?></td>
	   		</tr>
	   		<tr>
	   	   		<td class='txt'>Nombre responsable</td>
	       		<td><?php echo $nombre_parienteo; ?></td>
	       		<td class='txt'>Apellido del Responsable:</td>
	       		<td><?php echo $apellido_parienteo; ?></td>
	      		<td align="center"><?php echo $numero_documentoo; ?></td>
				<td align="center"><?php echo $responsableo; ?></td>
	   		</tr>
	   		<tr>
	   			<td class='txt'>Direccion del Responsable:</td>
				<td colspan="4"><?php echo $domicilio; ?></td>
	            <td>&nbsp;</td>
	       	</tr>      
	        
	         </table>
	         <br>
	</fieldset>

</center>
</body>
</html>

