<?php namespace Controllers;

	require_once "Views/templateLogin.php";

	use Models\Usuario as Usuario;

	class loginController{

		public function __construct(){
			$this->login = new Usuario();

			$this->custom = new customController();
		}

		public function index(){
			session_set_cookie_params(0, URL);
			session_name("EVALSESSID");
			session_start();
			if (isset($_SESSION['authenticate'])) {
				if ($_SESSION['authenticate'] == 'Ok') {
					header("Location: " . URL . "grupos");
				}
			}
			if ($_POST) {
				if (isset($_POST['token'])) {
					if ($this->custom->checkToken()) {
						$this->login->set('user', $this->custom->sanitizeTexto($_POST['user']));
						$pass = $this->custom->sanitizeTexto($_POST['password']);
						$hash = $this->custom->encrypt($pass);
						$this->login->set('pass', $hash);
						$datos = $this->login->login();
						if ($datos) {
							$_SESSION['authenticate'] = 'Ok';
							$_SESSION['id'] = $datos['idUsuario'];
							$_SESSION['nombre'] = $datos['nombre'];
							$_SESSION['rol'] = $datos['nombre_rol'];
							$_SESSION['idRol'] = $datos['Rol_idRol'];
							header("Location: " . URL . "grupos");
						}else {
							$this->custom->message('login_error');
							return array('token' => $this->custom->generateToken('token'));
						}
					}else {
						$this->custom->message('token_error');
					}
				}
			}else {
				return array('token' => $this->custom->generateToken('token'));
			}
		}

		public function sessionLogout(){
			session_name("EVALSESSID");
			session_start();
			session_destroy();
			header("Location: " . URL);
		}

	}

?>