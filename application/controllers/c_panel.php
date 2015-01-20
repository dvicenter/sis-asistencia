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

		$data['practicante'] = $this->M_panel->getPracticante();
		echo $this->load->view('content/v_practicing',$data);
	}
	public function deletePracticante(){
		$idPracticante = $_POST['pIdPracticante'];
		$data = $this->M_panel->deletePracticante($idPracticante);

		$data['practicante'] = $this->M_panel->getPracticante();
		echo $this->load->view('content/v_practicing',$data);
	}

}