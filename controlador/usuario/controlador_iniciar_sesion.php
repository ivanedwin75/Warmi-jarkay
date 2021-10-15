<?php
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);

$usuario = $_POST['user']; //usuario
$pass = $_POST['pass']; //password
$usu = $_POST['t_usu']; //tipo de usuario
$idusu = $_POST['idusu']; //id usuario
$nom = $_POST['nom']; //nombre completo

	//$firephp->log($usuario);
	//$firephp->log($pass);
	//$firephp->log($nom);
	//$firephp->log($usu);

session_start();
$_SESSION['usuario'] = $usuario;
$_SESSION['pass'] = $pass;
$_SESSION['usu'] = $usu;
$_SESSION['idusu'] = $idusu;
$_SESSION['nombre_usuario'] = $nom; 
?>