<?php
session_start();
require("config.php");
if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	conectar ();
	$cod_Exp="";
	$observaciones="";
	$user=$_SESSION["doctor"];

	if ($_GET){
		$cod_Exp = $_GET["cod_Exp"];
		$comando="update cola set estado='3'  where cod_expediente='$cod_Exp'";
	 	mysql_query($comando);
	}

	if ($_POST){
		$cod_Exp = $_POST["cod_Exp"];
		$observaciones = $_POST["observacion"];
		$comando1="update cola set observaciones='$observaciones' where cod_expediente='$cod_Exp'";

		if (mysql_query($comando1)){
		echo "<script>alert('Consulta Cancelada con Exito');location.replace('cola.php');	</script>";
		}

	}
	interfaz();
//consulta para obtener el nombre del doctor
	conectar();
	$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario = $aDatos["id_usuario"];
$user=$aDatos["nombre_user"];
$id_doc=$aDatos["cod_doctor"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];


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
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>

	";
	echo"
		<form method='post' name='frm'>
			<table align='center'>
			<br>
				<tr>
					<td  width='290px'><b>Porque se cancela la consuta?</b></td>
					<td><textarea name='observacion' placeholder='Porque se cancela la consuta?' style='width:250px; height:100px;' class='caja' width='250px' height='200px'></textarea>
					
					
				</tr>
				<tr>
				<td align='center'><input type='submit' value='Aceptar'  class='ingresar'></td>
				</tr>
			</table>
		</center>
		</form>
	";
	piedx();
?>