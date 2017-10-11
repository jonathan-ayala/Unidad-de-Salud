
<?php
	session_start();
	require("config.php");

if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
	location.replace('index.php');</script>";
	}

conectar ();

$user=$_SESSION["registro"];
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando);
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];

$expediente = "";
if ($_GET){
	$expediente=$_GET['cod_Exp'];	
}

function seleccionarOpcionTipo($opcionRegistrada,$tipo){
	if ($opcionRegistrada == $tipo) 
		echo "selected";
}



$cmd1 = mysql_query("SELECT * FROM expediente WHERE cod_expediente='$expediente'");
$aDatos1 = mysql_fetch_array($cmd1);

	$primer_Nombre = $aDatos1["primer_Nombre"];
	$segundo_Nombre = $aDatos1["segundo_Nombre"];
	$primer_Apellido = $aDatos1["primer_Apellido"];
	$segundo_Apellido = $aDatos1["segundo_Apellido"];
	$tipo_documento = $aDatos1["tipo_documento"];
	$numero_documento = $aDatos1["numero_documento"];
	$genero = $aDatos1["genero"];
	$Fecha_nac = $aDatos1["Fecha_nac"];
	$Lugar_nac = $aDatos1["Lugar_nac"];
	$observaciones = $aDatos1["observaciones"];
	$ocupacion = $aDatos1["ocupacion"];
	$telefono = $aDatos1["telefono"];
	$estado_civil = $aDatos1["estado_civil"];


$cmd2 = mysql_query("SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='PADRE'");
$aDatos2 = mysql_fetch_array($cmd2);
	$nombre_parientep = $aDatos2["nombre_pariente"];
	$apellido_parientep = $aDatos2["apellido_pariente"];
	$numero_documentop = $aDatos2["numero_documento"];
	$domiciliop = $aDatos2["domicilio"];
	$parentescop = $aDatos2["parentesco"];
	$responsablep = $aDatos2["responsable"];

$cmd3 = mysql_query("SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='MADRE'");
$aDatos3 = mysql_fetch_array($cmd3);
	$nombre_parientem = $aDatos3["nombre_pariente"];
	$apellido_parientem = $aDatos3["apellido_pariente"];
	$numero_documentom = $aDatos3["numero_documento"];
	$parentescom = $aDatos3["parentesco"];
	$responsablem = $aDatos3["responsable"];

$cmd4 = mysql_query("SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='CONYUGUE'");
$aDatos4 = mysql_fetch_array($cmd4);
	$nombre_parientec = $aDatos4["nombre_pariente"];
	$apellido_parientec = $aDatos4["apellido_pariente"];
	$numero_documentoc = $aDatos4["numero_documento"];
	$parentescoc = $aDatos4["parentesco"];
	$responsablec = $aDatos4["responsable"];

$cmd5 = mysql_query("SELECT * FROM pariente_encargado WHERE cod_expediente='$expediente' AND parentesco='OTRO'");
$aDatos5 = mysql_fetch_array($cmd5);
	$nombre_parienteo = $aDatos5["nombre_pariente"];
	$apellido_parienteo = $aDatos5["apellido_pariente"];
	$numero_documentoo = $aDatos5["numero_documento"];
	$parentescoo = $aDatos5["parentesco"];
	$responsableo = $aDatos5["responsable"];



$cod_expedientee="";
$primer_Nombree="";
$segundo_Nombree="";
$primer_Apellidoe="";
$segundo_Apellidoe="";
$tipo_documentoe="";
$numero_documentoe="";

$generoe="";
$Fecha_nace="";
$Lugar_nace="";
$observacionese="";
$ocupacione="";
$telefonoe="";
$estado_civile="";

