<?php
	require_once '../../FirePHPCore/FirePHP.class.php';
	ob_start();
	$firephp = FirePHP::getInstance(TRUE);

	$id_asesor = $_POST["id_asesor"];
	$firephp->log($id_asesor);
	//$id_denuncia = '1';
	require '../../modelo/modelo_area.php';
	$MC = new modelo_area();

	$consulta = $MC->delete_asesor($id_asesor);
	$firephp->log($consulta);

	echo $consulta;
?>