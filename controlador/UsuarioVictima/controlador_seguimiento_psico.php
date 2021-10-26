<?php
//Controlador para asesoria de  alimentos, debio decir asesoria pero hubo confusi[on]
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
session_start();

    $id_victima = $_SESSION['idusu']; // id de la victima tabla victima
        $firephp->log($id_victima);
    $movil = $_POST['movil'];
    $etiqueta = $_POST['etiqueta'];

	include '../../modelo/modelo_usu_victima.php';
    $MC = new Modelo_usu_victima();
    $consulta = $MC->get_nombre($id_victima);
        $firephp->log($consulta);
    $nombre = $consulta[0][0];
    $edad = $consulta[0][1];

    $destino ="jusara.cs@gmail.com";
    $asunto = "ALERTA COMISARIA";
    $cabeceras = "From: comisaria.huascar.puno@gmail.com";
    $cuerpo ="Hola, el sistema de registro de denuncias Warmi Jark'ay le notifica que un
    usuario requiere de asesoría psicológica, comuníquese con el ciudadano :<br>
    <b>Factor </b> $etiqueta <br>
    <b>Nombre:</b>$nombre<br>
    <b>Celular:</b>$movil<br>
    <b>Edad:</b>$edad<br>

    COMISARIA PNP HUASCAR <hr>";
    
    $firephp->log($destino);
    $firephp->log($cuerpo);

    mail($destino,$asunto,$cuerpo,$cabeceras); 
?>