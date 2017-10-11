<?php
session_start();
require ("config.php");
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
setTimeout("window.location='editarUsuario.php?perquin=" + dato_url + "'", num_aleatorio * 1000)

</script>


<?php
if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];

	if(isset($_POST["cance"])){
		 echo "<script>
				location.replace('home1.php');
				</script>";
	}

	// resivir id de usuario a modificar
	if(isset($_GET["id"])){
	$idEditar = $_GET["id"];	
	}

	if(isset($_POST["id"])){
		$idEditar = $_POST["id"];
	}

//fin resibir
	
	conectar();
    //consulta para obtener el nombre del enfermero
$comando ="select * from usuario where id_usuario='$idEditar'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre2=$aDatos["nombre_usuario"];
$apellido2=$aDatos["apellido_usuario"];
$telefono2=$aDatos["telefono"];
$dui2=$aDatos["dui"];
$direccion2=$aDatos["direccion"];
$nombre_user2=$aDatos["nombre_user"];
$contrasena2=$aDatos["contrasena"];
$estado2=$aDatos["estado"];
$nivel_usuario2=$aDatos["nivel_usuario"];
$cod_doctor2=$aDatos["cod_doctor"];
$foto2=$aDatos["foto"];
$estado =$aDatos["estado"];

//condicion para saber si ya ha sido desactivado el usuario
 if($estado== 0){
   	session_destroy();
   	$con= "UPDATE usuario SET actual = 0 WHERE id_usuario='$id_usuario'";
$consu=mysql_query($con);
  	echo "<script>alert('Su usuario a sido Desactivado');
	location.replace('index.php');</script>";
  }
//fin de condicion



