	$comando1 = "INSERT INTO `expediente` (`cod_expediente`, `primer_Nombre`, `segundo_Nombre`, `primer_Apellido`, `segundo_Apellido`, `tipo_documento`, `numero_documento`, `fecha_hora_creacion`,`genero`, `Fecha_nac`, `Lugar_nac`, `observaciones`, `ocupacion`, `telefono`, `estado_civil`,  `id_usuario`, `foto`) VALUES ('$cod_expediente', '$primer_Nombre', '$segundo_Nombre', '$primer_Apellido', '$segundo_Apellido', '$tipo_documento', '$numero_documento', '$fecha_hora_creacion', '$genero', '$Fecha_nac', '$Lugar_nac', '$observaciones', '$ocupacion', '$telefono', '$estado_civil', '$id_usuario', '$foto')";


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
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$padreN','$padreA','$documento','PADRE','$expediente')
		";
		mysql_query($comando);
		}	
		
		if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
		$madreN=$_POST["nombre_madre"];
		$madreA=$_POST["apellido_madre"];
		$documento=$_POST["docinfo2"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$madreN','$madreA','$documento','MADRE','$expediente')
		";
		mysql_query($comando);
		
		}	
		if(isset($_POST["nombre_conyugue"])){
			if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
		$conyugueN=$_POST["nombre_conyugue"];
		$conyugueA=$_POST["apellido_conyugue"];
		$documento=$_POST["docinfo3"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')
		";
	mysql_query($comando);
		
		}	
		
			}
			
			if($_POST["nres"]!="" and $_POST["ares"]!=""){
		$padreN=$_POST["nres"];
		$padreA=$_POST["ares"];
		$documento=$_POST["docinfo4"];
		$domicilio=$_POST["direccion_responsable"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)
		values('$padreN','$padreA','$documento','$domicilio','OTRO','SI','$expediente')
		";
		mysql_query($comando);
		
		}	
			
			
			
		
		
		
		
		
		}else if($responsable=="rp"){
			
			
	if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
		$padreN=$_POST["nombre_padre"];
		$padreA=$_POST["apellido_padre"];
		$documento=$_POST["docinfo"];
		$domicilio=$_POST["direccion_responsable"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)
		values('$padreN','$padreA','$documento','$domicilio','PADRE','SI','$expediente')
		";
	mysql_query($comando);
		
		}	
		
		if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
		$madreN=$_POST["nombre_madre"];
		$madreA=$_POST["apellido_madre"];
		$documento=$_POST["docinfo2"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$madreN','$madreA','$documento','MADRE','$expediente')
		";
		mysql_query($comando);
		
		}	
		if(isset($_POST["nombre_conyugue"])){
			if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
		$conyugueN=$_POST["nombre_conyugue"];
		$conyugueA=$_POST["apellido_conyugue"];
		$documento=$_POST["docinfo3"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')
		";
		mysql_query($comando);
		
		}	
		
			}
			
			
			}else if($responsable=="rm"){
				
					if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
		$padreN=$_POST["nombre_padre"];
		$padreA=$_POST["apellido_padre"];
		$documento=$_POST["docinfo"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$padreN','$padreA','$documento','PADRE','$expediente')
		";
	mysql_query($comando);
		
		}	
		
				
				
					if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
		$madreN=$_POST["nombre_madre"];
		$madreA=$_POST["apellido_madre"];
		$documento=$_POST["docinfo2"];
		
		$domicilio=$_POST["direccion_responsable"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)
		values('$madreN','$madreA','$documento','$domicilio','MADRE','SI','$expediente')
		";
	mysql_query($comando);
		
		}	
		if(isset($_POST["nombre_conyugue"])){
			if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
		$conyugueN=$_POST["nombre_conyugue"];
		$conyugueA=$_POST["apellido_conyugue"];
		$documento=$_POST["docinfo3"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$conyugueN','$conyugueA','$documento','CONYUGUE','$expediente')
		";
	mysql_query($comando);
		
		}	
				
				
				}
					
					}else if($responsable=="rc"){
				
				
	if($_POST["nombre_padre"]!="" and $_POST["apellido_padre"]!=""){
		$padreN=$_POST["nombre_padre"];
		$padreA=$_POST["apellido_padre"];
		$documento=$_POST["docinfo"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$padreN','$padreA','$documento','PADRE','$expediente')
		";
		mysql_query($comando);
		
		}	
		
		if($_POST["nombre_madre"]!="" and $_POST["apellido_madre"]!=""){
		$madreN=$_POST["nombre_madre"];
		$madreA=$_POST["apellido_madre"];
		$documento=$_POST["docinfo2"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,parentesco,cod_expediente)
		values('$madreN','$madreA','$documento','MADRE','$expediente')
		";
	mysql_query($comando);
		
		}	
		if(isset($_POST["nombre_conyugue"])){
			if($_POST["nombre_conyugue"]!="" and $_POST["apellido_conyugue"]!=""){
		$conyugueN=$_POST["nombre_conyugue"];
		$conyugueA=$_POST["apellido_conyugue"];
		$documento=$_POST["docinfo3"];
		$domicilio=$_POST["direccion_responsable"];
		$comando="insert into pariente_encargado (nombre_pariente,apellido_pariente,numero_documento,domicilio,parentesco,responsable,cod_expediente)
		values('$conyugueN','$conyugueA','$documento','$domicilio','CONYUGUE','SI','$expediente')
		";
		mysql_query($comando);
		
		}	
		
			}
					}


	}