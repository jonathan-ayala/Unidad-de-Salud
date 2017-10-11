<?php
session_start();
require ("config.php");
if (!isset($_SESSION["admi"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	$user=$_SESSION["admi"];
	
	conectar();
    //consulta para obtener el nombre del enfermero
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];

//fin de consulta	

			$nombreusuario="";
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
				
				$dui2=$_POST["dui"];

				                  

				if ($tipo==2){
					$doctor=$_POST["doctor"];
					conectar();

					$comando="select * from usuario where cod_doctor=$doctor or nombre_user='$usu'";
					
					
					$consulta=mysql_query($comando);
					$nf= mysql_num_rows($consulta);
					
					if($nf==0){
						
					
					$comando="insert into usuario (direccion,nombre_user,contrasena,estado,nivel_usuario,cod_doctor)
values ('$dire','$usu','$contrasena',1,$tipo,$doctor)					
					";  
					if (mysql_query($comando)){
                        /*consulta para obtener el id del usuario que se registra
	$comandod="select id_usuario from usuario where nombre_user ='$usu'";                   
                    $consultad = mysql_query($comandod);
                    $datosD = mysql_num_rows($consultad);
                    $duid=$datosD["id_usuario"];
                          */
						echo "<script>
						alert('Usuario agregado con exito');
						window.open('foto.php?id=$usu','ventana01','width=600px, height=400px');
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
						$nombreusuario=$_POST["nombre"];
				$apell=$_POST["apell"];
				$tel=$_POST["tel"];
	            $dui=$_POST["dui"];

						conectar();
					$comando="select * from usuario where nombre_user='$usu'";


					$consulta=mysql_query($comando);
					$nf= mysql_num_rows($consulta);

					if($nf==0){


						$comando="insert into usuario (nombre_usuario,apellido_usuario,telefono,dui,direccion,nombre_user,contrasena,estado,nivel_usuario)
values ('$nombre','$apell',$tel,$dui,'$dire','$usu','$contrasena',1,$tipo)
					";

					if (mysql_query($comando)){
  	                    /*consulta para obtener el id del usuario que se registra
	$comandod="select id_usuario from usuario where nombre_user ='$usu'";
                    $consultad = mysql_query($comandod);
                    $datosD = mysql_num_rows($consultad);
                    $duid=$datosD["id_usuario"];
                    $user=$datosD["nombre_usuario"];
                    echo "<h1>$user</h1>";
                      */

						echo "<script>
						alert('Usuario agregado con exito');
						window.open('foto.php?id=$usu','ventana01','width=600px, height=400px');
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
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>
<h2 class='h2'>AGREGAR USUARIO</h2>
<script>
function oculta(){
formulario.selector.style.display='none';
valor();
}

function Bloquea(p){

if(fr1.tipo[0].selected == true || fr1.tipo[2].selected == true || fr1.tipo[3].selected == true){

document.getElementById('p').disabled = true;
document.getElementById('p').selectedIndex='0';

document.getElementById('nombre').disabled = false;
document.getElementById('apell').disabled = false;
document.getElementById('tel').disabled = false;
document.getElementById('dui').disabled = false;


}else if(document.getElementById('tipo').value==2){

document.getElementById('p').disabled = false;
document.getElementById('nombre').disabled = true;
document.getElementById('apell').disabled = true;
document.getElementById('tel').disabled = true;
document.getElementById('dui').disabled = true;

document.fr1.doctor.focus();



}
}

</script>
<form  name='fr1' action='agregar.usuario.php' method='post' >
<table align='center' style='width:500px'>



<tr>
<td>Tipo de Usuario</td>
<td>

<select name='tipo' id='tipo' onChange='Bloquea(this.form);oculta()' class='caja'>
<option value='1'>Administrador</option>
<option value='2'>Doctor</option>
<option value='3'>Registro</option>
<option value='4'>Farmacia</option>


</select>
</td>
</tr>

<tr>
<td>Seleccione de que doctor sera el usuario</td>
<td> </td> 
</tr>



<tr>
<td>Digite Nombre </td>
<td><input type='text' name='nombre' value='$nombreusuario' id='nombre' class='caja' placeholder='Nombre'> </td>
</tr>

<tr>
<td>Digite Apellido </td>
<td><input type='text' name='apell' value='$apell'id='apell'class='caja' placeholder='Apellido'> </td> 
</tr>

<tr>
<td>Digite Telefono </td>
<td><input type='text' name='tel' value='$tel'id='tel' class='caja' placeholder='Telefono' > </td>  
</tr>

<tr>
<td>Digite Dui</td>
<td><input type='text' name='dui' value='$dui' id='dui' class='caja' placeholder='DUI'> </td>
</tr>
<tr>
<td>Digite Direccion</td>
<td><input type='text' name='dire' value='$dire' class='caja'placeholder='Direccion'> </td>
</tr>

<tr>
<td>Digite Nombre de Usuario</td>
<td><input type='text' name='user' value='$usu' class='caja' placeholder='Usuario'></td>
</tr>

<tr>
<td>Digite su contrase&ntilde;a</td>
<td><input type='text' name='contrasena' value='$contrasena' class='caja' placeholder='Password'> </td> 
</tr>


<tr>
<td>Confirme su contrase&ntilde;a</td>
<td><input type='text' name='contrasena2' class='caja' placeholder='Password' > </td>
</tr>

<tr>
<td><input type='submit' value='Guardar Datos' class='ingresar'> </td>
</tr>


</table>


</form>



";

piedx();
?>