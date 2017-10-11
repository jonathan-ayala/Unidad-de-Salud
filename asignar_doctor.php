<?php
	session_start();                                   
require("config.php");
if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
   



	$user=$_SESSION["registro"];
	$fecha= fechaActual();
	$sele=sele();
$comando ="select * from usuario where nombre_user='$user'";
conectar ();
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];

	
	if($_GET){
		$cod_Exp=$_GET["cod_Exp"];
		
		}
		if ($_POST){
			
			$cod_Exp=$_POST["cod_Exp"];
			$cod_doc=$_POST["doctor"];
			$peso=$_POST["peso"];
			$temperatura=$_POST["temperatura"];
			$presion=$_POST["precion"];
			$altura=$_POST["altura"];
			
			$sintomas=$_POST["simtoma"];
			 
			 $comando="INSERT INTO cola (`id_cola`, `id_usuario`, `cod_expediente`, `fecha_hora`, `id_doctor`, `estado`,entrega_expediente,peso,temperatura,presion,altura,simtoma) VALUES (NULL, '$id_usuario', '$cod_Exp', '$fecha', '$cod_doc', '1',2,$peso,$temperatura,$presion,$altura,'$sintomas');";
			//$comando="INSERT INTO cola (`id_cola`, `id_usuario`, `cod_expediente`, `fecha_hora`, `id_doctor`, `estado`) VALUES (NULL, '$id_usuario', '$cod_Exp', '$fecha', '$cod_doc', '1');";
			
		
			
			conectar();
			if (mysql_query($comando)){
				echo "<script>
				alert('Paciente agregado ala cola');
				location.replace('busqueda_expediente.php');
				</script>";
				}else{
					echo"
					<script>
				alert('error');
				
					</script>";
					}
			
			
			}
			//consulta para obtener el nombre del administrador
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
//fin de consulta administrador

echo"
<div class='menu'>
	<table align='center'>";
	
			if( $foto == '1' ){
 		echo"
 		<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70px\" height='70px'  alt=\"\"><br>$nombre $apellido</td>
          ";
	       }else{
     echo"
        <td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"iconos/m.jpg\" width=\"70px\" height='70px' alt=\"\"><br>$nombre $apellido</td>
          ";
}
echo"
	</table>
	
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
<form method='post' action='asignar_doctor.php'>
		<input type='hidden' value='$cod_Exp' name='cod_Exp'>
		<table align='center' border='0' width='800px'>
		<tr>
		<td align='center' class='linea'>ASIGNACION DE DOCTOR 
		</tr>
		<tr>
		<td></td>
		</tr>
		</table>
		<table>
		
		<tr align='left'>
		<td>Doctor&nbsp;
		<td>$sele 
		</tr>
		
		</table>
		<table align=center border='0'>
		<tr>
		<td style='text-align:right'>
		Peso(lb):
		<td><input type='text' name='peso' value='' class='caja'></td>";


		conectar();
		$comado2="select * from expediente where cod_expediente = '$cod_Exp'";
		
		$consulta2 =mysql_query($comado2);
		$aDatos2 =mysql_fetch_array($consulta2);
		
		$nom="";
		$apell="";
		$codEx=$aDatos2["cod_expediente"];
		$nom=$aDatos2["primer_Nombre"];
		$apell=$aDatos2["primer_Apellido"];
		$fotoExp = $aDatos2["foto"];

		if ($fotoExp=='1'){		
		echo"<td rowspan='4' width='300px' align='center'><img src=\"fotoExpediente/".$codEx.".jpg\" width=\"200\"  alt=\"\">";
		}else{
		echo"<td rowspan='4' width='300px' align='center'><img src=\"iconos/m.jpg\" width=\"200\"  alt=\"\">";
		}	
		echo"
		</br>
		$nom $apell
		 </td>		
		</tr>
		
		<tr>
		<td style='text-align:right'>
		Temperatura C&deg;:
		<td><input type='text' name='temperatura' value='' class='caja'>
		
		</tr>
		
		<tr>
		<td style='text-align:right'>
		Presion:
		<td><input type='text' name='precion' value='' class='caja'>
		</tr>
		
		<tr>
		<td style='text-align:right'>
		Altura (M):
		<td><input type='text' name='altura' value='' class='caja'>
		
		</tr>
		
		<tr>
		<td style='text-align:right'>
		Sintomas:
		<td><textarea class='caja' name='simtoma' style='width=278px;height:98px'></textarea>
		
		
		</tr>
		
		
		</table>
		<table>
		<tr>
		<td>
		<input type='submit' value='Agregar' class='ingresar'>
		</tr>
		</table>
		
		
</form>

			";

piedx();
?>