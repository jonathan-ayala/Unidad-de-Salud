<?php
session_start();
require ("lista.php");


if (!isset($_SESSION["doctor"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}

$user=$_SESSION["doctor"];
	$comando1 ="select * from usuario where nombre_user='$user'";
	$consulta =mysql_query($comando1); 
	$aDatos= mysql_fetch_array($consulta);
	$id_doctor=$aDatos["cod_doctor"];
	$id_usuario=$aDatos["id_usuario"];
	$foto=$aDatos["foto"];


	$comando1="select * from doctor where cod_doctor= $id_doctor";
	$consulta1= mysql_query($comando1);
		while ($aDatos1=mysql_fetch_array($consulta1)){
			$nombre=$aDatos1["nombre_doctor"];
			$apellido=$aDatos1["apellido_doctor"];
		}
	

$expediente = "";
if ($_GET){
	$expediente=$_GET['cod_Exp'];	
}

$consulta ="select * from expediente where cod_expediente='$expediente'";
	$comando2 = mysql_query($consulta);
		$aDatos = mysql_fetch_array($comando2);			
			$primer_nombre = $aDatos["primer_Nombre"];
			$segundo_nombre = $aDatos["segundo_Nombre"];
			$primer_apellido = $aDatos["primer_Apellido"];
			$segundo_apellido = $aDatos["segundo_Apellido"];
				$nombre_paciente=$primer_nombre." " .$segundo_nombre." ". $primer_apellido." ". $segundo_apellido;
			$Fecha_nac = $aDatos["Fecha_nac"];
			$genero = $aDatos["genero"];

	
	$array= explode("-",$Fecha_nac);
    $actual = fechaActual();
    $array2=explode("-",$actual);
	
	$resultado= $array2[0]-$array[0];
	
if ($genero == "M"){
	$sexo = "Masculino";
}elseif ($genero == "F") {
	$sexo = "Femenino";
}else{
	$sexo = "Indeterminado";
}


//1parte
$numero = "";
$escuela = "";


$anos = "";
$meses ="";
$dias = "";
$departamento = "";
$municipio = "";
$area = "";
$ucsf = "";
$fecha_hora_consulta = fechaActual();


//2parte
$inscripcion = "";
$subsecuente = "";
$dispensarizacionG = "";
$dispensarizacionT = "";
$lactancia = "";
$nutricional_PE = "";
$nutricional_PT = "";
$nutricional_LTE = "";
$IMC = "";
$planificacionI = "";
$planificacionT = "";
$planificacionU = "";
$cancer = "";
$semanas = "";

//3 parte
$tipo_consultaP = "";
$especialista = "";
$sospecha = "";
$principal = "";
$CIE1 = "";
$tipo_consultaA = "";
$afecciones = "";
$CIE2 = "";
$externa = "";
$CIE3 = "";

//4 parte
$discapacidad = "";
$violenciaT = "";
$violenciaA = "";
$salud_mental = "";
$hospitalario = "";
$referencia = "";
$a = "";
$de = "";
$tipo_afiliacion = "";
$num_afiliacion = "";



/*
institucion
recurso
tipo_servicio
estrategia
*/


if($_POST){
	//1 parte
	if (isset($_POST["escuela"])){
		$escuela = $_POST["escuela"];
	}
	
	$departamento = $_POST["departamento"];
	$anos =$_POST["anosc"];
	
	$meses= $_POST["meses"];
	$dias=$_POST["diasc"];
	$municipio = $_POST["municipio"];
	$area = $_POST["area"];
	$ucsf = $_POST["ucsf"];
	$expediente=$_POST["expD"];
	$genero=$_POST["sexo"];

	//2parte
	$inscripcion = $_POST["inscripcion"];
	$subsecuente = $_POST["subsecuente"];
	$dispensarizacionG = $_POST["dispensarizacionG"];
	$dispensarizacionT = $_POST["dispensarizacionT"];
	$lactancia = $_POST["lactancia"];
	$nutricional_PE = $_POST["nutricional1"];
	$nutricional_PT = $_POST["nutricional2"];
	$nutricional_LTE = $_POST["nutricional3"];
	$IMC = $_POST["nutricional4"];
	$planificacionI = $_POST["planificacionI"];
	$planificacionT = $_POST["planificacionT"];
	$planificacionU = $_POST["planificacionU"];
	$cancer = $_POST["cancer"];
	$semanas = $_POST["semanas"];


	//3 parte
	$tipo_consultaP = $_POST["tipo_consulta"];
	$especialista = $_POST["tipo_consulta"];
	$sospecha = $_POST["sospecha"];
	$principal = $_POST["principal"];
	$CIE1 = $_POST["CIE1"];
	$tipo_consultaA = $_POST["tipo_consulta"];
	$afecciones = $_POST["afecciones"];
	$CIE2 = $_POST["CIE2"];
	$externa = $_POST["externa"];
	$CIE3 = $_POST["CIE3"];

	//4 parte
	$discapacidad = $_POST["discapacidad"];
	$violenciaT = $_POST["violenciaT"];
	$violenciaA = $_POST["violenciaA"];
	$salud_mental = $_POST["salud_mental"];
	$hospitalario = $_POST["hospitalario"];
	$referencia = $_POST["referencia"];
	$a = $_POST["a"];
	$de = $_POST["de"];
	$tipo_afiliacion = $_POST["tipo_afiliacion"];
	$num_afiliacion = $_POST["num_afiliacion"];


	$cmd = "INSERT INTO `consulta` (
			`cod_expediente`,
			`escuela_promotora_salud`,
			`genero`,
			`anos_consulta`,
			`meses_consulta`,
			`dias_consulta`,
			`id_departamento`,
			`municipio`,
			`Area`,
			`UCSF_UCSFE`,
			`id_inscripcion`,
			`id_control_subsecuente`,
			`dispensarizacionG`,
			`dispensarizacionT`,
			`id_lactancia_materna`,
			`estado_nutricional_PE`,
			`estado_nutricional_PT`,
			`estado_nutricional_LTE`,
			`IMC`,
			`planificacionI`,
			`planificacionT`,
			`planificacionU`,
			`id_deteccion_cancer`,
			`numero_semanas_amonorrea`,
			`id_tipo_consultaP`,
			`id_tipo_consulta_especialista`,
			`sospecha`,
			`principal`,
			`codigo_CIE1`,
			`id_tipo_consultaA`,
			`otras_afecciones`,
			`codigo_CIE2`,
			`causa_externa_morbilidad`,
			`codigo_CIE3`,
			`id_discapacidad`,
			`violenciaT`,
			`violenciaA`,
			`id_procedimiento`,
			`hospitalario`,
			`id_refencia`,
			`establecimiento_a`,
			`establecimiento_de`,
			`id_afiliacion`,
			`numero_afilacion`, 
			`id_doctor`, 
			`fecha_hora_consulta`
		)VALUES(
			'$expediente',
			'$escuela', 
			'$genero',
			'$anos',
			'$meses', 
			'$dias', 
			'$departamento', 
			'$municipio', 
			'$area', 
			'$ucsf', 
			'$inscripcion', 
			'$subsecuente',
			'$dispensarizacionG',
			'$dispensarizacionT',
			'$lactancia',
			'$nutricional_PE',
			'$nutricional_PT',
			'$nutricional_LTE',
			'$IMC',
			'$planificacionI',
			'$planificacionT',
			'$planificacionU',
			'$cancer',
			'$semanas',
			'$tipo_consultaP',
			'$especialista',
			'$sospecha',
			'$principal',
			'$CIE1',
			'$tipo_consultaA',
			'$afecciones',
			'$CIE2',
			'$externa',
			'$CIE3',
			'$discapacidad',
			'$violenciaT',
			'$violenciaA',
			'$salud_mental',
			'$hospitalario',
			'$referencia',
			'$a',
			'$de',
			'$tipo_afiliacion',
			'$num_afiliacion', 
			'$id_doctor',
			'$fecha_hora_consulta'
		)";

	
	$comando3 ="UPDATE `cola` SET `estado`='2' WHERE `cod_expediente`= '$expediente'";
	//echo $comando3;
	interfaz2();
	conectar();

	if (mysql_query($cmd)){
		echo"
			<script>
			</script>
		";

		if(mysql_query($comando3)){
			$comando4="select * from consulta where cod_expediente=$expediente and id_doctor=$id_doctor and fecha_hora_consulta=
			'$fecha_hora_consulta'
			";
			$con=mysql_query($comando4);
			$aDatos=mysql_fetch_array($con);
			$id_cons=$aDatos["id_consulta"];
			
			
			
			echo "<script> 
				alert('Consulta ejecutada con exito');
				

				location.replace('cola.php');
				</script>
			";
		}

	}else{
		echo"
			<script>
				alert('Error interno );
			</script>
		";

		echo mysql_error();

}

}



?>
<?php
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
			<td width='100px'><a href='home2.php' class='items'>Inicio</a>
			<td width='150px'><a href='cola.php' class='items'>Cola de Paciente</a>
			<td width='150px'><a href='reporte_p.php' class='items' >Reporte de Consulta </a>
			<td width='150px'><a href='cerrar.php' class='items'>Cerrar Sesion</a>
		</tr>
	</table>
</div>
<br>
    ";
    algo();
    ?>

<script type="text/javascript">
	function abrir(url){
		window.open(url,"Dotos de la Consulta","width=500, height=300", "top=200, left=200")

	}
</script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 5, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 3,                             //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 5,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 0,                            //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: true                              //[Optional] Disable drag or not, default value is false
                }
            };


            var jssor_slider2 = new $JssorSlider$('slider2_container', options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    var sliderWidth = parentWidth;

                    //keep the slider width no more than 602
                    sliderWidth = Math.min(sliderWidth, 602);

                    jssor_slider2.$ScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            

        });
    </script>
