<?php
	class Modelo_usu_victima{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}

        function listar_comisaria($id_victima){
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
			CONCAT_WS(' ', efectivos.Cargo, efectivos.Ap_paterno, efectivos.Ap_materno, efectivos.Nombres)
			FROM denuncia INNER JOIN efectivos 
			ON denuncia.efectivos_id_efectivos = efectivos.id_efectivos 
			WHERE denuncia.victima_id_victima = '$id_victima'";
            
			$resultado = $this->conexion->conexion->query($sql);
			//$arreglo = array();
			$consulta_VU=mysqli_fetch_array($resultado);
			return $consulta_VU;
			
			$this->conexion->cerrar();
        }

		function get_nombre($id_victima){
            $sql = "SELECT 
			CONCAT_WS(' ', victima.Ap_paterno, victima.Ap_materno, victima.Nombres),
			victima.Edad
			FROM victima
			WHERE victima.id_victima = '$id_victima'";
            
			$resultado = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
        }

		function get_btn_panic($id_victima){
            $sql = "SELECT 
			CONCAT_WS(' ', victima.Ap_paterno, victima.Ap_materno, victima.Nombres),
			victima.Dni, victima.Edad, victima.Cel, victima.Est_civil, victima.Direccion
			FROM victima
			WHERE victima.id_victima = '$id_victima'";
            
			$resultado = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
        }

	}	
?>