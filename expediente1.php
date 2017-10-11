
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





$cod_pariente="";
$nombre_pariente="";
$apellido_pariente="";
$tipo_documento="";
$numero_documento="";
$domicilio="";
$parentesco="";
$proporciono_datos="";
$cod_expediente="";

if($_POST){
	$cod_expediente = $_POST["cod"];
	$cod2_expediente = $cod_expediente;
	$primer_Nombre = $_POST["pn"];
	$segundo_Nombre = $_POST["sn"];
	$primer_Apellido = $_POST["pa"];
	$segundo_Apellido = $_POST["sa"];
	$tipo_documento = $_POST["documento"];
	$numero_documento = $_POST["ndocumento"];

	$genero = $_POST["sexo"];
	$Fecha_nac = $_POST["fn"];
	$Lugar_nac = $_POST["luNa"];
	$observaciones = $_POST["obs"];
	$telefono = $_POST["tel"];
	$ocupacion =$_POST["opc"];
	$estado_civil = $_POST["ec"];

	$comando = "INSERT INTO `expediente` (`cod_expediente`, `primer_Nombre`, `segundo_Nombre`, `primer_Apellido`, `segundo_Apellido`, `tipo_documento`, `numero_documento`, `fecha_hora_creacion`,`genero`, `Fecha_nac`, `Lugar_nac`, `observaciones`, `ocupacion`, `telefono`, `estado_civil`,  `id_usuario`, `foto`
) VALUES (
'$cod_expediente', '$primer_Nombre', '$segundo_Nombre', '$primer_Apellido', '$segundo_Apellido', '$tipo_documento', '$numero_documento', '$fecha_hora_creacion', '$genero', '$Fecha_nac', '$Lugar_nac', '$observaciones', '$ocupacion', '$telefono', '$estado_civil', '$id_usuario', '$foto')";


conectar();
if (mysql_query($comando)){
	echo "
	<script> 
	alert('Paciente agregado con exito');
	window.open('foto.php?codigo=$cod_expediente','ventana01','width=600px, height=400px');
	location.replace('home3.php');
	</script>
	
	
	";
}



}

	interfaz();
	//consulta para obtener el nombre del enfermero
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
	echo"
		<div class='menu'>
	<table align='center'>
			<tr>
				<td width='750px'><img src='000.png'><h1 class='h1'>Perquin</h1>
				<td align=center><img src=\"fotos/".$user.".jpg\" width=\"70px\" height='70px'  alt=\"\"><br> Usuario $nombre $apellido</td>
			</tr>
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
	";
?>
<script>
function validares(){
	if (document.getElementById("otro").value=="ro"){
		document.getElementById("nres").disabled=false;
		document.getElementById("ares").disabled=false;
	}	
}
function validar3(){
	if (document.getElementById("conyugue").value=="rc"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		}
		
		if (document.getElementById("madre").value=="rm"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		}
		
		if (document.getElementById("padre").value=="rp"){
		document.getElementById("nres").disabled=true;
		document.getElementById("ares").disabled=true;
		}
		
	}
	function info(){
		if (document.getElementById("pinfo").value=="info" || document.getElementById("minfo").value=="info"  || document.getElementById("cinfo").value=="info" || document.getElementById("oinfo").value=="info"){
			document.getElementById("ninfo").disabled=true;
			document.getElementById("ainfo").disabled=true;
			document.getElementById("parentesco").disabled=true;
			
			var variable = document.getElementById("npadre").value
			
			document.getElementById("ninfo").value==variable;
			
			}

		}
		function habilitar (){
			if (document.getElementById("ooinfo").value=="info"){
				document.getElementById("ninfo").disabled=false;
			document.getElementById("ainfo").disabled=false;
			document.getElementById("parentesco").disabled=false;
				}
			
			}
			
			
		function civil (){
			if (document.getElementById("civi").value=="Soltero" || document.getElementById("civi").value=="Divorciado"){
				document.getElementById("ncon").disabled=true;
			    document.getElementById("acon").disabled=true;
				document.getElementById("cinfo").disabled=true;
			    document.getElementById("conyugue").disabled=true;
		
			
			
			}else
			{	
			document.getElementById("ncon").disabled=false;
			document.getElementById("acon").disabled=false;
			document.getElementById("cinfo").disabled=false;
			document.getElementById("conyugue").disabled=false;
		
			}
				
				
				
			
			}
			

</script>
<script type='text/javascript' src='./js/Registro.js' language='javascript'></script>
<h2 class='h2'>REGISTRO PACIENTE</h2>
<form action="expediente.php" name="espediente" method="post" class='fieldset2' onSubmit="return validarForm();">
<fieldset style="width:750px" class='fieldset2' align='center'>
	<legend class='legend'>Datos del Paciente
	</legend>
<table align="center" border="0" >
	<tr>
		<td >Codigo de expediente:</td>
		<td ><input type="text" name="cod" id ="cod"class='caja' maxlength="10"/></td>
	    
	</tr>
	<tr>
		<td >Primer nombre:</td>
		<td ><input type="text" name="pn" class='caja'/></td>
		
		<td >Segundo nombre:</td>
		<td ><input type="text" name="sn" class='caja'/></td>
	</tr>
	<tr>
		<td >Primer Apellido:</td>
		<td ><input type="text" name="pa" class='caja' /></td>
		
		<td >Segundo Apellido:</td>
		<td ><input type="text" name="sa"class='caja' /></td>
	</tr>
	<tr> 
		<td>Genero:</td>
		<td><select name="sexo" class='caja'>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
				<option value="I">Inderterminado</option>
			</select></td>
		<td>Fecha de Nacimiento:</td>
		<td><input type="date" name="fn" class='caja' /></td>
		
	<tr>
    	<td>Lugar de Nacimiento</td>
		<td colspan="3"><input type="text" size="80" name="luNa" class='caja'/></td>
		
	</tr>