<center>
	<div align='center' class='cdiv'>
    <form method='post' name='consulta' id='consulta' action='ejecutar.php' onclick=''>
    <div id='slider2_container'  style=" align:center; width: 602px; height: 655px;  background: #fff; position: relative; top: 0px; left: 0px; ">
          <div align='center' u='slides' style='align: center; cursor: move; position: absolute;  width:771px; height: 610px;  left: 0px; top: 29px; border: 1px solid gray; -webkit-filter: blur(0px); background-color: #fff; overflow: hidden;'>
            <div>
                <div style='margin: 10px; overflow: hidden; color: #000;'>
                    <hidden input type='text' name='expediente' id='expediente' value='$expediente?'>
                    
                    <table align='center'  style='width:750px;'' ' border='0'>
              
                <tr>
                    <td width='207' style="padding:5px">N&uacute;mero de Expediente Cl&iacute;nico:
                    <td width='300' style="padding:5px"><?php echo "$expediente <input type='hidden' value='$expediente' name='expD'>";?></td>
                    <td rowspan='4' align=center style="padding:5px"><img src="fotoExpediente/<?php echo $expediente ?>.jpg" width='70px' height='70px' alt=''></td>
                </tr>
                <tr>
                	<td style="padding:5px">Nombre del Paciente:</td>
                	<td style="padding:5px"><?php echo $nombre_paciente ;?></td>
                </tr>
                <tr>
                	<td style="padding:5px">Escuela Promotora de salud&nbsp;&nbsp;&nbsp; <br></td>
                	<td style="padding:5px"><input value='1'  type='checkbox' name='escuela'/></td>

                </tr>
                <tr>
                    <td style="padding:5px">Sexo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sexo;
					echo "<input type='hidden' value='$genero' name='sexo'>";
					?> 
                    <td style="padding:5px">
                    
                </tr>
                
                <tr>
                    <td colspan='3'style="padding:5px">
                        <fieldset class='Estilo1' >
                        <legend>Edad</legend>
                            <table >
                                <tr>
                                    <td style="padding:5px">A&ntilde;os:&nbsp; 
                                    
									<?php  echo "<input type='hidden' value='$resultado' name='anosc'> $resultado";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="padding:5px">Meses:&nbsp;<?php echo "<input type='text' name='meses'";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="padding:5px">D&iacute;as:&nbsp;<?php echo "<input type='text' name='diasc'";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan='3' style="padding:5px">
                    <fieldset class='Estilo1' >
                        <legend>Nose</legend>
                            <table >
                                <tr>
                                    <td style="padding:5px">Departamento/Pais&nbsp;&nbsp;<?php echo $rdepartamento; ?>
                                    <td style="padding:5px">Municipio &nbsp;&nbsp;<input type='text' name='municipio'/>
                                    <td style="padding:5px">&Aacute;rea&nbsp;&nbsp;<select size='1' name='area'>
                                            <option value='0'>Seleccione</option>
                                            <option value='1'>Urbano</option>
                                            <option value='2'>Rural</option>
                                        </select>
                                </tr>
                            </table>
                      </fieldset>
                    </td>
                </tr>
                <tr>
                	<td style="padding:5px">&nbsp;</td>
                	<td style="padding:5px">&nbsp;</td>
                	<td style="padding:5px">&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding:5px">C&oacute;digo de UCSF o UCSFE
                    <td style="padding:5px" ><input type='text' name='ucsf'/>
                    <td style="padding:5px">&nbsp;</td>
                </tr>
                
            </table>
                </div>
                <div u='thumb' class=>Datos del Paciente</div>
            </div>











            <div>
                <div style='margin: 10px; overflow: hidden; color: #000;'>
                <table align='center'>
                    <tr>
                        <td style="padding:5px">Inscripci&oacute;n&nbsp;&nbsp;<?php echo $rinscripcion; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Control Subsecuente&nbsp;&nbsp;&nbsp;<?php echo $rsubsecuente; ?>
                    <tr>
                    <tr>
                        <td style="padding:5px">
                            <fieldset  class='Estilo1' style='width:710px'>
                            <legend >Dispensaci&oacute;n</legend>
                                <table >
                                    <tr>
                                        <td style="padding:5px">Grupo&nbsp;<?php echo $rdispensarizacion ;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo&nbsp;<?php echo $rdispensarizacion1; ?>
                                    </tr>
                                </table>
                            </fieldset>
                         <br></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">
                            <fieldset  class='Estilo1' style='width:710px'>
                            <legend >Estado Nutricional</legend>
                                <table align='center' >
                                    <tr>
                                        <td style="padding:5px" align='center'>Peso-Edad&nbsp;&nbsp;&nbsp;<?php echo $rnutricional1; ?>
                                        <td style="padding:5px" align='center'>Longitud/Talla-Edad&nbsp;&nbsp;&nbsp;<?php echo $rnutricional3; ?>
                                        <td align='center' style="padding:5px">Peso-Talla&nbsp;&nbsp;&nbsp;<?php echo $rnutricional2; ?>
                                        <td align='center' style="padding:5px">&Iacute;ndice de Masa Corporal (IMC)&nbsp;&nbsp;&nbsp;<?php echo $rnutricional4; ?>
                                    </tr>
                                </table>
                            </fieldset>
                        <br></td>
                    </tr>
                    <tr>
                        <td style="padding:5px"> Lactancia Materna&nbsp;&nbsp;&nbsp;<?php echo $rlactancia; ?></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">
                            <fieldset  class='Estilo1' style='width:710px'>
                            <legend >Planificaci&oacute;n Familiar (M&eacute;todos Temporales)</legend>
                                <table align='center' >
                                    <tr>
                                        <td style="padding:5px" align='center'>Inscripci&oacute;n / Control&nbsp;&nbsp;&nbsp;<?php echo $rplanificacionI; ?>
                                        <td align='center' style="padding:5px">Tipo de M&eacute;todo&nbsp;&nbsp;&nbsp;<?php echo $rplanificacionT; ?>
                                        <td align='center' style="padding:5px">Usuarias Activas&nbsp;&nbsp;&nbsp;<?php echo $rplanificacionU; ?>
                                    </tr>
                                </table>
                            </fieldset>
                        <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:5px">
                            <fieldset  class='Estilo1' style='width:710px'>
                            <legend >Detecci&oacute;n Precoz del C&aacute;ncer</legend>
                                <table >
                                    <tr>
                                        <td style="padding:5px">Citolog&iacute;a, Pr&oacute;tata e IVAA&nbsp;&nbsp;&nbsp;<?php echo $rcancer; ?>
                                    </tr>
                                </table>
                            </fieldset>
                        <br></td>
                    </tr>
                    <tr>
                        <td  style="padding:5px">Semanas de Amenorrea en Embarazadas&nbsp;&nbsp;&nbsp;<input type='text' name='semanas'> </td>
                    </tr>
                    
                </table>
                </div>
                <div u='thumb'>Atenciones Preventivas</div>
            </div>









            <div>
                <div style='margin: 10px; overflow: hidden; color: #000;'>

            <table align='center' border=0 style='width:750px'>
                <tr>
                    <td style='width:50px' style="padding:5px">Tipo de Consulta</td>
                    <td style="padding:5px"><?php echo $rtipo_consulta; ?></td>
                    <td style="padding:5px" >Tipo de Consulta del especialista</td>
                    <td style="padding:5px"><?php echo $rtipo_consulta; ?></td>
                </tr>
                <tr>
                    <td style="padding:5px">Sospecha</td>
                    <td style="padding:5px" colspan=3><input type='text' name='sospecha' /></td>
                </tr>
                <tr>
                    <td style="padding:5px">Principal</td>
                    <td colspan=3 style="padding:5px"><textarea  rows='6' cols='80' name='principal'></textarea></td>
                </tr>
                <tr>
                    <td style="padding:5px">C&oacute;digo CIE-10</td>
                    <td style="padding:5px"><input type=text name='CIE1'></td>
                    <td style="padding:5px">Tipo de Consulta</td>
                    <td style="padding:5px"><?php echo $rtipo_consulta; ?></td>

                </tr>
                <tr>
                    <td style="padding:5px">Otras Afecciones</td>
                    <td style="padding:5px" colspan=3><textarea rows='6' cols='80' name='afecciones'></textarea></td>
                </tr>
                <tr>
                    <td style="padding:5px">C&oacute;digo CIE-10 </td>
                    <td style="padding:5px" colspan=3><input type='text' name='CIE2'> </td>
                </tr>
                <tr>
                    <td style="padding:5px">Causa externa de Morbilidad</td>
                    <td style="padding:5px" colspan=3><textarea  rows='6' cols='80' name='externa'></textarea></td>
                </tr>
                <tr>
                    <td style="padding:5px">C&oacute;digo CIE-10</td>
                    <td colspan=3 style="padding:5px"><input type='text' name='CIE3'></td>
                </tr>
            </table>

                </div>
                <div u='thumb'>Diagnosticos</div>
            </div>












            <div>
                <div style='margin: 10px; overflow: hidden; color: #000;'>
                <table align='center' style='width:750px'>
	                <tr>
	                    <td style="padding:5px"width='230px'>Tipo de Discapacidad</td>
	                    <td style="padding:5px"><?php echo $rdiscapacidad; ?></td>
	                </tr>
	                <tr>
	                    <td colspan='2' style="padding:5px"><br>
	                        <fieldset  class='Estilo1' >
	                        <legend >Atenci&oacute;n por violencia</legend>
	                            <table border=0  >
	                                <tr>
	                                    <td style="padding:5px">Tipo &nbsp;&nbsp;<?php echo $rviolencia; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	                                    <td style="padding:5px">&nbsp;</td>
	                                    <td style="padding:5px">&nbsp;</td>
	                                    <td style="padding:5px">Ambito &nbsp;&nbsp;<?php echo $rviolencia1; ?></td>
	                                </tr>
	                            </table>
	                        </fieldset>
	                     <br></td>
	                </tr>
	                <tr>
	                    <td style="padding:5px">Procedimientos de Salud Mental</td>
	                    <td style="padding:5px"><?php echo $rsalud_mental; ?></td>
	                </tr>
	                <tr>
	                    <td style="padding:5px"><br>Ingreso Hospitalario </td>
	                    <td style="padding:5px"><input type='text' name='hospitalario' ></td>
	                </tr>
	                <tr>
                    <td style="padding:5px" colspan=2><br>
                        <fieldset  class='Estilo1' >
                        <legend >Referencia / Interconsulta</legend>
                            <table  border=0>
                                <tr>
                                    <td style="padding:5px" style='width:200px' >Tipo de referencia &nbsp;&nbsp;&nbsp;<?php echo $rreferencia; ?></td>
                                    <td style="padding:5px"></td>
                                </tr>
                                <tr>
                                	<td style="padding:5px">
                                		<fieldset  class='Estilo1'  >
                                        <legend >Establecimiento</legend>
                                            <table   border=0 align='center'>
                                                <tr>
                                                    <td style="padding:5px">A:&nbsp;&nbsp;&nbsp; <input type='text' name='a' ></td>
                                                    <td style="padding:5px">De:&nbsp;&nbsp;&nbsp; <input type='text' name='de' ></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                	</td>
                                	<td style="padding:5px"></td>
                                </tr>
                            </table>
                        </fieldset>
                     <br></td>
                </tr>
                <tr>
                    <td colspan='2' style="padding:5px">
                        <fieldset  class='Estilo1' >
                        <legend >Afiliaci&oacute;n</legend>
                            <table >
                                <tr>
                                    <td style="padding:5px">Tipo &nbsp;&nbsp;&nbsp;<?php echo $rafiliacion; ?></td>
                                    <td style="padding:5px">N&uacute;mero de afilaci&oacute;n &nbsp;&nbsp;&nbsp;<input type='text' name='num_afiliacion'></td>
                                </tr>
                            </table>
                        </fieldset>
                     <br></td>
                </tr>
                </table>
                <table>
		        	<tr>
		            	<td style="padding:5px">
                        
		                	<input type="submit"  value="Guardar" class='ingresar'">
		            	</td>
		            </tr>
		        </table>

                </div>
                <div u='thumb'>Otros</div>
            </div>
        </div>
        
       </form>

        <!-- ThumbnailNavigator Skin Begin -->
        <div u='thumbnavigator' class='jssort12' style='position: absolute; width: 843px; height: 30px; left: -72px; top: 0px;'>
            <!-- Thumbnail Item Skin Begin -->
             <style>
                /* jssor slider thumbnail navigator skin 12 css */
                /*
                .jssort12 .p            (normal)
                .jssort12 .p:hover      (normal mouseover)
                .jssort12 .pav          (active)
                .jssort12 .pav:hover    (active mouseover)
                .jssort12 .pdn          (mousedown)
                */
                .jssort12 .w, .jssort12 .phv .w
                {
                	cursor: pointer;
                	position: absolute;
                	WIDTH: 139px;
                	HEIGHT: 28px;
                	border: 1px solid gray;
                	top: 0px;
                	left: -1px;
                }
                .jssort12 .pav .w, .jssort12 .pdn .w
                {
                	border-bottom: 1px solid #fff;
                }
                .jssort12 .c
                {
                    color: #000;
                    font-size:13px;
                }
                .jssort12 .p .c, .jssort12 .pav:hover .c
                {
                	background-color:#eee;
                }
                .jssort12 .pav .c, .jssort12 .p:hover .c, .jssort12 .phv .c
                {
                	background-color:#fff;
                }

            </style>
            <div u='slides' style='cursor: move; top:0px; left:0px; border-left: 1px solid gray;'>
                <div u='prototype' class='p' style='POSITION: absolute; WIDTH: 140px; HEIGHT: 30px; TOP: 0; LEFT: 0; padding:0px;'>
                    <div class=w><ThumbnailTemplate class='c' style=' WIDTH: 100%; HEIGHT: 100%; position:absolute; TOP: 0; LEFT: 0; line-height:28px; text-align:center;'></ThumbnailTemplate></div>
                </div>
            </div>
        </div>
    </div>
</div>
  </center>
<?php
piedx();
?>