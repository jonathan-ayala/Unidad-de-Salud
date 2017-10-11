<?php
session_start();
require("config.php");
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["doctor"];
interfaz();
conectar();
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
echo "
<script type='text/javascript'>
	function abrir(url){
		window.open(url,'Dotos de la Consulta','width=500, height=300', 'top=200, left=200')
	}
</script>";


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
</div>
<table align='center'>
	<tr>
		<td><img src='morazan.jpg' width='840px'>
	</tr>
</table>
";
piedx();
	

?>