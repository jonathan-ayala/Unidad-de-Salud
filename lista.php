<?php
require("config.php");
 
		 
conectar();
		 
		 
    function institucion() {
        $comando ="select * from institucion ";
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='institucion' class='select' id='institucion'><option value=0>Seleccione</option> ";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
           		$T.="<option value='$aDatos[id_institucion]'> $aDatos[nombre_institucion]</option>";
			}
		}
		$T.="</select>";
		return $T;
	}
    $rinstitucion = institucion();
		 
		 





	function recurso() {
			$comando ="select * from recurso ";
			conectar();
			$consulta = mysql_query ($comando);
			$filas = mysql_num_rows($consulta);
			$T ="<select name='recurso' class='select' id='recurso'><option value=0>Seleccione</option>";
			if ($filas==0){
	        	$T.= "<option value=''>No se encuentran registros</option>";
			}else{
				while($aDatos = mysql_fetch_array($consulta)){
	        		$T.="<option value='$aDatos[id_recurso]'> $aDatos[recurso]</option>";
			  	}
			}
			$T.="</select>";
			return $T;
		}
		$rrecurso = recurso();
		 
		 



	

	function tipo_servicio() {
		$comando ="select * from tipo_servicio ";	 
		conectar(); 
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='tipo_servicio' class='select' id='tipo_servicio'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
           		$T.="<option value='$aDatos[id_servicio]'> $aDatos[servicio]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rtipo_servicio = tipo_servicio();







	function estrategia() {
			$comando ="select * from estrategia ";	 
			conectar();
			$consulta = mysql_query ($comando);
			$filas = mysql_num_rows($consulta);
			$T ="<select name='estrategia' id='estrategia' class='select'><option value=0>Seleccione</option>";
			if ($filas==0){
	        	$T.= "<option value=''>No se encuentran registros</option>";
			}else{
				while($aDatos = mysql_fetch_array($consulta)){
					$T.="<option value='$aDatos[id_estrategia]'> $aDatos[estrategia]</option>";
			  	}
			}
			$T.="</select>";
			return $T;
		}
		$restrategia = estrategia();














		 
	function lactancia() {
	    $comando ="select * from lactancia_materna ";
	    conectar();
	    $consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
	    $T ="<select name='lactancia' id='lactancia'><option value=0>Seleccione</option>";
	    if ($filas==0){
	        $T.= "<option value=''>No se encuentran registros</option>";
		}else{
	         while($aDatos = mysql_fetch_array($consulta)){
	            $T.="<option value='$aDatos[id_lactancia_Materna]'> $aDatos[tipo_lactancia]</option>";
			 }
	    }
	    $T.="</select>";
		return $T;
	}
	$rlactancia = lactancia();
	


		 


		 
	function planificacionI() {
	 	$comando ="select * from planificacion_familiar where tipo_planificacion='i'";
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='planificacionI' id='planificacionI'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
        		$T.="<option value='$aDatos[id_planificacion]'> $aDatos[descripcion_planificacion]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rplanificacionI = planificacionI();
		 
		 





	function planificacionT() {
		$comando ="select * from planificacion_familiar where tipo_planificacion='t'";
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='planificacionT' id='planificacionT'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
           		$T.="<option value='$aDatos[id_planificacion]'> $aDatos[descripcion_planificacion]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rplanificacionT = planificacionT();
		





		 
	function planificacionU() {
	 	$comando ="select * from planificacion_familiar where tipo_planificacion='u'";
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='planificacionU' id='planificacionU'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
        		$T.="<option value='$aDatos[id_planificacion]'> $aDatos[descripcion_planificacion]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rplanificacionU = planificacionU();

		 



		 
		 		 
	
	function referencia() {
		$comando ="select * from referencia_interconsulta ";	 
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='referencia' id='referencia'><option value=0>Seleccione</option> ";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
        		$T.="<option value='$aDatos[id_referencia]'> $aDatos[referencia_interconsulta]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rreferencia = referencia();
		 






		 
	function salud_mental() {
		$comando ="select * from salud_mental ";	 
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='salud_mental' id='salud_mental'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
        		$T.="<option value='$aDatos[id_procedimiento]'> $aDatos[tipo_procedimiento]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rsalud_mental = salud_mental();

		 





	function lafiliacion() {
		$comando ="select * from tipo_afiliacion ";	 
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='tipo_afiliacion' id='tipo_afiliacion'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
        		$T.="<option value='$aDatos[id_afiliacion]'> $aDatos[dato_afiliacion]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
	$rafiliacion = lafiliacion();

	





		 
	function tipo_consulta() {
		$comando ="select * from tipo_consulta ";	 
		conectar();
		$consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
		$T ="<select name='tipo_consulta' id='tipo_consulta'><option value=0>Seleccione</option>";
		if ($filas==0){
        	$T.= "<option value=''>No se encuentran registros</option>";
		}else{
			while($aDatos = mysql_fetch_array($consulta)){
           		$T.="<option value='$aDatos[id_tipo_consulta]'> $aDatos[descripcion]</option>";
		  	}
		}
		$T.="</select>";
		return $T;
	}
    $rtipo_consulta = tipo_consulta();
		 






function interfaz2(){
	echo"
		<html>
		<head>
			<title>UNIDAD DE PERQUIN</title>
			<link rel='stylesheet' type='text/css' href='estilo.css' />
		</head>
		<body>
			<div class='pagina2'>

	";
}
function piedx2(){
	echo"
		</div>
		<div class='pie'>
			<p>Derechos Reservados, Unidad de Salud <br>
            Con sede en Perquìn, Morazàn, El Salvador 2014</p>
		</div>
		</html>
	";
}




		 
    function linscripcion() {
        $comando ="select * from inscripcion ";
		conectar();
        $consulta = mysql_query ($comando);
		$filas = mysql_num_rows($consulta);
        $T ="<select style='width:200px' name='inscripcion' id='inscripcion'><option value=0>Seleccione</option>";
		if ($filas==0){
            $T.= "<option value=''>No se encuentran registros</option>";
		}else{
            while($aDatos = mysql_fetch_array($consulta)){
            $ins= $aDatos["inscripcion"] ;
            $T.="<option value='$aDatos[id_inscripcion]'> $ins</option>";
		    }
		}
    $T.="</select>";
  	return $T;
    }
	$rinscripcion = linscripcion();








		 
		  //listado de atencion_violencia1
    function lviolencia() {
	    $comando ="select * from atencion_violencia where tipo_atencion_violencia='T'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $lviolencia ="<select name='violenciaT' id='violenciaT'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $lviolencia.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $lviolencia.="<option value='$aDatos[id_atencion_violencia]'> $aDatos[descripcion_violencia]</option>";
		    }
	    }
	    $lviolencia.="</select>";
	    return $lviolencia;
    }
    $rviolencia = lviolencia();








    //listado de atencion_violencia2
    function lviolencia1() {
	    $comando ="select * from atencion_violencia where tipo_atencion_violencia='A'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $lviolencia ="<select name='violenciaA' id='violenciaA'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $lviolencia.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $lviolencia.="<option value='$aDatos[id_atencion_violencia]'> $aDatos[descripcion_violencia]</option>";
		    }
	    }
	    $lviolencia.="</select>";
	    return $lviolencia;
    }
    $rviolencia1 = lviolencia1();







    //listado de control_subsecuente
    function lsubsecuente() {
	    $comando ="select * from control_subsecuente";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $lsubsecuente ="<select style='width:200px' name='subsecuente' id='subsecuente'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $lsubsecuente.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $lsubsecuente.="<option value='$aDatos[id_control_subsecuente]'> $aDatos[tipo_control]</option>";
		    }
	    }
	    $lsubsecuente.="</select>";
	    return $lsubsecuente;
    }
    $rsubsecuente = lsubsecuente();








    //listado de departamento
    function ldepartamento() {
	    $comando ="select * from departamento";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldepartamento ="<select name='departamento' id='departamento'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldepartamento.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldepartamento.="<option value='$aDatos[id_departamento]'> $aDatos[departamento]</option>";
		    }
	    }
	    $ldepartamento.="</select>";
	    return $ldepartamento;
    }
    $rdepartamento = ldepartamento();







    //listado de deteccion_cancer
    function lcancer() {
	    $comando ="select * from deteccion_cancer";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $lcancer ="<select name='cancer' id='cancer'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $lcancer.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $lcancer.="<option value='$aDatos[id_deteccion_cancer]'> $aDatos[descripcion_deteccion_cancer]</option>";
		    }
	    }
	    $lcancer.="</select>";
	    return $lcancer;
    }
    $rcancer = lcancer();







    //listado de discapacidad
    function ldiscapacidad() {
	    $comando ="select * from discapacidad";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='discapacidad' id='discapacidad'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_discapacidad]'> $aDatos[descripcion_discapacidad]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rdiscapacidad = ldiscapacidad();







    //listado de dispensarizacion
    function ldispensarizacion() {
	    $comando ="select * from dispensarizacion where indicador_dispensarizacion='G'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='dispensarizacionG' id='dispensarizacionG'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_dispensarizacion]'> $aDatos[descripcion_dispensarizacion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rdispensarizacion = ldispensarizacion();






    //listado de dispensarizacion2
    function ldispensarizacion1() {
	    $comando ="select * from dispensarizacion where indicador_dispensarizacion='T'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='dispensarizacionT' id='dispensarizacionT'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_dispensarizacion]'> $aDatos[descripcion_dispensarizacion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rdispensarizacion1 = ldispensarizacion1();








    //listado de estado_nutricional1
    function lnutricional1() {
	    $comando ="select * from estado_nutricional where tipo_nutricion='Peso-Edad'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='nutricional1' id='nutricional1'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_estado_nutricional]'> $aDatos[descripcion_nutricion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rnutricional1 = lnutricional1();







    //listado de estado_nutricional2
    function lnutricional2() {
	    $comando ="select * from estado_nutricional where tipo_nutricion='Peso-Talla'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='nutricional2' id='nutricional2'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_estado_nutricional]'> $aDatos[descripcion_nutricion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rnutricional2 = lnutricional2();







    //listado de estado_nutricional3
    function lnutricional3() {
	    $comando ="select * from estado_nutricional where tipo_nutricion='Longitud/Talla-Edad'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='nutricional3' id='nutricional3'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_estado_nutricional]'> $aDatos[descripcion_nutricion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rnutricional3 = lnutricional3();







    //listado de estado_nutricional4
    function lnutricional4() {
	    $comando ="select * from estado_nutricional where tipo_nutricion='IMC'";
	    conectar();
	    $consulta = mysql_query ($comando);
	    $filas = mysql_num_rows($consulta);
	    $ldiscapacidad ="<select name='nutricional4' id='nutricional4'> <option value='0'>Seleccione</option>";
	    if ($filas==0){
    	    $ldiscapacidad.= "<option value=''>No se encuentran registros</option>";
	    }else{
		    while($aDatos = mysql_fetch_array($consulta)){
			    $ldiscapacidad.="<option value='$aDatos[id_estado_nutricional]'> $aDatos[descripcion_nutricion]</option>";
		    }
	    }
	    $ldiscapacidad.="</select>";
	    return $ldiscapacidad;
    }
    $rnutricional4 = lnutricional4();
		 
		 
?>

