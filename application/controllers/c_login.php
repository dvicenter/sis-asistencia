<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
    {	parent::__construct();
	    $this->load->helper('url');
	    $this->load->model('M_login');
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->library('session');
    }

	public function index()
	{	$this->data['error']="";
		if(!isset($_POST['username']))
		{	$this->load->view('v_login',$this->data);
		}
		else {

			$this->form_validation->set_rules('username','Usuario','required');
			$this->form_validation->set_rules('password','Contrase&ntilde;a','required');
			$this->form_validation->set_message('required','%s esta vacio');
			if($this->form_validation->run()==false)
			{	$this->load->view('v_login',$this->data);
			}
			else
			{	$isValidLogin = $this->M_login->getLogin($_POST['username'],$_POST['password']);
                if($isValidLogin)
                {   $id_sujeto;
                	$sujeto;
                     foreach ($isValidLogin as $date)
                     {	$id_sujeto=$date['id_user'];
                 			
                     } 
                	$sesion_data = array(
                                    'usuario' => $_POST['username'],
                                    'password' => $_POST['password'],
                					'id_sujeto'=>$id_sujeto
                						
                                     );
					 
                    $this->session->set_userdata($sesion_data);
                $data['usuario'] = $this->session->userdata['usuario'];
                $data['password'] = $this->session->userdata['password'];
                $data['id_sujeto']= $this->session->userdata['id_sujeto'];
                	
                		
                $this->load->view('v_panel',$data);
                }
                else
                {	$this->data['error']="Usuario o Contrase&ntilde;a err&oacute;neo";
                	$this->load->view('v_login',$this->data);
                }
			}
		}
	}

	function cerrar_sesion(){
		$this->data['error']="";
		if ($this->session->userdata("usuario")==TRUE) 
		{	$this->session->sess_destroy();
			$this->load->view('v_login',$this->data);
		}
		else
		{
			$this->load->view('v_login',$this->data);
		}
	}
}