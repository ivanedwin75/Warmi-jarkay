<?php
	require_once '../../FirePHPCore/FirePHP.class.php';
	ob_start();
	$firephp = FirePHP::getInstance(TRUE);
	$firephp->log($persona);

	
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
					$arch_den_scan_path = $path.strtolower($arch_den_scan_final);
					move_uploaded_file($arch_den_scan_tmp, "../../../$arch_den_scan_path");
				}
			}
			else{
				$arch_den_scan_path= $_POST['txtden_scan'];
			}
	
			
			if($_FILES['arch_dem_elec']){
				$arch_dem_elec = $_FILES['arch_dem_elec']['name'];
				$arch_dem_elec_tmp = $_FILES['arch_dem_elec']['tmp_name'];
				$arch_dem_elec_ext = strtolower(pathinfo($arch_dem_elec, PATHINFO_EXTENSION));
				$arch_dem_elec_final = rand(1000,1000000).$arch_dem_elec;
				if (in_array($arch_dem_elec_ext, $valid_extensions)){
					$arch_dem_elec_path = $path.strtolower($arch_dem_elec_final); 
					move_uploaded_file($arch_dem_elec_tmp, "../../../$arch_dem_elec_path");
				}
			}
			else{
				$arch_dem_elec_path = $_POST['txtdem_elec'];
			}

			if($_FILES['arch_cem']){
				$arch_cem = $_FILES['arch_cem']['name'];
				$arch_cem_tmp = $_FILES['arch_cem']['tmp_name'];
				$arch_cem_ext = strtolower(pathinfo($arch_cem, PATHINFO_EXTENSION));
				$arch_cem_final = rand(1000,1000000).$arch_cem;
				if(in_array($arch_cem_ext, $valid_extensions)){
					$arch_cem_path = $path.strtolower($arch_cem_final); 
					move_uploaded_file($arch_cem_tmp,$arch_cem_path);
				}
			}
			else{
				$arch_cem_path = $_POST['CEM'];
			}


			if($_FILES['arch_saw']){
				$arch_saw = $_FILES['arch_saw']['name'];
				$arch_saw_tmp = $_FILES['arch_saw']['tmp_name'];
				$arch_saw_ext = strtolower(pathinfo($arch_saw, PATHINFO_EXTENSION));
				$arch_saw_final = rand(1000,1000000).$arch_saw;
				if(in_array($arch_saw_ext, $valid_extensions)){
					$arch_saw_path = $path.strtolower($arch_saw_final); 
					move_uploaded_file($arch_saw_tmp,$arch_saw_path);
				}
			}
			else{
				$arch_saw_path = $_POST['SAW'];
			}


			if($_FILES['arch_social_cem']){
				$arch_social_cem = $_FILES['arch_social_cem']['name'];
				$arch_social_cem_tmp = $_FILES['arch_social_cem']['tmp_name'];
				$arch_social_cem_ext = strtolower(pathinfo($arch_social_cem, PATHINFO_EXTENSION));
				$arch_social_cem_final = rand(1000,1000000).$arch_social_cem;
				if(in_array($arch_social_cem_ext, $valid_extensions)){
					$arch_social_cem_path = $path.strtolower($arch_social_cem_final);
					move_uploaded_file($arch_social_cem_tmp,$arch_social_cem_path);
				}
			}
			else{
				$arch_social_cem_path = $_POST['Social_CEM'];
			}

			if($_FILES['arch_med_prot']){
				$arch_med_prot = $_FILES['arch_med_prot']['name'];
				$arch_med_prot_tmp = $_FILES['arch_med_prot']['tmp_name'];
				$arch_med_prot_ext = strtolower(pathinfo($arch_med_prot, PATHINFO_EXTENSION));
				$arch_med_prot_final = rand(1000,1000000).$arch_med_prot;
				if(in_array($arch_med_prot_ext, $valid_extensions)){
					$arch_med_prot_path = $path.strtolower($arch_med_prot_final); 
					move_uploaded_file($arch_dem_scan_tmp,$arch_dem_scan_path);
				}
			}
			else{
				$arch_med_prot_path = $_POST['txtmed_prot'];
			}
			
    } 


	$id_denuncia = $_POST['txtid_denuncia'];
	$ofi_fiscalia = strtoupper($_POST['txtofifiscalia']);
	$ofi_juzgado = strtoupper($_POST['txtofijuzgado']);
	$niv_riesgo = $_POST['niv_riesgo'];

	$fiscalia = $_POST['txtfiscalia'];
	$fiscal = strtoupper($_POST['txtfiscal']);
	$f_fiscalia = $_POST['txtf_fiscalia'];

	$exp_juzgado = strtoupper($_POST['txtexp_juzgado']);
	$juzgado = $_POST['txtjuzgado'];
	$juez = strtoupper($_POST['txtjuez']);
	$f_juzgado = $_POST['txtf_juzgado'];

	$den_scan = $arch_den_scan_path;


	$dem_elec = $arch_dem_elec_path;

	$per_psico = $_POST['Per_psico'];
	$certi_med = $_POST['certi_med'];
	$at_facultativa = $_POST['at_facultativa'];
	$incap_medico = $_POST['incap_medico'];
	$cem_label = $_POST['CEM_label'];
	$cem = $arch_cem_path;
	$saw_label = $_POST['SAW_label'];

	$saw = $arch_saw_path;
	$social_label = $_POST['Social_CEM_label'];
	$social_cem = $arch_social_cem_path;
	$med_prot = $arch_med_prot_path;
	
	$instructor = $_POST['txtinstructor'];	

	$MC = new Modelo_institucion();
	$consulta = $MC->Editar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$fiscalia,$fiscal,$f_fiscalia,$exp_juzgado,$juzgado,$juez,$f_juzgado,
	$den_scan,$dem_elec,$per_psico,$certi_med,$at_facultativa,$incap_medico,$cem_label,$cem,$saw_label,$saw,$social_label,
	$social_cem,$med_prot,$instructor);
	echo $consulta;

	//echo($consulta1);

	//$consulta2 = $MC->Editar_juzgado($id_denuncia,$exp_juzgado,$juzgado,$juez,$f_juzgado,$dem_elec);
	//$consulta3 = $MC->Editar_fiscalia($id_denuncia,$fiscalia,$fiscal,$f_fiscalia);
	//$consulta4 = $MC->Editar_pericias($id_denuncia,$per_psico,$certi_med,$at_facultativa,$incap_medico,$cem_label,$cem,$saw_label,$saw,$social_label,$social_cem,$med_prot);

		
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

