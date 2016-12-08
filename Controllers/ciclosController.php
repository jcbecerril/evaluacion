<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Ciclo as Ciclo;

	class ciclosController{

		public function __construct(){
			$this->ciclos = new Ciclo();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->ciclos->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->ciclos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$datos = $this->ciclos->add();
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
				$this->ciclos->set("idCiclo", $this->custom->sanitizeTexto($id));
				$this->ciclos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->ciclos->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->ciclos->set("idCiclo", $this->custom->sanitizeTexto($id));
				if ($this->ciclos->delete() == "fail") {
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
			$this->ciclos->set("idCiclo", $this->custom->sanitizeTexto($id));
			return $this->ciclos->view();
		}

	}

?>