<?php namespace Models;

	class Materia{

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
			$sql = "Call addMateria('{$this->clave}', '{$this->nombre}', '{$this->creditos}', '{$this->nivel}', '{$this->optativa}', '{$this->Carrera_idCarrera}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editMateria('{$this->clave}', '{$this->nombre}', '{$this->creditos}', '{$this->nivel}', '{$this->optativa}', '{$this->Carrera_idCarrera}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteMateria('{$this->clave}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewMateria('{$this->clave}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allMateria()";
			return $this->con->consultaRetorno($sql);
		}

		public function allFiltro(){
			$sql = "Call allMateriaFiltro('{$this->n1}', '{$this->cp}', '{$this->lrc}', '{$this->lni}')";
			return $this->con->consultaRetorno($sql);
		}

	}

?>