<?php
//CONTROLADOR DE SEGUIMIENTO!!!
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
session_start();
    $id_victima = $_SESSION['idusu']; // id de la victima tabla victima
    $firephp->log($id_victima);
	include '../../modelo/modelo_usu_victima.php';
    $MC = new Modelo_usu_victima();
    $consulta = $MC->listar_comisaria($id_victima);
    $firephp->log($consulta);

	$data = json_encode($consulta);

	echo $data;  
?>