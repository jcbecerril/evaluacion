<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Periodo as Periodo;

	class periodosController{

		public function __construct(){
			$this->periodos = new Periodo();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->periodos->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->periodos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$datos = $this->periodos->add();
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
				$this->periodos->set("idPeriodo", $this->custom->sanitizeTexto($id));
				$this->periodos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->periodos->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->periodos->set("idPeriodo", $this->custom->sanitizeTexto($id));
				if ($this->periodos->delete() == "fail") {
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
			$this->periodos->set("idPeriodo", $this->custom->sanitizeTexto($id));
			return $this->periodos->view();
		}

	}

?>