<?php namespace Models;

	class Carrera{

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
			$sql = "Call addCarrera('{$this->nombre}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editCarrera('{$this->idCarrera}', '{$this->nombre}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteCarrera('{$this->idCarrera}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewCarrera('{$this->idCarrera}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allCarrera()";
			return $this->con->consultaRetorno($sql);
		}

	}

?>