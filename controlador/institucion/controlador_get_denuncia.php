<?php
	$id_denuncia = $_POST["#txtid_denuncia"];
	
	require '../../modelo/modelo_institucion.php';
	$MC = new Modelo_institucion();
	$consulta = $MC->get_denuncia($id_denuncia);
	echo $consulta;
?>