<?php 
$boleta = $_GET['id'];
include('fpdf.php');

$mysqli = new mysqli("localhost", "esca", "vxxhLAE8ul3X3jQz", "esca");

/* comprobar la conexi�n */
if (mysqli_connect_errno()) {
    printf("Fall� la conexi�n: %s\n", mysqli_connect_error());
    exit();
}

$consulta = 'SELECT * FROM correo WHERE boleta = "'.$boleta.'"';

if ($resultado = $mysqli->query($consulta)) {

	/* obtener el array de objetos */
    while ($obj = $resultado->fetch_object()) {
			$pdf = new FPDF(); //Generar instancia de una clase
			$pdf ->AddPage(); //Crea el archivo PDF
			$pdf ->SetFont('times', 'B', 12); //Tipo, estilo y tama�o a utilizar
			$pdf->Image('../img/pdf/poli.png',15,15,20);
			$pdf->Image('../img/pdf/esca.png',175,15,20);
			$pdf->Image('../img/pdf/poli_virtual.png',100,30,20);


			$pdf->SetXY(25,5);
			$pdf ->Write(5,'ESCUELA SUPERIOR DE COMERCIO Y ADMINISTRACI�N UNIDAD TEPEPAN');
			$pdf->SetXY(35,15);
			$pdf ->SetFont('times', '', 12);
			$pdf ->Write(5,'UNIDAD DE TECNOLOG�A EDUCATIVA Y CAMPUS VIRTUAL (UTE-CV)');

			$pdf->SetFont('Courier','',12);
			$pdf->SetXY(60,45);
			$pdf->MultiCell(100,4,'PARTICIPANTE REGISTRADO',1,'C');

			$pdf->SetXY(10,55);
			$pdf->SetFont('Courier','',12);
			$pdf->Write(5,'Curso Modelo de Operaci�n del Polivirtual  (del 08 al 26 de agosto 2016)');

			$pdf ->SetFont('Arial', '', 10);
			$pdf ->Ln();$pdf ->Ln();
			$pdf->SetXY(130,10);
			$pdf ->Cell(15,50,"Fecha: ".date('d / m / Y.',time() - 25000),0,1,'L'); 

			$pdf->SetXY(15,66);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Nombre(s): "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->nombre);
			$pdf->SetXY(15,74);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Apellidos: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->ap);
			$pdf->SetXY(15,82);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Unidad Academica: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->unidad);
			$pdf->SetXY(15,90);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Rol que Desempe�a: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, ($obj->rol == 'A')?"Alumno":"Docente");
			$pdf->SetXY(15,99);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"CURP: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->curp);
			$pdf->SetXY(15,108);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Boleta: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->boleta);
			$pdf->SetXY(15,117);
			$pdf ->SetFont('Arial', '', 11); $pdf ->Write(7,"Correo: "); $pdf ->SetFont('Courier', '', 10); $pdf ->Write(7, $obj->correo); $pdf ->Ln();
			
			$pdf->SetXY(10,130);
			$pdf->SetFont('Courier','',12);
			//$pdf->SetXY(15,);
			$pdf->Write(5,'Verifica tu correo donde recibir�s el d�a 4 o 5 de agosto los datos de acceso a la Plataforma Educativa Aulapolivirtual.');

			$pdf -> Output("registro.pdf",'F');

			echo "<script language='javascript'>window.open('registro.pdf','_self',''); </script>";
	    }

		/* liberar el conjunto de resultados */
    $resultado->close();

	}

	/* cerrar la conexi�n */
	$mysqli->close();

?>