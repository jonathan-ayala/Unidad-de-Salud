<?php

session_start();

require("config.php");
require_once("Zebra_Pagination.php");

if (!isset($_SESSION["doctor"])){

		echo "<script>alert('Zona No Autorizada, Inicie Sesion');

		location.replace('index.php');</script>";

	}

	$horai=fechai();

	$horaf=fechaf();



	$user=$_SESSION["doctor"];

	$comando ="select * from usuario where nombre_user='$user'";

conectar ();



$consulta =mysql_query($comando); 

$aDatos= mysql_fetch_array($consulta);

$id_doc=$aDatos["cod_doctor"];
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto=$aDatos["foto"];



//consulta para obtener el nombre del doctor

$comando ="select * from usuario where nombre_user='$user'";

$consulta =mysql_query($comando); 

$aDatos= mysql_fetch_array($consulta);

$id_doc=$aDatos["cod_doctor"];

$comando1="select * from doctor where cod_doctor= $id_doc";

$consulta1= mysql_query($comando1);

			

			while ($aDatos1=mysql_fetch_array($consulta1)){

			

$nombre=$aDatos1["nombre_doctor"];

$apellido=$aDatos1["apellido_doctor"];

			}






interfaz();



echo"

<div class='menu'>

	<table align='center'>";
			if( $foto == '1' ){
 		 	echo"	<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"100px\"  alt=\"\"><br><h3 class='usuario'>[$nombre $apellido] </td>
          ";
	       }else{
     echo"
        <td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"iconos/m.jpg\" width=\"100px\" alt=\"\"><br><h3 class='usuario'>[$nombre $apellido] </td>
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

";

conectar();
$total_consultas  = mysql_query("SELECT * FROM  `cola` WHERE  `id_doctor` =$id_doc and estado='1' and fecha_hora between '$horai' and '$horaf'");
$num_consultas = mysql_num_rows($total_consultas);
$resultados = 10;

$paginacion = new Zebra_Pagination();
$paginacion->records($num_consultas);
$paginacion->records_per_page($resultados);
$consultas = mysql_query("SELECT * FROM  `cola` WHERE  `id_doctor` =$id_doc and estado='1' and fecha_hora between '$horai' and '$horaf' order By id_cola  LIMIT " .(($paginacion->get_page() - 1) * $resultados). "," .$resultados);
     

// $comando="SELECT * FROM  `cola` WHERE  `id_doctor` =$id_doc and estado='1' and fecha_hora between '$horai' and '$horaf' order By id_cola ";
// conectar();
// $consulta= mysql_query ($comando);
$nf=mysql_num_rows($consultas);



if ($nf==0 ){

	

	



echo "

<table align='center'>

	<tr>

<td align='center'><img src='bote.jpg' width='20px' border=0 margin=auto>No hay Pacientes en cola

</tr>



    </table>

";

}



else{



	echo"

	    <h2 class='h2'>COLA DE PACIENTES</h2>
<div  style='height:505px;'>
		<table align='center' width='900px' border='1' style='border-collapse:collapse; font-family:verdana;font-size:14px;'>

			<tr class='linea'>

				<td width='30' align='center'>Foto</td>	

				<td width='50' align='center'>EXPEDIENTE</td>

				<td width='300' align='center'>NOMBRE

				<td align=center width='100px' colspan='4'>OPCIONES</td>

			</tr>

	";

	

	while($aDatos= mysql_fetch_array($consultas)){

	

	$comando2="SELECT *  FROM expediente WHERE cod_expediente=$aDatos[cod_expediente] ";
	conectar();
	$consulta2= mysql_query ($comando2);

	$aDatos2=mysql_fetch_array($consulta2);
		$foto = $aDatos2["foto"];
		$doc_expe = $aDatos2["cod_expediente"];
			echo"

	<br>

	<tr>";
     if( $foto == '1' ){
     	echo"
	<td align='center' width='20'><img src=\"fotoExpediente/".$doc_expe.".jpg\" width=\"20\" alt=\"20\"></td>";

}else{
	echo"
      
		<td align=center><img src=\"iconos/m.jpg\" width=\"20px\" alt=\"20px\"></td>
          ";
}
echo"
	<td width='50' align=center> $aDatos2[cod_expediente]</td>

	<td width='500' align='center'>

	$aDatos2[primer_Nombre]

	$aDatos2[segundo_Nombre]

	$aDatos2[primer_Apellido]

    $aDatos2[segundo_Apellido]

	
	<td align=center > <a ejecutar consulta  href='historia.php?cod_Exp=$aDatos[cod_expediente]&&id_cola=$aDatos[id_cola]' class='items2' ><img src='guardar.png' title='Guardar al expediente'></a>
	&nbsp; &nbsp;<a ejecutar consulta  href='ejecutar.php?cod_Exp=$aDatos[cod_expediente]&&id_cola=$aDatos[id_cola]' class='items2' ><img src='ejecutar.png' title='Ejecutar Consulta'></a>
	&nbsp; &nbsp;<a  href='h_consulta.php?cod_Exp=$aDatos[cod_expediente]' class='items2' ><img src='historial.png' title='Historial Medico'</a>
	
	";
	$comandoL="select * from historial where id_cola=$aDatos[id_cola]";
	$consulL=mysql_query($comandoL);
	$nfL=mysql_num_rows($consulL);
	if($nfL==0){
	echo"
	&nbsp; &nbsp;<a  href='cancelar_consulta.php?cod_Exp=$aDatos[cod_expediente]' class='items2'><img src='cancelar.png' title='Cancelar Consulta'></a>
	";
	}
	
	echo"	
	</td>



	


	</tr>	

	";

}

	echo " 
   		</table>
   	</div>
   		<table align=center>  
        	<tr align=center>
            	<td align=center>";$paginacion->render();echo"</td>
        	</tr>
    	</table>
	";

}

	piedx();

?>