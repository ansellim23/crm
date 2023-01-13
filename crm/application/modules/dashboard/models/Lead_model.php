<?php 

   class Lead_Model extends CI_Model {

      function __construct() {

         parent::__construct();
          $this->hlm = $this->load->database('hlm', TRUE);  

      }

      public function insert($data) {

         if ($this->db->insert("tbllead", $data)) {

            return true;

         }
      }

      public function insert_collection($data) {

         if ($this->db->insert("tblcollection", $data)) {

            return true;

         }

      }

       public function insert_history_lead($data) {

         if ($this->db->insert("tblleadhistory", $data)) {

            return true;

         }

      }

       public function insert_lead_remark($data) {

         if ($this->db->insert("tblremarks", $data)) {

            return true;

         }

      }
         public function insert_designer_remark($data) {

         if ($this->db->insert("tblremarkdesigner", $data)) {

            return true;

         }

      }


       public function insert_author_report($data) {

         if ($this->db->insert("tblauthorreport", $data)) {

            return true;

         }

      }

       public function insert_history_author_report($data) {

         if ($this->db->insert("tblhistoryreport", $data)) {

            return true;

         }

      }

      public function insert_interior_designer($data) {

         if ($this->db->insert("tblinteriror_designer", $data)) {

            return true;

         }

      }

      public function insert_cover_designer($data) {

         if ($this->db->insert("tblcover_designer", $data)) {
            return true;

         }

      }
      public function insert_data_designer($data) {

         if ($this->db->insert("tbldesigner_report", $data)) {
            return true;

         }

      }
      public function insert_designer_history($data) {

         if ($this->db->insert("tblreport_designer_history", $data)) {
            return true;

         }

      }

      public function insert_designer_transaction($data) {

         if ($this->db->insert("tbltransaction_designer", $data)) {
            return true;

         }

      }


      public function all_leads(){

        $this->db->select('*')->from('tbllead')

        ->where('status', "In Progress");

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

         public function all_leads_inprocess(){

        $this->db->select('*')->from('tbllead')

        ->where('check_lead', 1)
        ->where('status', 'In Progress');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

    public function select_designer_transaction($transaction_id){
        $this->db->select('*')->from('tbltransaction_designer')

        ->where('transaction_id', $transaction_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return true;

        }

        else{

            return false;

        }

        $this->db->close();

      }
      public function select_report_designer($designer_report_id, $designer_user_id){
        $this->db->select('*')->from('tbldesigner_report')
         ->where('designer_report_id', $designer_report_id)
         ->where('designer_user_id', $designer_user_id);
         $query=$this->db->get();

        if ($query->num_rows() > 0){

          return true;

        }
        else{
            return false;
        }

        $this->db->close();

      }



      public function select_lead_finance(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')

        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

       public function select_lead_admin(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }
      public function select_lead_admin_data($total_records_per_page, $offset){ 

        $this->db->select('lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.lead_owner, lead.price, lead.status,lead.date_create, lead.contractual_status, lead.date_updated, lead.lead_date_agent_assign, income_level')->from('tbllead as lead')
   
        ->order_by('lead.project_id','ASC')
        ->limit($total_records_per_page, $offset);
        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

       public function select_lead_admin_data_limit($rowno,$rowperpage, $search=""){ 

        $this->db->select('lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.lead_owner, lead.price, lead.status,lead.date_create, lead.contractual_status, lead.date_updated, lead.lead_date_agent_assign, income_level')->from('tbllead as lead')
   
        ->order_by('lead.project_id','ASC');

        if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
         }
         $this->db->limit($rowperpage, $rowno); 
         $query=$this->db->get();

        return $query->result_array();

        $this->db->close();

      }
        public function getrecord_AllLead($search ="") {

      $this->db->select('lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.lead_owner, lead.price, lead.status,lead.date_create, lead.contractual_status, lead.date_updated, lead.lead_date_agent_assign, income_level')
        ->from('tbllead as lead')->order_by('lead.project_id','ASC');

           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   

       public function select_status_lead(){ 

        $this->db->select('lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('status', 'Dead')
        ->or_where('status', 'Recycled')
        ->order_by('lead.project_id','ASC');
        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_status_lead_admin(){ 

        $this->db->select('agent.*, lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
       ->join('tbluser as agent', 'lead.user_id = agent.user_id', 'left')

        ->where('status', 'Dead')
        ->or_where('status', 'Recycled')
        ->order_by('lead.project_id','ASC');
        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_status_lead_admin_limit($rowno,$rowperpage, $search=""){ 

        $this->db->select('agent.*, lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status, lead.lead_date_agent_assign')->from('tbllead as lead')
       ->join('tbluser as agent', 'lead.user_id = agent.user_id', 'left');

          if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
         }
        $this->db->or_like('lead.status', 'Dead');
        $this->db->or_like('lead.status', 'Recycled');
        $this->db->order_by('lead.project_id','ASC');
         $this->db->limit($rowperpage, $rowno); 
         $query=$this->db->get();

        return $query->result_array();

        $this->db->close();

      }
      public function getrecord_CountStatus_Lead($search ="") {

       $this->db->select('agent.*, lead.project_id,  lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
       ->join('tbluser as agent', 'lead.user_id = agent.user_id', 'left');

           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search); 
                                                                                                                                                                                                                                                        
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }
        $this->db->or_like('lead.status', 'Dead');
        $this->db->or_like('lead.status', 'Recycled');
        $this->db->order_by('lead.project_id','ASC');
          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   
        public function select_last_data($project_id){ 

        $this->db->select('lead.project_id, lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('lead.project_id <', $project_id)
        ->order_by('lead.project_id','DESC')
        ->limit(100);
        $query=$this->db->get();
         if ($query->num_rows() > 0)
            {
                return $query->result();
            }
            else{
                return false;
            }
            $this->db->close();

        $db->close();

      }
       public function select_first_data($project_id){ 

        $this->db->select('lead.project_id, lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('lead.project_id >', $project_id)
        ->order_by('lead.project_id','ASC')
        ->limit(100);
        $query=$this->db->get();
         if ($query->num_rows() > 0)
            {
                return $query->result();
            }
            else{
                return false;
            }
            $this->db->close();

        $db->close();

      }

       public function select_greater_lead_project($project_id){ 

        $this->db->select('lead.project_id, lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('lead.project_id >', $project_id)
        ->order_by('lead.project_id','ASC')
        ->limit(100);
           $query=$this->db->get();
            return $query->result_array();
              $this->db->close();

      }

       public function select_greater_than_project_id($project_id){ 

        $this->db->select('lead.project_id, lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('lead.project_id >', $project_id)
        ->order_by('lead.project_id','ASC')
        ->limit(100);
         $query=$this->db->get();
           if ($query->num_rows() > 0)
              {
                  return $query->result();
              }
              else{
                  return false; 
              }
              $this->db->close();

        $db->close();

      }

       public function select_less_than_project_id($project_id){ 

        $this->db->select('lead.project_id, lead.admin_id, lead.product_name, lead.author_name, lead.book_title,lead.email_address, lead.contact_number, lead.area_code, lead.price, lead.status,lead.date_create, lead.contractual_status')->from('tbllead as lead')
        ->where('lead.project_id <=', $project_id)
        ->order_by('lead.project_id','DESC')
        ->limit(100);
        $query=$this->db->get();
         if ($query->num_rows() > 0)
            {
                return $query->result();
            }
            else{
                return false;
            }
            $this->db->close();

        $db->close();

      }
       public function select_total_lead(){ 

        $this->db->select('*')->from('tbllead');

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }
      public function select_max_project_id(){ 

         $this->db->select('project_id')->from('tbllead')
        ->order_by('project_id','DESC')
        ->limit(1);

        $query=$this->db->get();

       if ($query->num_rows() > 0){

            $row = $query->row(); 
            return $row->project_id;
        }

        $this->db->close();

      }





       public function select_lead_admin_inprocess(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')
        ->where('status', 'In Progress')

        ->order_by('lead.date_create','ASC'); 

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }


       public function select_author_email(){ 

        $this->db->select('*')->from('tbllead')

        ->where('subject  IS NULL', null, false)

        ->order_by('date_create','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_author_email_agent($user_id){ 

        $this->db->select('*')->from('tbllead')

        ->where('subject  IS NULL', null, false)
        ->where('user_id', $user_id)

        ->order_by('date_create','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


      public function select_author_email_not_empty(){ 

        $this->db->select('*')->from('tbllead')

        ->where('subject  IS NOT NULL', NULL, false)

        ->order_by('date_create','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_author_email_not_empty_limit($rowno,$rowperpage, $search=""){

          $this->db->select('*')->from('tbllead')->where('subject  IS NOT NULL', NULL, false)->order_by('date_create','ASC');

        if($search != ""){
                 $this->db->like('project_id', $search);
                 $this->db->or_like('author_name', $search);
                 $this->db->or_like('book_title', $search);
                 $this->db->or_like('email_address', $search);
                 $this->db->or_like('contact_number', $search);
         }
         $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }
       public function getrecord_Email_Author($search = '') {

       $this->db->select('*')->from('tbllead')->where('subject  IS NOT NULL', NULL, false)->order_by('date_create','ASC');


           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   



        public function select_author_email_agent_not_empty($user_id){ 

        $this->db->select('*')->from('tbllead')

        ->where('subject  IS NOT NULL', NULL, false)

        ->where('user_id', $user_id)

        ->order_by('date_create','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }


        public function select_author_email_agent_not_empty_limit($user_id, $rowno,$rowperpage, $search=""){ 

        $this->db->select('*')->from('tbllead')

        ->where('subject  IS NOT NULL', NULL, false)

        ->where('user_id', $user_id)

        ->order_by('date_create','ASC');

         if($search != ""){
                 $this->db->like('project_id', $search);
                 $this->db->or_like('author_name', $search);
                 $this->db->or_like('book_title', $search);
                 $this->db->or_like('email_address', $search);
                 $this->db->or_like('contact_number', $search);
         }
         $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }
            public function getrecord_Email_NotEmpty_Author($user_id, $search = '') {

            $this->db->select('*')->from('tbllead')

            ->where('subject  IS NOT NULL', NULL, false)

            ->where('user_id', $user_id)

            ->order_by('date_create','ASC');


           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   


      public function select_lead_manager($manager_id){ 

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC'); 

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_lead_manager_all_lead(){ 
        $data = array();
        $item = array();
        $results = array();

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        // ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC'); 

        $query=$this->db->get();

      
        if ($query->num_rows() > 0){

                foreach($query->result_array() as $key=>$item)
                {
                    $this->db->select('create_remark, date_create_remark')->from('tblremarks')->where_in('author_name', $item['author_name'])->order_by('date_create_remark','DESC')->limit(1);
                    $query1=$this->db->get();

                    $row = $query1->row_array();


                    $item['create_remark']  = $row['create_remark'];
                    $item['date_create_remark']  = $row['date_create_remark'];


                    $data[] = $item;

                }
                return $data;
            }
        else{

            return false;

        }

        $this->db->close();

      }

      public function select_lead_manager_all_lead_limit($rowno,$rowperpage, $search=""){ 
        $data = array();
        $item = array();
        $results = array();

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        ->order_by('lead.date_create','ASC'); 

           if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
               }
               $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

      
        if ($query->num_rows() > 0){

                foreach($query->result_array() as $key=>$item)
                {
                    $this->db->select('create_remark, date_create_remark')->from('tblremarks')->where_in('author_name', $item['author_name'])->order_by('date_create_remark','DESC')->limit(1);
                    $query1=$this->db->get();

                    $row = $query1->row_array();


                    $item['create_remark']  = $row['create_remark'];
                    $item['date_create_remark']  = $row['date_create_remark'];


                    $data[] = $item;

                }
                return $data;
            }
        else{

            return false;

        }

        $this->db->close();

      }

      public function getrecordLead_ManagerCount($search = '') {

     $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')
        ->order_by('lead.date_create','ASC'); 


           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }  





      public function view_lead_collection_contract_manager($manager_id){

      
        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')
        ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        ->where('lead.manager_id', $manager_id)
        ->order_by('lead.project_id','ASC');

           $query=$this->db->get();


        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }
 
        $this->db->close();

      }    

       public function select_lead_assign_admin(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->where('lead.check_lead', 0)
        ->where('lead.status !=', 'Dead')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $this->db->close();

      }
        public function select_lead_assign_agent_regular(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->where('lead.check_lead', 0)
        // ->where('lead.author_name  IS NOT NULL', NULL, false)
        // ->where('lead.contact_number  IS NOT NULL', NULL, false)
        // ->where('lead.book_title  IS NOT NULL', NULL, false)
        // ->where('TRIM(lead.book_title) !=', '')
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level !=', 'VIP')
        ->where('lead.income_level !=', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');//

        $query=$this->db->get();

        return $query->result_array();

        $this->db->close();

      }

      public function select_lead_assign_agent_vip(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->where('lead.check_lead', 0)
        ->where('lead.author_name  IS NOT NULL', NULL, false)
        ->where('lead.contact_number  IS NOT NULL', NULL, false)
        ->where('lead.book_title  IS NOT NULL', NULL, false)
        ->or_where('TRIM(lead.book_title) !=', '')
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level', 'VIP')
        ->or_where('lead.income_level', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $this->db->close();

      }



    public function select_not_assign_manager(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->where('lead.manager_id', 0)
        ->where('lead.status !=', 'Dead')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }
       public function select_not_assign_manager_regular(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->where('lead.manager_id', 0)
        ->where('lead.author_name  IS NOT NULL', NULL, false)
        ->where('lead.contact_number  IS NOT NULL', NULL, false)
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level !=', 'VIP')
        ->where('lead.income_level !=', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_not_assign_manager_vip(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->where('lead.manager_id', 0)
        ->where('lead.author_name  IS NOT NULL', NULL, false)
        ->where('lead.contact_number  IS NOT NULL', NULL, false)
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level', 'VIP')
        ->or_where('lead.income_level', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_lead_existassign_manager($manager_id){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

        ->where('lead.check_lead', 1)

        ->where('lead.user_id', 0)

        ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_lead_exist_assign_manager_regular(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->where('lead.check_lead', 0)
        ->where('lead.user_id', 0)
        ->where('lead.manager_id', 0)
        ->where('lead.author_name  IS NOT NULL', NULL, false)
        ->where('lead.contact_number  IS NOT NULL', NULL, false)
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level !=', 'VIP')
        ->where('lead.income_level !=', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      
      public function select_lead_exist_assign_manager_vip(){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

        ->where('lead.check_lead', 0)
        ->where('lead.user_id', 0)
        ->where('lead.manager_id', 0)
        ->where('lead.author_name  IS NOT NULL', NULL, false)
        ->where('lead.contact_number  IS NOT NULL', NULL, false)
        ->where('lead.status !=', 'Dead')
        ->where('lead.income_level', 'VIP')
        ->or_where('lead.income_level', 'VIP PREMIUM')
        ->order_by('lead.date_create','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }


      public function select_lead_assign_manager($manager_id, $lead_date_assign){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

        ->where('lead.manager_id', $manager_id)  

        ->where('lead.lead_date_assign', $lead_date_assign)

        ->order_by('lead.lead_date_assign','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

       public function select_lead_assign_agent($agent_id){ 

        $this->db->select('*')->from('tbllead')

        ->where('user_id', $agent_id)  

        // ->where('lead_date_agent_assign', $lead_date_agent_assign)

        ->order_by('lead_date_agent_assign','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }



       public function select_collection_agent($user_id){ 

        $this->db->select('lead.*, collection.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->where('lead.user_id', $user_id)->order_by('collection.collection_id','asc');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      // public function view_lead_history($author_name){ 

      //   $this->db->select('collection.*, lead.*')->from('tblcollection as collection')

      //   ->join('tbllead as lead', 'collection.project_id = lead.project_id', 'inner')

      //   ->where('lead.author_name', $author_name)
      //   ->where('collection.collection_status', 'In progress')
      //   ->group_by('collection.project_id')
      //   ->order_by('collection.collection_id','desc');

      //   $query=$this->db->get();

      //   return $query->result_array();

      //   $db->close();

      // }

        public function view_lead_history($project_id){ 

        $this->db->select('collection.*, lead.*')->from('tblcollection as collection')

        ->join('tbllead as lead', 'collection.project_id = lead.project_id', 'inner')

        ->where('lead.parent_id', $project_id)
        ->where('collection.collection_status', 'In progress')
        ->group_by('collection.project_id')
        ->order_by('collection.collection_id','desc');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }  

       public function view_lead_status_history($project_id){ 

        $this->db->select('collection.*, lead.*, user.*')->from('tblcollection as collection')

        ->join('tbllead as lead', 'collection.project_id = lead.project_id', 'inner')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')

        ->where('lead.project_id', $project_id)
        ->order_by('collection.collection_id','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return $query->result_array();

        }
        else{

            return 'false';

        }

        $this->db->close();

      }  

      public function view_lead_history_finance($project_id){ 

        $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')

        ->where('lead.project_id', $project_id)

        ->order_by('collection.collection_id','asc');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      } 



      public function select_collection_all(){ 

        $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        // ->where('lead.status', "In Progress")


        ->order_by('collection.alter_date_commitment','ASC');

        $query=$this->db->get();

       if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $db->close();

      }

      public function select_collection_all_admin(){ 

          $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

          ->where('lead.user_id', 0)

          ->where('lead.manager_id', 0)
          // ->where('lead.status', "In Progress")

          ->order_by('collection.alter_date_commitment','ASC');

          $query=$this->db->get();

            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

           $this->db->close();
      }
         public function select_collection_all_admin_limit($rowno,$rowperpage, $search=""){ 

          $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

          ->where('lead.user_id', 0)

          ->where('lead.manager_id', 0)
          // ->where('lead.status', "In Progress")

          ->order_by('collection.alter_date_commitment','ASC');
           if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);

          }
             $this->db->limit($rowperpage, $rowno); 


          $query1=$this->db->get();


          $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

          ->where('lead.user_id', 0);
            if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);
          }
             $this->db->limit($rowperpage, $rowno); 

           $query2=$this->db->get();


         $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        // ->where('lead.status', "In Progress")


        ->order_by('collection.alter_date_commitment','ASC');
          if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);

          }
             $this->db->limit($rowperpage, $rowno); 

         $query3=$this->db->get();




          if ($query1->num_rows() > 0 || $query2->num_rows() > 0 || $query3->num_rows() > 0){

              return array_merge($query1->result_array(), $query2->result_array(),$query3->result_array());

         }

            else{

                return false;

            }

           $this->db->close();
      }

      public function getrecord_checkleadCount($search = '') {

         $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

          ->where('lead.user_id', 0)

          ->where('lead.manager_id', 0)
          // ->where('lead.status', "In Progress")

          ->order_by('collection.alter_date_commitment','ASC');
           if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);


          }


          $query1=$this->db->get();

          $num_results1 = $this->db->count_all_results();

          $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

          ->where('lead.user_id', 0);
            if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                  $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);

          }

           $query2=$this->db->get();

          $num_results2 = $this->db->count_all_results();

         $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        // ->where('lead.status', "In Progress")


        ->order_by('collection.alter_date_commitment','ASC');
          if($search != ""){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                  $this->db->or_like('CONCAT_WS(" ", user.firstname, user.lastname)', $search);

          }

         $query3=$this->db->get();
           $num_results3 = $this->db->count_all_results();

           $count_sum = $num_results1 + $num_results2 + $num_results3;
           $count_num_rows = $query1->num_rows() + $query2->num_rows() + $query3->num_rows();

       return array("count" => $count_sum, "num_rows" => $count_num_rows) ;

  }  


      // public function select_merge_data(){ 

      //     $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

      //     ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

      //     ->join('tbluser as user', 'lead.admin_id = user.user_id', 'inner')

      //     ->where('lead.user_id', 0)

      //     ->where('lead.manager_id', 0)
      //     // ->where('lead.status', "In Progress")

      //     ->order_by('lead.project_id','ASC');

      //       $query1=$this->db->get();

      //       $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

      //       ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

      //       ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

      //       ->where('lead.user_id', 0)
      //       // ->where('lead.status', "In Progress")


      //       ->order_by('lead.project_id','ASC');

      //        $query2=$this->db->get();

      //         $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

      //       ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

      //       ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
      //       // ->where('lead.status', "In Progress")


      //       ->order_by('lead.project_id','ASC');

      //       $query3=$this->db->get();

      //       if ($query1->num_rows() > 0 || $query2->num_rows() > 0 || $query3->num_rows() > 0){

      //         return array_merge($query1->result_array(), $query2->result_array(),$query3->result_array());

      //       }

      //       else{

      //           return false;

      //       }

      //      $db->close();

      // }

      public function select_merge_data($offset, $total_records_per_page)
          {
              $query = "(SELECT lead.*, collection.*, user.* ";
              $query = $query."FROM tbllead as lead ";
              $query = $query."INNER JOIN  tblcollection as collection ON lead.project_id = collection.project_id INNER JOIN  tbluser as user ON lead.user_id = user.user_id ORDER BY collection.project_id ASC";
              $query = $query.") UNION (";
              $query = $query."SELECT lead.*, collection.*, user.*";
              $query = $query."FROM tbllead as lead ";
              $query = $query."INNER JOIN  tblcollection as collection ON lead.project_id = collection.project_id INNER JOIN  tbluser as user ON lead.manager_id = user.user_id WHERE lead.user_id='0' ORDER BY collection.project_id ASC";
              $query = $query.") UNION (";
              $query = $query."SELECT lead.*, collection.*, user.*";
              $query = $query."FROM tbllead as lead ";
              $query = $query."INNER JOIN  tblcollection as collection ON lead.project_id = collection.project_id INNER JOIN  tbluser as user ON lead.admin_id = user.user_id WHERE lead.user_id='0' AND lead.manager_id='0' ORDER BY collection.project_id ASC";
              $query = $query.")";
              $catsandprods= $this->db->query($query);
              return $catsandprods->result_array();
          }

          public function select_collection_all_manager(){ 

          $this->db->select('lead.*, collection.*, user.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

          ->join('tbluser as user', 'lead.manager_id = user.user_id', 'inner')

          ->where('lead.user_id', 0)
          // ->where('lead.status', "In Progress")


          ->order_by('lead.project_id','ASC');

          $query=$this->db->get();

           if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }          

        $db->close();

      }


      public function select_collection_all_history(){ 

        $this->db->select('lead.*, collection.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->where('collection.collection_status', "In Progress")


        ->order_by('collection.alter_date_commitment','ASC');

        $query=$this->db->get();

       if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $db->close();

      }

      public function select_collection_all_admin_history(){ 

          $this->db->select('lead.*, collection.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')


          // ->where('lead.user_id', 0)

          // ->where('lead.manager_id', 0)
          ->where('collection.collection_status', "In Progress")

          ->order_by('collection.alter_date_commitment','ASC');

          $query=$this->db->get();

            if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }

           $db->close();

      }

          public function select_collection_all_manager_history(){ 

          $this->db->select('lead.*, collection.*')->from('tbllead as lead')

          ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')


          // ->where('lead.user_id', 0)
          ->where('collection.collection_status', "In Progress")


          ->order_by('collection.alter_date_commitment','ASC');

          $query=$this->db->get();

           if ($query->num_rows() > 0){

              return $query->result_array();

            }

            else{

                return false;

            }          

        $db->close();

      }

      public function view_leads($user_id){

        $this->db->select('*')->from('tbllead')
        ->where('user_id', $user_id)
        ->where('status', 'In Progress');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }
        
      }

 public function view_leads_agent($user_id){

        $this->db->select('*')->from('tbllead')
        ->where('user_id', $user_id)
        ->where('status !=', 'Recycled');

        // if($search != ""){
        //          $this->db->like('project_id', $search);
        //          $this->db->or_like('author_name', $search);
        //          $this->db->or_like('book_title', $search);
        //          $this->db->or_like('email_address', $search);
        //          $this->db->or_like('contact_number', $search);
        //  }
        //  $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }


        $this->db->close();

      }


 public function view_leads_agent_limit($user_id, $rowno,$rowperpage, $search=""){

        $this->db->select('*')->from('tbllead')->where('user_id', $user_id)->where('status !=', 'Recycled');

        if($search != ""){
                 $this->db->like('project_id', $search);
                 $this->db->or_like('author_name', $search);
                 $this->db->or_like('book_title', $search);
                 $this->db->or_like('email_address', $search);
                 $this->db->or_like('contact_number', $search);
         }
         $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }


        $this->db->close();

      }

       public function getrecord_LeadCount($user_id,$search = '') {

        $this->db->select('*')->from('tbllead')->where('user_id', $user_id)->where('status !=', 'Recycled');


           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   


       public function view_lead_collection($user_id){

        $this->db->select('*')->from('tbllead')
        ->where('user_id', $user_id);

        $query=$this->db->get();
        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }
           $this->db->close();

      }    

      // public function view_lead_collection_contract($user_id){

      //   $this->db->select('*')->from('tbllead')
      //   ->where('payment_status', 'Paid')
      //   ->or_where('contractual_status', 'Signed');
      //   ->where('user_id', $user_id);

      //   $query=$this->db->get();


      //   if ($query->num_rows() > 0){

      //     return $query->result_array();

      //   }

      //   else{

      //       return false;

      //   }
 
      //   $this->db->close();

      // }     


      public function view_lead_collection_contract($user_id, $rowno,$rowperpage,$search=""){ 

        $data = array();
        $item = array();
        $results = array();

        $this->db->select('payment.*, lead.*')->from('tbllead as lead')

        ->join('tblpayment as payment', 'lead.project_id = payment.project_id', 'left')->where('lead.user_id', $user_id);

        
              if($search != ""){

                 $this->db->group_start();  //group start
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
                 $this->db->or_like('lead.lead_owner', $search);
                 $this->db->group_end();  //group ed

               }
                $this->db->group_by('lead.project_id');
                $this->db->order_by('lead.project_id','ASC');

           $query=$this->db->get();

              if ($query->num_rows() > 0){

                foreach($query->result_array() as $key=>$item)
                {
                    $this->db->select('create_remark, date_create_remark')->from('tblremarks')->where_in('author_name', $item['author_name'])->order_by('date_create_remark','DESC')->limit(1);
                    $query1=$this->db->get();

                    $row = $query1->row_array();


                    $item['create_remark']  = $row['create_remark'];
                    $item['date_create_remark']  = $row['date_create_remark'];


                    $data[] = $item;

                }
                return $data;
            }
            else{

                return false;

            }

        $this->db->close();

      }       


  public function getrecordCount($user_id,$search = '') {
       $data = array();
        $item = array();
        $results = array();
       $this->db->select('payment.*, lead.*')->from('tbllead as lead')->join('tblpayment as payment', 'lead.project_id = payment.project_id', 'left')->where('lead.user_id', $user_id);


           if($search != ''){
                 $this->db->group_start();  //group start
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
                 $this->db->or_like('lead.lead_owner', $search);
                 $this->db->group_end();  //group ed
            }

          $query = $this->db->get();
 
       return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }                       
       public function view_lead_remark($author_name){

        $this->db->select('create_remark')->from('tblremarks')
        ->where('author_name', $author_name)
        ->order_by('date_create_remark','DESC')
        ->limit(1);
        $query=$this->db->get();


        if ($query->num_rows() > 0){

           $row = $query->row(); 
            return $row->create_remark;
        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function view_lead_remark_date($author_name){

        $this->db->select('date_create_remark')->from('tblremarks')
        ->where('author_name', $author_name)
        ->order_by('date_create_remark','DESC')
        ->limit(1);
        $query=$this->db->get();


        if ($query->num_rows() > 0){

           $row = $query->row(); 
            return $row->date_create_remark;
        }

        else{

            return false;

        }

        $this->db->close();

      }

       public function select_lead_history($project_id){

        $this->db->select('*')->from('tblremarks')

        ->where(array('project_id' => $project_id))
        ->order_by('date_create_remark','DESC');


        $query=$this->db->get();



        if ($query->num_rows() > 0) {

          return $query->result_array();

        }

        else{

            return 'false';

        }

        $this->db->close();

      }
       public function select_designer_history($author_name, $designer_id){

        $this->db->select('*')->from('tblremarkdesigner')

        ->where(array('author_name' => $author_name, 'designer_id' => $designer_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0) {

          return $query->result_array();

        }

        else{

            return 'false';

        }

        $this->db->close();

      }


       public function select_lead_history_finance($project_id){

        $this->db->select('*')->from('tblremarks')->where(array('project_id' => $project_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0) {

          return $query->result_array();

        }

        else{

            return 'false';

        }

        $this->db->close();

      }

      public function save_lead_history($user_id, $project_id){

        $this->db->select('*')->from('tblremarks')->where(array('user_id' => $user_id, 'project_id' => $project_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0) {

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function save_lead_history_finance($project_id){

        $this->db->select('*')->from('tblremarks')->where(array('project_id' => $project_id));

        $query=$this->db->get();



        if ($query->num_rows() > 0) {

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_contract_history_agent($user_id){

        $this->db->select('lead.*, contracthistory.*')->from('tbllead as lead')

        ->join('tblcontractualhistory as contracthistory', 'lead.project_id = contracthistory.project_id', 'inner')

        ->order_by('contracthistory.contractual_id','DESC')

        ->where('lead.user_id', $user_id);

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function view_contract_history_finance(){

        $this->db->select('lead.*, contracthistory.*')->from('tbllead as lead')

        ->join('tblcontractualhistory as contracthistory', 'lead.project_id = contracthistory.project_id', 'inner')

        ->where('check_lead', 1)

        ->or_where('lead_assign', 1)

        ->order_by('contracthistory.contractual_id','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

    public function view_author_approval_history(){

        $this->db->select('lead.*, approvalcontract.*')->from('tbllead as lead')

        ->join('tblauthorcontract as approvalcontract', 'lead.project_id = approvalcontract.project_id', 'inner')

        ->order_by('approvalcontract.sign_id','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

          public function view_author_approval_agent_history($user_id){

        $this->db->select('lead.*, approvalcontract.*')->from('tbllead as lead')

        ->join('tblauthorcontract as approvalcontract', 'lead.project_id = approvalcontract.project_id', 'inner')

        ->where('lead.user_id', $user_id)->order_by('approvalcontract.sign_id','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }





       public function select_collection($collection_id){

        $this->db->select('*')->from('tblcollection')->where('collection_id', $collection_id);

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

      public function select_project_id($project_id){

        $this->db->select('*')->from('tbllead')->where('project_id', $project_id);

        $query = $this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_author_report_id($report_id){

        $this->db->select('*')->from('tblauthorreport')->where('report_id', $report_id);

        $query = $this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }





      public function select_publisher_project_id($project_id){

        $this->db->select('*')->from('tblcover_designer')->where('project_id', $project_id);

        $query = $this->db->get();



        if ($query->num_rows() > 0){

          return $query->row_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }





      // Select Lead

      public function select_lead($project_id){ 

        $this->db->select('lead.*, collection.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->where('lead.project_id', $project_id)->limit(1)->order_by('collection.collection_id','DESC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

       public function viewall_collection(){ 

        $this->db->select('lead.*, collection.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->order_by('collection.collection_id','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_collection_byid($user_id){ 

        $this->db->select('lead.*, collection.*')->from('tbllead as lead')

        ->join('tblcollection as collection', 'lead.project_id = collection.project_id', 'inner')

        ->where('lead.user_id', $user_id)->order_by('collection.collection_id','ASC');

        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }



      // Select count lead

      public function select_count_lead($project_id){ 

        $this->db->select('*')->from('tblcollection')->where('project_id', $project_id);

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }

   // Select count ipes

      public function select_count_pipes_agent($user, $date_create){ 

        $this->db->select('*')->from('tblcollection')->where('collection_user_charge', $user)->where('collection_status', 'Assigned High')->where("DATE_FORMAT(alter_date_commitment, '%Y-%m-%d')='".$date_create."'");

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }
      public function select_count_pipes_manager($user_id, $date_create){ 

        $this->db->select('*')->from('tbllead')->where('manager_id', $user_id)->where('status', 'Assigned High')->where("DATE_FORMAT(date_create, '%Y-%m-%d')='".$date_create."'");

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }
      public function select_count_pipes_admin($user_id, $date_create){ 

        $this->db->select('*')->from('tbllead')->where('admin_id', $user_id)->where('status', 'Assigned High')->where("DATE_FORMAT(date_create, '%Y-%m-%d')='".$date_create."'");

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }


      public function update_lead($data, $project_id) { 

         $this->db->set($data); 

         $this->db->where("project_id", $project_id); 

         $this->db->update("tbllead"); 

      } 
      public function update_report_transaction($data, $transaction_id) { 

         $this->db->set($data); 

         $this->db->where("transaction_id", $transaction_id); 

         $this->db->update("tbltransaction_designer"); 

      } 
      public function update_report_designer($data, $designer_report_id) { 

         $this->db->set($data); 

         $this->db->where("designer_report_id", $designer_report_id); 

         $this->db->update("tbldesigner_report"); 

      } 



       public function update_date_received_designer($user_id) { 

         $this->db->set("date_received", "NOW()", FALSE); 

         $this->db->where("designer_user_id", $user_id);
         $this->db->where("date_received", NULL);

         $this->db->update("tbldesigner_report"); 

      } 
      public function update_date_received_designer_usertype(){ 


         $sql = "UPDATE tbldesigner_report AS report JOIN tbluser AS user ON report.designer_user_id = user.user_id SET report.date_received = NOW()  WHERE user.usertype =  'Cover Designer'";
          return $this->db->query($sql);
      } 


       public function update_lead_assign($data, $project_id) { 

         $this->db->set($data); 

         $this->db->where("project_id", $project_id); 

         $this->db->update("tbllead"); 

      } 

        public function update_lead_agent($data, $project_id) { 

         $this->db->set($data); 

         // $this->db->where("user_id", 0); 

         $this->db->where("project_id", $project_id); 

         $this->db->update("tbllead"); 
      } 

      public function update_lead_history($remark, $project_id) { 

         $this->db->set("create_remark", $remark); 

         $this->db->set("date_create_remark", "NOW()", FALSE); 

         $this->db->where("project_id", $project_id); 

         $this->db->update("tblremarks"); 
      } 







        public function get_last_record_collection($data, $project_id) { 

         $this->db->set($data); 

         $this->db->where("project_id", $project_id); 

         $this->db->limit(1)->order_by('collection_id','DESC');

         $this->db->update("tblcollection"); 

      } 



      public function select_create_date_manager(){

        $this->db->distinct()->select('DATE_FORMAT(date_create, "%Y-%m-%d") as date_create')->from('tbllead')->where(array('manager_id' => 0));

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }



      public function select_create_date_agent($manager_id){

        $this->db->distinct()->select('lead_date_assign')->from('tbllead')

        ->where('lead_date_assign !=', NULL)

        ->where('manager_id', $manager_id);

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      

      public function select_createexist_assign_manager($manager_id){

        $this->db->select('*')->from('tbllead')

        ->where('manager_id', $manager_id)  

        ->where('lead_assign', 1); 

        $query=$this->db->get();



        if ($query->num_rows() > 0){

            return true;

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_createexist_date_agent($user_id, $date_create){

        $this->db->select('*')->from('tbllead')

        ->where('user_id', $user_id)  

        ->where("DATE_FORMAT(date_create, '%Y-%m-%d')='".$date_create."'");

        $query=$this->db->get();



        if ($query->num_rows() > 0){

            return true;

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_count_existingleadmanager($user_id, $lead_date_assign){

        $this->db->select('*')->from('tbllead')

        ->where('manager_id', $user_id)  

        ->where('user_id', 0)

        ->where('check_lead', 1)

        ->where('lead_date_assign', $lead_date_assign);

         $query=$this->db->get();

        return $query->result_array();

        $db->close();

       }

       public function select_count_existingleadadmin($user_id){

        $this->db->select('*')->from('tbllead')

        ->where('manager_id', 0)  

        ->where('lead_assign', 0)

        ->where('admin_id', $user_id); 

         $query=$this->db->get();

        return $query->num_rows();

        $db->close();

       }
        public function report_cover_designer_id($project_id, $designer_report_id){ 
           
           $this->db->select('lead.*, report.*, designer.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tbldesigner_report as designer', 'report.project_id = designer.project_id', 'left')

          ->where('report.project_id', $project_id) 
          ->or_where('designer.designer_report_id', $designer_report_id)
          ->group_by('report.project_id')
          ->order_by('report.report_id','DESC');


          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function report_cover_designer_history_id($project_id, $designer_id){ 
           
          $this->db->select('lead.*, report.*, designer.*, user.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblreport_designer_history as designer', 'report.project_id = designer.project_id', 'inner')
          ->join('tbluser as user', 'designer.user_id = user.user_id', 'inner')

         
          ->where('report.project_id', $project_id)
          ->where('designer.user_id', $designer_id)

          ->order_by('designer.designer_history_id','ASC');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function report_cover_designer(){ 
           
            $this->db->select('lead.*, report.*, payment.*, cover_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblcover_designer as cover_designer', 'report.project_id = cover_designer.project_id', 'inner')
          ->join('tbluser as user', 'cover_designer.publisher_id = user.user_id', 'inner')
          ->join('tbldesigner_report as payment', 'user.user_id = payment.designer_user_id', 'left')
          ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')

         
          ->where('report.project_status', 'Approved Completion')
          ->or_where('report.project_status', 'Submitted')

          ->order_by('report.report_id','DESC')

          ->group_by(array('report.project_id'));

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

      public function report_cover_designer_user_id($user_id){ 
                 
                $this->db->select('lead.*, report.*, payment.*, cover_designer.*, user.*')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tblcover_designer as cover_designer', 'report.project_id = cover_designer.project_id', 'inner')
                ->join('tbluser as user', 'cover_designer.cover_user_id = user.user_id', 'inner')
                ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
               
                ->where('report.project_status', 'Approved Completion')
                ->or_where('report.project_status', 'Submitted')
                ->where('cover_designer.cover_user_id', $user_id)

                ->order_by('report.report_id','DESC')

                ->group_by(array('report.project_id'));

                $query=$this->db->get();

                return $query->result_array();

                $db->close();
        }
          public function report_publisher_cover_designer_user_id($user_id){ 
                 
                $this->db->select('lead.*, report.*, payment.*, cover_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tblcover_designer as cover_designer', 'report.project_id = cover_designer.project_id', 'inner')
                ->join('tbluser as user', 'cover_designer.publisher_id = user.user_id', 'inner')
                ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
                ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')
               
                ->where('report.project_status', 'Approved Completion')
                ->or_where('report.project_status', 'Submitted')
                 ->where('cover_designer.publisher_id', $user_id)

                ->order_by('report.report_id','DESC')

                ->group_by(array('report.project_id'));

                $query=$this->db->get();

                return $query->result_array();

                $db->close();
              }

               public function report_publisher_user_id($user_id){ 
                 
                $this->db->select('lead.*, report.*, payment.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tbluser as user', 'report.publisher_id = user.user_id', 'inner')
                ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
                ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')
               
                ->where('report.project_status', 'Approved Completion')
                ->or_where('report.project_status', 'Submitted')
                 ->where('report.publisher_id', $user_id)

                ->order_by('report.report_id','DESC')

                ->group_by(array('report.project_id'));

                $query=$this->db->get();

                return $query->result_array();

                $db->close();
              }
        
        
       public function report_interior_designer(){ 
           
          $this->db->select('lead.*, report.*, payment.*, interior_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblinteriror_designer as interior_designer', 'report.project_id = interior_designer.project_id', 'inner')
          ->join('tbluser as user', 'interior_designer.publisher_id = user.user_id', 'inner')
          ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
          ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')


         
          ->where('report.project_status', 'Approved Completion')
          ->or_where('report.project_status', 'Submitted')
          ->order_by('report.report_id','DESC')

          ->group_by(array('report.project_id'));

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
        public function report_interior_designer_user_id($user_id){ 
           
           $this->db->select('lead.*, report.*, payment.*, interior_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblinteriror_designer as interior_designer', 'report.project_id = interior_designer.project_id', 'inner')
          ->join('tbluser as user', 'interior_designer.interior_user_id = user.user_id', 'inner')
          ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
          ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')


         
          ->where('report.project_status', 'Approved Completion')
          ->or_where('report.project_status', 'Submitted')
          ->where('interior_designer.interior_user_id', $user_id)
          ->order_by('report.report_id','desc')

          ->group_by(array('report.project_id'));

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
       public function report_publisher_interior_designer_user_id($user_id){ 
           
          $this->db->select('lead.*, report.*, payment.*, interior_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblinteriror_designer as interior_designer', 'report.project_id = interior_designer.project_id', 'inner')
          ->join('tbluser as user', 'interior_designer.interior_user_id = user.user_id', 'inner')
          ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
          ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')
         
          ->where('report.project_status', 'Approved Completion')
          ->or_where('report.project_status', 'Submitted')
          ->where('interior_designer.publisher_id', $user_id)

          ->order_by('report.report_id','desc')

          ->group_by(array('report.project_id'));

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
       public function report_interior_designer_id($project_id, $designer_report_id){ 

         $this->db->select('lead.*, report.*, designer.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tbldesigner_report as designer', 'report.project_id = designer.project_id', 'left')

          ->where('report.project_id', $project_id) 
          ->or_where('designer.designer_report_id', $designer_report_id)
          ->group_by('report.project_id')
          ->order_by('report.report_id','DESC');

          $query=$this->db->get();  

          return $query->result_array();

          $db->close();

      }

        public function report_lead(){ 
           
          $this->db->select('lead.*, payment.*, report.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblpayment as payment', 'report.project_id = payment.project_id', 'inner')
          ->where('report.report_id IN (SELECT MAX(report_id) from tblauthorreport GROUP BY project_id ORDER BY report_id DESC)')
          ->order_by('lead.project_id','ASC');
            $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

              public function submission_lead(){ 
           
          $this->db->select('*')->from('tblauthorreport')
          ->where('author_id !=',0)
          ->order_by('report_id','ASC');
            $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
              public function report_lead_publisher_id($user_id){ 
                 
                $this->db->select('lead.*,  payment.*, report.*, cover_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tblpayment as payment', 'report.project_id = payment.project_id', 'inner')
                ->join('tblcover_designer as cover_designer', 'report.project_id = cover_designer.project_id', 'inner')
                ->join('tbluser as user', 'cover_designer.cover_user_id = user.user_id', 'inner')
                ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')
               
                 ->where('cover_designer.publisher_id', $user_id)

                ->order_by('report.report_id','DESC')
                ->group_by(array('report.project_id'));


                $query=$this->db->get();

                return $query->result_array();

                $db->close();
              }
        
         public function report_lead_publisher_user_id($user_id){ 
                 
                $this->db->select('lead.*,  payment.*, report.*,   user.*')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tblpayment as payment', 'report.project_id = payment.project_id', 'inner')
                ->join('tbluser as user', 'report.publisher_id = user.user_id', 'inner')
               
                 ->where('report.publisher_id', $user_id)

                ->order_by('report.report_id','DESC')
                ->group_by(array('report.project_id'));


                $query=$this->db->get();

                return $query->result_array();

                $db->close();
              }
        



        public function report_lead_agent($user_id){ 
           
          $this->db->select('lead.*, payment.*, report.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tblpayment as payment', 'report.project_id = payment.project_id', 'inner')
          ->where('report.report_id IN (SELECT MAX(report_id) from tblauthorreport GROUP BY project_id ORDER BY report_id DESC)')
          ->where('lead.user_id', $user_id)
          ->order_by('lead.project_id','ASC');
            $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function view_report($project_id){ 

          $this->db->select('lead.*, report.*')->from('tbllead as lead')
          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->where('report.project_id', $project_id)
          ->where('report.report_id IN (SELECT MAX(report_id) from tblauthorreport GROUP BY project_id ORDER BY report_id DESC)');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

        public function view_history_report($project_id){ 

          $this->db->select('*')->from('tblhistoryreport')
          ->where('project_id', $project_id)
          ->order_by('date_history','DESC');
          // ->where('ORDER BY date_report DESC)');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
        public function viewall_history_report(){ 

          $this->db->select('*')->from('tblhistoryreport');
          //->where('ORDER BY date_history DESC)');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function view_report_detail($project_id, $report_id){ 

          $this->db->select('lead.*, report.*')->from('tbllead as lead')
          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->where('report.project_id', $project_id)
          ->where('report.report_id', $report_id);

          $query=$this->db->get();

          return $query->row_array();

          $db->close();

      }
      public function view_report_designer($project_id, $designer_report_id){ 
          $this->db->select('lead.*, report.*, designer.*')->from('tbllead as lead')

          ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
          ->join('tbldesigner_report as designer', 'report.project_id = designer.project_id', 'left')

          ->where('report.project_id', $project_id) 
          ->or_where('designer.designer_report_id', $designer_report_id)
          ->group_by('report.project_id')
          ->order_by('report.report_id','DESC');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function view_occured_total($project_id, $designer_user_id){ 

          $this->db->select('SUM(total_amount) as total_amount')->from('tbldesigner_report')
         ->where('project_id', $project_id) 
         ->where('designer_user_id', $designer_user_id);


          $query=$this->db->get();
          $ret = $query->row();
          return $ret->total_amount;


          $db->close();

      }

       public function view_transaction_designer($project_id, $user_id){ 

          $this->db->select('*')->from('tbltransaction_designer')

          ->where('project_id', $project_id)
          ->where('user_id', $user_id);
          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

       public function view_interior_designer($project_id){ 

          $this->db->select('lead.* ,interior_designer.*')->from('tbllead as lead')

          ->join('tblinteriror_designer as interior_designer', 'lead.project_id = interior_designer.project_id', 'inner')

          ->where('interior_designer.project_id', $project_id)
          ->order_by('interior_designer.interior_id','DESC');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
       public function view_interior_designer_single($project_id, $report_id){ 

          $this->db->select('lead.* ,interior_designer.*')->from('tbllead as lead')

          ->join('tblinteriror_designer as interior_designer', 'lead.project_id = interior_designer.project_id', 'inner')

          ->where('interior_designer.project_id', $project_id)
          ->where('interior_designer.report_id', $report_id)
          ->order_by('interior_designer.interior_id','DESC');

          $query=$this->db->get();

            if ($query->num_rows() == 1){
       
                  return $query->row_array();

                }

                else{

                    return false;

                }


          $db->close();

      }
      public function view_cover_designer($project_id){ 

          $this->db->select('lead.*,cover_designer.*')->from('tbllead as lead')

          ->join('tblcover_designer as cover_designer', 'lead.project_id = cover_designer.project_id', 'inner')

          ->where('cover_designer.project_id', $project_id)
          ->order_by('cover_designer.designer_id','DESC');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
        public function view_cover_designer_single($project_id, $report_id){ 

          $this->db->select('lead.*,cover_designer.*')->from('tbllead as lead')

          ->join('tblcover_designer as cover_designer', 'lead.project_id = cover_designer.project_id', 'inner')

          ->where('cover_designer.project_id', $project_id)
          ->where('cover_designer.report_id', $report_id)
          ->where('cover_designer.status_cover', 'front_cover')
          ->order_by('cover_designer.designer_id','DESC');

          $query=$this->db->get();

             if ($query->num_rows() > 0){
       
                  return $query->row_array();

                }

                else{

                    return "false";

                }


          $db->close();

      }
       public function view_back_cover_designer_single($project_id, $report_id){ 

          $this->db->select('lead.*,cover_designer.*')->from('tbllead as lead')

          ->join('tblcover_designer as cover_designer', 'lead.project_id = cover_designer.project_id', 'inner')

          ->where('cover_designer.project_id', $project_id)
          ->where('cover_designer.report_id', $report_id)
          ->where('cover_designer.status_cover', 'back_cover')
          ->order_by('cover_designer.designer_id','DESC');

          $query=$this->db->get();

             if ($query->num_rows() > 0){
       
                  return $query->row_array();

                }

                else{

                    return "false";

                }


          $db->close();

      }
       public function view_front_cover_designer($project_id){ 

          $this->db->select('lead.* ,cover_designer.*')->from('tbllead as lead')

          ->join('tblcover_designer as cover_designer', 'lead.project_id = cover_designer.project_id', 'inner')

          ->where('cover_designer.status_cover', "front_cover")
          ->where('cover_designer.project_id', $project_id);


          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
          public function view_back_cover_designer($project_id){ 

          $this->db->select('lead.* ,cover_designer.*')->from('tbllead as lead')

          ->join('tblcover_designer as cover_designer', 'lead.project_id = cover_designer.project_id', 'inner')

          ->where('cover_designer.status_cover', "back_cover")
          ->where('cover_designer.project_id', $project_id);


          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }
      //   public function view_report($project_id){ 

      //     $this->db->select('lead.*, report.*')->from('tbllead as lead')

      //     ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')

      //     ->where('lead.project_id', $project_id)

      //     ->order_by('report.date_report','ASC');

      //     $query=$this->db->get();

      //     return $query->result_array();

      //     $db->close();

      // }


        public function view_report_history($project_id){ 

          $this->db->select('lead.*, report_history.*')->from('tbllead as lead')

          ->join('tblhistoryreport as report_history', 'lead.project_id = report_history.project_id', 'inner')

          ->where('lead.project_id', $project_id)

          ->order_by('report_history.date_history ','ASC');

          $query=$this->db->get();

          return $query->result_array();

          $db->close();

      }

      // update report

      public function update_report($data, $report_id) { 

         $this->db->set($data); 

         $this->db->where("report_id", $report_id); 

         $this->db->update("tblauthorreport"); 

      } 

      public function update_report_project_id($data, $project_id) { 

         $this->db->set($data); 

         $this->db->where("project_id", $project_id); 

         $this->db->update("tblauthorreport"); 

      } 


      // update interior Designer

      public function update_interior_designer($data, $interior_id) { 

         $this->db->set($data); 

         $this->db->where("interior_id", $interior_id); 

         $this->db->update("tblinteriror_designer"); 

      }

         // update interior Designer report ID

      public function update_interior_designer_report_id($data, $report_id) { 

         $this->db->set($data); 

         $this->db->where("report_id", $report_id); 

         $this->db->update("tblinteriror_designer"); 

      }



       // update cover Designer

      public function update_cover_designer_report_id($data, $report_id) { 

         $this->db->set($data); 

         $this->db->where("report_id", $report_id); 

         $this->db->update("tblcover_designer"); 

      } 
           public function update_cover_designer($data, $designer_id) { 

         $this->db->set($data); 

         $this->db->where("designer_id", $designer_id); 

         $this->db->update("tblcover_designer"); 

      } 
  public function select_cover_designer_id($project_id){ 

        $this->db->select('*')->from('tblcover_designer')

        ->where('project_id', $project_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return false;

        }

        else{

            return true;

        }

        $this->db->close();

      }

         // Select count lead

      public function select_count_report($project_id){ 

        $this->db->select('*')->from('tblauthorreport')->where('project_id', $project_id);

        $query=$this->db->get();

        return $query->num_rows();

        $db->close();

      }



       public function delete_report($report_id) { 

         if ($this->db->delete("tblauthorreport", "report_id = ".$report_id)) { 

            return true; 

         } 

      }

       public function delete_line_word($interior_id) { 

         if ($this->db->delete("tblinteriror_designer", array('interior_id' => $interior_id))) { 

            return true; 

         } 

      }


       public function select_author_name_project($project_id){ 

        $this->db->select('*')->from('tbllead')

        ->where('project_id', $project_id)

        ->order_by('date_create','ASC');

        $query=$this->db->get();



        if ($query->num_rows() == 1){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

        public function select_author_name_user_id($user_id){ 
                 
                $this->db->select('lead.*, report.*, cover_designer.*, user.*, leadproject.project_id as lead_project_id')->from('tbllead as lead')

                ->join('tblauthorreport as report', 'lead.project_id = report.project_id', 'inner')
                ->join('tblcover_designer as cover_designer', 'report.project_id = cover_designer.project_id', 'inner')
                ->join('tbluser as user', 'cover_designer.cover_user_id = user.user_id', 'inner')
                ->join('tbldesigner_report as payment', 'lead.project_id = payment.project_id', 'left')
                ->join('tbldesigner_report as leadproject', 'lead.project_id = leadproject.project_id', 'left')
               
                 ->where('cover_designer.publisher_id', $user_id)

                ->order_by('report.report_id','ASC');


                $query=$this->db->get();

                return $query->result_array();

                $db->close();
              }
        

      public function select_author_name(){ 

        $this->db->select('*')->from('tbllead')

        ->where('contractual_status', 'Signed')

        ->order_by('project_id','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();

        }

        else{

            return false;

        }

        $this->db->close();

      }

      public function select_author_name_exist(){ 

        $this->db->select('*')->from('tbllead')

        ->where('contractual_status', 'Signed')
        ->where('used', 0)

        ->order_by('project_id','ASC');

        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return $query->result_array();
        }

        else{

            return false;

        }

        $this->db->close();

      }


     public function select_report_projectid($project_id){

        $this->db->select('*')->from('tblauthorreport')->where('project_id', $project_id);

        $query = $this->db->get();



        if ($query->num_rows() == 1){

          return  "true";

        }

        else{

          return "false";

        }

        $this->db->close();

      }


      public function select_exist_lead($author_name, $email_address){ 

        $this->db->select('*')->from('tbllead')

        ->where('author_name', $author_name)
        ->where('email_address', $email_address)
        ->where('user_id', 0)
        ->where('manager_id', 0);


        $query=$this->db->get();



        if ($query->num_rows() > 0){

          return true;

        }

        else{

            return false;

        }

        $this->db->close();




   }


    public function select_lead_data($total_records_per_page, $offset){ 

        $this->db->select('lead.*, user.*')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
   
        ->order_by('lead.project_id','ASC')
        ->limit($total_records_per_page, $offset);
        $query=$this->db->get();

        return $query->result_array();

        $db->close();

      }

      public function select_interior_id($interior_id){

        $this->db->select('*')->from('tblinteriror_designer')

        ->where('interior_id', $interior_id);  

        $query=$this->db->get();


        if ($query->num_rows() > 0){
            return true;
        }

        else{

            return false;

        }

        $this->db->close();

      }


public function select_all_remark($project_id){ 

        $this->db->select('*')->from('tblremarks')->where('project_id', $project_id)->like('create_remark', 'Not Valid')->or_like('create_remark', 'Not Service')->order_by('date_create_remark','DESC')->limit(1);  

        $query=$this->db->get();

        if ($query->num_rows() > 0){

             return $query->row_array();
        }
        else{
            return false;
        }

        $this->db->close();

      }

        public function select_all_remark_date(){ 

            $this->db->select('lead.*, remark.*')->from('tbllead as lead')
            ->join('tblremarks as remark', 'lead.project_id = remark.project_id', 'left')
            ->where("IF(remark.date_create_remark IS NOT NULL, DATE_FORMAT(remark.date_create_remark, '%Y-%m-%d') <  DATE_SUB(NOW(), INTERVAL 1 DAY), DATE_FORMAT(lead.lead_date_agent_assign, '%Y-%m-%d') <  DATE_SUB(NOW(), INTERVAL 1 DAY))")
            ->group_by('remark.project_id')
            ->order_by('remark.date_create_remark','DESC');  

           $query=$this->db->get();

            if ($query->num_rows() > 0){

                 return $query->result_array();
            }
            else{
                return false;
            }

            $this->db->close();

        }


   /*   public function select_all_remark_date($rowno,$rowperpage, $search="", $start_date="", $end_date="", $user_id=""){ 
        $data = array();
        $item = array();
        $results = array();

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')->where('DATE_FORMAT(lead.lead_date_agent_assign, "%Y-%m-%d") <  DATE_SUB(NOW(), INTERVAL 1 DAY)');
        if($user_id !=""){
            $this->db->where('user.user_id', $user_id)->where('lead.lead_date_agent_assign IS NOT NULL', NULL, false)->order_by('lead.lead_date_agent_assign','DESC');  
         }
         else{

            $this->db->where('lead.lead_date_agent_assign IS NOT NULL', NULL, false)->order_by('lead.lead_date_agent_assign','DESC');  
         }




          if($search != ""){
             $this->db->like('lead.project_id', $search);
             $this->db->or_like('lead.author_name', $search);
             $this->db->or_like('lead.book_title', $search);
             $this->db->or_like('lead.email_address', $search);
            $this->db->or_like('lead.contact_number', $search);
          }
          $this->db->limit($rowperpage, $rowno); 

        $query=$this->db->get();

      
        if ($query->num_rows() > 0){

                foreach($query->result_array() as $key=>$item)
                {


                if($start_date == "" && $end_date == ""){

                    $this->db->select('create_remark, date_create_remark, project_id')->from('tblremarks')->where('DATE_FORMAT(date_create_remark, "%Y-%m-%d")  <  DATE_SUB(NOW(), INTERVAL 1 DAY)')->where_in('project_id', $item['project_id'])->order_by('date_create_remark','DESC')->limit(1);
                    }
                  else{
                      $this->db->select('create_remark, date_create_remark, project_id')->from('tblremarks')
                      ->where('DATE_FORMAT(date_create_remark, "%Y-%m-%d")  <  DATE_SUB(NOW(), INTERVAL 1 DAY)')
                      ->where("DATE_FORMAT(date_create_remark, '%Y-%m-%d') BETWEEN '".$start_date."'  AND  '".$end_date."'")
                      ->where_in('project_id', $item['project_id'])->order_by('date_create_remark','DESC')->limit(1);
                  }
                    $query1=$this->db->get();

                    $row = $query1->row_array();

                    $item['create_remark']  = $row['create_remark'] == null ? " No remark":  $row['create_remark'];
                    $item['date_create_remark']  =  $row['create_remark'] == null ? " No remark" : date("Y/m/d", strtotime($row['date_create_remark']));


                    $data[] = $item;

                }
                return $data;
            }
        else{

            return false;

        }

        $this->db->close();

      }
*/
     public function getrecord_CountNoactivities_Lead($search ="") {

         $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')->where('DATE_FORMAT(lead.lead_date_agent_assign, "%Y-%m-%d") <  DATE_SUB(NOW(), INTERVAL 1 DAY)')
        ->where('lead.lead_date_agent_assign  IS NOT NULL', NULL, false)
        ->order_by('lead.lead_date_agent_assign','ASC')->order_by('lead.lead_date_agent_assign','ASC');  

           if($search != ''){
                 $this->db->like('lead.project_id', $search);
                 $this->db->or_like('lead.author_name', $search);
                 $this->db->or_like('lead.book_title', $search);
                 $this->db->or_like('lead.email_address', $search);
                 $this->db->or_like('lead.contact_number', $search);
            }

          $query = $this->db->get();
 
         return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }   


  

 public function select_all_remark_valid_remark($project_id){ 

        $this->db->select('*')->from('tblremarks')->where('project_id', $project_id)->like('create_remark', 'Not Valid')->or_like('create_remark', 'Not Service')->order_by('date_create_remark','DESC')->limit(1);  
 

        $query=$this->db->get();

        if ($query->num_rows() > 0){

             return $query->row_array();
        }
        else{
            return false;
        }

        $this->db->close();

      }

  // public function select_all_remark($project_id){ 

  //       $this->db->select('*')->from('tblremarks')->where('project_id', $project_id);  

  //       $query=$this->db->get();

  //       if ($query->num_rows() > 0){

  //           return true;
  //       }

  //       else{

  //           return false;

  //       }

  //       $this->db->close();

  //     }


  public function select_all_collection($project_id){ 

        $this->db->select('*')->from('tblcollection')->where('project_id', $project_id);  

        $query=$this->db->get();

        if ($query->num_rows() > 0){

            return true;
        }

        else{

            return false;

        }

        $this->db->close();

      }


public function select_agent_assign_lead(){ 

        $this->db->select('lead.*, user.*, assign_user.*')->from('tbllead as lead')
        ->join('tbluser as user', 'user.user_id = lead.user_id')
        ->join('tblassignuser as assign_user', 'user.user_id = assign_user.user_id')
        ->where('user.usertype', 'Agent');
        $query=$this->db->get();

       if ($query->num_rows() > 0){

            return $query->result_array();
        }

        else{

            return false;

        }

      }

      public function select_remarks($project_id, $report_id){ 
        $this->db->select('*')->from('tblremarkproduction as remark')
        ->join('tbluser as user', 'user.user_id = remark.user_id')->where('remark.project_id', $project_id)->where('remark.report_id', $report_id);
        $query=$this->db->get();
        return $query->result_array();
        $this->db->close();
      }


       public function insert_production_remark($data) {

         if ($this->db->insert("tblremarkproduction", $data)) {

            return true;

         }

      }  

    public function view_gala(){ 
        $results = array(); 
        $get_author_id = array(); 
        $author_id = array();
        $this->db->select('*')->from('tblauthorreport')->where('author_id !=', 0)->where('project_id !=', 0);
        
        $query = $this->db->get()->result_array();
   
         foreach($query as $key=>$row){
               $author_id[] = $row['author_id'];
             }


            $this->hlm->select('wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name')->from('wpju_users')
             ->join('wpju_usermeta as firstmeta', 'wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = "first_name"','left') 
             ->join('wpju_usermeta as lastmeta', 'wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = "last_name"','left') 
              ->where_in('wpju_users.ID', $author_id == null? 0: $author_id);
              $query2 = $this->hlm->get()->result_array();


                foreach ($query as $crm) {
                    foreach ($query2 as $hlm) {
                        if ($crm['author_id'] == $hlm['ID']) {
                            $results[] =  array_merge($crm,$hlm);
                        }
                    } 
                }
              if ($results  > 0){
                  return $results;
              }
              else{
                  return false;
              }

          }


    public function view_gala_publisher_id($user_id){ 
        $results = array(); 
        $get_author_id = array(); 
        $author_id = array();
        $this->db->select('*')->from('tblauthorreport')->where('author_id !=', 0)->where('project_id !=', 0)->where('publisher_id', $user_id);
        
        $query = $this->db->get()->result_array();
   
         foreach($query as $key=>$row){
               $author_id[] = $row['author_id'];
             }


            $this->hlm->select('wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name')->from('wpju_users')
             ->join('wpju_usermeta as firstmeta', 'wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = "first_name"','left') 
             ->join('wpju_usermeta as lastmeta', 'wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = "last_name"','left') 
              ->where_in('wpju_users.ID', $author_id == null? 0: $author_id);
              $query2 = $this->hlm->get()->result_array();


                foreach ($query as $crm) {
                    foreach ($query2 as $hlm) {
                        if ($crm['author_id'] == $hlm['ID']) {
                            $results[] =  array_merge($crm,$hlm);
                        }
                    } 
                }
              if ($results  > 0){
                  return $results;
              }
              else{
                  return false;
              }

          }

      public function view_author_id($project_id, $report_id){ 
        $results = array(); 
        $get_author_id = array(); 
        $author_id = array();
        $this->db->select('*')->from('tblauthorreport')->where('author_id !=', 0)->where('project_id', $project_id)->where('report_id', $report_id);
        
        $query = $this->db->get()->result_array();
   
         foreach($query as $key=>$row){
               $author_id[] = $row['author_id'];
             }


            $this->hlm->select('wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name')->from('wpju_users')
             ->join('wpju_usermeta as firstmeta', 'wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = "first_name"','left') 
             ->join('wpju_usermeta as lastmeta', 'wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = "last_name"','left') 
              ->where_in('wpju_users.ID', $author_id == null? 0: $author_id);
              $query2 = $this->hlm->get()->row_array();


                foreach ($query as $crm) {
                    foreach ($query2 as $hlm) {
                        if ($crm['author_id'] == $hlm['ID']) {
                            $results[] =  array_merge($crm,$hlm);
                        }
                    } 
                }
              if ($results  > 0){
                  return $results;
              }
              else{
                  return false;
              }

          }

     public function view_author_exist($project_id){ 
        $results = array(); 
        $author_name = array();
        $author_email = array();
        $this->db->select('*')->from('tbllead')->where('project_id', $project_id);
        
               $row = $this->db->get()->row_array();
   
               $author_name[] = preg_replace("/\r|\n/", "", $row['author_name']);
               $author_email[] = preg_replace("/\r|\n/", "", $row['email_address']);
             


            $this->hlm->select('wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name')->from('wpju_users')
             ->join('wpju_usermeta as firstmeta', 'wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = "first_name"','left') 
             ->join('wpju_usermeta as lastmeta', 'wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = "last_name"','left') 
              ->where_in('CONCAT_WS(" ",firstmeta.meta_value, lastmeta.meta_value)', $author_name == null? '': $author_name)
              ->where_in('wpju_users.user_email', $author_email == null? '': $author_email);
              $query2 = $this->hlm->get();

              if ($query2->num_rows() == 1){
                   return $query2->row_array();
              }

             else{
                  return 'false';

            }
       }

      public function view_author_exist_project_id($author_id){ 
        $results = array(); 
        $author_name = array(); 
        $author_email = array();
              $this->hlm->select('wpju_users.ID, wpju_users.user_login, wpju_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name')->from('wpju_users')
             ->join('wpju_usermeta as firstmeta', 'wpju_users.ID = firstmeta.user_id and firstmeta.meta_key = "first_name"','left') 
             ->join('wpju_usermeta as lastmeta', 'wpju_users.ID = lastmeta.user_id and lastmeta.meta_key = "last_name"','left')
             ->where('wpju_users.ID', $author_id);

        
            $row = $this->hlm->get()->row_array();
   
              $author_name[] = preg_replace("/\r|\n/", "", $row['first_name'] .' '. $row['last_name']);
              $author_email[] = preg_replace("/\r|\n/", "", $row['user_email']);
             

            $this->db->select('*')->from('tbllead')
            ->where_in('author_name', $author_name == null? '': $author_name)
            ->where_in('email_address', $author_email == null? '': $author_email)
            ->where('contractual_status', 'Signed')
           ->where('used', 0)
            ->order_by('project_id','ASC');

              $query2 = $this->db->get();

               if ($query2->num_rows() > 0){
                   return $query2->result_array();
              }

             else{
                    return false;

            }


      }



    }  
?>


