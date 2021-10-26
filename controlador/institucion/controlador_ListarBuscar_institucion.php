<?php
require_once '../../FirePHPCore/FirePHP.class.php';
ob_start();
$firephp = FirePHP::getInstance(TRUE);
$firephp->log("Esta funcionando LISTAR");
	  include '../../modelo/modelo_institucion.php';
    $boton = $_POST['boton'];
    //$boton = 'buscar';
    if($boton==='buscar'){
      $inicio = 0;
      $limite = 5;
      if(isset($_POST['pagina'])){
        $pagina = $_POST['pagina'];
        $inicio = ($pagina -1) * $limite;
      }
      //$ident = $_POST['ident'];
      $valor = $_POST['valor'];
      $instancia = new Modelo_institucion();
      $a = $instancia->listar_institucion($valor);
      $b = count($a);
      $c = $instancia->listar_institucion($valor,$inicio,$limite);
      $firephp->log($a);
      echo json_encode($c)."*".$b;
    }
?>