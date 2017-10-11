<?php
class conexion{
var $serv="localhost";
var $usuario="nahum";
var $contra="villalta";
var $conexi;
function conecta()
{
$s=$this->serv;
$u=$this->usuario;
$c=$this->contra;
$conex=mysql_connect($s,$u,$c);
$this->conexi=$conex;
}

}
$cono= new conexion();
$cono->conecta();
$c=$cono->conexi;
$select=mysql_select_db("unidad_perquin",$c);
?>

