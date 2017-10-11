<?php

require("config.php");
conectar();
$q=$_POST['q'];



$sql="select * from expediente where genero='F' and primer_Nombre LIKE '%$q%'";
$res=mysql_query($sql);

if(mysql_num_rows($res)==0){

echo "<b class='b'>No hay sugerencias</b>";

}else{

echo "<b class='b'>Sugerencias:</b><br />";
$primer_Nombre="";
$segundo_Nombre="";
$cod="";
while($fila=mysql_fetch_array($res)){
$primer_Nombre=$fila["primer_Nombre"];
$segundo_Nombre=$fila["segundo_Nombre"];
$cod=$fila["cod_expediente"];
echo "<a href='mapa.php?cod_Exp=$cod' class='link2' align='center'>$cod &nbsp; $primer_Nombre &nbsp; $segundo_Nombre &nbsp; </a><br>
	
";

}

}

?>