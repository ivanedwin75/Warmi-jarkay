<?php
//Controlador BOTON DE PANICO
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
session_start();

    $id_victima = $_SESSION['idusu']; // id de la victima tabla victima
        $firephp->log($id_victima);

	include '../../modelo/modelo_usu_victima.php';
    $MC = new Modelo_usu_victima();
    $consulta = $MC->get_btn_panic($id_victima);
        $firephp->log($consulta);

    $nombre = $consulta[0][0];
    $dni = $consulta[0][1];
    $edad = $consulta[0][2];
    $movil = $consulta[0][3];
    $civil = $consulta[0][4];
    $direcc = $consulta[0][5];


    //$etiqueta = $_POST['etiqueta'];

    $destino ="alex_stelman07@hotmail.com, martinjzc77@gmail.com, comisariahuascarpnp@gmail.com, calizaya1997c@gmail.com, LIZ_199625@HOTMAIL.COM, quispecalderonolgaesmeralda@gmail.com";
    $asunto = "ALERTA COMISARIA";
    $cabeceras = "From: comisaria.huascar.puno@gmail.com";
    $cuerpo =" ALERTA BOTÓN DE PÁNICO
    El sistema de registro de denuncias Warmi Jark'ay le notifica que un
    ciudadano recurrió al botón de pánico, sus datos son los siguientes :<br>
    <b>Nombre:</b>$nombre<br>
    <b>DNI :</b>$dni<br>
    <b>Edad:</b>$edad<br>
    <b>Celular:</b>$movil<br>
    <b>Estado civil:</b>$civil<br>
    <b>Dirección:</b>$direcc<br>

    COMISARIA PNP HUASCAR <hr>";
    
    $firephp->log($destino);
    $firephp->log($cuerpo);

    mail($destino,$asunto,$cuerpo,$cabeceras); 
?>