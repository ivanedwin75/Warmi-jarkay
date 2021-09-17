<?php
	$id_denuncia = $_POST["#txtid_denuncia"];
	$ofi_fiscalia = $_POST["#txtofifiscalia"];
	$ofi_juzgado = $_POST["#txtofijuzgado"];
	$niv_riesgo = $_POST["#txtniv_riesgo"];
	
	$exp_fiscalia = $_POST["#txtexp_fiscalia"];
	$fiscalia = strtoupper($_POST["#txtfiscalia"]);
	$fiscal = strtoupper($_POST["#txtfiscal"]);
	$f_fiscalia = $_POST("#txtf_fiscalia");

	$exp_juzgado = $_POST["#txtexp_juzgado"];
	$juzgado = strtoupper($_POST["#txtjuzgado"]);
	$juez = strtoupper($_POST["#txtjuez"]);
	$f_juzgado = $_POST("#txtf_juzgado");
	
	$den_scan = $_POST("txtden_scan");
	$dem_elec = $_POST("txtdem_elec");
	$med_prot = $_POST("txtdem_prot");
	$instructor = $_POST["#txtinstructor"];

	require '../../modelo/modelo_institucion.php';
	$MC = new Modelo_institucion();
	$consulta = $MC->Registrar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$exp_fiscalia,$fiscalia,$fiscal,$f_fiscalia,
	$exp_juzgado,$juzgado,$juez,$f_juzgado,$den_scan,$dem_elec,$med_prot,$instructor);
	echo $consulta;
?>