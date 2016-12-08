<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Supervisor as Supervisor;
	use Models\Carrera as Carrera;
	use Models\Usuario as Usuario;

	$supervisores = new supervisoresController();

	class supervisoresController{

		public function __construct(){
			$this->supervisores = new Supervisor();
			$this->carreras = new Carrera();
			$this->usuarios = new Usuario();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->supervisores->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->supervisores->set("idUsuario", $this->custom->sanitizeTexto($_POST['idUsuario']));
				$this->supervisores->set("idCarrera", $this->custom->sanitizeTexto($_POST['idCarrera']));
				$datos = $this->supervisores->add();
				if ($datos['_existe'] == 0) {
					$this->custom->message("success");
				}elseif ($datos['_existe'] == 1) {
					$this->custom->message("find");
				}
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->supervisores->set("idSupervisor", $this->custom->sanitizeTexto($id));
				if ($this->supervisores->delete() == "fail") {
					$this->custom->message("fail");
					return $this->view($id);
				}else{
					$this->custom->message("deleted");
				}
			}else{
				return $this->view($id);
			}
		}

		public function view($id){
			$this->supervisores->set("idSupervisor", $this->custom->sanitizeTexto($id));
			return $this->supervisores->view();
		}

		public function allUsuarioSupervisor(){
			return $this->usuarios->allSupervisor();
		}

		public function allCarrera(){
			return $this->carreras->all();
		}

	}

?>