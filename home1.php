<?php
session_start();
require('config.php');
?>
<script languaje=javascript>

//Voy a obtener un numero aleatorio de segundos, para que la recarga se realice a intervalos irregulares
function aleatorio(inferior,superior){
numPosibilidades = superior - inferior
aleat = Math.random() * numPosibilidades
aleat = Math.floor(aleat)
return parseInt(inferior) + aleat
}
num_aleatorio = aleatorio(50, 90)


//ahora voy a generar un string para enviarlo por parámetro a esta misma página
//el parámetro lo pasaremos por URL.
//No haremos nada con ese dato, pero como cada vez será distinto, nos asegura que el navegador siempre solocitará al servidor la página, en vez de mostrar otra vez la que tiene en caché
//utilizaremos la fecha y tiempo para generar el dato
miFecha = new Date()
dato_url = miFecha.getYear().toString() + miFecha.getMonth().toString() + miFecha.getDate().toString() + miFecha.getHours().toString() + miFecha.getMinutes().toString() + miFecha.getSeconds().toString()


//para recargar la página con un retardo utilizaremos la función setTimeout()
//recibe el primer parámetro la instrucción que se quiere ejecutar
//segundo parámetro es el tiempo en milisegundos que se quiere esperar
setTimeout("window.location='home1.php?perquin=" + dato_url + "'", num_aleatorio * 1000)

</script>


<?php
if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];
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
$actual =$aDatos["actual"];
$estado =$aDatos["estado"];
//fin de consulta administrador

//condicion para saber si ya ha sido desactivado el usuario
 if($estado== 0){
   	session_destroy();
   	$con= "UPDATE usuario SET actual = 0 WHERE id_usuario='$id_usuario'";
$consu=mysql_query($con);
  	echo "<script>alert('Su usuario a sido Desactivado');
	location.replace('index.php');</script>";
  }
//fin de condicion

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
			<td width='100px'><a href='home1.php' class='items'>Inicio</a>
			<td width='150px'><a href='agregar.doctor.php' class='items'>Agregar Doctor</a>
			<td width='150px'><a href='agregar.usuario.php'class='items'>Agregar Usuario</a>
			<td width='150px'><a href='reporte.usuario.php'class='items'>Reportes</a>
			<td width='150px'><a href='cerrar.php?id=$id_usuario' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>
";
?>
<h2 class='h2'>ADMINISTRACION DE USUARIOS</h2>
<form action='home1.php' name='busqueda_expediente' method='post'>
<table width='750px' align='center' class='tabla'>
	<tr class='ta'>
		<td><b>B&Uacute;SQUEDA(NOMBRE,APELLIDO,DUI,TELEFONO)</b></td>
		<td ><input type='text' name='busque' class='caja'/></td>
        <td><input type=submit name='buscar' size='32' value='Buscar Usuario' class='ingresar2'>
	</tr>

</table>

</form>

<?php


//para busqueda de usuarios

