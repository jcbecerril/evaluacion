<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Carrera as Carrera;

	class carrerasController{

		public function __construct(){
			$this->carreras = new Carrera();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->carreras->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->carreras->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$datos = $this->carreras->add();
				if ($datos['_existe'] == 0) {
					$this->custom->message("success");
				}elseif ($datos['_existe'] == 1) {
					$this->custom->message("find");
				}
			}
		}

		public function editar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->carreras->set("idCarrera", $this->custom->sanitizeTexto($id));
				$this->carreras->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->carreras->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->carreras->set("idCarrera", $this->custom->sanitizeTexto($id));
				if ($this->carreras->delete() == "fail") {
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
			$this->carreras->set("idCarrera", $this->custom->sanitizeTexto($id));
			return $this->carreras->view();
		}

	}

?>