<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_panel extends CI_Controller {

	public function __construct()
    {	parent::__construct();
	    $this->load->helper('url');
	    $this->load->model('M_panel');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
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
				echo $this->load->view('content/v_practicing');break;
			case 'institute':
				echo $this->load->view('content/v_institute');break;
			case 'area':
				echo $this->load->view('content/v_area');break;
		}
	}
}