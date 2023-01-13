<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fulfillment_Model extends CI_Model {

  function __construct()
    {
        parent::__construct();
        $this->hlm = $this->load->database('hlm', TRUE);
	}

  public function insert($data){
    if ($this->db->insert("tblservices", $data)) {
      return true;

    }
  }

  public function insert_stage($data){
    if ($this->db->insert("tblservice_stages", $data)) {
      return true;

    }
  }
  
  public function view_project($project_id=""){

    if(!empty($project_id)){
        $this->db->select('*')->from('tblservices as services')->join('wpju_users as user', 'services.user_id = user.ID', 'inner')->where('project_id', $project_id)->order_by('date_added','ASC');
    }
    else{
        $this->db->select('*')->from('tblservices as services')->join('wpju_users as user', 'services.user_id = user.ID', 'inner')->order_by('date_added','ASC');

    }

      $query=$this->db->get();

      if ($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
          return false;
      }

      $this->db->close();

    }

  public function view_project_stages(){

    $this->db->select('*')->from('tblservices as service')

    ->join('tblservice_stages as stages', 'service.project_id = stages.project_id', 'inner')

    // ->where('service.book_id', $book_id)

    ->order_by('service.project_id','ASC');

    $query=$this->db->get();

    return $query->result_array();

  }

    public function view_project_details(){

    $this->db->select('*')->from('tblservices')

    // ->where('project_id', $project_id)

    ->order_by('project_id','ASC');

    $query=$this->db->get();

    return $query->result_array();

  }  

  public function update_services($data, $project_id) { 

    $this->db->set($data); 

    $this->db->where("project_id", $project_id); 

    $this->db->update("tblservices"); 
    
  }
  
  public function update_stages($data, $stage_id) { 

    $this->db->set($data); 

    $this->db->where("stage_id", $stage_id); 

    $this->db->update("tblservice_stages"); 
    
  }

   public function select_project_id($project_id){

      $this->db->select('*')->from('tblservices as service')

      ->join('tblservice_stages as stages', 'service.project_id = stages.project_id', 'inner')

      ->where('service.project_id', $project_id)

      ->order_by('service.project_id','ASC');

      // $this->db->select('*')->from('tblprojects')->where(array('project_id ' => $project_id));
  
      $query=$this->db->get();
  
      if ($query->num_rows() > 0){
      
        return $query->result_array();
      }else{
        return false;
      }
  }

}