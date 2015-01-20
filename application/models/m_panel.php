
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
    public function getArea()
    {
        $this->db->select('tbl.idArea,tbl.nombre');
        $this->db->where('tbl.active','1');
        $this->db->from('tbl_area tbl');
        $query = $this->db->get();
        return $query->result_array();
    } 
     public function getInstituto()
    {
        $this->db->select('tbl.idInstituto,tbl.nombre');
        $this->db->where('tbl.active','1');
        $this->db->from('tbl_instituto tbl');
        $query = $this->db->get();
        return $query->result_array();
    }
     public function getPracticante()
    {
        $this->db->select('tbl_practicante.idPracticante,tbl_practicante.nombre,tbl_practicante.apellido,tbl_practicante.fechaInicio,tbl_practicante.fechaFinal,tbl_area.idArea,tbl_area.nombre as area,tbl_instituto.idInstituto,tbl_instituto.nombre as instituto');
        $this->db->join('tbl_area','tbl_practicante.idArea = tbl_area.idArea');
        $this->db->join('tbl_instituto','tbl_practicante.idInstituto = tbl_instituto.idInstituto');
        $this->db->where('tbl_practicante.active','1');
        $this->db->from('tbl_practicante');
        $query = $this->db->get();
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
    public function setArea($area)
    {
        $data = array(
           'nombre' => $area,
           'active' => '1'
        );

        $this->db->insert('tbl_area', $data);

        return $data;
    }
    public function updateArea($idArea,$area){
        $data = array(
               'nombre' => $area
            );

        $this->db->where('idArea', $idArea);
        $this->db->update('tbl_area', $data);

        return $data;
    }
    public function deleteArea($idArea){
        $data = array(
               'active' => '0'
            );

        $this->db->where('idArea', $idArea);
        $this->db->update('tbl_area', $data);

        return $data;
    }
    public function setInstituto($area)
    {
        $data = array(
           'nombre' => $area,
           'active' => '1'
        );

        $this->db->insert('tbl_instituto', $data);

        return $data;
    }
    public function updateInstituto($idInstituto,$instituto){
        $data = array(
               'nombre' => $instituto
            );

        $this->db->where('idInstituto', $idInstituto);
        $this->db->update('tbl_instituto', $data);

        return $data;
    }
    public function deleteInstituto($idInstituto){
        $data = array(
               'active' => '0'
            );

        $this->db->where('idInstituto', $idInstituto);
        $this->db->update('tbl_instituto', $data);

        return $data;
    }
    public function setPracticante($nombre,$apellido,$area,$instituto,$fechaInicio,$fechaFin)
    {
        $data = array(
           "nombre"=>$nombre,
           "apellido"=>$apellido,
           "idArea"=>$area,
           "idInstituto"=>$instituto,
           "fechaInicio"=>$fechaInicio,
           "fechaFinal"=>$fechaFin,
           "active"=>"1"
        );

        $this->db->insert('tbl_practicante', $data);

        return $data;
    }
    public function updatePracticante($idPracticante,$nombre,$apellido,$area,$instituto,$fechaInicio,$fechaFin){
        $data = array(
           "nombre"=>$nombre,
           "apellido"=>$apellido,
           "idArea"=>$area,
           "idInstituto"=>$instituto,
           "fechaInicio"=>$fechaInicio,
           "fechaFinal"=>$fechaFin
        );

        $this->db->where('idPracticante', $idPracticante);
        $this->db->update('tbl_practicante', $data);

        return $data;
    }
    public function deletePracticante($idPracticante){
        $data = array(
               'active' => '0'
            );

        $this->db->where('idPracticante', $idPracticante);
        $this->db->update('tbl_practicante', $data);

        return $data;
    }
}
