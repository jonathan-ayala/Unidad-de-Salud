 <?php
session_start();
if (isset($_SESSION["admi"])){
		echo "<script>;
		location.replace('home1.php');</script>";
	}
	
	if (isset($_SESSION["doctor"])){
		echo "<script>
		location.replace('home2.php');</script>";
	}
	
	if (isset($_SESSION["registro"])){
		echo "<script>
		location.replace('home3.php');</script>";
	}
	if (isset($_SESSION["farmacia"])){
		echo "<script>
		location.replace('home4.php');</script>";
	}

require("config.php");
$usuario="";
$pass ="";
$tipo="";

$FyH= fechaActual();
$comando="";
$contra3="";

if(isset($_POST['ingresar'])){
	$usuario= $_POST["usuario"];
	$pass=$_POST["pass"];
	conectar();
	$comando="SELECT * FROM usuario WHERE nombre_user='$usuario' and contrasena='$pass' and estado=1";
	


	 $consulta= mysql_query($comando);
	  $nfilas = mysql_num_rows($consulta);

	 if($nfilas=="0"){
            echo "<script>alert('usuario o contrase\u00f1a  incorrecta');
			
			</script>";

		 }else{
			
			 conectar();
			 $comando ="select nivel_usuario FROM usuario where nombre_user='$usuario'";


			 $consulta=mysql_query($comando);

      while($aDatos = mysql_fetch_array($consulta)){
             $tipo = $aDatos["nivel_usuario"];
			 }


			if ($tipo==1)
			 {
				  $_SESSION["admi"]=$usuario;

			 echo"<script>alert('Bienvenido Administrador');
			 location.replace('home1.php');
			</script>";

			 }else if ($tipo==2){
				  $_SESSION["doctor"]=$usuario;
				  echo"<script>alert('Bienvenido doctor');
			 location.replace('home2.php');
			</script>";
			
			}else if(($tipo==3)){
				 $_SESSION["registro"]=$usuario;
				echo"<script>alert('Bienvenida enfermera');
			 location.replace('home3.php');
			</script>";
			}else if(($tipo==4)){
				 $_SESSION["farmacia"]=$usuario;
				echo"<script>alert('Bienvenida Farmacia');
			 location.replace('home4.php');
			</script>";
			}

		 }


}
index();
echo"

<form action=\"$_SERVER[PHP_SELF]\" method='post' name='F1' onSubmit=\" return validar();\">
	<table align='center'>
		<tr>
			<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
			<td width='100px'>Usuario:
			<td><input type='text' name ='usuario' id ='usuario' value ='$usuario' class='caja'/>
			<td width='100px'>Password: 
			<td><input type='Password' name ='pass' id ='pass' value ='$pass' class='caja'/>
			<td colspan='2' align='right'><input type='submit' value='Ingresar' name='ingresar' class='caja'/>
		</tr>
	</table>
</form>

<div class='prn'>
<table align='center'>
	<tr>
		<td><input type='submit' value='VERSION: 2.0' class='eva'>
	</tr>
</table>
</div>

";
piedx();
?>