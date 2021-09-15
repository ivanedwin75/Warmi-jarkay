<?php
	$id_personal  = $_POST["id_personal"];
	$cargo     	  = $_POST["cargo"];
	$apePat       = strtoupper($_POST["apepat"]);
	$apeMat       = strtoupper($_POST["apemat"]);
	$nombre       = strtoupper($_POST["nombre"]);
	$dni 		  = $_POST["dni"];
	$movil        = $_POST["movil"];
	$email        = $_POST["email"];
	require '../../modelo/modelo_personal.php';
	$MC = new Modelo_personal();
	$consulta = $MC->Editar_personal($id_personal,$cargo,$apePat,$apeMat,$nombre,$dni,$movil,$email);
	echo $consulta;
?>