class Modelo_institucion{
	private $conexion;
	function __construct()
	{
		require_once('../../modelo/modelo_conexion.php');
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	function Editar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$fiscalia,$fiscal,$f_fiscalia,
		$exp_juzgado,$juzgado,$juez,$f_juzgado,$den_scan,$dem_elec,$per_psico,$certi_med,
		$at_facultativa,$incap_medico,$cem_label,$cem,$saw_label,$saw,$social_label,$social_cem,$med_prot,$instructor){
			$sql = "UPDATE denuncia SET N_oficio_fiscalia='$ofi_fiscalia',N_oficio_juzgado='$ofi_juzgado',
			Nivel_riesgo='$niv_riesgo',Fiscalia='$fiscalia',Fiscal_nombre='$fiscal',F_fiscalia='$f_fiscalia',
			N_exp_juzgado='$exp_juzgado',Juzgado='$juzgado',Juez_nombre='$juez',F_juzgado='$f_juzgado',
			Denuncia_scan='$den_scan',Demanda_electronica='$dem_elec',Pericia_psico='$per_psico',Cert_med_leg='$certi_med',
			At_facultativa='$at_facultativa',Incapacidad_medico='$incap_medico',Cem_label='$cem_label',Cert_cem='$cem',
			Sau_label='$saw_label',Cert_saw='$saw',Social_cem_label='$social_label',Social_cem='$social_cem',Medidas_proteccion='$med_prot',
			efectivos_id_efectivos= (SELECT efectivos.id_efectivos FROM efectivos WHERE efectivos.Dni = '$instructor')
			WHERE denuncia.id_denuncia='$id_denuncia'";
			//$sql = "CALL PA_REGISTRARDENUNCIA('$id_denuncia','$ofi_fiscalia','$ofi_juzgado','$niv_riesgo','$fiscalia','$fiscal','$f_fiscalia','$exp_juzgado','$juzgado','$juez','$f_juzgado','$den_scan','$dem_elec','$per_psico','$certi_med','$cem','$saw','$social_cem','$med_prot','$instructor')";
			
			//echo $sql;
			
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				//echo ($this->conexion->conexion->errno);
				return 0;
				
			}
			$this->conexion->conectar();
		}
}
?>