<?php
	class Modelo_datos{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}
		
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