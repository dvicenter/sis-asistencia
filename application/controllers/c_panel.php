<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_panel extends CI_Controller {

	public function __construct()
    {	parent::__construct();
	    $this->load->helper('url');
	    $this->load->model('M_panel');
	    $this->load->library('session');
    }

	public function getViewMod($name_mod)
	{	
		switch ($name_mod) {
			case 'assistance':
				$data['practicantes'] = $this->M_panel->getPracticing();
				echo $this->load->view('content/v_assistance',$data);
				break;
			case 'practicing':
				$data['area'] = $this->M_panel->getArea();
				$data['instituto'] = $this->M_panel->getInstituto();
				$data['practicante'] = $this->M_panel->getPracticante();
				echo $this->load->view('content/v_practicing',$data);break;
			case 'institute':
				$data['instituto'] = $this->M_panel->getInstituto();
				echo $this->load->view('content/v_institute',$data);break;
			case 'area':
				$data['area'] = $this->M_panel->getArea();
				echo $this->load->view('content/v_area',$data);break;
			case 'report':
				echo $this->load->view('content/v_report');break;
			case 'report-asist':
				echo $this->load->view('content/v_report_asist');break;

				

		}
	}

	public function getPractForDate(){
		$date = $_POST['fecha'];
		$data['practicantes'] = $this->M_panel->getPracticingFroDate($date);
		echo $this->load->view('list/l_assistance',$data);
	}

	public function setAsist(){
		$idPracticante = $_POST['idPracticante'];
		$asistio = $_POST['asistio'];
		$fecha = $_POST['fecha'];
		$idAsistencia = $this->M_panel->setAsist($idPracticante, $asistio, $fecha);
		echo json_encode($idAsistencia);
	}
	public function setArea(){
		$area = $_POST['pArea'];
		$data = $this->M_panel->setArea($area);

		$data['area'] = $this->M_panel->getArea();
		echo $this->load->view('content/v_area',$data);
	}
	public function updateArea(){
		$idArea = $_POST['pIdArea'];
		$area = $_POST['pArea'];
		$data = $this->M_panel->updateArea($idArea,$area);

		$data['area'] = $this->M_panel->getArea();
		echo $this->load->view('content/v_area',$data);
	}
	public function deleteArea(){
		$idArea = $_POST['pIdArea'];
		$data = $this->M_panel->deleteArea($idArea);

		$data['area'] = $this->M_panel->getArea();
		echo $this->load->view('content/v_area',$data);
	}
	public function setInstituto(){
		$instituto = $_POST['pInstituto'];
		$data = $this->M_panel->setInstituto($instituto);

		$data['instituto'] = $this->M_panel->getInstituto();
		echo $this->load->view('content/v_institute',$data);
	}
	public function updateInstituto(){
		$idInstituto = $_POST['pIdInstituto'];
		$instituto = $_POST['pInstituto'];
		$data = $this->M_panel->updateInstituto($idInstituto,$instituto);

		$data['instituto'] = $this->M_panel->getInstituto();
		echo $this->load->view('content/v_institute',$data);
	}
	public function deleteInstituto(){
		$idInstituto = $_POST['pIdInstituto'];
		$data = $this->M_panel->deleteInstituto($idInstituto);

		$data['instituto'] = $this->M_panel->getInstituto();
		echo $this->load->view('content/v_institute',$data);
	}
	public function setPracticante(){
		$nombre = $_POST['pNombre'];
		$apellido = $_POST['pApellido'];
		$area = $_POST['pArea'];
		$instituto = $_POST['pInstituto'];
		$fechaInicio = $_POST['pFechaInicio'];
		$fechaFin = $_POST['pFechaFinal'];

		$data = $this->M_panel->setPracticante($nombre,$apellido,$area,$instituto,$fechaInicio,$fechaFin);

		$data['practicante'] = $this->M_panel->getPracticante();
		echo $this->load->view('content/v_practicing',$data);
	}
	public function updatePracticante(){
		$idPracticante=$_POST['pIdPracticante'];
		$nombre = $_POST['pNombre'];
		$apellido = $_POST['pApellido'];
		$area = $_POST['pArea'];
		$instituto = $_POST['pInstituto'];
		$fechaInicio = $_POST['pFechaInicio'];
		$fechaFin = $_POST['pFechaFinal'];
		$data = $this->M_panel->updatePracticante($idPracticante,$nombre,$apellido,$area,$instituto,$fechaInicio,$fechaFin);

		$data['area'] = $this->M_panel->getArea();
		$data['instituto'] = $this->M_panel->getInstituto();
		$data['practicante'] = $this->M_panel->getPracticante();
		echo $this->load->view('content/v_practicing',$data);
	}
	public function deletePracticante(){
		$idPracticante = $_POST['pIdPracticante'];
		$data = $this->M_panel->deletePracticante($idPracticante);

		$data['practicante'] = $this->M_panel->getPracticante();
		echo $this->load->view('content/v_practicing',$data);
	}

	public function udpAsist(){
		$idAsistencia = $_POST['idAsistencia'];
		$asistio = $_POST['asistio'];
		$fecha = $_POST['fecha'];
		$this->M_panel->updAsist($idAsistencia, $asistio, $fecha);
	}

	public function getPracticingPDF()
	{
		$pNombre = $_POST['pNombre'];
		$data['practicantes'] = $this->M_panel->getPracticingReport($pNombre);
		echo $this->load->view('list/l_practicantes',$data);
	}

	public function getReportAsiste($idPracticante)
	{
		$practicantes = $this->M_panel->getAsistePracticante($idPracticante);
		$this->load->library('Pdf');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		ob_clean();

		$pdf->SetHeaderData('logo-sis.png', PDF_HEADER_LOGO_WIDTH, 'HOSPITAL REGIONAL HUACHO', 'Reporte de Practicantes');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();

		// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// create some HTML content
		$html = '<h1>Lista de Practicantes</h1>
					<br>
					<H2>';

		$html =		'</H2>
				<table>
					<thead>
						<tr>
							<th width="3%" style="border-bottom: 1px solid #333; height:20px;"><b>#</b></th>
							<th width="20%" style="border-bottom: 1px solid #333; height:20px;"><b>Fecha</b></th>
							<th width="20%" style="border-bottom: 1px solid #333; height:20px;"><b>Asistio</b></th>
						</tr>
					</thead>
					<tbody>';
			$cont = 1;
		foreach ($practicantes as $item) {
			$asistio = ($item['asistio']==0)?'Falto':'Asistio';
			$color = ($item['asistio']==0)?'red':'green';
			$html .= '	<tr>
							<td width="3%" style="height:20px;">'.$cont.'</td>
							<td width="20%" style="height:20px;">'.$item['fecha'].'</td>
							<td width="20%" style="height:20px;color:'.$color.';">'.$asistio.'</td>
						</tr>';
			$cont ++;
		}	
		$html .=	'</tbody>
				</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');


		// output some RTL HTML content
		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('algo.pdf', 'I');	
	}

	public function generarPDF()
	{
		$practicantes = $this->M_panel->getViewPracticantes();

		$this->load->library('Pdf');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		ob_clean();

		$pdf->SetHeaderData('logo-sis.png', PDF_HEADER_LOGO_WIDTH, 'HOSPITAL REGIONAL HUACHO', 'Reporte de Practicantes');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();

		// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// create some HTML content
		$html = '<h1>Lista de Practicantes</h1>
					<br>
				<table>
					<thead>
						<tr>
							<th width="3%" style="border-bottom: 1px solid #333; height:20px;"><b>#</b></th>
							<th width="40%" style="border-bottom: 1px solid #333; height:20px;"><b>Nombre y Apellido</b></th>
							<th width="20%" style="border-bottom: 1px solid #333; height:20px;"><b>Area</b></th>
							<th width="13%" style="border-bottom: 1px solid #333; height:20px;"><b>Instituto</b></th>
							<th width="15%" style="border-bottom: 1px solid #333; height:20px;"><b>F. Ingreso</b></th>
							<th width="15%" style="border-bottom: 1px solid #333; height:20px;"><b>F. Termino</b></th>
						</tr>
					</thead>
					<tbody>';
			$cont = 1;
		foreach ($practicantes as $item) {
			$html .= '	<tr>
							<td width="3%" style="height:20px;">'.$cont.'</td>
							<td width="40%" style="height:20px;">'.$item['nombre'].' '.$item['apellido'].'</td>
							<td width="20%" style="height:20px;">'.$item['area'].'</td>
							<td width="13%" style="height:20px;">'.$item['instituto'].'</td>
							<td width="15%" style="height:20px;">'.$item['fechaInicio'].'</td>
							<td width="15%" style="height:20px;">'.$item['fechaFinal'].'</td>
						</tr>';
			$cont ++;
		}	
		$html .=	'</tbody>
				</table>';

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, 'C');


		// output some RTL HTML content
		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('example_006.pdf', 'I');
	}
/*<<<<<<< HEAD

	
=======
	

>>>>>>> 4a164dfb0561048e47d1cde3f295688fe411c6db*/
}