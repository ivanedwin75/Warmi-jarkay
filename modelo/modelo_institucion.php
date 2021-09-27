<?php
	class Modelo_institucion
	{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}
		
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
		$exp_juzgado,$juzgado,$juez,$f_juzgado,$den_scan,$dem_elec,$per_psico,
		$certi_med,$cem,$saw,$social_cem,$med_prot,$instructor){
			$sql = "UPDATE denuncia SET N_oficio_fiscalia='$ofi_fiscalia',N_oficio_juzgado='$ofi_juzgado',
			Nivel_riesgo='$niv_riesgo',Fiscalia='$fiscalia',Fiscal_nombre='$fiscal',F_fiscalia='$f_fiscalia',
			N_exp_juzgado='$exp_juzgado',Juzgado='$juzgado',Juez_nombre='$juez',F_juzgado='$f_juzgado',
			Denuncia_scan='$den_scan',Demanda_electronica='$dem_elec',Pericia_psico='$per_psico',Cert_med_leg='$certi_med',Cert_cem='$cem',Cert_saw='$saw',
			Social_cem='$social_cem',efectivos_id_efectivos= (SELECT efectivos.id_efectivos FROM efectivos WHERE efectivos.Dni = '$instructor')
			WHERE denuncia.id_denuncia='$id_denuncia'";
			//$sql = "CALL PA_REGISTRARDENUNCIA('$id_denuncia','$ofi_fiscalia','$ofi_juzgado','$niv_riesgo','$fiscalia','$fiscal','$f_fiscalia','$exp_juzgado','$juzgado','$juez','$f_juzgado','$den_scan','$dem_elec','$per_psico','$certi_med','$cem','$saw','$social_cem','$med_prot','$instructor')";
			
			$resultado = $this->conexion->conexion->query($sql);
			//echo $sql;
			
			if ($resultado == TRUE){
				return 1234;
			}
			else{
				echo ($this->conexion->conexion->errno);
				return 55555;
				
			}
			$this->conexion->Cerrar_Conexion();
		}

		function listar_institucion($valor, $inicio=FALSE,$limite=FALSE){
			
			if ($inicio!==FALSE && $limite!==FALSE) {
			    $sql = "SELECT denuncia.id_denuncia,denuncia.Expediente_comisaria,victima.Dni, CONCAT(victima.Nombres,' ',victima.Ap_paterno,' ',victima.Ap_materno),victima.F_registro
				FROM denuncia INNER JOIN victima ON victima.id_victima = denuncia.victima_id_victima
				where victima.Dni like '".$valor."%' ORDER BY victima.Dni DESC LIMIT $inicio,$limite";
			}else{
			    $sql = "SELECT denuncia.id_denuncia,denuncia.Expediente_comisaria,victima.Dni, CONCAT(victima.Nombres,' ',victima.Ap_paterno,' ',victima.Ap_materno),victima.F_registro
				FROM denuncia INNER JOIN victima ON victima.id_victima = denuncia.victima_id_victima
				where victima.Dni like '".$valor."%' ORDER BY victima.Dni DESC";
			}
			$resultado =  $this->conexion->conexion->query($sql);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
 		}

		function get_denuncia($denuncia){
			$sql = "SELECT * FROM denuncia where id_denuncia = $denuncia";
			$resultado = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$consulta_VU=mysqli_fetch_array($resultado);
			//while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			//	$arreglo[] = $consulta_VU;
			//}
			//echo "<script language='javascript'>alert('goooo');</script>";
			return $consulta_VU;
			
			$this->conexion->cerrar();
		}

 		function listar_institucionremitente($valor, $inicio=FALSE,$limite=FALSE){
			if ($inicio!==FALSE && $limite!==FALSE) {
			    $sql = "SELECT * FROM institucion where inst_estado = 'ACTIVO' AND inst_nombre like '".$valor."%' ORDER BY inst_nombre DESC LIMIT $inicio,$limite";
			}else{
			    $sql = "SELECT * FROM institucion where inst_estado = 'ACTIVO' AND inst_nombre like '".$valor."%' ORDER BY inst_nombre DESC";
			}
			$resultado =  $this->conexion->conexion->query($sql);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
 		}
	}	
?>