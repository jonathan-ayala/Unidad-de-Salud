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
?>

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
	<script>
	function loadXMLDoc(){
		var xmlhttp;
		var n=document.getElementById('bus').value;
		if(n==''){
			document.getElementById("myDiv").innerHTML="";
			return;
		}

		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
			}
				}
				xmlhttp.open("POST","proc.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("q="+n);
			}


	</script>
	
	<table align='center'>
		<tr>
			<td><img src='perquin.png' id='image' width='500px' height='400px'>
			<td><h1 class='h2'>DATOS</h1>
				<form action='mapa.php' method='post'>
				<table align='center'>
					<tr>
						<td align='center' class='txt'>Buscar:
						<td><input type='text' id="bus" name="bus" onkeyup="loadXMLDoc()">
					</tr>
				</table>
				<div id='myDiv'></div>
				
	


				</form>

				<form action='gmapa.php' method='post'>
				<table align='center'>
					<tr>
						<td align='center' class='txt'>Posicion:
						<td><input type='text' readonly id='y' name='y' style='cursor:not-allowed' class='caja2' placeholder='Y'>---<input type='text' style='cursor:not-allowed' readonly id='x' name='x' placeholder='X' class='caja2'> 
					</tr>
					
					<tr>
						<?php
						$exp="";
						
						$nom1="";
						$nom2="";
						$ape1="";
						$ape2="";
						$nomC="";
							if($_GET){
								$exp=$_GET['cod_Exp'];
							
						?>
						<td align='center' class='txt'>No. Expediente:
						<td><input type='text' style='cursor:not-allowed' value='<?php echo $exp ?>' id='cod_expediente' name='cod_expediente' class='caja2' readonly>
							
					</tr>
					<tr>
						<?php
						conectar();
							$com = "SELECT * fROM expediente WHERE `cod_expediente`=$exp";
							$con= mysql_query ($com);
							while($aDato= mysql_fetch_array($con)){
								$nom1 = $aDato['primer_Nombre'];
								$nom2 = $aDato['segundo_Nombre'];
								$ape1 = $aDato['primer_Apellido'];
								$ape2 = $aDato['segundo_Apellido'];
								$nombreC =$nom1." ".$nom2." ".$ape1." ".$ape2;


						?>
						<td align='center' class='txt'>Nombre:</td>
						<td><input type='text' style='cursor:not-allowed' value='<?php echo $nombreC ?>' class='caja2' readonly>
							</td>
					</tr>
					<tr>
						<td align='center' class='txt'>Semanas:</td>
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
								






							</select>
						</td>
					</tr>
					<tr>
						<td align='center' class='txt'>Estado de la embarazada:
						<td><textarea class='tarea' id='estado' name='estado'></textarea>
					</tr>
					<tr>
						<td align='center' class='txt'>Estado del embarazo:
						<td><select class='select' id='embarazo' name='embarazo'>
								<option>ALTO RIESGO</option>
								<option>PUERPERA</option>
								<option>BAJO RIESGO</option>
							</select>
					</tr>
					<tr>
						<td align='center' class='txt'>Ubicacion:
						<td><textarea class='tarea'  id='ubicacion' name='ubicacion'></textarea>
					</tr>
							<?php 
								}
							
								}
							?>


					<tr>
						<td align='center' colspan='2'><input type='reset' value='Vaciar' class='boton'>&nbsp;<input type='submit' value='Guardar' class='boton'>
						
					</tr>
				</table>
			</form>

			

			</td>
		</tr>
	</table >

	<br><br>
	<h1 class='h2'>REGISTROS</h1>
	<table align='center' border='1' style='border-collapse:collapse' width='972px'>
				<tr class='linea'>
					<td widht='10px' align='center'>No.
					<td width='400px' align='center'>Nombre
					<td width='400px' align='center'>Estado Ultimo
					<td width='200px' align='center'>Opciones
				</tr>

			<?php
			conectar();
		
		$comando3="SELECT tag.*,expediente.* from tag,expediente WHERE tag.cod_expediente=expediente.cod_expediente and estado_embarazada=1";
		$consulta3= mysql_query ($comando3);
		$nf=mysql_num_rows($consulta3);
		$i="";
		$mod="";
		$tr="";
		$unir="";
		while($aDatos= mysql_fetch_array($consulta3)){
			conectar();
			$i++;

			$mod = $i %2;
			if($mod ==0){
				$tr="<tr style='background: #ddd; text-align:center'>";
			}else{
				$tr="<tr style='background: white; text-align:center'>";
			}

			$cod_expediente = $aDatos['cod_expediente'];
			$nom= $aDatos['primer_Nombre'];
			$nom2= $aDatos['segundo_Nombre'];
			$apel1=$aDatos['primer_Apellido'];
			$apel2=$aDatos['segundo_Apellido'];
			$unir=$nom ." ". $nom2 ." ". $apel1 ." ". $apel2; 
			$nombre = $aDatos['cod_expediente'];
			$meses = $aDatos['meses'];
			$estado = $aDatos['estado'];
			$top = $aDatos['left'];
			$left = $aDatos['top'];
			$estatus = $aDatos['estado_embarazada'];
			if($estatus==1){
					echo"
				$tr
				<td width='10px'>$i
				<td width='400px'>$unir
				<td width='450px'>$estado
				<script type='text/javascript'>
		function abrir() { 
			window.open(\"imprimirHistorial.php\");  
	}

 
</script>
				<td width='100px'><a href='histag.php?cod_expediente=$aDatos[cod_expediente]'  class='link2'><img src='historial.png' title='Historial Paciente' width='20px'></a>&nbsp;<a href='verinfo.php?id_embarazada=$aDatos[id]'  class='link2'><img src='ver.png' title='Informacion Paciente' width='20px'></a> &nbsp; <a href='edtag.php?id_embarazada=$aDatos[id]'  class='link2'><img src='editar.png' title='Editar Paciente' width='20px'></a>&nbsp;<a href='imprimirHistorial.php?cod_expediente=$aDatos[cod_expediente]' class='link2'><img src='print.png'  title='Imprimir Historial' width='20px'></a>&nbsp;<a href='okemba.php?id_embarazada=$aDatos[id]'  class='link2'><img src='ok.png' title='Embarazo terminado'></a>&nbsp; <a href='destag.php?id_embarazada=$aDatos[id]'  class='link2'><img src='activo.png' title='Desactivar Paciente' width='20px'></a> 
				</tr>";
			}else{
				echo"
				$tr
				<td width='10px'>$i
				<td width='400px'>$unir
				<td width='450px'>$estado
				<td width='125px'><a href='histag.php?id_embarazada=$aDatos[id]'  class='link2'><img src='historial.png' title='Historial Paciente' width='20px'></a><a href='verinfo.php?id_embarazada=$aDatos[id]'  class='link2'><img src='ver.png' title='Informacion Paciente' width='20px'></a> &nbsp; <a href='edtag.php?id_embarazada=$aDatos[id]'  class='link2'><img src='editar.png' title='Editar Paciente' width='20px'></a>&nbsp; <a href='acttag.php?id_embarazada=$aDatos[id]'  class='link2'><img src='desactivar.png' title='Activar Paciente' width='20px'></a> 
				</tr>";
			}
		
			?>

			<div id='tagged' style='top:<?php echo $top;?>; left:<?php echo $left; ?>;'><a  class='link' margin=0 align=center ><?php echo $unir;?></a></div>
		<?php
			
		}
		?>	
		




	</table>
	<table align='center'>
		<tr>
			<td width='250px'><a href='rfecha.php' class='link2'><img src='print.png' margin=0 align=center>Reporte de embarazadas</a>
			<td width='250px'><a href='respecifico.php' class='link2'><img src='print.png' margin=0 align=center>Reporte especifico</a>
			<td width='310px'><a href='embarazadas.php' class='link2'><img src='print.png' margin=0 align=center>Reporte embarazadas(que ya dieron a luz)</a>
		
		</tr>
	</table>
<br>
<br>

<?php
piedx();
?>