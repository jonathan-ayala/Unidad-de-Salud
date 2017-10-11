<?php
	session_start();
	require("config.php");
    require_once("Zebra_Pagination.php");
  	if (!isset($_SESSION["doctor"])){
      echo "<script>alert('Zona No Autorizada, Inicie Sesion');
      location.replace('index.php');</script>";
    }

    function fechaActuad(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     
      $fechaActual = "$anio-$mes-$dia";
      return $fechaActual;
    }

    conectar ();
    $conectar = conectar ();
        $user=$_SESSION["doctor"];
        $comando1 ="select * from usuario where nombre_user='$user'";
        $consulta1 =mysql_query($comando1); 
        $aDatos1= mysql_fetch_array($consulta1);
        $cod_doctor=$aDatos1["cod_doctor"];
        $horai=fechai();
        $horaf=fechaf();
        $fecha=fechaActuad();

     $datos = mysql_query("SELECT * FROM datos WHERE cod_doctor='$cod_doctor' AND fecha_consulta='$fecha'");
    $aDatos2 = mysql_fetch_array($datos);
        $intitucion = $aDatos2["intitucion"];
        $establecimiento = $aDatos2["establecimiento"];
        $servicio = $aDatos2["servicio"];
        $modalidad = $aDatos2["modalidad"];
        $estartegia = $aDatos2["estartegia"];
        $local = $aDatos2["local"];
        $fecha_consulta = $aDatos2["fecha_consulta"];
        $no = $aDatos2["no"];
        $recurso = $aDatos2["recurso"];

    if($intitucion == 1){
        $intitucion = "MINSAL";
    }elseif($intitucion == 1){
        $intitucion = "FOSALUD";
    }else{
        $intitucion = "";
    }
    
    if($servicio == 1){
        $servicio = "Consulta Externa";
    }elseif($servicio == 2){
            $servicio = "Emergencia";
        }elseif($servicio == 3){
            $servicio = "Extramural";
        }else{
            $servicio = "";
        }       
    
    if($estartegia == 1){
        $estartegia = "Comunitaria";
    }elseif($estartegia == 2){
            $estartegia = "Centro Educativo";
        }elseif($estartegia == 3){
                $estartegia = "Albergue";
            }elseif($estartegia == 4){
                $estartegia = "Otro Establecimiento de Salud";
            }else{
                $estartegia = "";
            }

    if($recurso == 1){
        $recurso = "M&eacute;dico";
    }elseif($recurso == 2){
            $recurso = "Enfermera";
        }elseif($recurso == 3){
                $recurso = "Nutricionista";
            }elseif($recurso == 4){
                $recurso = "Psic&oacute;logo";
            }else{
                $recurso = "";
            } 



	
	$nfilas=0;
   
    $total_consultas  = mysql_query("SELECT id_consulta from consulta WHERE id_doctor = $cod_doctor AND fecha_hora_consulta between '$horai' and '$horaf'");
    $num_consultas = mysql_num_rows($total_consultas);
    $resultados = 10;

    $paginacion = new Zebra_Pagination();
    $paginacion->records($num_consultas);
    $paginacion->records_per_page($resultados);
    $consultas = mysql_query("SELECT * from consulta WHERE id_doctor = $cod_doctor AND fecha_hora_consulta between '$horai' and '$horaf' LIMIT " .(($paginacion->get_page() - 1) * $resultados). "," .$resultados);
        

    $cmd = mysql_query("SELECT * from consulta WHERE id_doctor = $cod_doctor AND fecha_hora_consulta between '$horai' and '$horaf' ORDER BY id_consulta ASC");
	$nfilas = mysql_num_rows($cmd);
 
?>
<script> window.print();</script>

