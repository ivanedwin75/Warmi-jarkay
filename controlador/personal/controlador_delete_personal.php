<?php
	require_once '../../FirePHPCore/FirePHP.class.php';
	ob_start();
	$firephp = FirePHP::getInstance(TRUE);

	$id_personal = $_POST["id_personal"];
	$firephp->log($id_personal);
	//$id_denuncia = '1';
	require '../../modelo/modelo_personal.php';
	$MC = new Modelo_personal();

	$consulta = $MC->delete_personal($id_personal);
	$firephp->log($consulta);

	echo $consulta;
?>