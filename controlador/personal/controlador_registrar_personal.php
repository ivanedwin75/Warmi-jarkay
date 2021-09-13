<?php
	
	$apepat = $_POST["apepat"];
	$apemat = $_POST["apemat"];
	$nombre = $_POST["nombre"];
	$cargo  = $_POST["cargo"];
	$dni    = $_POST["dni"];
	$movil  = $_POST["movil"];
	$correo = $_POST["correo"];
	
	include '../../modelo/modelo_personal.php';
	$MC = new Modelo_personal();
	$consulta = $MC->Registrar_personal($nombre,$apepat,$apemat,$cargo,$dni,$movil,$correo);
	echo $consulta;
?>