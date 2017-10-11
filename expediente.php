
<?php
	session_start();

if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
	location.replace('index.php');</script>";
	}


	$user=$_SESSION["registro"];



	require("config.php");
$comando ="select * from usuario where nombre_user='$user'";
conectar ();



$consulta =mysql_query($comando);
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];



$cod_expediente="";
$primer_Nombre="";
$segundo_Nombre="";
$primer_Apellido="";
$segundo_Apellido="";
$tipo_documento="";
$numero_documento="";
$fecha_hora_creacion=fechaActual();

$genero="";
$Fecha_nac="";
$Lugar_nac="";
$observaciones="";
$ocupacion="";
$telefono="";
$estado_civil="";

$foto="";



$comando2="";
$comando3="";

$cod_pariente="";
$nombre_pariente="";
$apellido_pariente="";
$tipo_documento="";
$numero_documento_pariente="";
$domicilio="";
$parentesco="";
$proporciono_datos="";
$cod_expediente="";
$responsable="";
$parentesco="";
$brindo_info="";
$nres = "";
$ares = "";
$nombre_conyugue = "";
$apellido_conyugue = "";

if($_POST){
	$cod_expediente = $_POST["cod"];
	$cod2_expediente = $cod_expediente;
	$primer_Nombre = $_POST["pn"];
	$segundo_Nombre = $_POST["sn"];
	$primer_Apellido = $_POST["pa"];
	$segundo_Apellido = $_POST["sa"];
	$tipo_documento = $_POST["documento"];
	
	$numero_documento = $_POST["ndocumento"];

	$Fecha_nac = $_POST["fn"];

	$array =explode('-',$fecha_hora_creacion);	
	$array1 =explode('-',$Fecha_nac);	
	
	$me= $array[0] - $array1[0];
	$nfilasn=0;
	
	if ($me<=17){
		$numero_documento="";
		
		
		}else{
			
	$ver = mysql_query("SELECT * FROM expediente WHERE numero_documento='$numero_documento'");
		$nfilasn = mysql_num_rows($ver);
			}
	
	$genero = $_POST["sexo"];
	$Lugar_nac = $_POST["luNa"];
	$observaciones = $_POST["obs"];
	$telefono = $_POST["tel"];
	$ocupacion =$_POST["opc"];
	$estado_civil = $_POST["ec"];
	$cod_expediente = $_POST["cod"];
	$nombre_padre = $_POST["nombre_padre"];
	$apellido_padre = $_POST["apellido_padre"];
	$nombre_madre = $_POST["nombre_madre"];
	$apellido_madre = $_POST["apellido_madre"];
	$responsable = $_POST["responsable"];

	$ver = mysql_query("SELECT * FROM expediente WHERE cod_expediente='$cod_expediente'");
		$nfilase = mysql_num_rows($ver);


	
	if($nfilase==0 and $nfilasn==0){
    	if($comando1 = "INSERT INTO `expediente` (`cod_expediente`, `primer_Nombre`, `segundo_Nombre`, `primer_Apellido`, `segundo_Apellido`, `tipo_documento`, `numero_documento`, `fecha_hora_creacion`,`genero`, `Fecha_nac`, `Lugar_nac`, `observaciones`, `ocupacion`, `telefono`, `estado_civil`,  `id_usuario`, `foto`) VALUES ('$cod_expediente', '$primer_Nombre', '$segundo_Nombre', '$primer_Apellido', '$segundo_Apellido', '$tipo_documento', '$numero_documento', '$fecha_hora_creacion', '$genero', '$Fecha_nac', '$Lugar_nac', '$observaciones', '$ocupacion', '$telefono', '$estado_civil', '$id_usuario', '1')"){
      
		
		
			if(mysql_query($comando1)){
		$responsable="";
		$padreN="";
		$padreA="";
		$madreN="";
		$madreA="";
		$conyugueN="";
		$conyugueA="";
		$documento="";
		$otroN="";
		$otroA="";
		$domicilio="";
		$expediente=$cod_expediente;

		$responsable=$_POST["responsable"];	
		
		if ($responsable=="ro"){

			if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
				$padreN=$_POST["nombre_padre"];
				$padreA=$_POST["apellido_padre"];
				$documento=$_POST["docinfo"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$padreN','$padreA','$documento','PADRE','$expediente')";
				mysql_query($comando);
			}	
			
			if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
				$madreN=$_POST["nombre_madre"];
				$madreA=$_POST["apellido_madre"];
				$documento=$_POST["docinfo2"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$madreN','$madreA','$documento','MADRE','$expediente')";
				mysql_query($comando);
			}

			if(isset($_POST["nombre_conyugue"])){

				if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
					$conyugueN=$_POST["nombre_conyugue"];
					$conyugueA=$_POST["apellido_conyugue"];
					$documento=$_POST["docinfo3"];
					$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')";
					mysql_query($comando);
				}	
			}
				
			if($_POST["nres"]!="" and $_POST["ares"]!=""){
				$padreN=$_POST["nres"];
				$padreA=$_POST["ares"];
				$documento=$_POST["docinfo4"];
				$domicilio=$_POST["direccion_responsable"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)values('$padreN','$padreA','$documento','$domicilio','OTRO','SI','$expediente')";
				mysql_query($comando);
			}

		}else if($responsable=="rp"){
						
			if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
				$padreN=$_POST["nombre_padre"];
				$padreA=$_POST["apellido_padre"];
				$documento=$_POST["docinfo"];
				$domicilio=$_POST["direccion_responsable"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)values('$padreN','$padreA','$documento','$domicilio','PADRE','SI','$expediente')";
				mysql_query($comando);
			}	
			
			if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
				$madreN=$_POST["nombre_madre"];
				$madreA=$_POST["apellido_madre"];
				$documento=$_POST["docinfo2"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$madreN','$madreA','$documento','MADRE','$expediente')";
				mysql_query($comando);
			}

			if(isset($_POST["nombre_conyugue"])){

				if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
					$conyugueN=$_POST["nombre_conyugue"];
					$conyugueA=$_POST["apellido_conyugue"];
					$documento=$_POST["docinfo3"];
					$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')";
					mysql_query($comando);
				}	
			}
				
		}else if($responsable=="rm"){
			
			if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
				$padreN=$_POST["nombre_padre"];
				$padreA=$_POST["apellido_padre"];
				$documento=$_POST["docinfo"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$padreN','$padreA','$documento','PADRE','$expediente')";
				mysql_query($comando);
			}	
			
			if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
				$madreN=$_POST["nombre_madre"];
				$madreA=$_POST["apellido_madre"];
				$documento=$_POST["docinfo2"];
				$domicilio=$_POST["direccion_responsable"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)values('$madreN','$madreA','$documento','$domicilio','MADRE','SI','$expediente')";
				mysql_query($comando);
			}

			if(isset($_POST["nombre_conyugue"])){

				if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
					$conyugueN=$_POST["nombre_conyugue"];
					$conyugueA=$_POST["apellido_conyugue"];
					$documento=$_POST["docinfo3"];
					$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')";
					mysql_query($comando);
				}	
			}
						
		}else if($responsable=="rc"){

			if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
				$padreN=$_POST["nombre_padre"];
				$padreA=$_POST["apellido_padre"];
				$documento=$_POST["docinfo"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$padreN','$padreA','$documento','PADRE','$expediente')";
				mysql_query($comando);
			}	
			
			if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
				$madreN=$_POST["nombre_madre"];
				$madreA=$_POST["apellido_madre"];
				$documento=$_POST["docinfo2"];
				$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)values('$madreN','$madreA','$documento','MADRE','$expediente')";
				mysql_query($comando);
			}

			if(isset($_POST["nombre_conyugue"])){

				if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
					$conyugueN=$_POST["nombre_conyugue"];
					$conyugueA=$_POST["apellido_conyugue"];
					$documento=$_POST["docinfo3"];
					$domicilio=$_POST["direccion_responsable"];
					$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)values('$conyugueN','$conyugueA','$documento','$domicilio','CONYUGUE','SI','$expediente')";
					mysql_query($comando);
				}	
			}
		}
	}


	       	echo "<script>
					alert('Paciente agregado con exito');
					window.open('foto.php?codigo=$cod_expediente','ventana01','width=600px, height=400px');
					location.replace('home3.php');
				</script>
			";
    	}else{
        	echo "<script>alert('Error interno');</script>".mysql_error();
    	}
	}else{
    	echo "<script>alert('Ya existe un expediente con el mismo Codigo
		o un dui con el mismo numero de documento');
				
    		</script>
    	";
	}

	//$comando1 = "INSERT INTO `expediente` (`cod_expediente`, `primer_Nombre`, `segundo_Nombre`, `primer_Apellido`, `segundo_Apellido`, `tipo_documento`, `numero_documento`, `fecha_hora_creacion`,`genero`, `Fecha_nac`, `Lugar_nac`, `observaciones`, `ocupacion`, `telefono`, `estado_civil`,  `id_usuario`, `foto`) VALUES ('$cod_expediente', '$primer_Nombre', '$segundo_Nombre', '$primer_Apellido', '$segundo_Apellido', '$tipo_documento', '$numero_documento', '$fecha_hora_creacion', '$genero', '$Fecha_nac', '$Lugar_nac', '$observaciones', '$ocupacion', '$telefono', '$estado_civil', '$id_usuario', '1')";


	
}