<?php

    echo "<html>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<head>
			<title>Reporte de Consulta</title>
            <link rel='stylesheet' type='text/css' href='estilo.css'>
			<meta http-equiv='conten-type' content='text/html; charset=utf-8'>
            

		</heads>


   
        <body>
            <table align=center style='width:1800px;'  border=0>
                <tr>
                    <td colspan=4 align=center><b>REP&Uacute;BLICA DE EL SALVADOR</b></td>
                </tr>
                <tr>
                    <td colspan=4 align=center><b>SISTEMA NACIONAL DE SALUD</b></td>
                </tr>
                <tr>
                    <td colspan=4 align=center><b>REGISTRO DIARIO DE CONSULTA AMBULATORIA Y ATENCIONES PREVENTIVAS</b></td>
                </tr>
                <tr>
                    <td style='width:800px;'><b>INSTITUCION:</b> $intitucion</td>
                    <td style='width:800px;'><b>SERVICIO:</b> $servicio</td>
           	    </tr>

                <tr>
                    <td>Establecimiento:  $establecimiento</td>
                    <td>Modalidad: $modalidad</td>

        	    </tr>
             </table>

		
            <table align=center style='width:1800px;' >
                <tr>
                    <td ><br>
                <table border=1 style='border-collapse:collapse'>
                    <tr >
                        <td align=center rowspan='3' class='txt'>No
                        <td align=center rowspan='3' class='txt' align=center style='width:100px;'>Mumero de Expediente Clinico
                        <td align=center rowspan='3' class='txt' align=center style='width:80px;'>Escuela Promotora de la Salud
                        <td align=center rowspan='3' class='txt'>Sexo
                        <td align=center colspan='3' class='txt'>Edad
                        <td align=center colspan='3' class='txt'>Residencia
                        <td align=center rowspan='3' class='txt' align=center style='width:70px;'>Codigo de UCSF o UCSFE

                        <td align=center colspan='13' class='txt'>Atenciones Preventivas
                        <td align=center rowspan='3' class='txt' align=center style='width:100px;'>Semanas de Amenorrea en Embarazadas   
                    </tr>
                    <tr>                    
                        <td align=center rowspan='2' class='txt'>Años
                        <td align=center rowspan='2' class='txt'>Meses
                        <td align=center rowspan='2' class='txt'>Dias
                        <td align=center rowspan='2' class='txt'>Departamento / Pais
                        <td align=center rowspan='2' class='txt'>Municipio
                        <td align=center rowspan='2' class='txt'>Area

                        <td align=center rowspan='2' class='txt'>Inscripcion
                        <td align=center rowspan='2' class='txt' align=center style='width:70px;'>Control Subsecuente
                        <td align=center colspan='2' class='txt'>Dispensarizacion
                        <td align=center colspan='4' class='txt'>Estado Nutricional (Indices)
                        <td align=center rowspan='2'  class='txt'align=center style='width:70px;'>Lactancia Materna
                        <td align=center colspan='3' class='txt'>Planifacion Familiar (Metodos Temporales)
                        <td align=center style='width:120px;' class='txt'>Dectencion Precos de Cancer
                     </tr>
                    <tr >
                        <td align=center style='height:10px;' class='txt'>Grupo
                        <td align=center class='txt'>Tipo
                        <td align=center class='txt'>Peso - Edad
                        <td align=center align=center style='width:80px; ' class='txt'>Longitud / Talla-Edad
                        <td align=center class='txt'>Peso - Talla
                        <td align=center align=center style='width:100px;' class='txt'>Indice de Masa Corporal (IMC)
                        <td align=center align=center style='width:80px;' class='txt'>Inscripcion/ Control
                        <td align=center class='txt'>Tipo de Metodo
                        <td align=center class='txt'>Usuarias activas
                        <td align=center style='width:120px;'class='txt'>Citologias, Prostata e IVAA
                    </tr>
                    <tr>
                        <td align=center class='txt'>(1)
                        <td align=center class='txt'>(2)
                        <td align=center class='txt'>(3)
                        <td align=center class='txt'>(4)
                        <td align=center class='txt'>(5)
                        <td align=center class='txt'>(6)
                        <td align=center class='txt'>(7)
                        <td align=center class='txt'>(8)
                        <td align=center class='txt'>(9)
                        <td align=center class='txt'>(10)
                        <td align=center class='txt'>(11)
                        <td align=center class='txt'>(12)
                        <td align=center class='txt'>(13)
                        <td align=center class='txt'>(14)
                        <td align=center class='txt'>(15)
                        <td align=center class='txt'>(16)
                        <td align=center class='txt'>(17)
                        <td align=center class='txt'>(18)
                        <td align=center class='txt'>(19)
                        <td align=center class='txt'>(20)
                        <td align=center class='txt'>(21)
                        <td align=center class='txt'>(22)
                        <td align=center class='txt'>(23)
                        <td align=center class='txt'>(24)
                        <td align=center class='txt'>(25)                    
                    </tr> 

                ";
        if($nfilas!=0){
            $n=0;
            while($aDatos = mysql_fetch_array($consultas)){
                $n++;
                echo "
                    <tr>
                        <td align=center height='30px'>$n
                        <td align=center>$aDatos[cod_expediente]
                        <td align=center>$aDatos[escuela_promotora_salud]
                        <td align=center>$aDatos[genero]
                        <td align=center>$aDatos[anos_consulta]
                        <td align=center>$aDatos[meses_consulta]
                        <td align=center>$aDatos[dias_consulta]
                        <td align=center>$aDatos[id_departamento]
                        <td align=center>$aDatos[municipio]
                        <td align=center>$aDatos[Area]
                        <td align=center>$aDatos[UCSF_UCSFE]

                        <td align=center>$aDatos[id_inscripcion]
                        <td align=center>$aDatos[id_control_subsecuente]
                        <td align=center>$aDatos[dispensarizacionG]
                        <td align=center>$aDatos[dispensarizacionT]
                        <td align=center>$aDatos[estado_nutricional_PE]
                        <td align=center>$aDatos[estado_nutricional_LTE]
                        <td align=center>$aDatos[estado_nutricional_PT]
                        <td align=center>$aDatos[IMC]
                        <td align=center>$aDatos[id_lactancia_materna]
                        <td align=center>$aDatos[planificacionI]
                        <td align=center>$aDatos[planificacionT]
                        <td align=center>$aDatos[planificacionU]
                        <td align=center>$aDatos[id_deteccion_cancer]
                        <td align=center>$aDatos[numero_semanas_amonorrea]

                        
                       
                     </tr>
                  ";
                 }

                echo "
                        </table></td>
    				
    			</tr>
    			";

           }echo"</table>
            <br>
            <br>
                   <table border='0' width='1760'>
                    <tr>
                        <td class='txt' colspan='2'>3.Escuela Promotora de Salud</td>
                        <td width='4' >&nbsp;</td>
                        <td class='txt' colspan='2'>8. Departamento/Pa&iacute;s</td>
                        <td width='4'>&nbsp;</td>
                        <td width='92' class='txt'>10. Area</td>
                        <td width='4' rowspan='8'>&nbsp;</td>
                        <td width='277' class='txt'>12. Inscripci&oacute;n</td>
                        <td width='4'>&nbsp;</td>
                        <td width='218' class='txt' align=center bgcolor='#A4A4A4'>Dispenzaci&oacute;n</td>
                        <td width='4' rowspan='8'>&nbsp;</td>
                        <td class='txt' colspan='5' bgcolor='#A4A4A4'>Estado Nutricional (Indices)</td>
                        
                    </tr>
                    <tr>
                        <td colspan='2' rowspan='3'>Colar un cheque si &nbsp; el paciente &nbsp; llega referido<br> 
                            de un Centro Educativo, para ser atendido en<br> 
                            el Establecimiento &nbsp; de &nbsp; Salud &nbsp; o &nbsp; que brinde<br>
                            atenci&oacute;n en el Centro Educativo por morbilidad<br> 
                            no aplica el levantamiento de la ficha escolar.
                        </td>
                        
                        <td>&nbsp;</td>
                        <td width='120' rowspan='6'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.  Aguachap&aacute;n<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.  Santa Ana<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.  Sonsonate<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.  Chalatenango<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.  La Libertad<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.  San Salvador<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.  Cuscatl&aacute;n<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.  La Paz<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.  Caba&ntilde;as<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;10. San Vicente<br>
                        </td>
                        <td width='115' rowspan='6'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11. Usulut&aacute;n<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12. San Miguel<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13. Moraz&aacute;n<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14. La Uni&oacute;n<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15. Guatemala<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16. Honduras<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17. Nicaragua<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18. Costa Rica<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19. Panam&aacute;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20. Otros Pa&iacute;ses
                        </td>
                        <td></td>
                        <td rowspan='2'>
                            <ol>
                                <li>Urbano
                                <li>Rural
                            </ol>
                        </td>
                        <td rowspan='3'>
                            <ol>
                                <li>Infantil, Adolescente, Adulto, Adulto Mayor
                                <li>Materno Inscritas menos de 12 meses
                                <li>Materno más de 12 meses
                                <li>Climaterio y Menopausia
                                <li>Preconcepcional
                            </ol>
                        </td>
                        <td>&nbsp;</td>
                        <td class='txt'>14. Grupo</td>
                        <td colspan='5'>Aplica solamente en la primera ateci&oacute;n en el a&ntilde;o calendario</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td rowspan='3'>
                            <ol>
                                <li>Grupo I: Supuestamente Sano
                                <li>Grupo II: Con Riesgo
                                <li>Grupo III: Enfermo
                                <li>Grupo IV: Con Discapacidad
                            </ol>
                        </td>
                        <td class='txt' colspan='2'>16. Peso-Edad</td>
                        <td width='15'></td>
                        <td width='268' colspan='2' class='txt'>17. Longitud/Talla-Edad</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan='2' rowspan='3'>
                            <ol>
                                <li>Normal
                                <li>Desnutrici&oacute;n
                                <li>Desnutrici&oacute;n Severa
                            </ol>
                        </td>
                        <td></td>
                        <td colspan='2' rowspan='3'>
                            <ol>
                                <li>Normal
                                <li>Talla Alta
                                <li>Retardo del Crecimiento
                                <li>Retardo Severo de Crecimiento
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td width='139'></td>
                        <td width='140'></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    <tr>
                        <td class='txt'>4. Sexo</td>
                        <td class='txt'>5 a 7 edad:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='txt'>13. Control Subsecuente</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    <tr>
                        <td rowspan='2'>
                            <ol>
                                <li>Masculino
                                <li>Femenino
                                <li>Indeterminado
                            </ol>
                        </td>
                        <td>Anotar en las casillas:</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td rowspan='4'>
                            <ol>
                                <li>Infantil, Adolescente, Adulto, Adulto Mayor
                                <li>Materno
                                <li>Puerperal
                                <li>Climaterio y Menopausia
                                <li>Puerperal Precoz
                                <li>Preconcepcional
                                <li>Puerperal Tardio
                            </ol>
                        </td>
                        <td></td>
                        <td class='txt'>15. Tipo</td>
                        <td colspan='5'></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  rowspan='2'>
                            <ol>
                                <li>Inicial
                                <li>Seguimiento
                            </ol>
                        </td>

                        <td class='txt' colspan='2' >18. Peso-Talla</td>
                        <td></td>
                        <td class='txt' colspan='2' >19. IMC</td>
                    </tr>
                    <tr>
                        <td >&nbsp;</td>
                        <td rowspan='4'><b>A&Ntilde;OS: </b>de 1 a m&aacute;s a&ntilde;os<br>
                            <b>MESES: </b>de 1 a 11 meses<br>
                            <b>DIAS: </b>anotar en n&uacute;mero<br>
                                de d&iacute;as calendario antes<br>
                                de cumplir un mes de<br>
                                edad.
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan='2' rowspan='3'>
                            <ol>
                                <li>Normal
                                <li>Desnutrici&oacute;n
                                <li>Desnutrici&oacute;n Severa
                                <li>Sobrepeso
                                <li>Obesidad
                            </ol>
                        </td>
                        <td></td>

                        <td colspan='2' rowspan='3'>
                            <ol>
                                <li>Normal
                                <li>Peso bajo
                                <li>Desnutrici&oacute;n
                                <li>Sobrepeso
                                <li>Puerperal Precoz
                                <li>Obesidad
                                <li>Desnutrici&oacute;n Severa
                            </ol>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width='99'></td>
                        <td width='157'></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>                
           <table align=center style='width:1800px;' border=0>  
                <tr>
                    <td align=center><br> <br>De: ______________________________________ Hasta: ______________________________________</td>
                    <td align=center><br> <br>________________________________________________________________________________________</td>
                </tr>
                <tr>
                    <td style='width:900px;' align=center>Horario de Consulta</td>
                    <td style='width:900px;' align=center>Nombre del Recurso</td>
                </tr>
           </table>
           <table align=center>  
                <tr align=center>
                    <td align=center>";$paginacion->render();echo"</td>
                </tr>
            </table>
       </body>";




?>


