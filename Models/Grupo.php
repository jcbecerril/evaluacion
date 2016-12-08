<?php namespace Models;

	class Grupo{

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
			$sql = "Call addGrupo('{$this->nombre}', '{$this->Materia_clave}', '{$this->Periodo_idPeriodo}', '{$this->Ciclo_idCiclo}', '{$this->Asesor_idAsesor}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editGrupo('{$this->idGrupo}', '{$this->nombre}', '{$this->Materia_clave}', '{$this->Periodo_idPeriodo}', '{$this->Ciclo_idCiclo}', '{$this->Asesor_idAsesor}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteGrupo('{$this->idGrupo}')";
			$verify = $this->con->consultaSimple($sql);
			return $verify;
		}

		public function view(){
			$sql = "Call viewGrupo('{$this->idGrupo}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allGrupo()";
			return $this->con->consultaRetorno($sql);
		}

		public function allFiltro(){
			$sql = "Call allGrupoFiltro('{$this->n1}', '{$this->cp}', '{$this->lrc}', '{$this->lni}')";
			return $this->con->consultaRetorno($sql);
		}

	}

?>