if($_POST){ 
	$cod_expedientee = $_POST["expedientee"];
	$primer_Nombree = $_POST["pn"];
	$segundo_Nombree = $_POST["sn"];
	$primer_Apellidoe = $_POST["pa"];
	$segundo_Apellidoe = $_POST["sa"];
	$tipo_documentoe = $_POST["documento"];
	$numero_documentoe = $_POST["ndocumento"];

	$generoe = $_POST["sexo"];
	$Fecha_nace = $_POST["fn"];
	$Lugar_nace = $_POST["luNa"];
	$observacionese = $_POST["obs"];
	$telefonoe = $_POST["tel"];
	$ocupacione =$_POST["opc"];
	$estado_civile = $_POST["ec"];


	$update = "UPDATE expediente SET primer_Nombre='$primer_Nombree', segundo_Nombre='$segundo_Nombree', primer_Apellido='$primer_Apellidoe', segundo_Apellido='$segundo_Apellidoe', tipo_documento='$tipo_documentoe', numero_documento='$numero_documentoe',genero='$generoe', Fecha_nac='$Fecha_nace', Lugar_nac='$Lugar_nace', observaciones='$observacionese', ocupacion='$ocupacione', telefono='$telefonoe', estado_civil='$estado_civile' where cod_expediente='$cod_expedientee'";


	if(mysql_query($update)){
			$responsable = "";
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

			$responsable=$_POST["responsable"];	
			
			if ($responsable=="ro"){

				if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
					$padreN=$_POST["nombre_padre"];
					$padreA=$_POST["apellido_padre"];
					$documento=$_POST["docinfo"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$padreN', apellido_pariente='$padreA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='PADRE'";
					mysql_query($comando);
				}	
				
				if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
					$madreN=$_POST["nombre_madre"];
					$madreA=$_POST["apellido_madre"];
					$documento=$_POST["docinfo2"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$madreN', apellido_pariente='$madreA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='MADRE'";
					mysql_query($comando);
				}

				if(isset($_POST["nombre_conyugue"])){

					if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
						$conyugueN=$_POST["nombre_conyugue"];
						$conyugueA=$_POST["apellido_conyugue"];
						$documento=$_POST["docinfo3"];
						$comando="UPDATE pariente_encargado SET nombre_pariente='$conyugueN', apellido_pariente='$conyugueA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='CONYUGUE'";
						mysql_query($comando);
					}	
				}
					
				if($_POST["nres"]!="" and $_POST["ares"]!=""){
					$padreN=$_POST["nres"];
					$padreA=$_POST["ares"];
					$documento=$_POST["docinfo4"];
					$domicilio=$_POST["direccion_responsable"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$padreN', apellido_pariente='$padreA', numero_documento='$documento', domicilio='$domicilio', responsable='SI' where cod_expediente='$cod_expedientee' AND parentesco='OTRO'";
					mysql_query($comando);
				}

			}else if($responsable=="rp"){
							
				if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
					$padreN=$_POST["nombre_padre"];
					$padreA=$_POST["apellido_padre"];
					$documento=$_POST["docinfo"];
					$domicilio=$_POST["direccion_responsable"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$padreN', apellido_pariente='$padreA', numero_documento='$documento', domicilio='$domicilio', responsable='SI' where cod_expediente='$cod_expedientee' AND parentesco='PADRE'";
					mysql_query($comando);
				}	
				
				if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
					$madreN=$_POST["nombre_madre"];
					$madreA=$_POST["apellido_madre"];
					$documento=$_POST["docinfo2"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$madreN', apellido_pariente='$madreA', numero_documento='$documento',  where cod_expediente='$cod_expedientee' AND parentesco='MADRE'";
					mysql_query($comando);
				}

				if(isset($_POST["nombre_conyugue"])){

					if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
						$conyugueN=$_POST["nombre_conyugue"];
						$conyugueA=$_POST["apellido_conyugue"];
						$documento=$_POST["docinfo3"];
						$comando="UPDATE pariente_encargado SET nombre_pariente='$conyugueN', apellido_pariente='$conyugueA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='CONYUGUE'";
						mysql_query($comando);
					}	
				}
					
			}else if($responsable=="rm"){
				
				if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
					$padreN=$_POST["nombre_padre"];
					$padreA=$_POST["apellido_padre"];
					$documento=$_POST["docinfo"]; 
					$comando="UPDATE pariente_encargado SET nombre_pariente='$padreN', apellido_pariente='$padreA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='PADRE'";
					mysql_query($comando);
				}	
				
				if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
					$madreN=$_POST["nombre_madre"];
					$madreA=$_POST["apellido_madre"];
					$documento=$_POST["docinfo2"];
					$domicilio=$_POST["direccion_responsable"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$madreN', apellido_pariente='$madreA', numero_documento='$documento', domicilio='$domicilio', responsable='SI' where cod_expediente='$cod_expedientee' AND parentesco='MADRE'";
					mysql_query($comando);
				}

				if(isset($_POST["nombre_conyugue"])){

					if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
						$conyugueN=$_POST["nombre_conyugue"];
						$conyugueA=$_POST["apellido_conyugue"];
						$documento=$_POST["docinfo3"];
						$comando="UPDATE pariente_encargado SET nombre_pariente='$conyugueN', apellido_pariente='$conyugueA', numero_documento='$documento', where cod_expediente='$cod_expedientee' AND parentesco='CONYUGUE'";
						mysql_query($comando);
					}	
				}
							
			}else if($responsable=="rc"){

				if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
					$padreN=$_POST["nombre_padre"];
					$padreA=$_POST["apellido_padre"];
					$documento=$_POST["docinfo"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$padreN', apellido_pariente='$padreA', numero_documento='$documento'  where cod_expediente='$cod_expedientee' AND parentesco='PADRE'";
					mysql_query($comando);
				}	
				
				if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
					$madreN=$_POST["nombre_madre"];
					$madreA=$_POST["apellido_madre"];
					$documento=$_POST["docinfo2"];
					$comando="UPDATE pariente_encargado SET nombre_pariente='$madreN', apellido_pariente='$madreA', numero_documento='$documento' where cod_expediente='$cod_expedientee' AND parentesco='MADRE'";
					mysql_query($comando);
				}

				if(isset($_POST["nombre_conyugue"])){

					if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
						$conyugueN=$_POST["nombre_conyugue"];
						$conyugueA=$_POST["apellido_conyugue"];
						$documento=$_POST["docinfo3"];
						$domicilio=$_POST["direccion_responsable"];
						$comando="UPDATE pariente_encargado SET nombre_pariente='$conyugueN', apellido_pariente='$conyugueA', numero_documento='$documento', domicilio='$domicilio', responsable='SI' where cod_expediente='$cod_expedientee' AND parentesco='CONYUGUE'";
						mysql_query($comando);
					}	
				}
			}
			echo "<script>
					alert('Expediente modificado con exito');
					location.replace('busqueda_expediente.php'); 
				</script>
			";
		}else{
			echo"
				<script>
					alert('Error interno );
				</script>
			";
			echo mysql_error();
		}

		
}



	interfaz();

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
<center>
<h2 class='h2'>REGISTRO PACIENTE</h2>
<form action="e_expediente.php" name="espediente" method="post" class='fieldset2' onSubmit="return validarForm();">
<input type='hidden' name='expedientee' id='expedientee' value="<?php echo $expediente; ?>">
<fieldset style="width:800px" class='fieldset2' align='center'>
	<legend class='legend'>Datos del Paciente
	</legend>
