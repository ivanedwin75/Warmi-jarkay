<?php
	class Modelo_institucion{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}
/*		
		function Registrar_denuncia($id_denuncia,$ofi_fiscalia,$ofi_juzgado,$niv_riesgo,$fiscalia,$fiscal,$f_fiscalia,
		$exp_juzgado,$juzgado,$juez,$f_juzgado,$den_scan,$dem_elec,$med_prot,$instructor){

			$sql = "call PA_REGISTRARDENUNCIA('$id_denuncia','$ofi_fiscalia','$ofi_juzgado','$niv_riesgo','$fiscalia','$fiscal','$f_fiscalia',
			'$exp_juzgado','$juzgado','$juez','$f_juzgado','$den_scan','$dem_elec','$med_prot','$instructor')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
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
			$this->conexion->Cerrar_Conexion();
		}
*/		
		function listar_institucion($valor, $inicio=FALSE,$limite=FALSE){
			
			if ($inicio!==FALSE && $limite!==FALSE) {
			    $sql = "SELECT denuncia.id_denuncia,victima.Dni, CONCAT(victima.Nombres,' ',victima.Ap_paterno,' ',victima.Ap_materno),victima.F_registro
				FROM denuncia INNER JOIN victima ON victima.id_victima = denuncia.victima_id_victima
				where victima.Dni like '".$valor."%' ORDER BY victima.Dni DESC LIMIT $inicio,$limite";
			}else{
			    $sql = "SELECT denuncia.id_denuncia,victima.Dni, CONCAT(victima.Nombres,' ',victima.Ap_paterno,' ',victima.Ap_materno),victima.F_registro
				FROM denuncia INNER JOIN victima ON victima.id_victima = denuncia.victima_id_victima
				where victima.Dni like '".$valor."%' ORDER BY victima.Dni DESC";
			}
			$resultado =  $this->conexion->conexion->query($sql);
			$consulta_VU=mysqli_fetch_array($resultado);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
 		}

		function get_denuncia($denuncia){
			$sql = "SELECT 
			denuncia.id_denuncia,
			denuncia.N_oficio_fiscalia,
			denuncia.N_oficio_juzgado,
			denuncia.Nivel_riesgo,
			denuncia.Fiscalia,
			denuncia.Fiscal_nombre,
			denuncia.F_fiscalia,
			denuncia.N_exp_juzgado,
			denuncia.Juzgado,
			denuncia.Juez_nombre,
			denuncia.F_juzgado,
			denuncia.Denuncia_scan,
			denuncia.Demanda_electronica,
			denuncia.Pericia_psico,
			denuncia.Cert_med_leg,
			denuncia.At_facultativa,
			denuncia.Incapacidad_medico,
			denuncia.Cem_label,
			denuncia.Cert_cem,
			denuncia.Sau_label,
			denuncia.Cert_saw,
			denuncia.Social_cem_label,
			denuncia.Social_cem,
			denuncia.Medidas_proteccion,
			efectivos.Dni 
			FROM denuncia INNER JOIN efectivos 
			ON denuncia.efectivos_id_efectivos = efectivos.id_efectivos 
			WHERE denuncia.id_denuncia = '$denuncia'";

			$resultado = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$consulta_VU=mysqli_fetch_array($resultado);
			//while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			//	$arreglo[] = $consulta_VU;
			//}
			return $consulta_VU;
			
			$this->conexion->cerrar();
		}

	}	
?>