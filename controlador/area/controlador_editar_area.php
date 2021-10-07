<?php
	$idasesor	= $_POST["idasesor"];
	$profesion	= $_POST["profesion"];
	$apepat		= strtoupper($_POST["apepat"]);
	$apemat		= strtoupper($_POST["apemat"]);
	$nombre		= strtoupper($_POST["nombre"]);
	$email		= $_POST["email"];
	$movil		= $_POST["movil"];

	require '../../modelo/modelo_area.php';
	$MC = new Modelo_area();
	$consulta = $MC->Editar_areas($idasesor,$profesion,$apepat,$apemat,$nombre,$email,$movil);
	echo $consulta;
?>