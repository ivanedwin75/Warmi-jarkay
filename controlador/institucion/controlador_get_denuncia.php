<?php
	require_once '../../FirePHPCore/FirePHP.class.php';
	ob_start();
	$firephp = FirePHP::getInstance(TRUE);


	$id_denuncia = $_POST["id_denuncia"];
	//$id_denuncia = '1';
	require '../../modelo/modelo_institucion.php';
	$MC = new Modelo_institucion();
	$consulta = $MC->get_denuncia($id_denuncia);
	$data = json_encode($consulta);
	//$firephp->log($data);

	echo $data;
?>