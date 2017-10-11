<?php
session_start();
require('config.php');
if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["registro"];
	
	interfaz();	
	conectar();
	//consulta para obtener el nombre del enfermero
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
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
			<td width='100px'><a href='home3.php' class='items'>Inicio</a>
			<td width='150px'><a href='expediente.php' class='items'>Nuevo Paciente</a>
			<td width='150px'><a href='busqueda_expediente.php' class='items'>Busqueda expediente</a>
			<td width='100px'><a href='mostrar_cola_expediente.php' class='items'>Cola</a>

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