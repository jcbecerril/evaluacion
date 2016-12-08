<?php namespace Controllers;

	class customController{

		public function message($error){
			if ($error == 'login_error') {
				echo "<script>swal({type: 'error',title: '¡Lo siento!', text: 'El usuario y/o contraseña con incorrectos!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'token_invalid') {
				echo "<script>swal({type: 'warning',title: '¡Uy!', text: 'El token es inválido!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'token_error') {
				echo "<script>swal({type: 'error',title: '¡Lo siento!', text: 'El token es incorrecto!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'find') {
				echo "<script>swal({type: 'warning',title: '¡Uy!', text: 'El registro ya existe!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'success') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El registro se guardó con éxito!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'updated') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El registro se actualizó con éxito!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'deleted') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El registro se eliminó con éxito!', showConfirmButton: false, timer: 3000}).then(function() { console.log('Aceptar') }, function(dismiss) { if (dismiss === 'timer') { console.log('pero')  }});</script>";
			}if ($error == 'fail') {
				echo "<script>swal({type: 'error',title: '¡Lo siento!', text: 'La acción no se puede realizar!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'send_success') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El mensaje se envió con éxito!', showConfirmButton: false, timer: 3000});</script>";
			}if ($error == 'send_error') {
				echo "<script>swal({type: 'error',title: '¡Lo siento!', text: 'El envio no se puede realizar!', showConfirmButton: false, timer: 3000});</script>";
			}
		}

		public function messageLink($message, $linkOk, $linkCancel, $linkTimer){
			if ($message == 'success_question') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El registro se guardó con éxito!<br>¿Desea enviar por correo?', showCancelButton: true, confirmButtonText: 'Si', cancelButtonText: 'Cancelar', allowEscapeKey: false, allowOutsideClick: false}).then(function() {window.location.href = '".$linkOk."';}, function(dismiss) { if (dismiss === 'cancel') {window.location.href = '".$linkCancel."';}});</script>";
			}if ($message == 'deleted_location') {
				echo "<script>swal({type: 'success',title: '¡Buen trabajo!', text: 'El registro se eliminó con éxito!', showConfirmButton: false, allowEscapeKey: false, allowOutsideClick: false, timer: 3000}).then(function() {console.log('Aceptar');}, function(dismiss) { if (dismiss === 'timer') {window.location.href = '".$linkTimer."';}});</script>";
			}
		}

		public function generateToken(){
			$generate = new nocsrfController();
			return $generate->generate('token');
		}

		public function checkToken(){
			$check = new nocsrfController();
			return $check->check('token', $_POST, false, 60*10, false);
		}

		public function encrypt($pass){
			$options = [
				'cost' => 7,
				'salt' => 'BCryptRequires22Chrcts'
			];
			return password_hash($pass, PASSWORD_BCRYPT, $options);
		}

		public function sanitizeTexto($texto){
			$texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
			return filter_var($texto, FILTER_SANITIZE_MAGIC_QUOTES);
		}

		public function sanitizeEmail($texto){
			$texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
			return filter_var($texto, FILTER_SANITIZE_EMAIL);
		}

		public function sanitizeTextarea($texto){
			return addslashes($texto);
		}

		public function sessionVerificar(){
			if ($_SESSION['authenticate'] != 'Ok') {
				header("Location: " . URL);
			}
		}

	}

?>