interfaz();
//consulta para obtener el nombre del enfermero
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando);
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
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
<script>

 function validar(){
    if(document.all.cod.value==''){
    	alert('Introduzca el Codigo del Expediente');
        document.all.cod.focus();
    	return false;
    }

    if(document.all.pn.value==''){
        alert('Introduzca el Primer Nombre');
        document.all.pn.focus();
    	return false;
    
    }

    if(document.all.pa.value==''){
        alert('Introduzca el Primer apellido');
        document.all.pa.focus();
    	return false;
    }
    

    if(document.all.fn.value==''){
        alert('Introduzca la fecha de nacimiento');
        document.all.fn.focus();
    	return false;
    }
    if(document.all.luNa.value==''){
        alert('Introduzca El lugar de nacimiento');
        document.all.luNa.focus();
        return false;
    }

  
    
}

function validares(){
	if (document.getElementById("otro").value=="ro"){
		document.getElementById("nres").disabled=false;
	
		document.getElementById("ares").disabled=false;
				document.getElementById("docinfo4").disabled=false;

	}	
}
function validar3(){
	if (document.getElementById("conyugue").value=="rc"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		document.getElementById("docinfo4").disabled=true;
		document.getElementById("nres").value="";
		document.getElementById("ares").value="";
					document.getElementById("docinfo4").value="";
		}
		
		if (document.getElementById("madre").value=="rm"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		document.getElementById("docinfo4").disabled=true;
				document.getElementById("nres").value="";
		document.getElementById("ares").value="";
					document.getElementById("docinfo4").value="";
		}
		
		if (document.getElementById("padre").value=="rp"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		document.getElementById("docinfo4").disabled=true;
				document.getElementById("nres").value="";
							document.getElementById("docinfo4").value="";

		document.getElementById("ares").value="";
			document.getElementById("docinfo4").value="";
	
		}

		
	}
	function info(){
		if (document.getElementById("pinfo").value=="padre" || document.getElementById("minfo").value=="madre"  || document.getElementById("cinfo").value=="conyugue" || document.getElementById("oinfo").value=="otro"){
			document.getElementById("ninfo").disabled=true;
			document.getElementById("ainfo").disabled=true;
			document.getElementById("parentesco").disabled=true;
			
			var variable = document.getElementById("npadre").value
			
			document.getElementById("ninfo").value==variable;
			
			}

		}
		function habilitar (){
			if (document.getElementById("ooinfo").value=="otro2"){
				document.getElementById("ninfo").disabled=false;
			document.getElementById("ainfo").disabled=false;
			document.getElementById("parentesco").disabled=false;
				}
			
			}
			
			
		function civil (){
			if (document.getElementById("civi").value=="Soltero" || document.getElementById("civi").value=="Divorciado"){
				document.getElementById("ncon").disabled=true;
			    document.getElementById("acon").disabled=true;
				document.getElementById("docinfo3").disabled=true;
			    document.getElementById("conyugue").disabled=true;
		
			
			
			}else
			{	
			document.getElementById("ncon").disabled=false;
			document.getElementById("acon").disabled=false;
			document.getElementById("docinfo3").disabled=false;
			    document.getElementById("conyugue").disabled=false;
		
			}
				
				
				
			
			}
			



