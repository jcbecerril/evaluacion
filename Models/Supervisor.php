<?php namespace Models;

	class Supervisor{

		public function __construct(){
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function add(){
			$sql = "Call addSupervisor('{$this->idUsuario}', '{$this->idCarrera}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function delete(){
			$sql = "Call deleteSupervisor('{$this->idSupervisor}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewSupervisor('{$this->idSupervisor}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allSupervisor()";
			return $this->con->consultaRetorno($sql);
		}

		public function allUsuario(){
			$sql = "Call allSupervisorFiltro('{$this->idUsuario}')";
			return $this->con->consultaRetorno($sql);
		}

	}

?>