if($_POST){
	$busqueda = $_POST["busque"];

	if (stristr($busqueda, " "))
{
  $var = explode (" ",$busqueda);
   
   $nombre =$var[0];
   $apellido=$var[1];

$comando1="SELECT *  FROM `usuario` WHERE  `nombre_usuario` LIKE '%$nombre%' and`apellido_usuario`  LIKE '%$apellido%'";

 
}
else
{

$texto = $busqueda;
if (preg_match('/[0-9]/', $texto)) 
{ 
$comando1="SELECT *  FROM `usuario` WHERE `dui` = $busqueda or  `id_usuario`=$busqueda or  `cod_doctor`  = $busqueda";

}
else
{
$comando1="SELECT *  FROM `usuario` WHERE  `dui` = '$busqueda' or `nombre_user` LIKE '%$busqueda%' or `apellido_usuario`  LIKE '%$busqueda%'
";

}
	
	
	
}
$consulta= mysql_query ($comando1);

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

<table  align='center'  border='0' >	
	<tr class='linea'>
		<td align='center' width='90spx'>Foto</td>
		<td align='center' width='30px'>ID</td>
		<td align='center' width='130px'>Nombre </td>
		<td align='center'width='103px'>Nombre Usuario</td>
		<td align='center'width='103px'>Tipo Usuario</td>
		<td align='center'width='130px'>Opciones </br>Estado | Editar</td>
	</tr>		
";

$i=1;
$mod="";	
$resp="";
while($aDatos= mysql_fetch_array($consulta)){
	$i++;
	$mod = $i % 2;
	if ($mod == 0){
		$resp= "<tr class='table' style='background:#eee;'>";	
		}else{
			$resp= "<tr class='table' style='background:white;'>";	
			}
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$telefono=$aDatos["telefono"];
$dui=$aDatos["dui"];
$direccion=$aDatos["direccion"];
$nombre_user2=$aDatos["nombre_user"];
$contrasena=$aDatos["contrasena"];
$estado=$aDatos["estado"];
$nivel_usuario=$aDatos["nivel_usuario"];
$cod_doctor=$aDatos["cod_doctor"];
$fotoUsu=$aDatos["foto"];

echo "
	<tr>";
	if($fotoUsu == '1'){
    echo"<td ><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";
}else{
	echo"<td ><img src=\"iconos/m.jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";

}
echo"
	<td > $id_usuario</td>
	<td > $nombre $apellido</td>
	<td > $nombre_user2</td>";
	if($nivel_usuario==1){
	   echo "<td>Administrador</td>";
	}
	if($nivel_usuario==2){
	   echo "<td>Doctor</td>";
	}
	if($nivel_usuario==3){
	   echo "<td>Enfermera</td>";
	}
	if($nivel_usuario==4){
	   echo "<td>Farmacia</td>";
	}
	
	if ( $estado == '1' ){
 		echo"
		<td class='espacio1'><a href='estadUsu.php?id=$id_usuario'><img src=\"iconos/1.png\"/></a>
          ";
	}else{
    
     echo"
		<td class='espacio1'><a href='estadUsu.php?id=$id_usuario'><img src=\"iconos/0.png\"/></a>
          ";
}


	echo"
	<a href='editarUsuario.php?id=$id_usuario'><img src=\"iconos/e.png\" /> </a></td>
	</tr>
  ";
}

echo" </table>";
	
}








	}else{

		//tabla para mostrar datos de los usuarios
echo "

<table  align='center'  border='0' >	
	<tr class='linea'>
		<td align='center' width='90spx'>Foto</td>
		<td align='center' width='30px'>ID</td>
		<td align='center' width='130px'>Nombre </td>
		<td align='center'width='103px'>Nombre Usuario</td>
		<td align='center'width='103px'>Tipo Usuario</td>
		<td align='center'width='130px'>Opciones </br>Estado | Editar</td>
	</tr>		
";

//consulta para obtener todos los datos de los usuarios
	$comando ="select * from usuario where actual = '1'";
	$consulta =mysql_query($comando);
while($aDatos= mysql_fetch_array($consulta)){
	
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$telefono=$aDatos["telefono"];
$dui=$aDatos["dui"];
$direccion=$aDatos["direccion"];
$nombre_user2=$aDatos["nombre_user"];
$contrasena=$aDatos["contrasena"];
$estado=$aDatos["estado"];
$nivel_usuario=$aDatos["nivel_usuario"];
$cod_doctor=$aDatos["cod_doctor"];
$fotoUsu=$aDatos["foto"];

echo "
	<tr>";
	if($fotoUsu == '1'){
    echo"<td ><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";
}else{
	echo"<td ><img src=\"iconos/m.jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";

}
echo"
	<td > $id_usuario</td>
	<td > $nombre $apellido</td>
	<td > $nombre_user2</td>

	";
	if($nivel_usuario==1){
	   echo "<td>Administrador</td>";
	}
	if($nivel_usuario==2){
	   echo "<td>Doctor</td>";
	}
	if($nivel_usuario==3){
	   echo "<td>Enfermera</td>";
	}
	if($nivel_usuario==4){
	   echo "<td>Farmacia</td>";
	}
	if ( $estado == '1' ){
 		echo"
		<td class='espacio1'><a href='estadUsu.php?id=$id_usuario'><img src=\"iconos/1.png\"/></a>
          ";
	}else{
    
     echo"
		<td class='espacio1'><a href='estadUsu.php?id=$id_usuario'><img src=\"iconos/0.png\"/></a>
          ";
}


	echo"
	<a href='editarUsuario.php?id=$id_usuario'><img src=\"iconos/e.png\" /> </a></td>
	</tr>
  ";
}

echo" </table>";
//fin de consulta para obtener datos y tabla


	}








piedx();

?>