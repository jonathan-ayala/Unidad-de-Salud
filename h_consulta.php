<?php
session_start();
require("config.php");
require_once("Zebra_Pagination.php");
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	
	
	$user=$_SESSION["doctor"];
	interfaz();
	if ($_GET){
		$expediente=$_GET['cod_Exp'];	
		conectar ();
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


$total_consultas  = mysql_query("SELECT *  FROM historial where id_expediente='$expediente'");
$num_consultas = mysql_num_rows($total_consultas);
$resultados = 10;

$paginacion = new Zebra_Pagination();
$paginacion->records($num_consultas);
$paginacion->records_per_page($resultados);
$consultas = mysql_query("SELECT *  FROM historial where id_expediente='$expediente' LIMIT " .(($paginacion->get_page() - 1) * $resultados). "," .$resultados);
     
// $comando="SELECT *  FROM historial where id_expediente='$expediente'";
// 	$consulta=mysql_query($comando);
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
	echo "
	<h1 class='h2'>Historial Médico</h1><br>
	<table align='center'  style='border-collapse:collapse'border='1' width='900px'>
	<tr class='linea'>
	<td align='center' >Fechas</td>
		<td align='center'>Medico que lo atendio</td>
		<td align='center'>Opciones</td>
	</tr>";
	while($aDatos=mysql_fetch_array($consultas)){
		$fecha=$aDatos["fecha_hora"];
		
		$array=explode("-",$fecha);
		$array2=explode(":",$array[2]);
		$array3=explode(" ",$array2[0]);
		$fecha=$array3[0]."-".$array3[1]."-".$array[0];
		$comando2="select * from doctor where cod_doctor='$aDatos[id_doctor]'";
		
		
		$consulta2=mysql_query($comando2);
		while($aDatos2=mysql_fetch_array($consulta2)){
			$nombreM=$aDatos2["nombre_doctor"]." ".$aDatos2["apellido_doctor"];
		}
		
		
		
		echo "<tr>
		<td align='center'>$fecha</td>
		<td align='center'>$nombreM</td>
		<td align='center'>
		<a href='detalleH.php?cod_h=$aDatos[id_historial]' class='items2' ><img src='ver.png' width='20px'></a>
         <a href='detalleR.php?cod_h=$aDatos[id_historial]' class='items2' ><img src='ver.png' width='20px'></a>

       </td>
		</tr>";
		
		
		}
	
	echo "</table>
			<table align=center>  
                <tr align=center>
                    <td align=center>";$paginacion->render();echo"</td>
					
                </tr>
            </table>

            <br><br>";
	
	
	}
	piedx();

?>