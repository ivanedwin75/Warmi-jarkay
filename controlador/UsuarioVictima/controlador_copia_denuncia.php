<?php
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
session_start();
    $id_victima = $_SESSION['idusu']; // id de la victima tabla victima
    
    $movil = $_POST['movil'];
    $direccion = $_POST['direccion'];
    $referencia = $_POST['referencia'];

    include '../../modelo/modelo_usu_victima.php';
    $MC = new Modelo_usu_victima();
    $consulta = $MC->get_nombre($id_victima);
    //$consulta = json_encode($consultiva);
    
    $firephp->log($consulta);
    $nombre = $consulta[0][0];
    $edad = $consulta[0][1];

    $destino ="centenoeno@gmail.com, luyde101213@gmail.com, alex_stelman07@hotmail.com";
    $asunto = "ALERTA COMISARIA";
    $cabeceras = "From: comisaria.huascar.puno@gmail.com";
    $cuerpo ="Hola, el sistema de registro de denuncias Warmi Jark'ay le notifica que un
    usuario solicitó la copia simple de su denuncia verbal, comuníquese con el ciudadano y sirvase a atender su pedido.:<br>
    <b>Nombre:</b>$nombre<br>
    <b>Celular:</b>$movil<br>
    <b>Edad:</b>$edad<br>
    <b>Dirección:</b>$direccion<br>
    <b>Referencia:</b>$referencia<br>
    COMISARIA PNP HUASCAR <hr>";

    $firephp->log($destino);
    $firephp->log($cuerpo);

    mail($destino,$asunto,$cuerpo,$cabeceras);  
?>