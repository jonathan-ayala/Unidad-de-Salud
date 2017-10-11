<?php 
session_start();
require ("lista.php");

//location.replace('index.php');
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
			
		</script>";
	}

$user=$_SESSION["doctor"];
	$comando1 ="select * from usuario where nombre_user='$user'";
	$consulta =mysql_query($comando1); 
	$aDatos= mysql_fetch_array($consulta);
	$cod_doctor=$aDatos["cod_doctor"];
	$id_usuario=$aDatos["id_usuario"];
	$nombre=$aDatos["nombre_usuario"];
	$apellido=$aDatos["apellido_usuario"];

function fechactual(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
      $fechactual = "$anio-$mes-$dia";
      return $fechactual;
    }
$fechas = fechactual();





$institucion = "";
$establecimiento = "";
$tipo_servicio = "";
$modalidad = "";
$estrategia = "";
$local = "";
$no = "";
$recurso = "";

if($_POST){
	$institucion = $_POST["institucion"];
	$establecimiento = $_POST["establecimiento"];
	$tipo_servicio = $_POST["tipo_servicio"];
	$modalidad = $_POST["modalidad"];
	$estrategia = $_POST["estrategia"];
	$local = $_POST["local"];
	$no = $_POST["no"];
	$recurso = $_POST["recurso"];
	$fecha = $_POST["fecha"];

	$ver = mysql_query("SELECT * FROM datos WHERE fecha_consulta='$fecha' and cod_doctor=$cod_doctor");
	$nfilas = mysql_num_rows($ver);
	
	if($nfilas==0){
    	if(mysql_query("INSERT INTO `datos` (`intitucion`, `establecimiento`, `servicio`, `modalidad`, `estartegia`, `local`, `fecha_consulta`, `no`, `recurso`, `cod_doctor`)VALUES('$institucion', '$establecimiento', '$tipo_servicio', '$modalidad', '$estrategia', '$local', '$fecha', '$no', '$recurso', '$cod_doctor')")){
        	echo "<script>alert('Datos agregada con exito');
                window.close();
				</script>
            ";
    	}else{
        	echo "<script>alert('Error interno');</script>".mysql_error();
    	
		}
	}else{
    	echo "<script>
		alert('Solo se permite registar los datos 1 vez');
				window.close();
    		</script>
    	";
	}

// 	$cmd = "INSERT INTO `datos` (`intitucion`, `establecimiento`, `servicio`, `modalidad`, `estartegia`, `local`, `fecha_consulta`, `no`, `recurso`, `cod_doctor`
// 	)VALUES(
// 		'$institucion', '$establecimiento', '$tipo_servicio', '$modalidad', '$estrategia', '$local', '$fecha', '$no', '$recurso', '$cod_doctor'
// 	)";

// if (mysql_query($cmd)){
// 	echo "<script> 
// 			alert('Datos guardados correctamente');
			
// 		</script>
// 	";
// }else{
// 	echo"
// 		<script>
// 			alert('Error interno');
// 		</script>
// 	";

// 	echo mysql_error();
// 	}




}







?><head>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<form method='post' name='datos' id='datos' action='datos.php' >
	<table  border=0 align="center">
	    <tr>
	        <td class='txt' align='right'>Institucion:</td>
	        <td><?php echo $rinstitucion; ?></td>
	    </tr>
	    <tr>
	        <td class='txt' align='right' >Establecimiento:</td>
	        <td><input type='text' style='width:120px;' class='caja2' name='establecimiento' id='establecimiento'/ ></td>
	    </tr>
	    <tr>
	    	<td class='txt' align='right'>Servicio:</td>
	    	<td><?php echo $rtipo_servicio; ?></td>
		</tr>
	    <tr>
	    	<td class='txt' align='right'>Modalidad:</td>
	    	<td><input type='text' class='caja2' style='width:120px;' name='modalidad' id='modalidad'/ ></td>
		</tr>
		<tr>
	    	<td class='txt' align='right'>Estrategia:</td>
	    	<td><?php echo $restrategia; ?></td>
		</tr>
	    <tr>
	    	<td width='150px' class='txt' align='right'  >Nombre del Local donde se desarrola la Estrategia:</td>
	    	<td><input type='text' class='caja2'style='width:120px;' name='local' id='local'/></td>
		</tr>
		<tr>
	    	<td class='txt' align='right'>Fecha de Consulta:</td>
	    	<td><input type='date' class='caja2'  name='fecha' id='local'/></td>
		</tr>
		<tr>
	    	<td class='txt' align='right'>No.:</td>
	    	<td><input type='text'class='caja2' style='width:40px;' name='no' id='no'/></td>
		</tr>
	    <tr>
	    	<td class='txt' align='right'>Recurso:</td>
	    	<td><?php echo $rrecurso; ?></td>
		</tr>
		<tr>
			<td colspan='' align="center"><input  type='button' name='Cancelar' value="Cancelar" onClick="window.close();"/></td>
	    	<td colspan='' align="center"><input type='submit' name='guardar' value="Guardar" /></td>
		</tr> 
	</table>
</form>
