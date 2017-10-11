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
?>

<script type='text/javascript'>
	function abrir_ventana() { 
		propiedades="width=600, height=400"; 
		window.open("datos.php","_blank",propiedades); 
}

	function abrir() { 
		window.open("reportep_1.php"); 
		window.open("reportep_2.php"); 
	}

 
</script>

<table align='center' border=0>
	<tr>
		<td align='center'><br>Ingresar datos de Consulta</td>
		<td align='center'><br>
        
        <a href="javascript:abrir_ventana()" class='items2'>Ingresar datos</a> 
 
        
         <br></td>
	</tr>
	<tr>	
		<td align='center' rowspan='2'>Imprimir Reporte<br><br></td>
		<td align='center' width='200px' height='50px'> <a href="javascript:abrir()" class='items2'>IMPRIMIR REPORTE</a> </td>
	</tr>
	
	
</table>

<?php
piedx();
	

?>
