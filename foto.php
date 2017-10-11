<?php
session_start();                                   
require ("config.php");
/*if (!isset($_SESSION["registro"]){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
*/


	//$user=$_SESSION["registro"];
  	$codigo="";
	$strCodigo= "
webcam.set_api_url( 'test.php' );//PHP adonde va a recibir la imagen y la va a guardar en el servidor
		webcam.set_quality( 90 ); // calidad de la imagen
		webcam.set_shutter_sound( true ); // Sonido de flash
	";
	if (isset($_GET["codigo"])){
		$cod_exp = $_GET['codigo'];
		$strCodigo = "
		webcam.set_api_url('test.php?codigoexpe=$cod_exp');//PHP adonde va a recibir la imagen y la va a guardar en el servidor
		webcam.set_quality(90); // calidad de la imagen
		webcam.set_shutter_sound( true ); // Sonido de flash
		";
	}
	
	if (isset($_GET["id"])){
		$cod_usu = $_GET['id'];
		//consulta para obtener el nombre del administrador	
	conectar();
$comando ="select * from usuario where nombre_user='$cod_usu'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_usuario=$aDatos["id_usuario"];
//fin de consulta administrador
$strCodigo = "
		webcam.set_api_url('test.php?id=$id_usuario');//PHP adonde va a recibir la imagen y la va a guardar en el servidor
		webcam.set_quality(90); // calidad de la imagen
		webcam.set_shutter_sound( true ); // Sonido de flash
		";
		}

if (isset($_GET["idUsuEditar"])){
		$cod_Edi_usu = $_GET['idUsuEditar'];
		$strCodigo = "
		webcam.set_api_url('test.php?idUsuEditar=$cod_Edi_usu');//PHP adonde va a recibir la imagen y la va a guardar en el servidor
		webcam.set_quality(90); // calidad de la imagen
		webcam.set_shutter_sound( true ); // Sonido de flash
		";
		}

	
	?>


    
<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="webcam.js"></script>

    <script language="JavaScript">
		<?php
			echo $strCodigo;
		?>
	</script>
		<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		function mensajito(){
			alert("Foto guardadada con exito");
					
			}
/*
		function do_upload() {
			 subir al servidor
			document.getElementById('upload_results').innerHTML = '<h1>Cargando al servidor...</h1>';
			webcam.upload();
		}*/
		
			function my_completion_handler(msg) {
			
			location.replace('ok.php');
		}
		
		
	</script>
<div align="left" id="cuadro_camara">    

<table width="100%" height="144"><tr><td width="100" valign=top>
		<form>
		<input type=button value="Configurar" onClick="webcam.configure()" class="ingresar">
		&nbsp;&nbsp;
		<input type=button value="Tomar foto" onClick="webcam.freeze()" class="ingresar">
		&nbsp;&nbsp;
		<input type=button value="subir" onClick="webcam.upload(); " class="ingresar">
		&nbsp;&nbsp;
		<input type=button value="Nueva Foto" onClick="webcam.reset()" class="ingresar">
        &nbsp;&nbsp;
        <input type=button value="Salir" onClick="window.close();" class="ingresar">
	</form>
	
	</td>
    <td width="263" valign=top>
	<script language="JavaScript">
	document.write( webcam.get_html(360, 300) );//dimensiones de la camara
	</script>
    </td>
    <td width=411>
	    <div id="upload_results" class="formulario" > </div>
  </td></tr></table><br /><br />
</div>



<br />
<br />
<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();//Galeria jquery
    });
    </script>
    <style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color: #444;
		width: 100%;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 5px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 5px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style>
    
    <div id="gallery">
    <ul>
  <?php  
  
  include("clase_conexion.php");
  $consulta="select * from fotos order by id_foto desc";
  $busca_fotos=mysql_query($consulta,$c);
  while($ro=mysql_fetch_array($busca_fotos)){
   $url=$ro['id_foto'];  
   $nombre=$ro['nombre']; 
     $des=$ro['des'];
     /*echo "<li>
	 
            <a href=\"fotos/".$url.".jpg\" title=\"$nombre - $des\">

                <img src=\"fotos/".$url.".jpg\" width=\"150\" height=\"120\" alt=\"\" />

            </a>
        </li>";*/
  }
?>    
    </ul>
</div>