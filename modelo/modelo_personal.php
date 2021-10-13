<?php
	class Modelo_personal
	{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function Registrar_personal($nombre,$apepat,$apemat,$cargo,$dni,$movil,$correo){
			$sql = "call PA_REGISTRARPERSONAL('$nombre','$apepat','$apemat','$cargo','$dni','$movil','$correo')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function Editar_personal($id_personal,$cargo,$apePat,$apeMat,$nombre,$dni,$movil,$email){
			$sql = "call PA_EDITARPERSONAL('$id_personal','$cargo','$apePat','$apeMat','$nombre','$dni','$movil','$email')";
			if ($this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function listar_personal($valor, $inicio=FALSE,$limite=FALSE){
			if ($inicio!==FALSE && $limite!==FALSE) {
			    $sql = "SELECT efectivos.id_efectivos, efectivos.Cargo, efectivos.Ap_paterno, efectivos.Ap_materno, efectivos.Nombres, efectivos.Dni, efectivos.Cel, efectivos.Correo FROM efectivos where efectivos.Dni like '".$valor."%' ORDER BY efectivos.id_efectivos DESC LIMIT $inicio,$limite";
			}else{
			    $sql = "SELECT efectivos.id_efectivos, efectivos.Cargo, efectivos.Ap_paterno, efectivos.Ap_materno, efectivos.Nombres, efectivos.Dni, efectivos.Cel, efectivos.Correo FROM efectivos where efectivos.Dni like '".$valor."%' ORDER BY efectivos.id_efectivos DESC";
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
			$sql = "SELECT * from efectivos where efectivos.Dni = '$dni'";
				
			if ($this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();	

		}
		//borrrrrrrrrrrrrarrrrrr
		function listar_combotipousuario(){
				$sql = "SELECT * from tipo_usuario where tipusu_estado = 'ACTIVO'";
				
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