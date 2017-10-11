<?php
session_start();
	require("config.php");
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
$cod_expediente="";
	if($_GET){
		$cod_expediente=$_GET['cod_expediente'];
	}


	
echo"
	<br><br><h1 class='h2'>Historial de embarazada: $cod_expediente</h1>
	<input type='hidden' value=$cod_expediente>
	<table align='center' border='1' style='border-collapse:collapse' width='972px'>
				<tr class='linea'>
					<td widht='10px' align='center'>No.
					<td width='200px' align='center'>Fecha / Hora
					<td width='200px' align='center'>Semana
					<td width='200px' align='center'>Opciones
				</tr>";
				?>
	<?php

	$comando3="SELECT * from taghistorial WHERE cod_expediente=$cod_expediente";
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
			$id = $aDatos['historial_id'];
			$fecha = $aDatos['fecha'];
			$semana = $aDatos['meses'];
			echo"
				$tr
				<td width='10px'>$i
				<td width='400px'>$fecha
				<td width='450px'>$semana Meses
				<td width='100px'><a href='historiaemba.php?historial=$id'><img src='ver.png' width='20px'></a>
				</tr>
				";
			
		}
		?>
		<?php
			echo"</table><br><br>";
			piedx();
		?>
			