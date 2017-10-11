<?php

session_start();

require("config.php");


if (!isset($_SESSION["registro"])){
		echo "<script>alert('Zona No Autorizada, Inicie Sesion');
		location.replace('index.php');</script>";
	}
	
	
	if ($_GET){
		$entrega=$_GET["entrega"];
		$expediente =$_GET["exp"];
		
		if ($entrega==1){
			$comando="UPDATE cola SET entrega_expediente = '2' WHERE id_cola ='$expediente'";
			
			}else{
				$comando="UPDATE cola SET entrega_expediente = '1' WHERE id_cola ='$expediente'";
				}
				
				conectar();
				if (mysql_query($comando)){
					echo "
					<script>
					location.replace('mostrar_cola_expediente.php');
					</script>
					";
					
					}
					
				
			
		}

	?>