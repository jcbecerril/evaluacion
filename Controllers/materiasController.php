<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Materia as Materia;
	use Models\Carrera as Carrera;

	$materias = new materiasController();

	class materiasController{

		public function __construct(){
			$this->materias = new Materia();
			$this->carreras = new Carrera();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->materias->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->materias->set("clave", $this->custom->sanitizeTexto($_POST['clave']));
				$this->materias->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->materias->set("creditos", $this->custom->sanitizeTexto($_POST['creditos']));
				$this->materias->set("nivel", $this->custom->sanitizeTexto($_POST['nivel']));
				$this->materias->set("optativa", $this->custom->sanitizeTexto($_POST['optativa']));
				$this->materias->set("Carrera_idCarrera", $this->custom->sanitizeTexto($_POST['idcarrera']));
				$datos = $this->materias->add();
				if ($datos['_existe'] == 0) {
					$this->custom->message("success");
				}elseif ($datos['_existe'] == 1) {
					$this->custom->message("find");
				}
				return $this->allCarrera();
			}else{
				return $this->allCarrera();
			}
		}

		public function editar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->materias->set("clave", $this->custom->sanitizeTexto($id));
				$this->materias->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->materias->set("creditos", $this->custom->sanitizeTexto($_POST['creditos']));
				$this->materias->set("nivel", $this->custom->sanitizeTexto($_POST['nivel']));
				$this->materias->set("optativa", $this->custom->sanitizeTexto($_POST['optativa']));
				$this->materias->set("Carrera_idCarrera", $this->custom->sanitizeTexto($_POST['idcarrera']));
				$this->materias->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->materias->set("clave", $this->custom->sanitizeTexto($id));
				if ($this->materias->delete() == "fail") {
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
			$this->materias->set("clave", $this->custom->sanitizeTexto($id));
			return $this->materias->view();
		}

		public function allCarrera(){
			return $this->carreras->all();
		}

	}

?>