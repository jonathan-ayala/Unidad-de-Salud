<?php
session_start();
require('config.php');
require_once("Zebra_Pagination.php");
if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["registro"];
	$horai=fechai();
	$horaf=fechaf();
interfaz();
conectar();
	//consulta para obtener el nombre del enfermero
$comando4 ="select * from usuario where nombre_user='$user'";
$consulta4 =mysql_query($comando4); 
$aDatos4= mysql_fetch_array($consulta4);
$id_usuario=$aDatos4["id_usuario"];
$nombre=$aDatos4["nombre_usuario"];
$apellido=$aDatos4["apellido_usuario"];
$foto =$aDatos4["foto"];

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
";                             
    
    $fechactual = fechaActual();

 
	// $comando ="SELECT * from cola where fecha_hora between '$horai' and '$horaf' and '$fechactual' order By id_cola";
	// $consulta =mysql_query($comando); 
	conectar();
	$total_consultas  = mysql_query("SELECT * from cola where fecha_hora between '$horai' and '$horaf' and '$fechactual' order By id_cola");
	$num_consultas = mysql_num_rows($total_consultas);
	$resultados = 10;

	$paginacion = new Zebra_Pagination();
	$paginacion->records($num_consultas);
	$paginacion->records_per_page($resultados);
	$consultas = mysql_query("SELECT * from cola where fecha_hora between '$horai' and '$horaf' and '$fechactual' order By id_cola LIMIT " .(($paginacion->get_page() - 1) * $resultados). "," .$resultados);
        







echo"
<div  style='height:595px;'>
<h2 class='h2'>Cola de Paciente</h2>
	
	</br>
<table  align='center'  style='border-collapse:collapse' border='1' >	
	<tr class='linea'>
		<td align='center' width='10px'>Foto</td>
		<td align='center' width='10px'>N</td>
		<td align='center' width='750px'>Nombre</td>
		<td align='center'width='250px'>Estado</TD>
		<td align='center'width='250px'>Doctor a cargo</td>
		<td align='center'width='350px'>Expediente fisico entregado?</td>
	</tr>		
		
	";
 
while($aDatos= mysql_fetch_array($consultas)){
	$id_momentanio=$aDatos["cod_expediente"];
	conectar();
	$comando2 ="SELECT * from expediente where cod_expediente='$id_momentanio'";
	$consulta2 =mysql_query($comando2); 
 	while($aDatos2= mysql_fetch_array($consulta2)){
		$nombre=$aDatos2["primer_Nombre"]." ".$aDatos2["segundo_Nombre"]." ". $aDatos2["primer_Apellido"]." ". $aDatos2["segundo_Apellido"];
	}
	$comando3 ="SELECT * from doctor where cod_doctor='$aDatos[id_doctor]'";
	$consulta3 =mysql_query($comando3); 
	while($aDatos3= mysql_fetch_array($consulta3)){
		$nombred=$aDatos3["nombre_doctor"]." ".$aDatos3["apellido_doctor"];
	}


	if ($aDatos["estado"]==1){
		$estado ="<a href='' style='color:red; text-decoration:none'><b>En espera de Consulta</b></a>";
	}else if($aDatos["estado"]==2){
		$estado="<a href='' style='color:green; text-decoration:none'><b>Atendido por Medico</b></a>";
	}else{
		$estado ="<a href='' style='color:red; text-decoration:none'><b>Consulta cancelada</b></a>";
	}

	$expdiente_entregado="";
	if ($aDatos["entrega_expediente"]==1){
		$expdiente_entregado ="<a href='' style='color:green; text-decoration:none'><b>Entregado</b></a>";
	}else{
		$expdiente_entregado="<a href='entrega.fisica.php?entrega=$aDatos[entrega_expediente] && exp=$aDatos[id_cola]'' style='color:red;' class='items2'><b>No entregado</b></a>";
	}
		
	//consulta para obtener el estado de las foto de pasientes
	$comando0 ="SELECT * from expediente where cod_expediente='$id_momentanio'";
    $consulta0 =mysql_query($comando0); 
    $aDatos0= mysql_fetch_array($consulta0);
    $foto2 =$aDatos0["foto"];


echo "
	<tr> 
	";	
	
			if( $foto2	 == '1' ){
	echo"<td align='center'><img src=\"fotoExpediente/".$aDatos['cod_expediente'].".jpg\" width=\"50\" height=\"50\" alt=\"\"></td>";
}else{
   echo"<td align=center><img src=\"iconos/m.jpg\" width=\"50px\" alt=\"50\"></td>";
}
	echo"<td align='center'>$aDatos[cod_expediente]</td>
	<td align='center'> $nombre</td>
	<td align='center'> $estado</td>
	<td align='center'>$nombred</td>
	<td align='center'>$expdiente_entregado</td>
	</tr>
";

}

echo "</table>
</div>
	<table align=center>  
        <tr align=center>
            <td align=center>";$paginacion->render();echo"</td>
        </tr>
    </table>

";



piedx();
?>