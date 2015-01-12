<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_panel extends CI_Model{
 	public function __construct()
	{	
        parent::__construct();
        $this->load->library('session');
	    $this->load->database();
	}
    public function getPracticing()
    {
        $query = $this->db->query('CALL prc_cnd_asist_practicantes(now())');
        return $query->result_array();
    } 
}
