<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Usuario as Usuario;
	use Models\Rol as Rol;

	$usuarios = new usuariosController();

	class usuariosController{

		public function __construct(){
			$this->usuarios = new Usuario();
			$this->roles = new Rol();

			$this->custom = new customController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->usuarios->all();
			if ($datos == "fail") {
				$this->custom->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->usuarios->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->usuarios->set("email", $this->custom->sanitizeEmail($_POST['email']));
				$this->usuarios->set("user", $this->custom->sanitizeTexto($_POST['user']));
				$pass = $this->custom->sanitizeTexto($_POST['pass']);
				$hash = $this->custom->encrypt($pass);
				$this->usuarios->set('pass', $hash);
				$this->usuarios->set("idRol", $this->custom->sanitizeTexto($_POST['rol']));
				$datos = $this->usuarios->add();
				if ($datos['_existe'] == 0) {
					$this->custom->message("success");
				}elseif ($datos['_existe'] == 1) {
					$this->custom->message("find");
				}
				return $this->allRol();
			}else{
				return $this->allRol();
			}
		}

		public function editar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->usuarios->set("idUsuario", $this->custom->sanitizeTexto($id));
				$this->usuarios->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->usuarios->set("email", $this->custom->sanitizeEmail($_POST['email']));
				if (empty($this->custom->sanitizeEmail($_POST['pass']))) {
					$this->usuarios->set("pass", '');
				}else {
					$pass = $this->custom->sanitizeTexto($_POST['pass']);
					$hash = $this->custom->encrypt($pass);
					$this->usuarios->set('pass', $hash);
				}
				$this->usuarios->set("idRol", $this->custom->sanitizeTexto($_POST['rol']));
				$this->usuarios->set("accion", 'usuario');
				$this->usuarios->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->usuarios->set("idUsuario", $this->custom->sanitizeTexto($id));
				if ($this->usuarios->delete() == "fail") {
					$this->custom->message("fail");
					return $this->view($id);
				}else{
					$this->custom->message("deleted");
				}
			}else{
				return $this->view($id);
			}
		}

		public function perfil(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->usuarios->set("idUsuario", $_SESSION['id']);
				$this->usuarios->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->usuarios->set("email", $this->custom->sanitizeEmail($_POST['email']));
				if (empty($this->custom->sanitizeEmail($_POST['pass']))) {
					$this->usuarios->set("pass", '');
				}else {
					$pass = $this->custom->sanitizeTexto($_POST['pass']);
					$hash = $this->custom->encrypt($pass);
					$this->usuarios->set('pass', $hash);
				}
				$this->usuarios->set("idRol", '');
				$this->usuarios->set("accion", 'perfil');
				$_SESSION['nombre'] = $this->usuarios->get("nombre");
				$this->usuarios->edit();
				$this->custom->message("updated");
				return $this->view($_SESSION['id']);
			}else {
				return $this->view($_SESSION['id']);
			}
		}

		public function view($id){
			$this->usuarios->set("idUsuario", $this->custom->sanitizeTexto($id));
			return $this->usuarios->view();
		}

		public function allRol(){
			return $this->roles->all();
		}

	}

?>