<table align="center" border="0" style="width:750px">
	<tr>
		<td >Codigo de expediente:</td>
		<td ><?php echo $expediente; ?></td>
	</tr>
	<tr>
		<td >Primer nombre:</td>
		<td ><input type="text" name="pn" class='caja' value="<?php echo $primer_Nombre; ?>" /></td>
		
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
				<option value="F" <?php seleccionarOpcionTipo($genero,"F");?>>Femenino</option>
				<option value="M" <?php seleccionarOpcionTipo($genero,"M");?>>Masculino</option>
				<option value="I" <?php seleccionarOpcionTipo($genero,"I");?>>Inderterminado</option>
			</select></td>
		<td>Fecha de Nacimiento:</td>
		<td><input type="date" name="fn" class='caja' value="<?php echo $Fecha_nac; ?>"/></td>
		
	<tr>
    	<td>Lugar de Nacimiento</td>
		<td colspan="3"><input type="text" size="80" name="luNa" class='caja' value="<?php echo $Lugar_nac; ?>"/></td>
		
	</tr>

</table>

</fieldset>
<br />
<br />

<fieldset style="width:800px" class='fieldset2'>
	<legend class='legend'>Datos Personales</legend>
		<table align="center" border="0" style="width:750px">
			<tr>
				<td width="150">Tipo de documento</td>
				<td width="201">
	   				<select name="documento" class='caja'>
	   					<option value="DUI" <?php seleccionarOpcionTipo($tipo_documento,'DUI');?> >DUI</option>
						<option value="PASAPORTE"<?php seleccionarOpcionTipo($tipo_documento,'PASAPORTE');?> >PASAPORTE</option>
			    		<option value="OTRO"<?php seleccionarOpcionTipo($tipo_documento,'OTRO');?> >OTRO</option>
					</select></td>
				<td width="5">
				<td width="150">Numero de Documento</td>
				<td width="204"><input type="text" name="ndocumento" class='caja' value="<?php echo $numero_documento; ?>"/></td>
				<td width="8"></td>
			</td>
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
						<option value="Soltero" <?php seleccionarOpcionTipo($estado_civil,'Soltero');?> >Soltero</option>
						<option value="Casado" <?php seleccionarOpcionTipo($estado_civil,'Casado');?> >Casado</option>
						<option value="Divorciado"<?php seleccionarOpcionTipo($estado_civil,'Divorciado');?> >Divorciado</option>
						<option value="Acompaniado" <?php seleccionarOpcionTipo($estado_civil,'Acompa&ntilde;ado');?> >Acompa&ntilde;ado</option>
					</select>
				</td>
			</tr>
		</table>
