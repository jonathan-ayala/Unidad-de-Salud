<?php

session_start();

require("config.php");

if (!isset($_SESSION["farmacia"])){

		echo "<script>alert('Zona No Autorizada, Inicie Sesion');

		location.replace('index.php');</script>";

	}

$user=$_SESSION["farmacia"];
	$horai=fechai();

	$horaf=fechaf();
	interfaz();
conectar();
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);

$id_usuario = $aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

//echo dias_transcurridos('2014-12-01 22:14:15','2014-12-02-10-21-52');

$comando="select * from receta where estado=1 order by id_receta";

conectar();

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
          </table>";
          

}
	echo"
<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home4.php' class='items'>Inicio</a>
			<td width='150px'><a href='verR.php' class='items'>Ver Recetas</a>
			
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>


";
conectar();

$consulta= mysql_query ($comando);

$nf=mysql_num_rows($consulta);
$i=0;
if ($nf==0 ){

echo "

<table align='center'>

	<tr>

<td align='center'><img src='bote.jpg' width='20px' border=0 margin=auto>no hay recetas en cola

</tr>



    </table>

";

}else{
	
	
	echo "
	 <h2 class='h2'>COLA DE RECETAS</h2>

		<table align='center' border='1' style='border-collapse:collapse; font-family:verdana;font-size:14px;'>

			<tr class='linea'>


				<td width='50' align='center'>EXPEDIENTE</td>

				<td width='300' align='center'>NOMBRE DEL PACIENTE
				<td width='300' align='center'>NOMBRE DEL MEDICO
                
				<td align=center width='300px' colspan='4'>OPCIONES</td>

			</tr>
	
	";
	
	
	
	while($aDatos=mysql_fetch_array($consulta)){
		
	
		$fr=$aDatos["fecha_creacion_hora"];
	
	
		$fa=fechaActual2p();

	$nd=dias_transcurridos($fr,$fa);
			
	
	if ($nd<3){

	

	conectar();
		$id_receta=$aDatos["id_receta"];
		$consu=$aDatos["id_consulta"];
		$id_doctor=$aDatos["id_doctor"];
		$contenido=$aDatos["contenido"];
		$consulta2=mysql_query("select * from consulta where id_consulta='$consu' ");
		
		while($aDatos2=mysql_fetch_array($consulta2)){
			$expediente=$aDatos2["cod_expediente"];
			}
			
	
		
	$comando2="SELECT *  FROM `expediente` WHERE cod_expediente='$expediente' ";
	
	
	$consulta2=mysql_query($comando2);
	while($aDatos3=mysql_fetch_array($consulta2)){
		$nombre=$aDatos3["primer_Nombre"]." ".$aDatos3["segundo_Nombre"]." ".$aDatos3["primer_Apellido"]." 
	".$aDatos3["segundo_Apellido"];
		}
		
	$comando3="select * from doctor where cod_doctor='$id_doctor'";
	
	$consulta4=mysql_query($comando3);
	while($aDatos4=mysql_fetch_array($consulta4)){
	
	$nombreD=$aDatos4["nombre_doctor"]." ".$aDatos4["apellido_doctor"];
	}

echo "<tr>
<td align='center'>$expediente</td><td align=center>$nombre</td><td align=center>$nombreD</td>
<td>
<a href='receta.vista.php?cod=$id_receta&&codE=$expediente&&codC=$consu' class='link2'>VER RECETA |</a>

<a href='desactivaReceta.php?cod=$id_receta' class='link2'>RECETA ENTREGADA?</a>
</td>


</tr>
<tr>";
	
	}



	}
	
	echo"
</table>
<br><br>";


}

piedx();
?>