</table>

</fieldset>
<br />
<br />

<fieldset style="width:750px" class='fieldset2'>
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
	<td width="204"><input type="text" name="ndocumento" class='caja'/></td>
	<td width="8"></td>
<tr>
<td>Observaciones:
<td width="204"><input type="text" name="obs" placeholder="Sintomas Paciente" class='caja'/>
 
</tr>
<tr>
<td>Ocupacion:
<td><input type=text class='caja' name="opc"/>
</tr>
<tr>
<td>Telefono:
<td><input type='text' class='caja' name="tel"/>
</tr>
<tr>
<td>Estado Civil:
<td><select class='caja' name="ec" id="civi" onBlur="civil ()">
<option value="0">Seleccione</option>
<option value="Soltero">Soltero</option>
<option value="Casado">Casado</option>
<option value="Divorciado">Divorciado</option>
<option value="Acompañado" >Acompañado</option>

</select>


</tr>
</table>


</fieldset>
<br />
<br />

	<fieldset style="width:800px" class='fieldset2'>
	  <legend class='legend'>
			Datos Familiares:
		</legend>
		<table border="0" align="center">
			<tr>
    			<td colspan="4">
    			</td>
      
    			<td>Responsable:</td>
        		<td width="25px">Proporciono informacion:</td>
    		</tr>
    		<tr>
  
    			<td >Nombre del Padre:</td>
				<td><input type="text" name="nombre_padre" class='caja' id="npadre"/></td>
    			<td>Apellido del Padre:</td>
				<td><input type="text" name="apellido_padre" class='caja'/></td>
        		<td><input type="radio" name="responsable" value="rp" id="padre" onClick="validar3 ()" /></td>
        		<td><input type="radio" value="info" name="informacion" id="pinfo" onClick="info ()" />
    			</td>
    		</tr>
     		<tr>
    			<td >Nombre de la Madre:</td>
				<td><input type="text" name="nombre_madre" class='caja'/>
        		</td><td >Apellido de la Madre:</td>
				<td><input type="text" name="apellido_madre" class='caja'/></td>
       			<td><input type="radio" value="rm" name="responsable" id="madre" onClick="validar3 ()" /></td>
        		<td><input type="radio" value="info" name="informacion" id="minfo" onClick="info ()"  /></td>
     		</tr>
     		<tr>
    			<td >Nombre del Conyugue:</td>
				<td><input type="text" name="nombre_conyugue" class='caja' id="ncon"/></td>
    			<td >Apellido del Conyugue:</td>
				<td><input type="text" name="apellido_conyugue" class='caja' id="acon"/></td>
        		<td><input type="radio" value="rc" name="responsable" id="conyugue" onClick="validar3 ()"/></td>
       			<td><input type="radio" value="info" name="informacion" id="cinfo" onClick="info ()" /></td>
     		</tr>
     		<tr>
   			<tr>
        		<td >Nombre responsable</td>
          		<td><input type="text" name="nres" class='caja' id="nres" disabled="true"/></td>
         		<td>Apellido del Responsable:</td>
         		<td><input type="text" name="ares" class='caja' id="ares" disabled="true"/></td>
        		<td><input type="radio" value="ro" name="responsable" id="otro" onClick="validares ()" />Otro</td>
				<td><input type="radio" value="info" name="informacion" id="oinfo" onClick="info ()" /></td>
    		</tr>
   			<tr>
    			<td>Direccion del Responsable:</td>
				<td colspan="4"><input type="text" name="direccion_responsable" class='caja' size=75/></td>
                <td><input type="radio" value="info" name="informacion" id="ooinfo" checked="checked" onClick="habilitar ()" />Otro</td>
        	</tr>
         </table>
         <table width="746" border="0" align="center" style="width:750px">	
        	<tr>
        		<td colspan="6" align="center" class='linea'>Quien Brindo Informacion?</td>
        	</tr>
        	<tr>
        		<td >Nombre:</td>
          		<td colspan="2"><input type="text" name="ninfo" class='caja' id="ninfo"/></td>
         		<td>Apellido:</td>
        		<td colspan="2"><input type="text" name="ainfo" class='caja' id="ainfo"/></td>
        	</tr>
            <tr>
        		<td >Parentesco:</td>
          		<td><input type="text" name="parentesco" class='caja' id="parentesco"/><td>
         		<td	>Tipo de Documento:</td>
        		<td>
         			<select name="documento2" class='caja' >
						<option value="DUI">DUI</option>
						<option value="PASAPORTE">Pasaporte</option>
    					<option value="OTRO">Otro</option>
					</select></td>	
        		<td width="25">No.</td>
                <td><input type="text" name="docinfo"  id="docinfo" class='caja'/></td>
            </tr>
            <tr>
            
   			 </tr>
            <tr>
            	<td colspan="2" align="center"><input name="" value="Cancelar" type="button" class='ingresar'/></td>
	     <?php echo" <td colspan='2' align='center'><input name='' value='Guardar Expediente' type='submit' class='ingresar2'/></td>"; ?>

            </tr>
            <td colspan="3" align="center">
            <tr>
            
    
           </tr>
        
   	</table>
        
        <br />
        <br />


	</fieldset>
</form>
<?php

piedx();

?>