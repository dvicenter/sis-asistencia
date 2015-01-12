<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model{
 	public function __construct()
	{	
        parent::__construct();
        $this->load->library('session');
	    $this->load->database();
	}
	public function getLogin($username,$password)
    {
	    $data = array(
	    'username' => $username,
	    'password' => $password
	    );
   
    	$query = $this->db->get_where('tbl_user',$data);
    	return $query->result_array();
    } 
 	public function isLogged()
    {	if(isset($this->session->userdata['usuario']))
        {	return TRUE;
        }
        else
        {	return FALSE;
        }
    }
}
