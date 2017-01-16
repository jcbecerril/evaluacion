<?php namespace Models;

	class SendEmail{

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
			$sql = "Call addSendEmail('{$this->grupo_idGrupo}', '{$this->semana}')";
			return $this->con->consultaSimple($sql);
		}

		public function find(){
			$sql = "Call findSendEmail('{$this->grupo_idGrupo}', '{$this->semana}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

	}

?>