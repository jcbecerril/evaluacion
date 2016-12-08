<?php namespace Models;

	class Conexion{

		private $datos = array(
				"host" => "localhost",
				"user" => "root",
				"pass" => "",
				"db" => "evaluacion"
			);

		public function __construct(){
			$this->con = new \mysqli($this->datos['host'], $this->datos['user'], $this->datos['pass'], $this->datos['db']);
			if ($this->con->connect_errno) {
				echo "Falló la conexión a MySQL";
			}
		}

		public function consultaSimple($sql){
			if (!$this->con->query($sql)) {
				return "fail";
			}
		}

		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);
			mysqli_next_result($this->con);
			// mysqli_free_result ($datos);
			// mysqli_next_result ($this->con);
			// mysqli_close ($this->con);
			if ($datos) {
				return $datos;
			}else{
				return "fail";
			}
			mysqli_close($this->con);
		}

	}

?>