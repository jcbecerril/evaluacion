<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Grupo as Grupo;
	use Models\Materia as Materia;
	use Models\Periodo as Periodo;
	use Models\Ciclo as Ciclo;
	use Models\Asesor as Asesor;
	use Models\Supervisor as Supervisor;

	$grupos = new gruposController();
	$evaluaciones = new evaluacionesController();

	class gruposController{

		public function __construct(){
			$this->grupos = new Grupo();
			$this->materias = new Materia();
			$this->periodos = new Periodo();
			$this->ciclos = new Ciclo();
			$this->asesores = new Asesor();
			$this->supervisores = new Supervisor();

			$this->custom = new customController();
			$this->evaluaciones = new evaluacionesController();
		}

		public function index(){
			$this->custom->sessionVerificar();
			$datos = $this->all();
			if ($datos == "fail") {
				$this->message("fail");
			}else{
				return $datos;
			}
		}

		public function agregar(){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->grupos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->grupos->set("Materia_clave", $this->custom->sanitizeTexto($_POST['clave']));
				$this->grupos->set("Periodo_idPeriodo", $this->custom->sanitizeTexto($_POST['idPeriodo']));
				$this->grupos->set("Ciclo_idCiclo", $this->custom->sanitizeTexto($_POST['idCiclo']));
				$this->grupos->set("Asesor_idAsesor", $this->custom->sanitizeTexto($_POST['idAsesor']));
				$datos = $this->grupos->add();
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
				$this->grupos->set("idGrupo", $this->custom->sanitizeTexto($id));
				$this->grupos->set("nombre", $this->custom->sanitizeTexto($_POST['nombre']));
				$this->grupos->set("Materia_clave", $this->custom->sanitizeTexto($_POST['clave']));
				$this->grupos->set("Periodo_idPeriodo", $this->custom->sanitizeTexto($_POST['idPeriodo']));
				$this->grupos->set("Ciclo_idCiclo", $this->custom->sanitizeTexto($_POST['idCiclo']));
				$this->grupos->set("Asesor_idAsesor", $this->custom->sanitizeTexto($_POST['idAsesor']));
				$this->grupos->edit();
				$this->custom->message("updated");
				return $this->view($id);
			}else{
				return $this->view($id);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$this->grupos->set("idGrupo", $this->custom->sanitizeTexto($id));
				if ($this->grupos->delete() == "fail") {
					$this->custom->message("fail");
					return $this->view($id);
				}else{
					$this->custom->message("deleted");
				}
			}else{
				return $this->view($id);
			}
		}

		public function ver($id){
			$this->custom->sessionVerificar();
			return $this->view($id);
		}

		public function reporte($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$img = $_POST['img'];
				$s1 = $this->evaluaciones->view($id, 1);
				$s2 = $this->evaluaciones->view($id, 2);
				$s3 = $this->evaluaciones->view($id, 3);
				$s4 = $this->evaluaciones->view($id, 4);
				$s5 = $this->evaluaciones->view($id, 5);
				$s6 = $this->evaluaciones->view($id, 6);
				$datos = $this->view($id);
				$array = array('datos' => $datos, 's1' => $s1, 's2' => $s2, 's3' => $s3, 's4' => $s4, 's5' => $s5, 's6' => $s6);
				$this->enviarEmail($array, $img);
				return $datos;
			}else {
				return $this->view($id);
			}
		}

		public function enviarEmail($datos, $img){
			$promedio = ($datos['s1']['result']+$datos['s2']['result']+$datos['s3']['result']+$datos['s4']['result']+$datos['s5']['result']+$datos['s6']['result'])/6;
			$color = $this->evaluaciones->color($promedio);
			$mailer = new phpmailerController();
			$mailer->IsSMTP();
			$mailer->SMTPAuth = true;
			$mailer->Timeout=30;
			$mailer->CharSet = 'UTF-8';
			$mailer->SMTPSecure = 'tls';
			$mailer->Host = "smtp.gmail.com";
			$mailer->Port = 587;
			$mailer->Username = "soporte.tepepan@gmail.com";
			$mailer->Password = "campusVirtual";
			$mailer->SetFrom("soporte.tepepan@gmail.com", "Unidad de Tecnología Educativa y Campus Virtual");
			$mailer->AddReplyTo("soporte.tepepan@gmail.com","Unidad de Tecnología Educativa y Campus Virtual");
			$mailer->AddAddress($datos['datos']['email'], $datos['datos']['nombre_asesor']);
			$mailer->Subject = "Evaluación Plataforma Educativa Aulapolivirtual";
			$mailer->MsgHTML("
				<style>
					.text-center {
						text-align: center;
					}
					.text-justify {
						text-align: justify;
					}
					.tabla {
						border: 1px solid #ddd;
						border-spacing: 0;
						border-collapse: collapse;
					}
					.titulo-tabla {
						background-color: #004F9A;
						color: #FFF;
					}
					.subtitulo-tabla {
						background-color: #3699D2;
						color: #FFF;
					}
					.striped-tabla {
						background-color: #f9f9f9;
					}
					.success {
						font-weight: bold;
						color: #5cb85c;
					}
					.warning {
						font-weight: bold;
						color: #f0ad4e;
					}
					.danger {
						font-weight: bold;
						color: #d9534f;
					}
				</style>
				<p>Estimado asesor (a):</p>
				<p>Por este medio, me permito enviar a usted la evaluación de la unidad de aprendizaje ".$datos['datos']['nombre_materia']." correspondiente al ".$datos['datos']['nombre_periodo']." Periodo Polivirtual del semestre lectivo ".$datos['datos']['nombre_ciclo'].", con las observaciones al desempeño mostrado por usted en la Plataforma Educativa Aulapolivirtual en los 5 rubros evaluados:</p>
				<ul>
					<li>Foros de actividad de aprendizaje</li>
					<li>Foros de asesoría</li>
					<li>Buzón de tareas</li>
					<li>Calificación a tiempo</li>
					<li>Ingreso a Plataforma</li>
				</ul>
				<p>Se anexa:</p>
				<ul>
					<li>Gráfica de calificaciones por semana, y la calificación global del periodo evaluado.</li>
					<li>Tabla de observaciones realizadas por el supervisor en plataforma por cada semana.</li>
					<li>Gráfica de clics durante el periodo Polivirtual.</li>
				</ul>
				<p>Sin otro particular, aprovecho para enviarle un cordial saludo.</p>
				".$img."
				<br>
				<table class='tabla' cellspacing='1' width='100%'>
        <thead>
          <tr class='titulo-tabla'>
            <th>Semana</th>
            <th>Calificación</th>
            <th width='50%'>Comentarios</th>
          </tr>
        </thead>
        <tbody>
            <tr class='striped-tabla'>
              <td class='text-center'>Semana 1</td>
              <td class='text-center'> ".$datos['s1']['result']."</td>
              <td class='text-justify'> ".$datos['s1']['obserG']."</td>
            </tr>
            <tr>
              <td class='text-center'>Semana 2</td>
              <td class='text-center'> ".$datos['s2']['result']."</td>
              <td class='text-justify'> ".$datos['s2']['obserG']."</td>
            </tr>
            <tr class='striped-tabla'>
              <td class='text-center'>Semana 3</td>
              <td class='text-center'> ".$datos['s3']['result']."</td>
              <td class='text-justify'> ".$datos['s3']['obserG']."</td>
            </tr>
            <tr>
              <td class='text-center'>Semana 4</td>
              <td class='text-center'> ".$datos['s4']['result']."</td>
              <td class='text-justify'> ".$datos['s4']['obserG']."</td>
            </tr>
            <tr class='striped-tabla'>
              <td class='text-center'>Semana 5</td>
              <td class='text-center'> ".$datos['s5']['result']."</td>
              <td class='text-justify'> ".$datos['s5']['obserG']."</td>
            </tr>
            <tr>
              <td class='text-center'>Semana 6</td>
              <td class='text-center'> ".$datos['s6']['result']."</td>
              <td class='text-justify'> ".$datos['s6']['obserG']."</td>
            </tr>
            <tr>
              <td class='text-center'><b>Promedio</b></td>
              <td class='text-center ".$color."'> ".$promedio."</td>
              <td></td>
            </tr>
          </tbody>
        </table>			");
			if(!$mailer->Send()) {
			  $this->custom->send_error('send_error');
			}else {
			  $this->custom->message('send_success');
			}
		}

		public function view($id){
			$this->grupos->set("idGrupo", $this->custom->sanitizeTexto($id));
			return $this->grupos->view();
		}

		public function all(){
			if ($_SESSION['id'] == 1 OR $_SESSION['id'] == 4) {
				return $this->grupos->all();
			}else {
				$this->supervisores->set('idUsuario', $_SESSION['id']);
				$datos = $this->supervisores->allUsuario();
				$n1 = 0;
				$cp = 0;
				$lrc = 0;
				$lni = 0;
				foreach ($datos as $valor) {
					if ($valor['Carrera_idCarrera'] == '1') {
						$n1 = 1;
					}if ($valor['Carrera_idCarrera'] == '2') {
						$cp = 2;
					}if ($valor['Carrera_idCarrera'] == '3') {
						$lrc = 3;
					}if ($valor['Carrera_idCarrera'] == '4') {
						$lni = 4;
					}
				}
				unset($valor);
				$this->grupos->set('n1', $n1);
				$this->grupos->set('cp', $cp);
				$this->grupos->set('lrc', $lrc);
				$this->grupos->set('lni', $lni);
				return $this->grupos->allFiltro();
			}
		}

		public function allPeriodo(){
			return $this->periodos->all();
		}

		public function allCiclo(){
			return $this->ciclos->all();
		}

		public function allAsesor(){
			return $this->asesores->all();
		}

		public function allAsesorActivo(){
			return $this->asesores->allActivo();
		}

		public function allMateria(){
			if ($_SESSION['id'] == 1) {
				return $this->materias->all();
			}else {
				$this->supervisores->set('idUsuario', $_SESSION['id']);
				$datos = $this->supervisores->allUsuario();
				$n1 = 0;
				$cp = 0;
				$lrc = 0;
				$lni = 0;
				foreach ($datos as $valor) {
					if ($valor['Carrera_idCarrera'] == '1') {
						$n1 = 1;
					}if ($valor['Carrera_idCarrera'] == '2') {
						$cp = 2;
					}if ($valor['Carrera_idCarrera'] == '3') {
						$lrc = 3;
					}if ($valor['Carrera_idCarrera'] == '4') {
						$lni = 4;
					}
				}
				unset($valor);
				$this->materias->set('n1', $n1);
				$this->materias->set('cp', $cp);
				$this->materias->set('lrc', $lrc);
				$this->materias->set('lni', $lni);
				return $this->materias->allFiltro();
			}
		}

	}

?>