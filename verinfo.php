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
 	

<h1 class='h2'>Informaci&oacute;n de: <?php echo $nc;?></h1>
<table align='center'>
	<tr>
		<td><img src='perquin.png' id='image' width='500px' height='400px'></td>
		<td>
	<table align='center'>
		<tr>
			<td class='txt' align='right'>No. Expediente:
			<td><?php echo $cod_expediente;?>
		</tr>
		<tr>
			<td class='txt' align='right'>Nombre: 
			<td><?php echo $nc;?>
		</tr>
		<tr>
			<td class='txt' align='right'>Ubicaci&oacute;n: 
			<td><?php echo $localizacion;?>
		</tr>
		<tr>
			<td class='txt' align='right'>Semanas: 
			<td><?php echo $meses;?> SEMANAS
		</tr>
		<tr>
			<td class='txt' align='right'>Estado de la embarazada: 
			<td><?php echo $estado;?>
		</tr>
		<tr>
			<td class='txt' align='right'>Estado del embarazo: 

			<?php echo $tr;?> <?php echo $embarazo;?>
		</tr>
		<tr>
			<td><a href='mapa.php' class='link2'> <-Regresar</a>
		</tr>
	</table>
</td>
<div id='tagged' style='top:<?php echo $top;?>; left:<?php echo $left; ?>;'><a  class='link' margin=0 align=center ><?php echo $nc;?></a></div>
	
</table>
<br><br>
<?php
piedx();
?>