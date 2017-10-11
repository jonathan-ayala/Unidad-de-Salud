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
setTimeout("window.location='reporte.usuario.php?perquin=" + dato_url + "'", num_aleatorio * 1000)

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
			<td width='150px'><a href='reporte.doctores.php'class='items'>Agregar Usuario</a>
			<td width='150px'><a href='reporte.usuario.php'class='items'>Reportes</a>
			<td width='150px'><a href='cerrar.php?id=$id_usuario' class='items'>Cerrar Sesion</a>
		</tr>
	</table>

<table align=centers>
        <tr>
            <td><a href='reporte.doctores.php'><h1 class='h1'>REPORTE DE DOCTORES</a>
        </tr>
        <tr>
            <td>
        </tr>
        <tr>
            <td><a href='reporte.usuarios.php'><h1 class='h1'>REPORTE DE USUARIOS</a>
        </tr>
    </table>

</div>

";
piedx();
?>
