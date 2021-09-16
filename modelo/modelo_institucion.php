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
		function Registrar_institucion($institucion,$tipo){
			$sql = "call PA_REGISTRARINSTITUCION('$institucion','$tipo')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
		}
		function Editar_institucion($codigo,$institucion,$tipo,$estado){
			$sql = "call PA_EDITARINSTITUCION('$codigo','$institucion','$tipo','$estado')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
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