<br><br><br>
<fieldset style="width:800px" class='fieldset2'>
  <legend class='legend'>
			Datos Familiares:
		</legend>
		<table border="0" align="center" >
			<tr>
    			<td colspan="4"></td>
         		<td>N documento</td>
        		<td width="25px">Responsable:</td>
    		</tr>
    			<td >Nombre del Padre:</td>
				<td><input type="text" name="nombre_padre" class='caja' id="npadre" value="<?php echo $nombre_parientep; ?>"/></td>
    			<td>Apellido del Padre:</td>
				<td><input type="text" name="apellido_padre" class='caja' value="<?php echo $apellido_parientep; ?>"/></td>
        		<td><input type="text" name="docinfo"  id="docinfo" class='caja' value="<?php echo $numero_documentop; ?>"/></td>
        		<td><input type="radio" name="responsable" value="rp" id="padre" onclick="validar3()" <?php if ($responsablep == 'SI'){echo 'checked="checked"';} ?> /></td>
    		</tr>
     		<tr>
    			<td >Nombre de la Madre:</td>
				<td><input type="text" name="nombre_madre" class='caja' value="<?php echo $nombre_parientem; ?>"/>
        		</td><td >Apellido de la Madre:</td>
				<td><input type="text" name="apellido_madre" class='caja' value="<?php echo $apellido_parientem; ?>"/></td>
       			<td><input type="text" name="docinfo2"  id="docinfo2" class='caja' value="<?php echo $numero_documentom; ?>"/></td>
        		<td><input type="radio" value="rm" name="responsable" id="madre"  onclick="validar3()" <?php if ($responsablem == 'SI'){echo 'checked="checked"';} ?>  /></td>
     		</tr>
     		<tr>
    			<td >Nombre del Conyugue:</td>
				<td><input type="text" name="nombre_conyugue" class='caja' id="ncon" value="<?php echo $nombre_parientec; ?>"/></td>
    			<td >Apellido del Conyugue:</td>
				<td><input type="text" name="apellido_conyugue" class='caja' id="acon"  value="<?php echo $apellido_parientec; ?>"/></td>
        		<td><input type="text" name="docinfo3"  id="docinfo3" class='caja' value="<?php echo $numero_documentoc; ?>"/></td>
       			<td><input type="radio" value="rc" name="responsable" id="conyugue"  onclick="validar3()" <?php if ($responsablec == 'SI'){echo 'checked="checked"';} ?> /></td>
     		</tr>
     		<tr>
   			<tr>
        		<td >Nombre responsable</td>
          		<td><input type="text" name="nres" class='caja' id="nres" value="<?php echo $nombre_parienteo; ?>"/></td>
         		<td>Apellido del Responsable:</td>
         		<td><input type="text" name="ares" class='caja' id="ares" value="<?php echo $apellido_parienteo; ?>"/></td>
        		<td><input type="text" name="docinfo4"  id="docinfo4" class='caja' value="<?php echo $numero_documentoo; ?>"/></td>
				<td><input type="radio" value="ro" name="responsable" id="otro" onclick="validares()" <?php if ($responsableo == 'SI'){echo 'checked="checked"';} ?> />
			    Otro</td>
    		</tr>
   			<tr>
    			<td>Direccion del Responsable:</td>
				<td colspan="4"><input type="text" name="direccion_responsable" class='cajal' size=75 value="<?php echo $domiciliop; ?>"/></td>
                <td>&nbsp;</td>
        	</tr>
            
             <tr>
            	<td colspan="3" align="center"><br><input name="" value="Cancelar" type="button" class='ingresar'  onClick="location.replace('busqueda_expediente.php');"/></td>
	     		<?php echo"
				 <td colspan='3' align='center'><br><input name='btn' value='Guardar Expediente' type='submit' class='ingresar2'/></td>"; ?>
			</tr>
         </table>
         <br>
</fieldset>
</form>
</center>

</center>

<?php

piedx();

?>