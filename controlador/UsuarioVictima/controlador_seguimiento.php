<?php
//Controlador para asesoria de  alimentos, debio decir asesoria pero hubo confusi[on]
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
session_start();

    $id_victima = $_SESSION['idusu']; // id de la victima tabla victima
    $firephp->log($id_victima);

    $consulta_asesoria = $_POST['consulta'];
    $movil = $_POST['movil'];
    $etiqueta = $_POST['etiqueta'];

	include '../../modelo/modelo_usu_victima.php';
    $MC = new Modelo_usu_victima();
    $consulta = $MC->get_nombre($id_victima);
    //$consulta = json_encode($consultiva);
    
    $firephp->log($consulta);
    $nombre = $consulta[0][0];
    $edad = $consulta[0][1];

    $destino ="sanchz15@hotmail.com";
    $asunto = "ALERTA COMISARIA";
    $cabeceras = "From: comisaria.huascar.puno@gmail.com";
    $cuerpo ="Hola, el sistema de registro de denuncias Warmi Jark'ay le notifica que un
    usuario requiere de asesoría legal, comuníquese con el ciudadano :<br>
    <b>Nombre:</b>$nombre<br>
    <b>Celular:</b>$movil<br>
    <b>Edad:</b>$edad<br>
    <b>Consulta:</b>
    <b>Consulta relacionada a </b> $etiqueta <br>
    </b>$consulta_asesoria<br>BUSCAR


    COMISARIA PNP HUASCAR <hr>";
    
    $firephp->log($destino);
    $firephp->log($cuerpo);

    //mail($destino,$asunto,$cuerpo,$cabeceras); 
?>