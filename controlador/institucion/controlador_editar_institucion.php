<?php
	require '../../modelo/modelo_institucion.php';	
	//print_r($_FILES);
	//echo $tmp;
    //echo "<img src='$path' />";


	$valid_extensions = array('pdf'); // valid extensions    
	$path = 'Archivo/'; // upload directory
    if($_FILES['arch_den_scan'] || $_FILES['arch_dem_elec'] || 
		$_FILES['arch_cem'] || $_FILES['arch_saw'] || $_FILES['arch_social_cem'] || 
		$_FILES['arch_med_prot'] ){
			
			if ($_FILES['arch_den_scan']){
				$arch_den_scan = $_FILES['arch_den_scan']['name'];
				$arch_den_scan_tmp = $_FILES['arch_den_scan']['tmp_name'];
				$arch_den_scan_ext = strtolower(pathinfo($arch_den_scan, PATHINFO_EXTENSION));
				$arch_den_scan_final = rand(1000,1000000).$arch_den_scan;
				if(in_array($arch_den_scan_ext, $valid_extensions)){
					$arch_den_scan_path = $arch_den_scan_path.strtolower($arch_den_scan_final);
					move_uploaded_file($arch_den_scan_tmp,$arch_den_scan_path);
				}
			}
			if($_FILES['arch_dem_elec']){
				$arch_dem_elec = $_FILES['arch_dem_elec']['name'];
				$arch_dem_elec_tmp = $_FILES['arch_dem_elec']['tmp_name'];
				$arch_dem_elec_ext = strtolower(pathinfo($arch_dem_elec, PATHINFO_EXTENSION));
				$arch_dem_elec_final = rand(1000,1000000).$arch_dem_elec;
				if (in_array($arch_dem_elec_ext, $valid_extensions)){
					$arch_dem_elec_path = $arch_dem_elec_path.strtolower($arch_dem_elec_final); 
					move_uploaded_file($arch_dem_elec_tmp,$arch_dem_elec_path);
				}
			}
			if($_FILES['arch_cem']){
				$arch_cem = $_FILES['arch_cem']['name'];
				$arch_cem_tmp = $_FILES['arch_cem']['tmp_name'];
				$arch_cem_ext = strtolower(pathinfo($arch_cem, PATHINFO_EXTENSION));
				$arch_cem_final = rand(1000,1000000).$arch_cem;
				if(in_array($arch_cem_ext, $valid_extensions)){
					$arch_cem_path = $arch_cem_path.strtolower($arch_cem_final); 
					move_uploaded_file($arch_cem_tmp,$arch_cem_path);
				}
			}
			if($_FILES['arch_saw']){
				$arch_saw = $_FILES['arch_saw']['name'];
				$arch_saw_tmp = $_FILES['arch_saw']['tmp_name'];
				$arch_saw_ext = strtolower(pathinfo($arch_saw, PATHINFO_EXTENSION));
				$arch_saw_final = rand(1000,1000000).$arch_saw;
				if(in_array($arch_saw_ext, $valid_extensions)){
					$arch_saw_path = $arch_saw_path.strtolower($arch_saw_final); 
					move_uploaded_file($arch_saw_tmp,$arch_saw_path);
				}
			}
			if($_FILES['arch_social_cem']){
				$arch_social_cem = $_FILES['arch_social_cem']['name'];
				$arch_social_cem_tmp = $_FILES['arch_social_cem']['tmp_name'];
				$arch_social_cem_ext = strtolower(pathinfo($arch_social_cem, PATHINFO_EXTENSION));
				$arch_social_cem_final = rand(1000,1000000).$arch_social_cem;
				if(in_array($arch_social_cem_ext, $valid_extensions)){
					$arch_social_cem_path = $arch_social_cem_path.strtolower($arch_social_cem_final);
					move_uploaded_file($arch_social_cem_tmp,$arch_social_cem_path);
				}
			}
			if($_FILES['arch_med_prot']){
				$arch_med_prot = $_FILES['arch_med_prot']['name'];
				$arch_med_prot_tmp = $_FILES['arch_med_prot']['tmp_name'];
				$arch_med_prot_ext = strtolower(pathinfo($arch_med_prot, PATHINFO_EXTENSION));
				$arch_med_prot_final = rand(1000,1000000).$arch_med_prot;
				if(in_array($arch_med_prot_ext, $valid_extensions)){
					$arch_med_prot_path = $arch_med_prot_path.strtolower($arch_med_prot_final); 
					move_uploaded_file($arch_dem_scan_tmp,$arch_dem_scan_path);
				}
			}

        DEBUGGER;
    } 
	
	$id_denuncia = strtoupper($_POST["id_denuncia"]);
	$ofi_fiscalia = strtoupper($_POST["ofi_fiscalia"]);
	$ofi_juzgado = strtoupper($_POST["ofi_juzgado"]);
	$niv_riesgo = $_POST["niv_riesgo"];
	
	$fiscalia = $_POST["fiscalia"];
	$fiscal = strtoupper($_POST["fiscal"]);
	$f_fiscalia = $_POST["f_fiscalia"];

	$exp_juzgado = strtoupper($_POST["exp_juzgado"]);
	$juzgado = $_POST["juzgado"];
	$juez = strtoupper($_POST["juez"]);
	$f_juzgado = $_POST["f_juzgado"];

	$den_scan = $arch_den_scan_path;
	$dem_elec = $arch_dem_elec_path;

	$per_psico = $_POST["per_psico"];
	$certi_med = $_POST["certi_med"];
	$at_facultativa = $_POST["at_facultativa"];
	$incap_medico = $_POST["incap_medico"];
	$cem_label = $_POST["cem_label"];
	$cem = $arch_cem_path;
	$saw_label = $_POST["saw_label"];
	$saw = $arch_saw_path;
	$social_label = $_POST["social_label"];
	$social_cem = $arch_social_cem_path;
	$med_prot = $arch_med_prot_path;
	
	$instructor = $_POST["instructor"];

	$MC = new Modelo_institucion();
	$consulta1 = $MC->Editar_den_comisaria($id_denuncia,$instructor,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$den_scan);
	$consulta2 = $MC->Editar_juzgado($id_denuncia,$exp_juzgado,$juzgado,$juez,$f_juzgado,$dem_elec);
	$consulta3 = $MC->Editar_fiscalia($id_denuncia,$fiscalia,$fiscal,$f_fiscalia);
	$consulta4 = $MC->Editar_pericias($id_denuncia,$per_psico,$certi_med,$at_facultativa,$incap_medico,$cem_label,$cem,$saw_label,$saw,$social_label,$social_cem,$med_prot);

		
/*	
	$id_denuncia = "4";
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
	$at_facultativa = "";
	$incap_medico = "";
	$cem_label = "";
	$cem = "";
	$saw_label = "";
	$saw = "";
	$social_label = "";
	$social_cem = "";
	$med_prot = "";
	
	$instructor = "01233444";
*/
/*
	
*/
/*
	$consulta = $MC->Editar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$fiscalia,$fiscal,$f_fiscalia,$exp_juzgado,$juzgado,$juez,$f_juzgado,
	$den_scan,$dem_elec,$per_psico,$certi_med,$at_facultativa,$incap_medico,$cem_label,$cem,$saw_label,$saw,$social_label,
	$social_cem,$med_prot,$instructor);
	echo $consulta;
	*/



//call PA_REGISTRARDENUNCIA('1',NULL,"JUZ001",NULL,"Primera fiscalia",NULL,"1990-01-01",NULL,NULL,NULL,"1990-01-01",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
//$consulta = $MC->Editar_denuncia("1","","JUZ001","","Segunda fiscalia","Aldo Carlos Suca Acuta","1990-01-01",
//"","","","1990-01-01","","","","","","","","","1");
/*
	
*/
?>