</script>
<script type='text/javascript' src='Registro.js' language='javascript'></script>
<center>
<h2 class='h2'>REGISTRO PACIENTE</h2>
<form action="expediente.php" name="espediente" method="post" class='fieldset2' onSubmit="return validar();">
<fieldset style="width:800px" class='fieldset2' align='center'>
	<legend class='legend'>Datos del Paciente
	</legend>
<table align="center" border="0" style="width:750px">
	<tr>
		<td >Codigo de expediente:</td>
		<td ><input type="text" name="cod" id ="cod" class='caja' maxlength="10" value="<?php echo $cod_expediente; ?>" /></td>
	    
	</tr>
	<tr>
		<td >Primer nombre:</td>
		<td ><input type="text" name="pn" class='caja' value="<?php echo $primer_Nombre; ?>"/></td>
		
		<td >Segundo nombre:</td>
		<td ><input type="text" name="sn" class='caja' value="<?php echo $segundo_Nombre; ?>"/></td>
	</tr>
	<tr>
		<td >Primer Apellido:</td>
		<td ><input type="text" name="pa" class='caja' value="<?php echo $primer_Apellido; ?>"/></td>
		
		<td >Segundo Apellido:</td>
		<td ><input type="text" name="sa"class='caja' value="<?php echo $segundo_Apellido; ?>"/></td>
	</tr>
	<tr> 
		<td>Genero:</td>
		<td><select name="sexo" class='caja'>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
				<option value="I">Inderterminado</option>
			</select></td>
		<td>Fecha de Nacimiento:</td>
		<td><input type="date" name="fn" class='caja' value="<?php echo $Fecha_nac; ?>"/></td>
		
	<tr>
    	<td>Lugar de Nacimiento</td>
		<td colspan="3"><input type="text" size="80" name="luNa" class='caja' value="<?php echo $Lugar_nac; ?>" /></td>
		
	</tr>

