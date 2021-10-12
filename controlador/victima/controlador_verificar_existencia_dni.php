<?php
	$dni = $_POST["dni"];
	require '../../modelo/modelo_victima.php';
	$MC = new Modelo_victima();
	$consulta = $MC->buscar_dni($dni);
	echo $consulta;
?>