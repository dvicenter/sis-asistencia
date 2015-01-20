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
    public function getPracticingFroDate($date)
    {
        $query = $this->db->query("CALL prc_cnd_asist_practicantes('".$date."')");
        return $query->result_array();
    }
    public function setAsist($idPracticante, $asistio, $fecha)
    {
        $fecha_ins = ($fecha == "")?date("Y-m-d") : $fecha;
        
        $data = array(
           'idPracticante' => $idPracticante ,
           'asistio' => $asistio ,
           'fecha' => $fecha_ins
        );

        $this->db->insert('tbl_asistencia', $data);

        $this->db->select('tbl.idAsistencia,tbl.fecha');
        $this->db->from('tbl_asistencia tbl');
        $this->db->where('tbl.idPracticante', $idPracticante);
        $this->db->where('tbl.asistio', $asistio);
        $this->db->where('tbl.fecha', $fecha_ins); 

        $query = $this->db->get();
        return $query->result_array();
    }
    public function updAsist($idAsistencia, $asistio, $fecha)
    {
        $fecha_ins = ($fecha == "")?date("Y-m-d") : $fecha;

        $data = array(
           'asistio' => $asistio ,
           'fecha' => $fecha_ins
        );

        $this->db->where('idAsistencia', $idAsistencia);
        $this->db->update('tbl_asistencia', $data); 
    }
    public function getViewPracticantes()
    {
        $this->db->select('*');
        $this->db->from('vw_practicantes');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPracticingReport($pNombre)
    {   
        $query = $this->db->query("CALL prc_cnd_pract('".$pNombre."')");
        return $query->result_array();
    }

    public function getAsistePracticante($idPracticante)
    {
        $query = $this->db->query("CALL prc_cnd_rpt_asist(".$idPracticante.")");
        return $query->result_array();
    }
}