</table>

</fieldset>
<br />
<br />

<fieldset style="width:800px" class='fieldset2'>
	<legend class='legend'>Datos Personales
	</legend>
<table align="center" border="0" style="width:750px">
	<td width="150">Tipo de documento</td>
	<td width="201">
   		<select name="documento" class='caja'>
			<option value="DUI">DUI</option>
			<option value="PASAPORTE">Pasaporte</option>
    		<option value="OTRO">Otro</option>
	</select></td>
	<td width="5">
	<td width="150">Numero de Documento</td>
	<td width="204"><input type="text" name="ndocumento" class='caja' value="<?php echo $numero_documento; ?>"/></td>
	<td width="8"></td>
<tr>
<td>Observaciones:
<td width="204"><input type="text" name="obs" placeholder="Sintomas Paciente" class='caja' value="<?php echo $observaciones; ?>"/>
 
</tr>
<tr>
<td>Ocupacion:
<td><input type=text class='caja' name="opc" value="<?php echo $ocupacion; ?>"/>
</tr>
<tr>
<td>Telefono:
<td><input type='text' class='caja' name="tel" value="<?php echo $telefono; ?>"/>
</tr>
<tr>
<td>Estado Civil:
<td><select class='caja' name="ec" id="civi" onBlur="civil ()">
<option value="0">Seleccione</option>
<option value="Soltero">Soltero</option>
<option value="Casado">Casado</option>
<option value="Divorciado">Divorciado</option>
<option value="Acompaniado" >Acompa&ntilde;ado</option>

</select>


</tr>

</table>
<br><br><br>
<fieldset style="width:800px" class='fieldset2'>
  <legend class='legend'>
			Datos Familiares:
		</legend>
		<table border="0" align="center" >
			<tr>
    			<td colspan="4">
    			</td>
      
    			<td>N documento</td>
        		<td width="25px">Responsable:</td>
    		</tr>
    		<tr>
  
    			<td >Nombre del Padre:</td>
				<td><input type="text" name="nombre_padre" class='caja' id="npadre"/></td>
    			<td>Apellido del Padre:</td>
				<td><input type="text" name="apellido_padre" class='caja'/></td>
        		<td><input type="text" name="docinfo"  id="docinfo" class='caja'/></td>
        		<td><input type="radio" name="responsable" value="rp" id="padre" onclick="validar3()" checked="checked" /></td>
    		</tr>
     		<tr>
    			<td >Nombre de la Madre:</td>
				<td><input type="text" name="nombre_madre" class='caja'/>
        		</td><td >Apellido de la Madre:</td>
				<td><input type="text" name="apellido_madre" class='caja'/></td>
       			<td><input type="text" name="docinfo2"  id="docinfo2" class='caja'/></td>
        		<td><input type="radio" value="rm" name="responsable" id="madre"  onclick="validar3()"/></td>
     		</tr>
     		<tr>
    			<td >Nombre del Conyugue:</td>
				<td><input type="text" name="nombre_conyugue" class='caja' id="ncon"/></td>
    			<td >Apellido del Conyugue:</td>
				<td><input type="text" name="apellido_conyugue" class='caja' id="acon"  /></td>
        		<td><input type="text" name="docinfo3"  id="docinfo3" class='caja'/></td>
       			<td><input type="radio" value="rc" name="responsable" id="conyugue"  onclick="validar3()"/></td>
     		</tr>
     		<tr>
   			<tr>
        		<td >Nombre responsable</td>
          		<td><input type="text" name="nres" class='caja' id="nres" /></td>
         		<td>Apellido del Responsable:</td>
         		<td><input type="text" name="ares" class='caja' id="ares" /></td>
        		<td><input type="text" name="docinfo4"  id="docinfo4" class='caja'/></td>
				<td><input type="radio" value="ro" name="responsable" id="otro" onclick="validares()" />
			    Otro</td>
    		</tr>
   			<tr>
    			<td>Direccion del Responsable:</td>
				<td colspan="4"><input type="text" name="direccion_responsable" class='cajal' size=75/></td>
                <td>&nbsp;</td>
        	</tr>
            
             <tr>
            	<td colspan="3" align="center"><br><input name="" value="Cancelar" type="button" class='ingresar' onClick="location.replace('home3.php');"/></td>
	     		<?php echo"
				 <td colspan='3' align='center'><br><input name='btn' value='Guardar Expediente' type='submit' class='ingresar2'/></td>"; ?>
			</tr>
         </table>
         <br>
</fieldset>
</form>
</center>
<?php

piedx();

?>