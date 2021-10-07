<?php
	class Modelo_area
	{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function Registrar_areas($idasesor,$profesion,$apepat,$apemat,$nombre,$email,$movil){
			$sql = "call PA_REGISTRARAREA('$idasesor','$profesion','$apepat','$apemat','$nombre','$email','$movil')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
		}
		function Editar_areas($idasesor,$profesion,$apepat,$apemat,$nombre,$email,$movil){
			$sql = "call PA_EDITARAREA('$idasesor','$profesion','$apepat','$apemat','$nombre','$email','$movil')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
		}
		function listar_areas($valor, $inicio=FALSE,$limite=FALSE){
			if ($inicio!==FALSE && $limite!==FALSE) {
			    $sql = "SELECT * FROM Asesor where Asesor.Ap_paterno like '".$valor."%' ORDER BY id_Asesor DESC LIMIT $inicio,$limite";
			}else{
			    $sql = "SELECT * FROM Asesor where Asesor.Ap_paterno like '".$valor."%' ORDER BY id_Asesor DESC";
			}
			$resultado =  $this->conexion->conexion->query($sql);
			$arreglo = array();
			while($consulta_VU=mysqli_fetch_array($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
			    $arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
 		}
 		function buscar_dni($dni){
				$sql = "SELECT * from personal where pers_dni = '$dni'";
				
				$arreglo = array();
				if ($consulta = $this->conexion->conexion->query($sql)) {

					while ($consulta_VU = mysqli_fetch_array($consulta)) {
						$arreglo[] = $consulta_VU;
					}
					return $arreglo;
					$this->conexion->cerrar();	
				}
		}
		function listar_comboarea(){
				$sql = "SELECT * FROM area WHERE area_estado = 'ACTIVO' ORDER BY area_cod DESC";
				
				$arreglo = array();
				if ($consulta = $this->conexion->conexion->query($sql)) {

					while ($consulta_VU = mysqli_fetch_array($consulta)) {
						$arreglo[] = $consulta_VU;
					}
					return $arreglo;
					$this->conexion->cerrar();	
				}
		}
	}
?>