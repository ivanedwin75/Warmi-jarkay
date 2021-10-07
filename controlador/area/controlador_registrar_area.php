<?php
	$idasesor		= $_POST["idasesor"];
	$profesion		= strtoupper($_POST["profesion"]);
	$apepat			= strtoupper($_POST["apepat"]);
	$apemat			= strtoupper($_POST["apemat"]);
	$nombre			= strtoupper($_POST["nombre"]);
	$email			= $_POST["email"];
	$movil			= $_POST["movil"];
    
	require '../../modelo/modelo_area.php';
	$MC = new Modelo_area();
	$consulta = $MC->Registrar_areas($idasesor,$profesion,$apepat,$apemat,$nombre,$email,$movil);
	echo $consulta;
?>