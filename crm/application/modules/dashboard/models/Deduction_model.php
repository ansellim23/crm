<?php 
   class Deduction_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tbldeduction", $data)) {
            return true;
         }
      }
      public function insert_payment_history($data) {
         if ($this->db->insert("tblpaymenthistory", $data)) {
            return true;
         }
      }
      public function insert_approval_history($data) {
         if ($this->db->insert("tblapproval_history", $data)) {
            return true;
         }
      }
      public function insert_paymentapproval_history($data) {
         if ($this->db->insert("tblpaymentapproval_history", $data)) {
            return true;
         }
      }
      
      public function view_all_deductions(){
        $this->db->select('*')->from('tbldeduction');
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
      public function select_balance($project_id){
       
        $this->db->select("IF(status_payment = 'Refunded', '0',SUM(initial_payment)) AS total_refunded
        FROM tblpayment WHERE project_id = '".$project_id."' AND status_payment <> 'Pending' ");
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


    public function total_deduction($user_id, $current_date, $advance_date){ 
        $this->db->select('user_id, deduction_date, SUM(amount) AS  total_deduction')->from('tbldeduction')
        ->where('user_id', $user_id)
        ->where("DATE_FORMAT(deduction_date, '%Y-%m-%d') BETWEEN '".$current_date."'  AND '".$advance_date."'");
        $query=$this->db->get();
        if ($query->num_rows() > 0){
         return $query->row_array();
        }
        else{
            return 0;
        }
        $this->db->close();
      }

    public function select_user_deduction($user_id, $prev_date, $advance_date){ 
        $this->db->select('*')->from('tbldeduction')
        ->where('user_id', $user_id)
        ->where("DATE_FORMAT(deduction_date, '%Y-%m-%d') BETWEEN '".$prev_date."'  AND '".$advance_date."'");
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }


   }
?>
