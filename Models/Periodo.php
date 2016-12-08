<?php namespace Models;

	class Periodo{

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
			$sql = "Call addPeriodo('{$this->nombre}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editPeriodo('{$this->idPeriodo}', '{$this->nombre}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deletePeriodo('{$this->idPeriodo}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewPeriodo('{$this->idPeriodo}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allPeriodo()";
			return $this->con->consultaRetorno($sql);
		}

	}

?>