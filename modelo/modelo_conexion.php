<?php
	class conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->contrasena = "";
			$this->basedatos = "bd_denmu";
		}
		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");
			/*
			if ($this->conexion->connect_errno){
				return "No conectado";
			}
			else {
				return "Conectadooooooo";
			}
			*/
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 