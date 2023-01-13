<?php 
   class Payment_Model extends CI_Model {
      function __construct() {
         parent::__construct();

      }

      public function insert($data) {
         if ($this->db->insert("tblpayment", $data)) {
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
     public function collection_activities_byid($user_id){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')->where('lead.user_id', $user_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function collection_activities(){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
       public function sales_lead_byid($user_id){ 
          $this->db->select('user.*, lead.*, collection.*, payment.*, SUM(payment.initial_payment) as total')->from('tbllead as lead')
          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
          ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
          ->join('tbluser as user', 'payment.user_id = user.user_id', 'inner')
          ->where('user.user_id', $user_id)
          ->where('payment.approval_status', 'Approved')
          ->where('lead.contractual_status', 'Signed')
          ->group_by('lead.parent_id')
          ->order_by('payment.payment_id', 'DESC'); 
          $query=$this->db->get();
          return $query->result_array();
          $this->db->close();
      }
      //  public function sales_lead_byid($user_id){ 
      //   $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
      //   ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
      //   ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
      //   ->where('lead.user_id', $user_id)
      //   ->where('payment.approval_status', 'Approved')
      //   ->where('lead.contractual_status', 'Signed')
      //   ->group_by('lead.author_name')
      //   ->order_by('payment.payment_id', 'DESC');
      //   $query=$this->db->get();
      //   return $query->result_array();
      //   $this->db->close();
      // }
       public function sales_lead_qouta_date($user_charge, $current_date, $advance_date){ 
        $this->db->select('lead.*, collection.*, SUM(payment.initial_payment) AS  total_amount')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('payment.status_payment', 'Paid')
        ->where('payment.approval_status', 'Approved')
        ->where('lead.contractual_status', 'Signed')
       ->where("DATE_FORMAT(payment.date_paid, '%Y-%m-%d') BETWEEN '".$current_date."'  AND '".$advance_date."'")
       ->where('payment.payment_usercharge', $user_charge)
        ->group_by('payment.project_id');
        $query=$this->db->get();
        return $query->row_array();
        $this->db->close();
      }

    public function sales_totals($user_charge, $current_date, $advance_date){ 
        $this->db->select('lead.*, collection.*, SUM(payment.initial_payment) AS  total_amount')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('payment.payment_usercharge', $user_charge)
        ->where('payment.status_payment', 'Paid')
        ->where('lead.contractual_status', 'Signed')
       ->where("DATE_FORMAT(payment.date_paid, '%Y-%m-%d') BETWEEN '".$current_date."'  AND '".$advance_date."'");
        // ->group_by('payment.payment_usercharge');
        $query=$this->db->get();
        if ($query->num_rows() > 0){
         return $query->row_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }

      public function sales_total_agent($user_charge){ 
        $this->db->select('lead.*, collection.*, SUM(payment.initial_payment) AS  total_amount')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('payment.payment_usercharge', $user_charge)
        ->where('payment.status_payment', 'Paid');
        // ->group_by('payment.payment_usercharge');
        $query=$this->db->get();
        if ($query->num_rows() > 0){
         return $query->row_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }



      public function sales_lead_qouta_over_all($user_id, $current_year){ 
        $this->db->select('SUM(initial_payment) AS  total_amount')->from('tblpayment')
        ->where('user_id', $user_id)
        ->where('status_payment', 'Paid')
        ->where('approval_status', 'Approved')
        // ->where('lead.contractual_status', 'Signed')
       ->where("DATE_FORMAT(date_paid, '%Y') ='".$current_year."'")->group_by("DATE_FORMAT(date_paid, '%Y-%m')");
        $query=$this->db->get();
        $response =array();
        if ($query->num_rows() > 0) {
              foreach ($query->result_array() as $value) {
                 $response[] = $value['total_amount'];
          }
      }else{
                $response[] = 0;
      }
         return $response;

      }

       public function sales_lead_by_managerid($user_id){ 
        $this->db->select('user.*, lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->join('tbluser as user', 'payment.user_id = user.user_id', 'inner')
        ->where('user.user_id', $user_id)
        ->where('payment.status_payment', 'Paid')
        ->where('payment.approval_status', 'Approved')
        ->where('lead.contractual_status', 'Signed')
        ->order_by('payment.payment_id', 'DESC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }

      public function sales_lead(){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('payment.status_payment', 'Paid')
        ->where('payment.approval_status', 'Approved')
        ->where('lead.contractual_status', 'Signed')
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
       public function sales_lead_history(){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function sales_leadhistory_useragent($user_id){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('lead.user_id', $user_id)->order_by('payment.payment_id', 'DESC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }

      public function sales_leadhistory_finance(){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function sales_leadhistory_manager($user_id){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('lead.manager_id', $user_id)->order_by('payment.payment_id', 'DESC');

        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
        public function select_user_payment_histpry(){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
     public function sales_leadhistory_admin(){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->join('tbluser as user', 'payment.admin_id = user.user_id', 'inner')
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }

      
      public function sales_lead_date($user_id, $month, $year){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('MONTH(payment.date_paid)', $month)
        ->where('YEAR(payment.date_paid)', $year)
        ->where('payment.status_payment', 'Paid')->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function sales_leadhistory_date($user_id, $month, $year){ 
        $this->db->select('lead.*, collection.*, payment.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('MONTH(payment.collection_date)', $month)
        ->where('YEAR(payment.collection_date)', $year)
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function sales_lead_date_useragent($user_id, $month, $year){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('MONTH(payment.date_paid)', $month)
        ->where('YEAR(payment.date_paid)', $year)
        ->where('payment.status_payment', 'Paid')
        ->where('user.user_id', $user_id)
        ->where('payment.status_payment', 'Paid')->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
  public function sales_lead_date_useragenthistory($user_id, $month, $year){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('MONTH(payment.collection_date)', $month)
        ->where('YEAR(payment.collection_date)', $year)
        ->where('user.user_id', $user_id)
        ->order_by('payment.payment_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
         public function sales_lead_date_useradminhistory($user_id, $month, $year){ 
        $this->db->select('lead.*, collection.*, payment.*, user.*')->from('tbllead as lead')
        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')
        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')
        ->join('tblpayment as payment', 'collection.collection_id = payment.collection_id', 'inner')
        ->where('MONTH(payment.collection_date)', $month)
        ->where('YEAR(payment.collection_date)', $year)
        ->where('lead.admin_id', $user_id)
        ->order_by('payment.payment_id', 'ASC');
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
        // Select Payment Approval
     public function select_payment_approval($project_id){ 
        $this->db->select('lead.*, approval.*, payment.*')->from('tbllead as lead')
        ->join('tblapproval_history as approval', 'lead.project_id = approval.project_id', 'inner')
        ->join('tblpayment as payment', 'approval.payment_id = payment.payment_id', 'inner')
        ->where('approval.project_id', $project_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
       public function select_payment_confirmation($project_id){ 
        $this->db->select('lead.*, confirmationpayment.*, payment.*')->from('tbllead as lead')
        ->join('tblpaymentapproval_history as confirmationpayment', 'lead.project_id = confirmationpayment.project_id', 'inner')
        ->join('tblpayment as payment', 'confirmationpayment.payment_id = payment.payment_id', 'inner')
        ->where('confirmationpayment.project_id', $project_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }
      public function select_monthly_sales(){ 
        $this->db->select('*')->from('tblpayment')
        ->where('MONTH(collection_date)', date('m'));
        $query=$this->db->get();
        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }
  // modified  Ansel
      public function select_monthly_sales_agent($month, $year, $manager_id){ 
         $this->db->select('lead.*,  user.*, SUM(payment.initial_payment) AS  total_amount')->from('tbllead as lead')
         ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
         ->join('tblpayment as payment', 'user.user_id = payment.user_id', 'inner')
        // ->where('lead.contractual_status', 'Signed')
       ->where("DATE_FORMAT(payment.date_paid, '%m') ='".$month."'")
       ->where("DATE_FORMAT(payment.date_paid, '%Y') ='".$year."'")
        ->where('payment.status_payment', 'Paid')
       ->where('lead.manager_id', $manager_id)
       ->group_by("DATE_FORMAT(payment.date_paid, '%Y-%m')");
        $query=$this->db->get();
        $response =array();
        if ($query->num_rows() > 0) {
              foreach ($query->result_array() as $value) {
                 $response[] = $value['total_amount'];
          }
      }else{
                $response[] = 0;
      }
         return $response;

      }


      public function select_monthly_submission(){ 
        $this->db->select('*')->from('tblpayment')
        ->group_by('project_id');
        $query=$this->db->get();
        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();

      }

      public function select_monthly_submission_agent($month, $year, $manager_id){ 
         $this->db->select('lead.*,  user.*, count(payment.payment_id) as total_submissions')->from('tbllead as lead')
         ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
         ->join('tblpayment as payment', 'user.user_id = payment.user_id', 'inner')
        // ->where('lead.contractual_status', 'Signed')
       ->where("DATE_FORMAT(payment.date_paid, '%m') ='".$month."'")
       ->where("DATE_FORMAT(payment.date_paid, '%Y') ='".$year."'")
        ->where('payment.status_payment', 'Paid')
       ->where('lead.manager_id', $manager_id)
       ->group_by("DATE_FORMAT(payment.date_paid, '%Y-%m')");
        $query=$this->db->get();
        return $query->num_rows();
        $this->db->close();
      }

        public function select_agent_assign($manager_id){ 
         $this->db->select('user.*, lead.*')->from('tbluser as user')
         ->join('tbllead as lead', 'user.user_id = lead.user_id', 'inner')
         ->where('lead.manager_id', $manager_id)
         ->group_by('lead.user_id');
          $query=$this->db->get();
          if ($query->num_rows() > 0){
            return $query->result_array();
          }
          else{
              return false;
          }
          $this->db->close();
      }

     public function select_number_agent_assign($manager_id){ 
         $this->db->select('count(user.user_id), lead.*')->from('tbluser as user')
         ->join('tbllead as lead', 'user.user_id = lead.user_id', 'inner')
         ->where('lead.manager_id', $manager_id)
          ->group_by('lead.user_id');
          $query=$this->db->get();
          return $query->num_rows();

      }



      //  public function select_number_assign_agent($manager_id){ 
      //    $this->db->select('user.*, lead.*')->from('tbluser as user')
      //    ->join('tbllead as lead', 'user.user_id = lead.user_id', 'inner')
      //    ->where('lead.manager_id', $manager_id);
      //     ->group_by('lead.parent_id')

      //     $query=$this->db->get();
      //     return $query->num_rows();
      //     $this->db->close();
      // }


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
