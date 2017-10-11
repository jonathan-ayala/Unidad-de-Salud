<?php
	session_start();
	require("config.php");
    require_once("Zebra_Pagination.php");
  	if (!isset($_SESSION["doctor"])){
      echo "<script>alert('Zona No Autorizada, Inicie Sesion');
      location.replace('index.php');</script>";
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


   $datos = mysql_query("SELECT * FROM datos WHERE cod_doctor='$cod_doctor' ");
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
                    <td style='width:800px;'><b>ESTRATEGIA:</b> $estartegia</td>
                    <td style='width:800px;'><b>Fecha de Cosnulta</b> $fecha_consulta   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>No.:<b>  $no</td>
        	    </tr>

                <tr>
                    <td>Nombre del Local donde se desarrola la Estrategia: $local</td>
                    <td><b>RECURSO:<b> $recurso</td>
        	    </tr>
             </table>

		
            <table align=center style='width:1800px;' >
                <tr>
                    <td ><br>
                <table style='border-collapse:collapse' border=1>
                    <tr >
                        <td align=center colspan='10' class='txt'>DIAGNOSTICO

                        <td align=center rowspan='3' class='txt'>Tipo de Discapacidad
                        <td align=center colspan='2' class='txt'>Atencion por Violecia

                        <td align=center rowspan='3' class='txt' align=center style='width:80px;'>Prodedimiento de Salud Mental
                        <td align=center rowspan='3' class='txt'>Ingreso Hospitalario
                        <td align=center colspan='3' class='txt'>Referencia / Interconsulta
                        <td align=center colspan='2' class='txt'>Afiliacion
                    </tr>

                    <tr>
                        <td align=center rowspan='2' class='txt' align=center style='width:60px;'>Tipo de Consulta
                        <td align=center rowspan='2' class='txt' align=center style='width:80px;'>Tipo de Consulta del Especialista
                        <td align=center rowspan='2' class='txt'>Sospecha
                        <td align=center rowspan='2' class='txt' align=center style='width:180px;'>Principal
                        <td align=center rowspan='2' class='txt'>Codigo CIE-10
                        <td align=center rowspan='2' class='txt'>Tipo de Consulta
                        <td align=center rowspan='2' class='txt' align=center style='width:180px;'>Otras Afecciones
                        <td align=center rowspan='2' class='txt'>Codigo CIE-10
                        <td align=center rowspan='2' class='txt' align=center style='width:140px;'>Causa externa de Morbilidad
                        <td align=center rowspan='2' class='txt'>Codigo CIE-10

                        <td align=center rowspan='2' class='txt'>Tipo
                        <td align=center rowspan='2' class='txt'>Ambito

                        <td align=center rowspan='2' class='txt'>Tipo
                        <td align=center rowspan='2' colspan='2' class='txt'>Establecimiento

                        <td align=center rowspan='2' class='txt'>Tipo
                        <td align=center rowspan='2' class='txt'>Numero de Afiliacion
                    </tr>
                    <tr >
                        


                        
                    </tr>
                    <tr>
                        <td align=center class='txt'>(26)
                        <td align=center class='txt'>(27)
                        <td align=center class='txt'>(28)
                        <td align=center class='txt'>(29)
                        <td align=center class='txt'>(30)
                        <td align=center class='txt'>(31)
                        <td align=center class='txt'>(32)
                        <td align=center class='txt'>(33)
                        <td align=center class='txt'>(34)
                        <td align=center class='txt'>(35)
                        <td align=center class='txt'>(36)
                        <td align=center class='txt'>(37)
                        <td align=center class='txt'>(38)
                        <td align=center class='txt'>(39)
                        <td align=center class='txt'>(40)
                        <td align=center class='txt'>(41)
                        <td align=center class='txt' colspan='2'>(42)
                        <td align=center class='txt'>(43)
                        <td align=center class='txt'>(44)
                   
                    </tr>

                ";
        if($nfilas!=0){
            $n=0;
            while($aDatos = mysql_fetch_array($consultas)){
                $n++;
                echo "
                    <tr>
                        
                        <td align=center>$aDatos[id_tipo_consultaP]
                        <td align=center>$aDatos[id_tipo_consulta_especialista]
                        <td align=center>$aDatos[sospecha]
                        <td align=center>$aDatos[principal]
                        <td align=center>$aDatos[codigo_CIE1]
                        <td align=center>$aDatos[id_tipo_consultaA]
                        <td align=center>$aDatos[otras_afecciones]
                        <td align=center>$aDatos[codigo_CIE2]
                        <td align=center>$aDatos[causa_externa_morbilidad]
                        <td align=center>$aDatos[codigo_CIE3]

                        <td align=center>$aDatos[id_discapacidad]
                        <td align=center>$aDatos[violenciaT]
                        <td align=center>$aDatos[violenciaA]
                        <td align=center>$aDatos[id_procedimiento]
                        <td align=center>$aDatos[hospitalario]
                        <td align=center>$aDatos[id_refencia]
                        <td align=center colspan='2'>
                            <table border=1 width='116px' style='border-collapse:collapse'>
                                <tr>
                                    <td>A: $aDatos[establecimiento_a]
                                </tr>
                                <tr>
                                    <td>De: $aDatos[establecimiento_de]
                                </tr>
                            </table>
                        <td align=center>$aDatos[id_afiliacion]
                        <td align=center>$aDatos[numero_afilacion]
                        


                       
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
                            <td class='txt'>20. Lactancia Materna</td>
                            <td></td>
                            <td class='txt'>26 y 31. Tipo de Consulta</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class='txt'>27. Tipo de Consulta del Especialista</td>
                            <td></td>
                            <td class='txt' colspan='3'>36. Tipo de Discapacidad</td>
                            <td></td>
                            <td class='txt'>40. Ingreso Hospitalario</td>
                        </tr>
                        <tr>
                            <td rowspan='2'>Evaluar en ni&ntilde;os (as) de 5 a 6 meses de edad<br>
                                en la inscripci&oacute;n o control infantil
                            </td>
                            <td></td>
                            <td rowspan='2'>
                                <ol>
                                    <li>Primera Vez
                                    <li>Subsecuente
                                </ol>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan='2'>
                                <ol>
                                    <li>Primera Vez
                                    <li>Subsecuente
                                </ol>
                            </td>
                            <td></td>
                            <td colspan='3' rowspan='3'>
                                <ol>
                                    <li>F&iacute;sica
                                    <li>Auditiva
                                    <li>Visual
                                    <li>Mental
                                    <li>Con m&aacute; de una discapacidad
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td rowspan='2'>
                                Esto aplica solamente si es una<br>
                                attenci&oacute;n a nivel hospitalario
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>&nbsp;</td> 
                        </tr>
                        <tr>
                            <td rowspan='2'>
                                <ol>
                                    <li>Exclusiva
                                    <li>Predominante o Complementaria
                                    <li>Sin lactancia
                                </ol>
                            </td>
                            <td>&nbsp;</td>
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
                            <td>&nbsp;</td>
                            <td></td>
                            <td>&nbsp;</td>
                            <td class='txt'>28. Sospecha</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td>&nbsp;</td>
                            <td class='txt'>41. Tipo: Referencia / Interconsulta</td>           
                        </tr>
                        <tr>
                            <td colspan='5' class='txt' align='center' bgcolor='#A4A4A4'>Planificaci&oacute;n Familiar</td>
                            <td></td>
                            <td rowspan='4'>
                                Aplica solamente para consultas de<br>
                                primera vez del diagn&oacute;stico principal<br>
                                y de enfermedades o eventos sujetos<br>
                                a vigilacia epidemiol&oacute;dica
                            </td>
                            <td></td>
                            <td colspan='3' class='txt' align=center bgcolor='#A4A4A4'>Ateci&oacute;n por Violencia</td>
                            <td></td>
                            <td rowspan='2'>
                                <ol>
                                    <li>Referencia
                                    <li>Interconsulta
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
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
                        </tr>
                        <tr>
                            <td class='txt'>21. Inscripci&oacute;n/Control</td>
                            <td></td>
                            <td class='txt'>22. Tipo de M&eacute;todo</td>
                            <td></td>
                            <td class='txt'>23. Usuarias Activas</td>
                            <td></td>
                            <td></td>
                            <td class='txt'>37. Tipo</td>
                            <td>&nbsp;</td>
                            <td class='txt'>38. Ambito</td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td rowspan='2'>
                                <ol>
                                    <li>Inscripci&oacute;n
                                    <li>Control Normal
                                    <li>Control por Morbilidad
                                </ol>
                            </td>
                            <td></td>
                            <td rowspan='4'>
                                <ol>
                                    <li>Inyectable
                                    <li>Oral
                                    <li>Barrera
                                    <li>Dispositivos Intrauterino
                                    <li>Natural
                                    <li>Intradermico
                                    <li>Otro
                                </ol>
                            </td>
                            <td></td>
                            <td rowspan='4'>
                                <ol>
                                    <li>Inyectable
                                    <li>Oral
                                    <li>Barrera
                                    <li>Dispositivos Intrauterino
                                    <li>Natural
                                    <li>Intradermico
                                    <li>Otro
                                </ol>
                            </td>
                            <td></td>
                            <td></td>
                            <td rowspan='3'>
                                <ol>
                                    <li>F&iacute;sica
                                    <li>Psicol&oacute;gica
                                    <li>Sexual
                                    <li>M&aacute;s de una
                                </ol>
                            </td>
                            <td></td>
                            <td rowspan='2'>
                                <ol>
                                    <li>Intrafamiliar
                                    <li>Comunidad
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td class='txt'>43. Afiliaci&oacute;n (Tipo)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>&nbsp;</td>
                            <td rowspan='4'>
                                <ol>
                                    <li>Cotizante ISSS
                                    <li>Beneficiario ISSS
                                    <li>Veterano de Guerra
                                    <li>Cotizante ISBM
                                    <li>Beneficiario ISBM
                                    <li>Cotizante IPSFA
                                    <li>Beneficiario IPSFA
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
                        </tr>
                        <tr>
                            <td class='txt'>24. Detecci&oacute;n Precoz del C&aacute;ncer</td>
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
                            <td rowspan='4'>
                                <ol>
                                    <li>Toma de Citolog&iacute;a vaginal de 1a. Vez en la vida
                                    <li>Toma de Citolog&iacute;a vaginal subsecuente del programa
                                    <li>Ex&aacute;men de Pr&oacute;stata
                                    <li>Inspecci&oacute;n visual con Acido Acetico (IVAA)
                                    <li>Virus Papiloma Humano (VPH)
                                    <li>Ex&aacute;men de mama
                                </ol>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class='txt' colspan='3'>39. Procedimiento de Salud Mental</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan='3' colspan='3'>
                                <ol>
                                    <li>Prueba Psicom&eacute;trica
                                    <li>Psicoterapia Individual
                                    <li>Intervenci&oacute;n en Crisis
                                    <li>Primeros Auxilios Psicol&oacute;gicos 
                                </ol>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </table>
               <table align=center style='width:1800px;' border=0>  
                    <tr>
                        <td align=center><br> <br>______________________________________</td>
                        <td align=center><br> <br>______________________________________</td>
                    </tr>
                    <tr>
                        <td style='width:900px;' align=center>Firma y Sello</td>
                        <td style='width:900px;' align=center>Especalidad</td>
                    </tr>
               </table>
               <table>  
                    <tr>
                        <td>";$paginacion->render();echo"</td>
                    </tr>
               </table>
       </body>";

?>






