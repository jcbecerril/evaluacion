<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Rol as Rol;

	class rolesController{

		public function __construct(){
			$this->roles = new Rol();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->roles->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->roles->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$datos = $this->roles->add();
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
				$this->roles->set("idRol", $this->custom->sanitizeTexto($id));
				$this->roles->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->roles->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else {
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->roles->set("idRol", $this->custom->sanitizeTexto($id));
				if ($this->roles->delete() == "fail") {
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
			$this->roles->set("idRol", $this->custom->sanitizeTexto($id));
			return $this->roles->view();
		}

	}

?>