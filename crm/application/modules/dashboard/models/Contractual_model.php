<?php 
   class Contractual_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblcontractualhistory", $data)) {
            return true;
         }
      }
      public function insert_author_contract($data) {
         if ($this->db->insert("tblauthorcontract", $data)) {
            return true;
         }
      }
      public function insert_contractual_investment($data) {
         if ($this->db->insert("tblcontractual", $data)) {
            return true;
         }
      }

      public function all_leads(){
        $this->db->select('*')->from('tbllead');
        $query=$this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }

       public function select_payment_id($payment_id){
        $this->db->select('*')->from('tblpayment')->where('payment_id', $payment_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }
       public function select_project($project_id){
        $this->db->select('*')->from('tbllead')->where('project_id', $project_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }


      // Select Payment
     public function select_payment($project_id){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'right')->where('collection.project_id', $project_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      

      // Select count lead
      public function select_count_payment($project_id){ 
        $this->db->select('*')->from('tblpayment')->where('project_id', $project_id);
        $query=$this->db->get();
        return $query->num_rows();
        $db->close();
      }

      public function update_payment($data, $payment_id) { 
         $this->db->set($data); 
         $this->db->where("payment_id", $payment_id); 
         $this->db->update("tblpayment"); 
      } 
      public function update_approval_status($data, $payment_id, $project_id) { 
         $this->db->set($data); 
         $this->db->where("payment_id", $payment_id); 
         $this->db->update("tblpayment"); 
         $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'right')->where('collection.project_id', $project_id);
          $query=$this->db->get();
         return $query->result_array();
          $this->db->close();
      } 
 

        public function get_last_record_collection($data, $project_id) { 
         $this->db->set($data); 
         $this->db->where("project_id", $project_id); 
         $this->db->limit(1)->order_by('collection_id','DESC');
         $this->db->update("tblcollection"); 
      } 

      //  public function get_last_record_collection($data, $updatedata, $project_id){
      //   $this->db->select('*')->from('tblcollection')->where(array('project_id' => $project_id))
      //   ->limit(1)->order_by('collection_id','DESC');
      //   $query = $this->db->get();
      //    if ($query->num_rows() > 0){
      //         return  $this->db->where(array('project_id'  => $project_id))->update('tblcollection', $updatedata);
      //   }
      //   else{
      //     return false;
      //   }
      //   $this->db->close();

      // }

   }
?>
