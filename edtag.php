<?php
	session_start();
require('config.php');

if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];
interfaz();
conectar();
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_doc=$aDatos["cod_doctor"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$cod_expediente="";
$foto="";
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
          </table>
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


	$id="";
	if($_GET){
		$id = $_GET['id_embarazada'];
	}
	$query = mysql_query("SELECT tag.*,expediente.* from tag,expediente WHERE tag.cod_expediente=expediente.cod_expediente and id='$id'");

		
		$nombre="";
		$nombre1="";
		$apellido1="";
		$apellido2="";
		$nc="";
		$top="";
		$left="";
		$id="";
		$meses="";
		$estado="";
		$localizacion="";
		$embarazo="";
		$cod_expediente="";
		$td="";

		while($aDatos = mysql_fetch_array($query)){
			$id=$aDatos['id'];

			$nombre = $aDatos['primer_Nombre'];
			$nombre2= $aDatos['segundo_Nombre'];
			$apellido1=$aDatos['primer_Apellido'];
			$apellido2=$aDatos['segundo_Apellido'];
			$nc = $nombre." ".$nombre2." ".$apellido1." ".$apellido2;
			$top = $aDatos['left'];
			$left = $aDatos['top'];
			$meses = $aDatos['meses'];
			$estado = $aDatos['estado'];
			$cod_expediente=$aDatos['cod_expediente'];
			$localizacion = $aDatos['ubicacion'];
			$embarazo = $aDatos['embarazo'];

			
			if($embarazo=="ALTO RIESGO"){
				$tr="<td style='color:red; font-weight:bold'>";
			}else if($embarazo=="BAJO RIESGO"){
				$tr= "<td style='color:green; font-weight:bold'>";
			}else{
				$tr="<td style='color:#eddb18; font-weight:bold'>";
			}

	}

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>
	<script>
		$(document).ready(function(){

			$('#image').click(function(e){
				var left = e.clientX;
				var top = e.clientY;
				document.getElementById('y').value= top;
				document.getElementById('x').value= left;
	});
});
	</script>

	<div class='pagina'>
		<h1 class='h2'>Actualizaci&oacute;n de datos de: <?php echo $nc ?></h1>
		<form action="actag.php" method="post">
			<input type='hidden' value=<?php echo $cod_expediente?> name='cod_expediente' id='cod_expediente'>
		<table align='center'>
			<tr>
				<td><img src='perquin.png' id='image' width='500px' height='400px'>
				<td><h1 class='h2'>Datos</h1>
					<input type='hidden' value='<?php echo $id ?>' name='id' id='id'>
					<table align='center'>
						<tr>
							<td class='txt' align='right'>Posici&oacute;n: 
							<td><input type='text' readonly class='caja2' placeholder="Y" name='y' id='y' value='<?php echo $top ?>'>---<input type='text' readonly class='caja2' placeholder="X" name='x' id='x' value='<?php echo $left ?>'>
						</tr>
						<tr>
							<td class='txt' align='right'>No. Expediente:
							<td><?php echo $cod_expediente?>
						</tr>
						<tr>
							<td class='txt' align='right'>Nombre:
							<td><?php echo $nc?>
						</tr>
						<tr>
							<td class='txt' align='right'> Semanas (Anteriormente: <?php echo $meses?> semanas):
							<td><select class='select' id='meses' name='meses'>
								<option value='1'>1 SEMANA</option>
								<option value='2'>2 SEMANAS</option>
								<option value='3'>3 SEMANAS</option>
								<option value='4'>4 SEMANAS</option>
								<option value='5'>5 SEMANAS</option>
								<option value='6'>6 SEMANAS</option>
								<option value='7'>7 SEMANAS</option>
								<option value='8'>8 SEMANAS</option>
								<option value='9'>9 SEMANAS</option>
								<option value='10'>10 SEMANAS</option>
								<option value='11'>11 SEMANAS</option>
								<option value='12'>12 SEMANAS</option>
								<option value='13'>13 SEMANAS</option>
								<option value='14'>14 SEMANAS</option>
								<option value='15'>15 SEMANAS</option>
								<option value='16'>16 SEMANAS</option>
								<option value='17'>17 SEMANAS</option>
								<option value='18'>18 SEMANAS</option>
								<option value='19'>19 SEMANAS</option>
								<option value='20'>20 SEMANAS</option>
								<option value='21'>21 SEMANAS</option>
								<option value='22'>22 SEMANAS</option>
								<option value='23'>23 SEMANAS</option>
								<option value='24'>24 SEMANAS</option>
								<option value='25'>25 SEMANAS</option>
								<option value='26'>26 SEMANAS</option>
								<option value='27'>27 SEMANAS</option>
								<option value='28'>28 SEMANAS</option>
								<option value='29'>29 SEMANAS</option>
								<option value='30'>30 SEMANAS</option>
								<option value='31'>31 SEMANAS</option>
								<option value='32'>32 SEMANAS</option>
								<option value='33'>33 SEMANAS</option>
								<option value='34'>34 SEMANAS</option>
								<option value='35'>35 SEMANAS</option>
								<option value='36'>36 SEMANAS</option>
								<option value='37'>37 SEMANAS</option>
								<option value='38'>38 SEMANAS</option>
								<option value='39'>39 SEMANAS</option>
								<option value='40'>40 SEMANAS</option>
								<option value='41'>41 SEMANAS</option>
								<option value='42'>42 SEMANAS</option>
								<option value='43'>43 SEMANAS</option>
								<option value='44'>44 SEMANAS</option>
								<option value='45'>45 SEMANAS</option>
								<option value='46'>46 SEMANAS</option>
								<option value='47'>47 SEMANAS</option>
								<option value='48'>48 SEMANAS</option>
								<option value='49'>49 SEMANAS</option>
								<option value='50'>50 SEMANAS</option>
								<option value='51'>51 SEMANAS</option>
								<option value='52'>52 SEMANAS</option>
							</select>
						</tr>
						<tr>
						<td align='right' class='txt'>Estado de la embarazada:
						<td><textarea class='tarea' id='estado' name='estado'><?php echo $estado?></textarea>
					</tr>
					<tr>
						<td align='right' class='txt'>Estado del embarazo:
						<td><select class='select' id='embarazo' name='embarazo' value'<?php echo $embarazo?> '>
								<option>ALTO RIESGO</option>
								<option>PUERPERA</option>
								<option>BAJO RIESGO</option>
							</select>
					</tr>
					<tr>
						<td align='right' class='txt'>Ubicacion:
						<td><textarea class='tarea'  id='ubicacion' name='ubicacion'><?php echo $localizacion?></textarea>
					</tr>
					<tr>
						<td colspan='2' align='center'><a href='mapa.php' class='link2'><-REGRESAR</a>&nbsp;<input type='submit' value='Actualizar' class='boton'>
					</tr>
					
					</table>
					</td>
			</tr>
		</table>
	</form>

		<div id='tagged' style='top:<?php echo $top;?>; left:<?php echo $left; ?>;'><a  class='link' margin=0 align=center ><?php echo $nc;?></a></div>
	<br><br>
	<?php
		piedx();
	?>
