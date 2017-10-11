<?php

if(isset($_GET["idUsuEditar"])){
$id_foto=$_GET["idUsuEditar"];
   
   echo "<script>
						window.open('foto.php?idUsuEditar=$id_foto','ventana01','width=600px, height=400px');
						window.location.replace('home1.php');
						</script>";
						}


?>