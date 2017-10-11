<?php
	session_start();                                   
require("config.php");
if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}


	$user=$_SESSION["registro"];
	
	
	

$cod_expediente="";
conectar();
	//consulta para obtener el nombre del enfermero
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
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
?>
<script type="text/javascript">
	function validar(){
    	if(document.busqueda_expediente.busqueda.value==""){
        alert("Ingrese datos para realizar la busqueda");
        document.busqueda_expediente.busqueda.focus();
        return false;
    	}
    }

	function abrir() { 
		window.open("reporte_expediente.php"); 
	}

 
</script>
</script>

<h2 class='h2'>B&Uacute;SQUEDA</h2>
<form action='busqueda_expediente.php' name='busqueda_expediente' method='post' onsubmit='return validar()'>
<table width='750px' align='center' class='tabla'>
	<tr class='ta'>
		<td><b>B&Uacute;SQUEDA(NOMBRE,APELLIDO,DUI,EXPEDIENTE)</b></td>
		<td ><input type='text' name='busqueda' class='caja'/></td>
        <td><input type=submit name='buscar' size='32' value='Buscar Expediente' class='ingresar2'>
	</tr>

</table>

</form>

<?php
if($_POST){
	$busqueda = $_POST["busqueda"];



	if (stristr($busqueda, " "))
{
  $var = explode (" ",$busqueda);
   
   $nombre =$var[0];
   $apellido=$var[1];

$comando="SELECT *  FROM `expediente` WHERE  `primer_Nombre` LIKE '%$nombre%' and`primer_Apellido`  LIKE '%$apellido%'";

 
}
else
{

$texto = $busqueda;
if (preg_match('/[0-9]/', $texto)) 
{ 
$comando="SELECT *  FROM `expediente` WHERE `numero_documento` = '$busqueda' or  `cod_expediente` = $busqueda ";

}
else
{
$comando="SELECT *  FROM `expediente` WHERE  `numero_documento` = '$busqueda' or `primer_Nombre` LIKE '%$busqueda%' or `primer_Apellido`  LIKE '%$busqueda%'
";

}
	
	
	
}

conectar();




$consulta= mysql_query ($comando);

$nf=mysql_num_rows($consulta);

if ($nf==0 ){


echo "

	<tr align='ta' align='center'>
<td><br><center><img src='bote.jpg' width='50px' border=0 align='center'> <b>NO SE ENCONTRARON RESULTADO</b></center>
</tr>

    </table>
";
}

else{
	
echo "	
<br>

<table align='center'  width='950' style='border-collapse:collapse;' border=1 >
	<tr class='linea'>
		<td align='center'>Foto</td>
		<td align='center'>EXPEDIENTE</td>
		<td align='center' >NOMBRE</td>
		<td colspan=3  align='center'>OPCIONES</td>
	</tr>
";
$i=1;
$mod="";	
$resp="";
while($aDatos= mysql_fetch_array($consulta)){
	$foto2 =$aDatos["foto"];
	$i++;
	$mod = $i % 2;
	if ($mod == 0){
		$resp= "<tr class='table' style='background:#eee;'>";	
		}else{
			$resp= "<tr class='table' style='background:white;'>";	
			}
	echo"
	$resp
	"; if($foto2=='1'){

	echo"<td align='center' width='30'><img src=\"fotoExpediente/".$aDatos['cod_expediente'].".jpg\" width=\"50\" height=\"50\" alt=\"\"></td>";
}else{
   echo" <td align=center><img src=\"iconos/m.jpg\" width=\"50px\" alt=\"50\"></td>";
}
echo"	<td width='50' class='ta'align=center>$cod_expediente  $aDatos[cod_expediente]</td>
	<td width='480' align=center' class='ta' >
		$aDatos[primer_Nombre]
		$aDatos[segundo_Nombre]
		$aDatos[primer_Apellido]
    	$aDatos[segundo_Apellido]
	<td align=center class='ta' width='90px'><a Asignar a Doctor href='asignar_doctor.php?cod_Exp=$aDatos[cod_expediente]' class='items2'><img src='doctor.png' width='20px'border=0 align='center' title='Asignar a Doctor'/> </a>
	<td align=center class='ta' width='90px'><a Asignar a Doctor href='e_expediente.php?cod_Exp=$aDatos[cod_expediente]' class='items2'><img src='editar.png' width='20px'border=0 align='center' title='Editar Expediente'/> </a>
	<td align=center class='ta' width='90px'><a Asignar a Doctor href='reporte_expediente.php?cod_Exp=$aDatos[cod_expediente]' class='items2' ><img src='imprimir.jpg' width='20px'border=0 align='center' title='Imprimir Expediente'/> </a>
	</tr>	
	";
	
	}
	echo " 
    </table>
	";
	//  width='30'
}








	}






piedx();
?>

