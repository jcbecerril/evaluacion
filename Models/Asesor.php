<?php namespace Models;

	class Asesor{

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
			$sql = "Call addAsesor('{$this->nombre}', '{$this->email}', '{$this->status}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editAsesor('{$this->idAsesor}', '{$this->nombre}', '{$this->email}', '{$this->status}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteAsesor('{$this->idAsesor}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewAsesor('{$this->idAsesor}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allAsesor()";
			return $this->con->consultaRetorno($sql);
		}

		public function allActivo(){
			$sql = "Call allAsesorActivo(1)";
			return $this->con->consultaRetorno($sql);
		}

	}

?>