//fin de consulta	
   	$comando="Select * from doctor";
	$sele="<select name='doctor' id='p' disabled='true' style='border-radius:9px;'>
	<option value='0'>Seleccione Doctor</option>";
	$consulta=mysql_query($comando);
	$nf=mysql_num_rows($consulta);
	
	if ($nf==0)
	{
	$sele.="<option value='0'></option>";	
		}else{
			while($aDatos=mysql_fetch_array($consulta)){
				$sele.="<option value='$aDatos[cod_doctor]'>$aDatos[nombre_doctor] $aDatos[apellido_doctor]</option>";
				
				}
			
			}
			$sele.="</select>";
			
			$nombre="";
				$apell="";
				$tel="";
	            $dui="";
				$dire="";
				$usu="";
				$contrasena="";
	
			
			
			if($_POST){
				
				$dire=$_POST["dire"];
				$usu=$_POST["user"];
				$contrasena=$_POST["contrasena"];
				$tipo=$_POST["tipo"];
				
				$dui=$_POST["dui"];

				                  

				if ($tipo==2){
					$doctor=$_POST["doctor"];
					conectar();

					$comando="select * from usuario where cod_doctor=$doctor or nombre_user='$usu'";
					
					
					$consulta=mysql_query($comando);
					$nf= mysql_num_rows($consulta);
					
					if($nf==0){
						
					
					//$comando="insert into usuario (direccion,nombre_user,contrasena,estado,nivel_usuario,cod_doctor)
//values ('$dire','$usu','$contrasena',1,$tipo,$doctor)					
					//";  

					$comando="UPDATE usuario set direccion='$dire', nombre_user='$usu',contrasena='$contrasena',estado='1',nivel_usuario='$tipo',cod_doctor='$doctor'";

					if (mysql_query($comando)){
                        echo "<script>
						alert('Usuario editado con exito');
						location.replace('index.php');
						</script>";
						}
						else
						{
						echo "<script>
						alert('Campo Requerido');
						</script>";
						}
				
					
				;
					}else{
						echo "<script>
						alert('El nombre de usuario o el codigo de doctor ya esta en uso');
						</script>";
						}
					
					
					
					
					}
					else{
						$nombre=$_POST["nombre"];
				$apell=$_POST["apell"];
				$tel=$_POST["tel"];
	            $dui=$_POST["dui"];
						
						conectar();
					$comando="select * from usuario where nombre_user='$usu'";
					
					
					$consulta=mysql_query($comando);
					$nf= mysql_num_rows($consulta);
					
					if($nf==0){
			
						
						//$comando="insert into usuario (nombre_usuario,apellido_usuario,telefono,dui,direccion,nombre_user,contrasena,estado,nivel_usuario)
//values ('$nombre','$apell',$tel,$dui,'$dire','$usu','$contrasena',1,$tipo)
 
					$comando = "UPDATE `usuario` SET `nombre_usuario`='$nombre',`apellido_usuario`='$apell',`telefono`='$tel',`dui`='$dui',`direccion`='$dire',`nombre_user`='$usu',`contrasena`='$contrasena',`estado`=1,`nivel_usuario`='$tipo',`foto`=1 WHERE `id_usuario`='$idEditar'";
 									
					if (mysql_query($comando)){
  	                	echo "<script>
						alert('Usuario editado con exito');
						location.replace('home1.php');
						</script>";
						}
						else
						{
						echo "<script>
						alert('Error Interno');
						</script>";
						}

						
					}else{
						echo "<script>
						alert('El nombre de usuario ya esta en uso');
						</script>";
						
						}
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
<h2 class='h2'>AGREGAR USUARIO</h2>
<script>
function Bloquea(){
	
if(document.getElementById('tipo').value==1 | document.getElementById('tipo').value==3 ){

document.getElementById('p').disabled = true;
document.getElementById('p').selectedIndex='0';

document.getElementById('nombre').disabled = false;
document.getElementById('apell').disabled = false;
document.getElementById('tel').disabled = false;
document.getElementById('dui').disabled = false;


}else{

document.getElementById('p').disabled = false;
document.getElementById('nombre').disabled = true;
document.getElementById('apell').disabled = true;
document.getElementById('tel').disabled = true;
document.getElementById('dui').disabled = true;

document.fr1.doctor.focus();

document.getElementById('nombre').value='';
document.getElementById('apell').value='';
document.getElementById('tel').value='';
document.getElementById('dui').value='';

}
}
</script>
<form  name='fr1' action='editarUsuario.php' method='post' >
<table align='center' style='width:500px'>
";
echo "
	<tr>";
	if($foto2 == '1'){
    echo"<td ><img src=\"fotoUsuario/".$idEditar.".jpg\" width=\"70\" height=\"70\" alt=\"\"><a href='foto2.php?idUsuEditar=$idEditar'><img src=\"iconos/e.png\"/></a></td></tr>";
}else{
	echo"<td ><img src=\"iconos/m.jpg\" width=\"70\" height=\"70\" alt=\"\"><a href='foto2.php?idUsuEditar=$idEditar'><img src=\"iconos/e.png\"/></a></td></tr>";

}
echo"
<tr>
<td>Tipo de Usuario</td>
<td>
<select name='tipo' id='tipo' onBlur='Bloquea ()' class='caja'>
<option value='1'>Administrador</option>
<option value='2'>Doctor</option>
<option value='3'>Registro</option>


</select>
</td> 
</tr>

<tr>
<td>Seleccione de que doctor sera el usuario</td>
<td>$sele </td> 
</tr>



<tr>
<td>Digite Nombre </td>
<td><input type='text' name='nombre' value='$nombre2' id='nombre' class='caja' placeholder='Nombre'> </td> 
</tr>

<tr>
<td>Digite Apellido </td>
<td><input type='text' name='apell' value='$apellido2'id='apell'class='caja' placeholder='Apellido'> </td> 
</tr>

<tr>
<td>Digite Telefono </td>
<td><input type='text' name='tel' value='$telefono2'id='tel' class='caja' placeholder='Telefono' > </td>  
</tr>

<tr>
<td>Digite Dui</td>
<td><input type='text' name='dui' value='$dui2' id='dui' class='caja' placeholder='DUI'> </td> 
</tr>
<tr>
<td>Digite Direccion</td>
<td><input type='text' name='dire' value='$direccion2' class='caja'placeholder='Direccion'> </td> 
</tr>

<tr>
<td>Digite Nombre de Usuario</td>
<td><input type='text' name='user' value='$nombre_user2' class='caja' placeholder='Usuario'></td> 
</tr>

<tr>
<td>Digite su contrase&ntilde;a</td>
<td><input type='text' name='contrasena' value='' class='caja' placeholder='Password'> </td> 
</tr>


<tr>
<td>Confirme su contrase&ntilde;a</td>
<td><input type='text' name='contrasena2' class='caja' placeholder='Password' > </td> 
</tr>

<tr>
<td><input type='submit' value='Guardar Datos' class='ingresar'> </td>
</tr>

<tr>
<td><input type='submit' value='Cancelar' name='cance' id='cance' class='ingresar'> </td>
</tr>

<tr>
<td><input type='hidden' value='$idEditar' name='id' id='id' class='ingresar'> </td>
</tr>


</table>


</form>



";

piedx();
?>