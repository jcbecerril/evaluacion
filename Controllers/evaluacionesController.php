<?php namespace Controllers;

	require_once "Views/template.php";

	use Models\Evaluacion as Evaluacion;
	use Models\Grupo as Grupo;
	use Models\Supervisor as Supervisor;

	$evaluaciones = new evaluacionesController();

	class evaluacionesController{

		public function __construct(){
			$this->evaluaciones = new Evaluacion();
			$this->grupos = new Grupo();
			$this->supervisores = new Supervisor();

			$this->custom = new customController();
		}

		public function agregar($id){
			$this->custom->sessionVerificar();
			$s = $this->custom->sanitizeTexto($_GET['s']);
			if ($_POST) {
				$this->evaluaciones->set("semana", $s);
				$this->evaluaciones->set("indica1", $this->custom->sanitizeTexto($_POST['indica1']));
				$this->evaluaciones->set("indica2", $this->custom->sanitizeTexto($_POST['indica2']));
				$this->evaluaciones->set("indica3", $this->custom->sanitizeTexto($_POST['indica3']));
				$this->evaluaciones->set("indica4", $this->custom->sanitizeTexto($_POST['indica4']));
				$this->evaluaciones->set("indica5", $this->custom->sanitizeTexto($_POST['indica5']));
				$this->evaluaciones->set("obserG", $this->custom->sanitizeTextarea($_POST['obserG']));
				$this->evaluaciones->set("img1", $this->imagen($id, $s, 0, 'img1'));
				$this->evaluaciones->set("img2", $this->imagen($id, $s, 1, 'img2'));
				$this->evaluaciones->set("img3", $this->imagen($id, $s, 2, 'img3'));
				$this->evaluaciones->set("img4", $this->imagen($id, $s, 3, 'img4'));
				$this->evaluaciones->set("img5", $this->imagen($id, $s, 4, 'img5'));
				$this->evaluaciones->set("idGrupo", $id);
				$datos = $this->evaluaciones->add();
				if ($datos['_existe'] == 0) {
					$this->imagenMove($id, $s, 0, 'img1');
					$this->imagenMove($id, $s, 1, 'img2');
					$this->imagenMove($id, $s, 2, 'img3');
					$this->imagenMove($id, $s, 3, 'img4');
					$this->imagenMove($id, $s, 4, 'img5');
					$this->custom->messageLink("success_question", URL."evaluaciones/enviar/".$id."?s=".$s, URL."grupos/ver/".$id, null);
				}elseif ($datos['_existe'] == 1) {
					$this->custom->message("find");

				}
				return $this->viewGrupo($id);
			}else {
				return $this->viewGrupo($id);
			}
		}

		public function editar($id){
			$this->custom->sessionVerificar();
			$s = $this->custom->sanitizeTexto($_GET['s']);
			if ($_POST) {
				$this->evaluaciones->set("semana", $s);
				$this->evaluaciones->set("indica1", $this->custom->sanitizeTexto($_POST['indica1']));
				$this->evaluaciones->set("indica2", $this->custom->sanitizeTexto($_POST['indica2']));
				$this->evaluaciones->set("indica3", $this->custom->sanitizeTexto($_POST['indica3']));
				$this->evaluaciones->set("indica4", $this->custom->sanitizeTexto($_POST['indica4']));
				$this->evaluaciones->set("indica5", $this->custom->sanitizeTexto($_POST['indica5']));
				$this->evaluaciones->set("obserG", $this->custom->sanitizeTextarea($_POST['obserG']));
				$this->evaluaciones->set("idGrupo", $id);
				if (empty($_FILES['imagen']['name'][0])) {
					$this->evaluaciones->set("img1", $this->custom->sanitizeTexto($_POST['img1']));
				}else{
					$this->imagen($id, $s, 0, 'img1');
				}if (empty($_FILES['imagen']['name'][1])) {
					$this->evaluaciones->set("img2", $this->custom->sanitizeTexto($_POST['img2']));
				}else{
					$this->imagen($id, $s, 1, 'img2');
				}if (empty($_FILES['imagen']['name'][2])) {
					$this->evaluaciones->set("img3", $this->custom->sanitizeTexto($_POST['img3']));
				}else{
					$this->imagen($id, $s, 2, 'img3');
				}if (empty($_FILES['imagen']['name'][3])) {
					$this->evaluaciones->set("img4", $this->custom->sanitizeTexto($_POST['img4']));
				}else{
					$this->imagen($id, $s, 3, 'img4');
				}if (empty($_FILES['imagen']['name'][4])) {
					$this->evaluaciones->set("img5", $this->custom->sanitizeTexto($_POST['img5']));
				}else{
					$this->imagen($id, $s, 4, 'img5');
				}
				$this->evaluaciones->edit();
				$this->imagenMove($id, $s, 0, 'img1');
				$this->imagenMove($id, $s, 1, 'img2');
				$this->imagenMove($id, $s, 2, 'img3');
				$this->imagenMove($id, $s, 3, 'img4');
				$this->imagenMove($id, $s, 4, 'img5');
				$this->custom->message('updated');
				return $this->view($id, $s);
			}else {
				return $this->view($id, $s);
			}
		}

		public function eliminar($id){
			$this->custom->sessionVerificar();
			$s = $this->custom->sanitizeTexto($_GET['s']);
			if ($_POST) {
				$this->evaluaciones->set("idGrupo", $id);
				$this->evaluaciones->set("semana", $s);
				if ($this->evaluaciones->delete() == "fail") {
					$this->custom->message("fail");
					return $this->view($id, $s);
				}else{
					$this->custom->messageLink("deleted_location", null, null, URL."grupos/ver/".$id);
					if (!empty($_POST['img1'])) {
						$this->fileDelete("Views/_public/img/evidencias/".$_POST['img1']);
					}if (!empty($_POST['img2'])) {
						$this->fileDelete("Views/_public/img/evidencias/".$_POST['img2']);
					}if (!empty($_POST['img3'])) {
						$this->fileDelete("Views/_public/img/evidencias/".$_POST['img3']);
					}if (!empty($_POST['img4'])) {
						$this->fileDelete("Views/_public/img/evidencias/".$_POST['img4']);
					}if (!empty($_POST['img5'])) {
						$this->fileDelete("Views/_public/img/evidencias/".$_POST['img5']);
					}if (!empty("Views/_public/pdf/".$id."_".$s.".pdf")) {
						$this->fileDelete("Views/_public/pdf/".$id."_".$s.".pdf");
					}
				}
			}else {
				return $this->view($id, $s);
			}
		}

		public function enviar($id){
			$this->custom->sessionVerificar();
			if ($_POST) {
				$s = $this->custom->sanitizeTexto($_GET['s']);
				$datos = $this->view($id, $s);
				$this->enviarEmail($datos);
				return $datos;
			}else {
				$s = $this->custom->sanitizeTexto($_GET['s']);
				return $this->view($id, $s);
			}
		}

		public function pdf($id){
			$this->custom->sessionVerificar();
			$s = $this->custom->sanitizeTexto($_GET['s']);
			$datos = $this->view($id, $s);
			$this->crearPDF($datos);
			return $datos;
		}

		public function crearPDF($datos){
			$pdf = new fpdfController();
			$pdf->FPDF();
			$pdf->AddPage();
			$pdf->Image('Views/_public/img/pdf/header.jpg',10,8,195);

			// $pdf->SetFont('Times', '', 8);
			// $pdf->MultiCell(0,5,utf8_decode('Instituto Politécnico Nacional'),0,'C');

			// $pdf->SetFont('Arial', '', 11); //Tipo, estilo y tamaño a utilizar
			// $pdf->MultiCell(0,5,utf8_decode('ESCUELA SUPERIOR DE COMERCIO Y ADMINISTRACIÓN UNIDAD TEPEPAN'),0,'C');
			// $pdf->Cell(35,250);
			// $pdf->SetFont('Arial', '', 11);
			$pdf->SetFont('Times', '', 8);
			$pdf->MultiCell(0,30,'',0,'C');

			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(0,5,utf8_decode('UNIDAD DE TECNOLOGÍA EDUCATIVA Y CAMPUS VIRTUAL'),0,'L');

			$pdf->SetFont('Arial', 'B', 8);
			setlocale(LC_TIME, 'spanish');
			$fecha = strftime("%d de %B de %Y");
			$pdf->MultiCell(0,5,utf8_decode("Ciudad de México, a ").$fecha,0,'R');

			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(0,5,utf8_decode('C. '.$datos['nombre_asesor']),0,'L');

			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(0,5,utf8_decode('P R E S E N T E'),0,'L');

			$pdf->Ln();

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,utf8_decode('Por este medio, me permito enviar a usted la evaluación de la unidad de aprendizaje '.$datos['nombre_materia'].' correspondiente al '.$datos['nombre_periodo'].' Periodo Polivirtual del semestre lectivo '.$datos['nombre_ciclo'].', con las observaciones al desempeño mostrado por usted en la Plataforma Educativa Aulapolivirtual en los 5 rubros evaluados:'),0,'J');

			$pdf->Ln(2);

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).' Foros de actividad de aprendizaje',0,'J');
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).utf8_decode(' Foros de asesoría'),0,'J');
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).utf8_decode(' Buzón de tareas'),0,'J');
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).utf8_decode(' Calificación a tiempo'),0,'J');
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).' Ingreso a Plataforma',0,'J');

			$pdf->Ln();

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,'Se anexa:',0,'J');

			$pdf->Ln(2);

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).' Tabla de observaciones realizadas por el supervisor en plataforma.',0,'L');

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,' '.chr(129).utf8_decode(' Gráfica de clics durante el periodo Polivirtual.'),0,'L');

			$pdf->Ln();

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,'Sin otro particular, aprovecho para enviarle un cordial saludo.',0,'L');

			$pdf->Ln();

			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(0,5,'Semana '.$datos['semana'],0,'C');

			$pdf->SetXY(30,150);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(50,5,'Indicadores de cumplimiento',1,'C');

			$pdf->SetXY(80,150);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(35,5,utf8_decode('Calificación de (0 a 10)'),1,'C');

			$pdf->SetXY(115,150);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(10,5,utf8_decode('%'),1,'C');

			$pdf->SetXY(125,150);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(45,5,utf8_decode('Resultado de la ponderación'),1,'C');

			$pdf->SetXY(30,155);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(50,5,'1.- Foros de actividad de aprendizaje',1,'L');

			$pdf->SetXY(80,155);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(35,5,$datos['indica1'],1,'C');

			$pdf->SetXY(115,155);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(10,5,$datos['porci1'],1,'C');

			$pdf->SetXY(125,155);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['resul1'],1,'C');

			$pdf->SetXY(30,160);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(50,5,utf8_decode('2.- Foros de asesoría'),1,'L');

			$pdf->SetXY(80,160);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(35,5,$datos['indica2'],1,'C');

			$pdf->SetXY(115,160);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(10,5,$datos['porci2'],1,'C');

			$pdf->SetXY(125,160);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['resul2'],1,'C');

			$pdf->SetXY(30,165);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(50,5,utf8_decode('3.- Buzón de tareas'),1,'L');

			$pdf->SetXY(80,165);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(35,5,$datos['indica3'],1,'C');

			$pdf->SetXY(115,165);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(10,5,$datos['porci3'],1,'C');

			$pdf->SetXY(125,165);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['resul3'],1,'C');

			$pdf->SetXY(30,170);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(50,5,utf8_decode('4.- Calificación a tiempo'),1,'L');

			$pdf->SetXY(80,170);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(35,5,$datos['indica4'],1,'C');

			$pdf->SetXY(115,170);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(10,5,$datos['porci4'],1,'C');

			$pdf->SetXY(125,170);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['resul4'],1,'C');

			$pdf->SetXY(30,175);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(50,5,utf8_decode('5.- Ingreso a plataforma'),1,'L');

			$pdf->SetXY(80,175);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(35,5,$datos['indica5'],1,'C');

			$pdf->SetXY(115,175);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(10,5,$datos['porci5'],1,'C');

			$pdf->SetXY(125,175);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['resul5'],1,'C');

			$pdf->SetXY(30,180);
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(95,5,utf8_decode('Calificación obtenida'),1,'C');

			$pdf->SetXY(125,180);
			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(45,5,$datos['result'],1,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial', 'B', 8);
			$pdf->MultiCell(0,5,'Observaciones',0,'L');

			$pdf->SetFont('Arial', '', 8);
			$pdf->MultiCell(0,5,utf8_decode(strip_tags($datos['obserG'])),0,'J');

			if (!empty($datos['img1'])) {
				$pdf->Image('Views/_public/img/evidencias/'.$datos['img1'].'',3);
				// $pdf->MultiCell(0, 5, $pdf->Image('Views/_public/img/evidencias/'.$datos['img1'].'',3), 1);
			}if (!empty($datos['img2'])) {
				$pdf->Image('Views/_public/img/evidencias/'.$datos['img2'].'',3);
			}if (!empty($datos['img3'])) {
				$pdf->Image('Views/_public/img/evidencias/'.$datos['img3'].'',3);
			}if (!empty($datos['img4'])) {
				$pdf->Image('Views/_public/img/evidencias/'.$datos['img4'].'',3);
			}if (!empty($datos['img5'])) {
				$pdf->Image('Views/_public/img/evidencias/'.$datos['img5'].'',3);
			}

			$pdf->Output("Views/_public/pdf/".$datos['Grupo_idGrupo']."_".$datos['semana'].".pdf",'F');
		}

		public function view($id, $s){
			$this->evaluaciones->set('idGrupo', $id);
			$this->evaluaciones->set('semana', $s);
			$datos = $this->evaluaciones->view();
			return $this->operacion($datos);
		}

		public function viewGrupo($id){
			$grupos = new gruposController();
			$this->grupos->set("idGrupo", $this->custom->sanitizeTexto($id));
			return $this->grupos->view();
		}

		public function imagen($id, $sem, $vec, $img){
			if (empty($_FILES['imagen']['name'][$vec])) {
				return "";
				// $this->evaluaciones->set($img, '');
			}else {
				$nombre = explode(".", $_FILES['imagen']['name'][$vec]);
				$extension = end($nombre);
				// $this->evaluaciones->set($img, $id . "_" . $sem . "_" . $vec . '.' . $extension);
				return $id . "_" . $sem . "_" . $vec . '.' . $extension;
			}
		}

		public function imagenMove($id, $sem, $vec, $img){
			if (!empty($_FILES['imagen']['name'][$vec])) {
				$permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
				in_array($_FILES['imagen']['type'][$vec], $permitidos) && $_FILES['imagen']['size'][$vec] <= 5000000;
				$nombre = explode(".", $_FILES['imagen']['name'][$vec]);
				$extension = end($nombre);
				$ruta = "Views" . DS . "_public" . DS . "img" . DS . "evidencias" . DS . $id . "_" . $sem . "_" . $vec . "." . $extension;
				move_uploaded_file($_FILES['imagen']['tmp_name'][$vec], $ruta);
			}
		}

		public function fileDelete($link){
			if (!empty($link)) {
				unlink($link);
			}
		}

		public function operacion($datos){
			if ($datos['indica1'] == "N/A") {
				$resul1 = "N/A";
				$resul2 = $datos['indica2'] * 0.05;
				$resul3 = $datos['indica3'] * 0.75;
				$resul4 = $datos['indica4'] * 0.10;
				$resul5 = $datos['indica5'] * 0.10;
				$result = $resul2 + $resul3 + $resul4 + $resul5;
				return array(
					'Grupo_idGrupo' => $datos['Grupo_idGrupo'],
					'nombre_materia' => $datos['nombre_materia'],
					'nombre_asesor' => $datos['nombre_asesor'],
					'email' => $datos['email'],
					'nombre_ciclo' => $datos['nombre_ciclo'],
					'nombre_periodo' => $datos['nombre_periodo'],
					'semana' => $datos['semana'],
					'nombre_grupo' => $datos['nombre_grupo'],
					'indica1' => $datos['indica1'],
					'resul1' => $resul1,
					'porci1' => "N/A",
					'indica2' => $datos['indica2'],
					'resul2' => $resul2,
					'porci2' => "5%",
					'indica3' => $datos['indica3'],
					'resul3' => $resul3,
					'porci3' => "75%",
					'indica4' => $datos['indica4'],
					'resul4' => $resul4,
					'porci4' => "10%",
					'indica5' => $datos['indica5'],
					'resul5' => $resul5,
					'porci5' => "10%",
					'obserG' => $datos['obserG'],
					'result' => $result,
					'progress' => $result * 10,
					'color' => $this->color($result),
					'disabled' => $this->disabled($datos),
					'img1' => $datos['img1'],
					'img2' => $datos['img2'],
					'img3' => $datos['img3'],
					'img4' => $datos['img4'],
					'img5' => $datos['img5']
				);
			}if ($datos['indica3'] == "N/A") {
				$resul1 = $datos['indica1'] * 0.75;
				$resul2 = $datos['indica2'] * 0.05;
				$resul3 = "N/A";
				$resul4 = $datos['indica4'] * 0.10;
				$resul5 = $datos['indica5'] * 0.10;
				$result = $resul1 + $resul2 + $resul4 + $resul5;
				return array(
					'Grupo_idGrupo' => $datos['Grupo_idGrupo'],
					'nombre_materia' => $datos['nombre_materia'],
					'nombre_asesor' => $datos['nombre_asesor'],
					'email' => $datos['email'],
					'nombre_ciclo' => $datos['nombre_ciclo'],
					'nombre_periodo' => $datos['nombre_periodo'],
					'semana' => $datos['semana'],
					'nombre_grupo' => $datos['nombre_grupo'],
					'indica1' => $datos['indica1'],
					'resul1' => $resul1,
					'porci1' => "75%",
					'indica2' => $datos['indica2'],
					'resul2' => $resul2,
					'porci2' => "5%",
					'indica3' => $datos['indica3'],
					'resul3' => $resul3,
					'porci3' => "N/A",
					'indica4' => $datos['indica4'],
					'resul4' => $resul4,
					'porci4' => "10%",
					'indica5' => $datos['indica5'],
					'resul5' => $resul5,
					'porci5' => "10%",
					'obserG' => $datos['obserG'],
					'result' => $result,
					'progress' => $result * 10,
					'color' => $this->color($result),
					'disabled' => $this->disabled($datos),
					'img1' => $datos['img1'],
					'img2' => $datos['img2'],
					'img3' => $datos['img3'],
					'img4' => $datos['img4'],
					'img5' => $datos['img5']
				);
			}if ($datos['indica1'] != "N/A") {
				$resul1 = $datos['indica1'] * 0.35;
				$resul2 = $datos['indica2'] * 0.05;
				$resul3 = $datos['indica3'] * 0.40;
				$resul4 = $datos['indica4'] * 0.10;
				$resul5 = $datos['indica5'] * 0.10;
				$result = $resul1 + $resul2 + $resul3 + $resul4 + $resul5;
				return array(
					'Grupo_idGrupo' => $datos['Grupo_idGrupo'],
					'nombre_materia' => $datos['nombre_materia'],
					'nombre_asesor' => $datos['nombre_asesor'],
					'email' => $datos['email'],
					'nombre_ciclo' => $datos['nombre_ciclo'],
					'nombre_periodo' => $datos['nombre_periodo'],
					'semana' => $datos['semana'],
					'nombre_grupo' => $datos['nombre_grupo'],
					'indica1' => $datos['indica1'],
					'resul1' => $resul1,
					'porci1' => "35%",
					'indica2' => $datos['indica2'],
					'resul2' => $resul2,
					'porci2' => "5%",
					'indica3' => $datos['indica3'],
					'resul3' => $resul3,
					'porci3' => "40%",
					'indica4' => $datos['indica4'],
					'resul4' => $resul4,
					'porci4' => "10%",
					'indica5' => $datos['indica5'],
					'resul5' => $resul5,
					'porci5' => "10%",
					'obserG' => $datos['obserG'],
					'result' => $result,
					'progress' => $result * 10,
					'color' => $this->color($result),
					'disabled' => $this->disabled($datos),
					'img1' => $datos['img1'],
					'img2' => $datos['img2'],
					'img3' => $datos['img3'],
					'img4' => $datos['img4'],
					'img5' => $datos['img5']
				);
			}
		}

		public function enviarEmail($datos){
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
			$mailer->AddAddress($datos['email'], $datos['nombre_asesor']);
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
						font-size: 18px;
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
				<p>Por este medio, me permito enviar a usted la evaluación de la unidad de aprendizaje ".$datos['nombre_materia']." correspondiente al ".$datos['nombre_periodo']." Periodo Polivirtual del semestre lectivo ".$datos['nombre_ciclo'].", con las observaciones al desempeño mostrado por usted en la Plataforma Educativa Aulapolivirtual en los 5 rubros evaluados:</p>
				<ul>
					<li>Foros de actividad de aprendizaje</li>
					<li>Foros de asesoría</li>
					<li>Buzón de tareas</li>
					<li>Calificación a tiempo</li>
					<li>Ingreso a Plataforma</li>
				</ul>
				<p>Se anexa:</p>
				<ul>
					<li>Tabla de observaciones realizadas por el supervisor en plataforma.</li>
					<li>Gráfica de clics durante el periodo Polivirtual.</li>
				</ul>
				<p>Sin otro particular, aprovecho para enviarle un cordial saludo.</p>
				<table class='tabla' cellspacing='1' width='100%'>
        <thead>
        	<tr>
        		<th class='titulo-tabla' colspan='5'>Semana ".$datos['semana']."</th>
        	</tr>
          <tr class='subtitulo-tabla'>
            <th>Indicadores de cumplimiento</th>
            <th>Calificación de (0 a 10)</th>
            <th>%</th>
            <th>Resultado de la ponderación</th>
            <th width='35%'>Observaciones</th>
          </tr>
        </thead>
        <tbody>
            <tr class='striped-tabla'>
              <td>1.- Foros de actividad de aprendizaje</td>
              <td class='text-center'> ".$datos['indica1']."</td>
              <td class='text-center'> ".$datos['porci1']."</td>
              <td class='text-center'> ".$datos['resul1']."</td>
              <td class='text-justify' rowspan='6'> ".$datos['obserG']."</td>
            </tr>
            <tr>
              <td>2.- Foros de asesoría</td>
              <td class='text-center'> ".$datos['indica2']."</td>
              <td class='text-center'> ".$datos['porci2']."</td>
              <td class='text-center'> ".$datos['resul2']."</td>
            </tr>
            <tr class='striped-tabla'>
              <td>3.- Buzón de tareas</td>
              <td class='text-center'> ".$datos['indica3']."</td>
              <td class='text-center'> ".$datos['porci3']."</td>
              <td class='text-center'> ".$datos['resul3']."</td>
            </tr>
            <tr>
              <td>4.- Calificación a tiempo</td>
              <td class='text-center'> ".$datos['indica4']."</td>
              <td class='text-center'> ".$datos['porci4']."</td>
              <td class='text-center'> ".$datos['resul4']."</td>
            </tr>
            <tr class='striped-tabla'>
              <td>5.- Ingreso a plataforma</td>
              <td class='text-center'> ".$datos['indica5']."</td>
              <td class='text-center'> ".$datos['porci5']."</td>
              <td class='text-center'> ".$datos['resul5']."</td>
            </tr>
            <tr>
              <td class='text-center' colspan='3'><b>Calificación obtenida</b></td>
              <td class='text-center ".$datos['color']."'> ".$datos['result']."</td>
            </tr>
          </tbody>
        </table>			");
			if (!empty($datos['img1'])) {
				$mailer->AddAttachment("Views/_public/img/evidencias/".$datos['img1'], $datos['img1']);
			}if (!empty($datos['img2'])) {
				$mailer->AddAttachment("Views/_public/img/evidencias/".$datos['img2'], $datos['img2']);
			}if (!empty($datos['img3'])) {
				$mailer->AddAttachment("Views/_public/img/evidencias/".$datos['img3'], $datos['img3']);
			}if (!empty($datos['img4'])) {
				$mailer->AddAttachment("Views/_public/img/evidencias/".$datos['img4'], $datos['img4']);
			}if (!empty($datos['img5'])) {
				$mailer->AddAttachment("Views/_public/img/evidencias/".$datos['img5'], $datos['img5']);
			}
			if(!$mailer->Send()) {
			  $this->custom->send_error('send_error');
			}else {
			  $this->custom->message('send_success');
			}
		}

		public function color($total) {
			if ($total < 6) {
				return "danger";
			}if ($total <= 7.9) {
				return "warning";
			}if ($total >= 8) {
				return "success";
			}
		}

		public function disabled($datos){
			if (!$datos) {
				return "disabled";
			}
		}

	}

?>