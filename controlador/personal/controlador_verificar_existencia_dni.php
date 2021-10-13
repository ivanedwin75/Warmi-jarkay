<?php
	$dni = $_POST["dni"];
	require '../../modelo/modelo_personal.php';
	$MC = new Modelo_personal();
	$consulta = $MC->buscar_dni($dni);
	echo $consulta;
?>