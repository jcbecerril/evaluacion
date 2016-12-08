<?php namespace Models;

	class Evaluacion{

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
			$sql = "Call addEvaluacion('{$this->semana}', '{$this->indica1}', '{$this->indica2}', '{$this->indica3}', '{$this->indica4}', '{$this->indica5}', '{$this->obserG}', '{$this->img1}', '{$this->img2}', '{$this->img3}', '{$this->img4}', '{$this->img5}', '{$this->idGrupo}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editEvaluacion('{$this->semana}', '{$this->indica1}', '{$this->indica2}', '{$this->indica3}', '{$this->indica4}', '{$this->indica5}', '{$this->obserG}', '{$this->img1}', '{$this->img2}', '{$this->img3}', '{$this->img4}', '{$this->img5}', '{$this->idGrupo}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteEvaluacion('{$this->idGrupo}', '{$this->semana}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewEvaluacion('{$this->idGrupo}', '{$this->semana}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

	}

?>