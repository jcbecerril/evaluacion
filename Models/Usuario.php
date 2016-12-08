<?php namespace Models;

	class Usuario{

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
			$sql = "Call addUsuario('{$this->nombre}', '{$this->email}', '{$this->user}', '$this->pass', '{$this->idRol}', @_existe)";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function edit(){
			$sql = "Call editUsuario('{$this->idUsuario}', '{$this->nombre}', '{$this->email}', '{$this->pass}', '{$this->idRol}', '{$this->accion}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "Call deleteUsuario('{$this->idUsuario}')";
			return $this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "Call viewUsuario('{$this->idUsuario}')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		public function all(){
			$sql = "Call allUsuario()";
			return $this->con->consultaRetorno($sql);
		}

		/* loginController */
		public function login(){
			$sql = "Call login('{$this->user}', '$this->pass')";
			$datos = $this->con->consultaRetorno($sql);
			return mysqli_fetch_assoc($datos);
		}

		/* supervisorController */
		public function allSupervisor(){
			$sql = "Call allUsuarioSupervisor(3)";
			return $this->con->consultaRetorno($sql);
		}

	}

?>