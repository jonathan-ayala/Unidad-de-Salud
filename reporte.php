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
    echo "<html>
		<head>
			<title>Reporte de Consulta</title>
			<meta http-equiv='conten-type' content='text/html; charset=utf-8'>
            <script> window.print();</script>

		</heads>
        <body>
            <table align=center style='width:3500px;'  border=0>
                <tr>
                    
                    <td colspan=3 align=center><b>REP&Uacute;BLICA DE EL SALVADOR</b></td>
                    
        	      </tr>
                <tr>
                    <td ><b>SISTEMA NACIONAL DE SALUD</b></td>
                    <td ></td>
                    <td ></td>
                    
        	    </tr>
                <tr>
                    <td><b>REGISTRO DIARIO DE CONSULTA AMBULATORIA Y ATENCIONES PREVENTIVAS</b></td>
                    <td></td>
                    <td><table >
                            <tr>
                                <td style='width:130px;'><b>Fecha de Cosnulta</b></td>
                                <td style='width:130px;'></td>
                                <td style='width:130px;'><input type='checkbox' name='FOSALUD'/> </td>
                                <td style='width:130px;'>Formulario No.</td>
                                <td style='width:230px;'><input type='checkbox' name='Emergencia'/></td>

                            </tr>
                        </table> </td>
                    
        	    </tr>
                <tr>
                    <td style='width:1170px;'>
                        <table >
                            <tr>
                                <td style='width:130px;'><b>INSTITUCION</b></td>
                                <td style='width:130px;'><input type='checkbox' name='MINSAL'/> MINSAL</td>
                                <td style='width:130px;'><input type='checkbox' name='FOSALUD'/> FOSALUD</td>
                                <td style='width:130px;'>&nbsp;</td>
                                <td style='width:130px;'><b>SERVICIO</b></td>
                                <td style='width:160px;'><input type='checkbox' name='Externa'/> Consulta Externa</td>
                                <td style='width:130px;'><input type='checkbox' name='Emergencia'/> Emergencia</td>
                                <td style='width:130px;'><input type='checkbox' name='Extramural'/> Extramural</td>
                            </tr>
                        </table>
                      </td>
                    <td style='width:1170px;'>
                        <table >
                            <tr>
                                <td style='width:130px;'><b>ESTRATEGIA</b></td>
                                <td style='width:130px;'><input type='checkbox' name='MINSAL'/> Comunitaria</td>
                                <td style='width:160px;'><input type='checkbox' name='FOSALUD'/> Centro Educativo</td>
                                <td style='width:100px;'><input type='checkbox' name='Externa'/> Albergue</td>
                                <td style='width:230px;'><input type='checkbox' name='Emergencia'/>Otro establecimiento de Salud</td>

                            </tr>
                        </table>
                    </td style='width:1170px;'>
                    <td>
                    <table >
                            <tr>
                                <td style='width:130px;'><b>RECURSO</b></td>
                                <td style='width:130px;'><input type='checkbox' name='Medico'/> Medico</td>
                                <td style='width:160px;'><input type='checkbox' name='Enfermera'/> Enfermera</td>
                                <td style='width:100px;'><input type='checkbox' name='Nutricionista'/> Nutricionista</td>
                                <td style='width:230px;'><input type='checkbox' name='Psicologo'/>Psicologo</td>

                            </tr>
                        </table></td>
                    
        	    </tr>
                <tr>
                    <td >Establecimiento: <input type='text' style='width:500px;' name='establecimiento'/ ></td>
                    <td><b>Nombre del Local donde se desarrola la Estrategia <input type='text' style='width:500px;' name='Estrategia'</b></td>
                    <td></td>
                    
        	    </tr>
            </table>
		
        <table align=center style='width:3500px;' >
            <tr>
                <td ><br>
            <table border=1>
                <tr >
                    <td align=center rowspan='3'>No
                    <td align=center rowspan='3'>Mumero de Expediente Clinico
                    <td align=center rowspan='3'>Escuela Promotora de la Salud
                    <td align=center rowspan='3'>Sexo
                    <td align=center colspan='3'>Edad
                    <td align=center colspan='3'>Residencia
                    <td align=center rowspan='3'>Codigo de UCSF o UCSFE

                    <td align=center colspan='13'>Atenciones Preventivas
                    <td align=center rowspan='3'>Semanas de Amenorrea en Embarazadas

                    <td align=center colspan='10'>DIAGNOSTICO

                    <td align=center rowspan='3'>Tipo de Discapacidad
                    <td align=center colspan='2'>Atencion por Violecia

                    <td align=center rowspan='3'>Prodedimiento de Salud Mental
                    <td align=center rowspan='3'>Ingreso Hospitalario
                    <td align=center colspan='3'>Referencia / Interconsulta
                    <td align=center colspan='2'>Afiliacion
                </tr>

                <tr>
                    
                    
                    <td align=center rowspan='2'>Anos
                    <td align=center rowspan='2'>Meses
                    <td align=center rowspan='2'>Dias
                    <td align=center rowspan='2'>Departamento/Pais
                    <td align=center rowspan='2'>Municipio
                    <td align=center rowspan='2'>Area

                    <td align=center rowspan='2'>Inscripcion
                    <td align=center rowspan='2'>Control Subsecuente
                    <td align=center colspan='2'>Dispensarizacion
                    <td align=center colspan='4'>Estado Nutricional (Indices)
                    <td align=center rowspan='2'>Lactancia Materna
                    <td align=center colspan='3'>Planifacion Familiar (Metodos Temporales)
                    <td align=center>Dectencion Precos de Cancer
                    

                    <td align=center rowspan='2'>Tipo de Consulta
                    <td align=center rowspan='2'>Tipo de Consulta del Especialista
                    <td align=center rowspan='2'>Sospecha
                    <td align=center rowspan='2'>Principal
                    <td align=center rowspan='2'>Codigo CIE-10
                    <td align=center rowspan='2'>Tipo de Consulta
                    <td align=center rowspan='2'>Otras Afecciones
                    <td align=center rowspan='2'>Codigo CIE-10
                    <td align=center rowspan='2'>Causa externa de Morbilidad
                    <td align=center rowspan='2'>Codigo CIE-10

                    <td align=center rowspan='2'>Tipo
                    <td align=center rowspan='2'>Ambito

                    <td align=center rowspan='2'>Tipo
                    <td align=center rowspan='2'>A:
                    <td align=center rowspan='2'>De:
                    <td align=center rowspan='2'>Tipo
                    <td align=center rowspan='2'>Numero de Afiliacion
                </tr>
                <tr >
                    <td align=center>Grupo
                    <td align=center>Tipo
                    <td align=center>Peso-Edad
                    <td align=center>Longitud/Talla-Edad
                    <td align=center>Peso-Talla
                    <td align=center>Indice de Masa Corporal (IMC)
                    <td align=center>Inscripcion/Control
                    <td align=center>Tipo de Metodo
                    <td align=center>Usuarias activas
                    <td align=center>Citologias, Prostata e IVAA
                    
                </tr>

            ";
    if($nfilas!=0){
        $n=0;
        while($aDatos = mysql_fetch_array($consultas)){
            $n++;
            echo "
                <tr>
                    <td align=center>$n
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
                    <td align=center>$aDatos[establecimiento_a]
                    <td align=center>$aDatos[establecimiento_de]
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
       <table>  
            <tr>
                <td>";$paginacion->render();echo"</td>
            </tr>
       </table>
       </body>";

?>






