<?php 
$baseDatos="n260m_15572866_unidad_perquin";
$conecta = mysql_connect('localhost', 'root', ''); 
@mysql_query("create database if not exists $baseDatos");
if (!$conecta) { 
die('No conectat : ' . mysql_error()); 
} 
$db_selected = mysql_select_db('prueba2', $conecta); 
if (!$db_selected) { 
echo 'No es troba la base de dades',$db_selected,'<br/>'; 
die (mysql_error()); 
} 
else { 
$texto = file_get_contents("n260m_15572866_unidad_perquin.sql");

$sentencia = explode(";", $texto);
for($i = 0; $i < (count($sentencia)-1); $i++){
$db_selected = mysql_query ("$sentencia[$i];") or die(mysql_error()); 

}
} 
echo"
<script>alert('Base de Datos Restaurada');
location.replace('home.php');
</script>
";
?>