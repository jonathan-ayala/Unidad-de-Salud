<?php
//Zona Horaria
    date_default_timezone_set("America/El_Salvador");
    
function conectar(){
	$servidor ="localhost";
	$usuario ="nahum";
	$password="villalta";
	$base="unidad_perquin";
	
	if (mysql_connect ($servidor,$usuario,$password)) {
		
		if (mysql_query("use $base")){
			$estado = "true";

		
			}else{
			
			
			}
		}else{
			$estado ="false";
		}
	return $estado;
	
	}

function fechaActual(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     $hora = date("h");
	 $minuto=date("i");
	 $segundo=date("s");
      $fechaActual = "$anio-$mes-$dia-$hora-$minuto-$segundo";
      return $fechaActual;
    }
	
	function fechaActual2p(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     $hora = date("h");
	 $minuto=date("i");
	 $segundo=date("s");
      $fechaActual = "$anio-$mes-$dia $hora:$minuto:$segundo";
      return $fechaActual;
    }
	
	function fechaActualn(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     
      $fechaActual = "$dia-$mes-$anio";
      return $fechaActual;
    }
	
	function fechai(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     
      $fechaActual = "$anio-$mes-$dia-00-00-00";
      return $fechaActual;
    }
	

	function fechaf(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     
      $fechaActual = "$anio-$mes-$dia-23-59-00";
      return $fechaActual;
    }

function sele() {
		 conectar();
		 $comando ="
		 select * from doctor";
		 $consultar = mysql_query ($comando);
		 $pais="<select name='doctor' class='caja' id='doctor'>";
		 while($aDatos = mysql_fetch_array($consultar)){
           
		  
		  $pais.="<option value='$aDatos[cod_doctor]'>$aDatos[nombre_doctor] $aDatos[apellido_doctor] </option>";
		  }
		  
		 $pais.="</select>";
		 return $pais;
		 
		 }
		 
function index(){
	echo"
		<html>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<head>
			<title>UNIDAD DE PERQUIN</title>
			<link rel='stylesheet' type='text/css' href='estilo.css' />
			<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
		</head>
		<body>
			<div class='sesion'>

		
	";
}

function interfaz(){
	echo"
		<html>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<head>
			<title>UNIDAD DE PERQUIN</title>
			<link rel='stylesheet' type='text/css' href='estilo.css' />
			<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
		</head>
		<body>
			<div class='pagina'>

	";
}

function piedx(){
	echo"
		</div>
		<div class='pie'>
			<p>Derechos Reservados, Unidad de Salud <br>
            Con sede en Perquìn, Morazàn, El Salvador 2014</p>
		</div>
		</html>
	";
}
function algo(){
echo"
	<script type='text/javascript' src='jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='jssor.js'></script>
    <script type='text/javascript' src='jssor.slider.js'></script>
    
    ";
}

?>