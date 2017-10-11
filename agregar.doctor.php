<?php
session_start();
require('config.php');
if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
?>
<script languaje=javascript>

//Voy a obtener un numero aleatorio de segundos, para que la recarga se realice a intervalos irregulares
function aleatorio(inferior,superior){
numPosibilidades = superior - inferior
aleat = Math.random() * numPosibilidades
aleat = Math.floor(aleat)
return parseInt(inferior) + aleat
}
num_aleatorio = aleatorio(500, 900)


//ahora voy a generar un string para enviarlo por parámetro a esta misma página
//el parámetro lo pasaremos por URL.
//No haremos nada con ese dato, pero como cada vez será distinto, nos asegura que el navegador siempre solocitará al servidor la página, en vez de mostrar otra vez la que tiene en caché
//utilizaremos la fecha y tiempo para generar el dato
miFecha = new Date()
dato_url = miFecha.getYear().toString() + miFecha.getMonth().toString() + miFecha.getDate().toString() + miFecha.getHours().toString() + miFecha.getMinutes().toString() + miFecha.getSeconds().toString()


//para recargar la página con un retardo util1izaremos la función setTimeout()
//recibe el primer parámetro la instrucción que se quiere ejecutar
//segundo parámetro es el tiempo en milisegundos que se quiere esperar
setTimeout("window.location='agregar.doctor.php?perquin=" + dato_url + "'", num_aleatorio * 1000)

</script>


<?php

	$user=$_SESSION["admi"];
	$nombredoc="";
	$cod="";
	$apell="";
	$tel="";
	$dui="";
	
	if ($_POST){
	$nombredoc=$_POST["nombre"];
	$cod=$_POST["cod"];
	$apell=$_POST["apell"];
	$tel=$_POST["tel"];
	$dui=$_POST["dui"];
		
		
		conectar();
		$comando="select * from doctor where cod_doctor='$cod'";
	
	$consulta=	mysql_query($comando);
		$r_cod=mysql_num_rows($consulta);
		$comando="select * from doctor where dui='$dui'";
		
	
	$consulta=	mysql_query($comando);
		$r_dui=mysql_num_rows($consulta);
		
		if ($r_cod==0 and $r_dui==0){
		$comando= "insert into doctor (cod_doctor,nombre_doctor,apellido_doctor,telefono,dui) values ('$cod','$nombredoc','$apell','$tel',$dui)";
	
		if (mysql_query($comando)){
			echo"
			<script>
			alert('Doctor agregado exitosamente');
			location.replace('home1.php');
			</script>
			";
			}else{
				echo"
			<script>
			alert('Faltan Datos');
			</script>
			";
			}
		
			}else{
				echo"
			<script>
			alert('El Doctor ya esta registrado');
			</script>
			";
				
				
				}	
	}
	interfaz();
	conectar();
	//consulta para obtener el nombre del doctor
	$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$user=$aDatos["nombre_user"];
$id_doc=$aDatos["cod_doctor"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];

	//consulta para obtener el nombre del administrador
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_doc=$aDatos["cod_doctor"];
$id_usuario = $aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
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
//fin de consulta administrador

echo"

<script type='text/javascript'>
	function validarNumeros(e) { // 1
		tecla = (document.all) ? e.keyCode : e.which; // 2
		if (tecla==8) return true; // backspace
        if (tecla==9) return true; // tab
		if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
		if (tecla==189) return true; // guion
		if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
		if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
		if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
		if (tecla>=96 && tecla<=105) { return true;} //numpad

		patron = /[0-9]/; // patron

		te = String.fromCharCode(tecla);
		return patron.test(te); // prueba
	}
</script>
<div class='menu'>
	<table align='center'>";

			if( $foto == '1' ){
 		echo"
 		<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70px\" height='70px'  alt=\"\"><br><h3 class='usuario'>[$nombre $apellido]</td>
          ";
	       }else{
     echo"
        <td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
		<td align=center><img src=\"iconos/m.jpg\" width=\"70px\" height='70px' alt=\"\"><br>$nombre $apellido</td>
          ";
}

echo"
	</table>
	<html>
    <head>
    <script type='text/javascript' src='./js/Registro.js' language='javascript'></script>
     </head>
	<table class='lmenu'>
		<tr>
			<td width='100px'><a href='home1.php' class='items'>Inicio</a>
			<td width='150px'><a href='agregar.doctor.php' class='items'>Agregar Doctor</a>
			<td width='150px'><a href='agregar.usuario.php'class='items'>Agregar Usuario</a>
			<td width='150px'><a href='cerrar.php?id=$id_usuario' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>
<h2 class='h2'>Agregar Doctor</h2>
<form action='agregar.doctor.php' name='form1' id='form1' method='post' onSubmit='return validarForm();'>
    <table align='center' style='width:500px'>
        <tr>
            <td>Digite el codigo del doctor</td>
            <td><input type='text' name='cod' id='cod' value='$cod'class='caja' required </td>
        </tr>
        <tr>
            <td>Digite Nombre </td>
            <td><input type='text' name='nombre' id='nombre' value='$nombredoc' class='caja' required pattern='[a-zA-Z]*'</td>
        </tr>
        <tr>
            <td>Digite Apellido </td>
            <td><input type='text' name='apell' value='$apell' class='caja' required pattern='[a-zA-Z]*'</td>
        </tr>
        <tr>
            <td>Digite Telefono </td>
            <td><input type='text' name='tel' value='$tel' class='caja' required onkeydown='return validarNumeros(event)' maxlength='8'</td>
        </tr>
        <tr>
            <td>Digite Dui</td>
            <td><input type='text' name='dui' class='caja' value='$dui' required onkeydown='return validarNumeros(event)' maxlength='10'</td>
        </tr>
        <tr>
            <td><input type='submit' value='Guardar Datos' class='ingresar'> </td>
        </tr>
    </table>
</form>

	";
piedx();
	?>