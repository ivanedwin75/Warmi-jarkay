<?php
	$exp		= $_POST["exp"];
	$nombre 	= $_POST["nombre"];
	$apepat 	= $_POST["apepat"];
	$apemat 	= $_POST["apemat"];
	$estcivil 	= $_POST["estcivil"];
	$edad 		= $_POST["edad"];
	$dni 		= $_POST["dni"];
	$movil  	= $_POST["movil"];
	$direcc 	= $_POST["direcc"];
	$fecha 		= $_POST["fecha"];

	include '../../modelo/modelo_victima.php';
	$MC = new Modelo_victima();
	$consulta = $MC->Registrar_victima($exp,$nombre,$apepat,$apemat,$estcivil,$edad,$dni,$movil,$direcc,$fecha);
	echo $consulta;
?>