<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Asesor as Asesor;

	class asesoresController{

		public function __construct(){
			$this->asesores = new Asesor();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->asesores->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->asesores->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->asesores->set("email", $this->custom->sanitizeEmail($_POST['email']));
				if (isset($_POST['status'])) {
					$this->asesores->set("status", $this->custom->sanitizeTexto($_POST['status']));
				}else{
					$this->asesores->set("status", "");
				}
				$datos = $this->asesores->add();
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
				$this->asesores->set("idAsesor", $this->custom->sanitizeTexto($id));
				$this->asesores->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->asesores->set("email", $this->custom->sanitizeEmail($_POST['email']));
				if (isset($_POST['status'])) {
					$this->asesores->set("status", $this->custom->sanitizeTexto($_POST['status']));
				}else{
					$this->asesores->set("status", "");
				}
				$this->asesores->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else {
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->asesores->set("idAsesor", $this->custom->sanitizeTexto($id));
				if ($this->asesores->delete() == "fail") {
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
			$this->asesores->set("idAsesor", $this->custom->sanitizeTexto($id));
			return $this->asesores->view();
		}

	}


?>