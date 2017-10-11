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
echo"
<form method='post' action='gfecha.php'>
<h2 class='h2'>Criterio de busqueda para generar reporte</h2>
<table align='center'>
<tr>
<td class='txt'>Fecha inicial:
<td><input type='date' name='fechai' id='fechai'>
</tr>
<tr>
<td class='txt'>Fecha final:
<td><input type='date' name='fechaf' id='fechaf'>
</tr>
<tr>
<td align='center' colspan=2><a href='mapa.php' class='link2'><-REGRESAR</a>&nbsp;<input type='submit' value='Generar' class='boton'>
</tr>
</table>
</form>
";
?>
<?php
	piedx();
?>