<?php
session_start();
require('config.php');

?>
<script languaje=javascript>

//Voy a obtener un numero aleatorio de segundos, para que la recarga se realice a intervalos irregulares
function aleatorio(inferior,superior){
numPosibilidades = superior - inferior
aleat = Math.random() * numPosibilidades
aleat = Math.floor(aleat)
return parseInt(inferior) + aleat
}
num_aleatorio = aleatorio(50, 90)


//ahora voy a generar un string para enviarlo por parámetro a esta misma página
//el parámetro lo pasaremos por URL.
//No haremos nada con ese dato, pero como cada vez será distinto, nos asegura que el navegador siempre solocitará al servidor la página, en vez de mostrar otra vez la que tiene en caché
//utilizaremos la fecha y tiempo para generar el dato
miFecha = new Date()
dato_url = miFecha.getYear().toString() + miFecha.getMonth().toString() + miFecha.getDate().toString() + miFecha.getHours().toString() + miFecha.getMinutes().toString() + miFecha.getSeconds().toString()


//para recargar la página con un retardo utilizaremos la función setTimeout()
//recibe el primer parámetro la instrucción que se quiere ejecutar
//segundo parámetro es el tiempo en milisegundos que se quiere esperar
setTimeout("window.location='reporte.doctores.php?perquin=" + dato_url + "'", num_aleatorio * 1000)

function fechaActualn(){
      $dia = date("d");
      $mes = date("m");
      $anio = date("o");
     
      $fechaActual = "$dia-$mes-$anio";
      return $fechaActual;
    }

</script>


<?php
if (!isset($_SESSION["admi"])){
        echo "<script>alert('Zona No Autorizada, Inicie Sesion');
        location.replace('index.php');</script>";
    }
    $user=$_SESSION["admi"];
    //consulta para obtener el nombre del administrador
interfaz();
conectar();
$comando ="select * from usuario where nombre_user='$user'";
$consulta =mysql_query($comando); 
$aDatos= mysql_fetch_array($consulta);
$id_doc=$aDatos["cod_doctor"];
$id_usuario = $aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$apellido=$aDatos["apellido_usuario"];
$foto =$aDatos["foto"];
$actual =$aDatos["actual"];
$estado =$aDatos["estado"];
//fin de consulta administrador

//condicion para saber si ya ha sido desactivado el usuario
 if($estado== 0){
    session_destroy();
    $con= "UPDATE usuario SET actual = 0 WHERE id_usuario='$id_usuario'";
$consu=mysql_query($con);
    echo "<script>alert('Su usuario a sido Desactivado');
    location.replace('index.php');</script>";
  }
//fin de condicion

echo "<html>
		<head>
			<title>Reporte de Usuarios</title>
			<meta http-equiv='conten-type' content='text/html; charset=utf-8'>
            <script> window.print();</script>

		</heads>


   
        <body>
            <table align=center style='width:800px;'>
                <tr>
                    <td colspan=2 align=center><h3>Unidad de Salud perquin Morazan<b></b></td>
                </tr>
                <tr>
                    <td colspan=2 align=center><h3>REPORTE DE USUARIOS<b></b></td>
                </tr>
             </table>";              
        //tabla para mostrar datos de los usuarios
echo "

<table  align='center' width='900px'>    
    <tr class='linea'>
        <td align='center' width='40px'>Foto</td>
        <td align='center' width='30px'>ID</td>
        <td align='center' width='100px'>Nombre Completo</td>
        <td align='center'width='103px'>Nombre Usuario</td>
        <td align='center'width='103px'>Telefono</td>
        <td align='center'width='130px'>Estado</td>
        <td align='center'width='103px'>Tipo Usuario</td>
        <td align='center'width='103px'>Direccion</td>
        <td align='center'width='103px'>DUI</td>
        <td align='center'width='103px'>Cod Doctor</td>
       
    </tr>       
";

//consulta para obtener todos los datos de los usuarios
    $comando ="select 
usuario.id_usuario,
usuario.nombre_user,
usuario.estado,
usuario.nivel_usuario,
usuario.telefono,
usuario.direccion,
usuario.dui,
usuario.nombre_usuario,
usuario.apellido_usuario,
usuario.cod_doctor,
usuario.direccion,
usuario.foto
from 
usuario,doctor 
where doctor.cod_doctor=usuario.cod_doctor ";
    $consulta =mysql_query($comando);
while($aDatos= mysql_fetch_array($consulta)){
 
$id_usuario=$aDatos["id_usuario"];
$nombre=$aDatos["nombre_usuario"];
$nombre_user2=$aDatos["nombre_user"];
$apellido=$aDatos["apellido_usuario"];
$telefono=$aDatos["telefono"];
$dui=$aDatos["dui"];
$cod_doctor=$aDatos["cod_doctor"];
$nivel_usuario=$aDatos["nivel_usuario"];
$direccion=$aDatos["direccion"];
$foto2=$aDatos["foto"];


echo "
    <tr>";
    if($foto2 == '1'){
    echo"<td ><img src=\"fotoUsuario/".$id_usuario.".jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";
}else{
    echo"<td ><img src=\"iconos/m.jpg\" width=\"70\" height=\"70\" alt=\"\"></td>";

}
echo"
    <td > $id_usuario</td>
    <td > $nombre $apellido</td>
    <td > $nombre_user2</td>
    <td > $telefono</td>

    ";
    
    if($estado==1){
         echo "<td>Activo</td>";
    }else{
         echo "<td>Inactivo</td>";
    }

    if($nivel_usuario==1){
       echo "<td>Administrador</td>";
    }
    if($nivel_usuario==2){
       echo "<td>Doctor</td>";
    }
    if($nivel_usuario==3){
       echo "<td>Enfermera</td>";
    }
    if($nivel_usuario==4){
       echo "<td>Farmacia</td>";
    }
   echo"<td >$direccion</td>
        <td >$dui</td>
        <td>$cod_doctor</td>


   ";
}

echo" </table>
<table align='center'
<tr><td><h3>Usuario:$nombre $apellido<br></td></tr>
  <tr>
                    <td align=center><br> <br>______________________________________</td>
                    
                </tr>
                <tr>
                    <td style='width:900px;' align=center>Firma y Sello</td>
            

    </h3>
</tr>
";


?>
