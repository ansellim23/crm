<?php 
   class Remark_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblremarks", $data)) {
            return true;
         }
      }


      public function select_remarks($project_id){ 
        $this->db->select('*')->from('tblremarks as remark')
        ->join('tbluser as user', 'user.user_id = remark.user_id')->where('remark.project_id', $project_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }

      public function user_remarks($user_id){ 
        $this->db->select('*')->from('tblremarks as remark')
       ->where('user_id', $user_id)
       ->order_by('date_create_remark', 'desc')
       //->group_by('remark.project_id');
       ->group_by(array('remark.project_id', "DATE_FORMAT(remark.date_create_remark, '%Y-%m-%d')"));
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }

      public function select_count_remarks_agent($user_id, $date_create){ 

        $this->db->select('*')->from('tblremarks')
        ->where('user_id', $user_id)
        ->where("DATE_FORMAT(date_create_remark, '%Y-%m-%d')='".$date_create."'")
        ->group_by(array('project_id', "DATE_FORMAT(date_create_remark, '%Y-%m-%d')"));
        //->group_by(array("project_id", "date_create_remark"));

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }   


   }
?>
