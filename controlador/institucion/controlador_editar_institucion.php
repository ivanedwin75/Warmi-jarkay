<?php
	require '../../modelo/modelo_institucion.php';
	$id_denuncia = strtoupper($_POST["id_denuncia"]);
	$ofi_fiscalia = strtoupper($_POST["ofi_fiscalia"]);
	$ofi_juzgado = strtoupper($_POST["ofi_juzgado"]);
	$niv_riesgo = strtoupper($_POST["niv_riesgo"]);
	
	$fiscalia = strtoupper($_POST["fiscalia"]);
	$fiscal = strtoupper($_POST["fiscal"]);
	$f_fiscalia = $_POST["f_fiscalia"];

	$exp_juzgado = strtoupper($_POST["exp_juzgado"]);
	$juzgado = strtoupper($_POST["juzgado"]);
	$juez = strtoupper($_POST["juez"]);
	$f_juzgado = $_POST["f_juzgado"];

	$den_scan = $_POST["den_scan"];
	$dem_elec = $_POST["dem_elec"];
	$per_psico = $_POST["per_psico"];
	$certi_med = $_POST["certi_med"];
	$cem = $_POST["cem"];
	$saw = $_POST["saw"];
	$social_cem = $_POST["social_cem"];
	$med_prot = $_POST["med_prot"];
	
	$instructor = $_POST["instructor"];
	/*	
	$id_denuncia = "1";
	$ofi_fiscalia = "";
	$ofi_juzgado = "JUZ000";
	$niv_riesgo = "";
	
	$fiscalia = "Primera fiscalia";
	$fiscal = "Suca Acuta Aldo Carlos";
	$f_fiscalia = "1990-01-01";
	
	$exp_juzgado = "JUZ100";
	$juzgado = "";
	$juez = "";
	$f_juzgado = "1990-01-01";
	
	$den_scan = "";
	$dem_elec = "";
	$per_psico = "http/aaa";
	$certi_med = "";
	$cem = "";
	$saw = "";
	$social_cem = "madox/";
	$med_prot = "";
	
	$instructor = "01233444";
	*/
	$MC = new Modelo_institucion();
	$consulta = $MC->Editar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$fiscalia,$fiscal,$f_fiscalia,$exp_juzgado,$juzgado,$juez,$f_juzgado,$den_scan,$dem_elec,$per_psico,$certi_med,$cem,$saw,$social_cem,$med_prot,$instructor);
	//echo $consulta;
	



//call PA_REGISTRARDENUNCIA('1',NULL,"JUZ001",NULL,"Primera fiscalia",NULL,"1990-01-01",NULL,NULL,NULL,"1990-01-01",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
//$consulta = $MC->Editar_denuncia("1","","JUZ001","","Segunda fiscalia","Aldo Carlos Suca Acuta","1990-01-01",
//"","","","1990-01-01","","","","","","","","","1");
/*
	
*/
?>