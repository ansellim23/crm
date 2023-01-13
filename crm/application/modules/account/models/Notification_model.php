  <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



   class Notification_Model extends CI_Model {

      

      function __construct() {

         parent::__construct();

         $this->hlm = $this->load->database('hlm', TRUE);  
      }



      public function insert($data) {

         if ($this->db->insert("tblnotification", $data)) {

            return true;

         }

      }
      
      public function insert_author_notification($data) {

         if ($this->hlm->insert("tblnotification", $data)) {

            return true;

         }

      }


     public function view_notification_user($user_id, $from_user, $from_usertype){

        $this->db->select('*')->from('tblnotification ')
        ->where('to_user_id', $user_id)
        ->where('from_user !=', $from_user)
        ->where('from_usertype !=', $from_usertype)
        ->order_by('date_notify','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }

     public function view_notification_user1($user_id, $from_user, $from_usertype){

        $this->db->select('*')->from('tblnotification ')
        ->where('to_user_id', $user_id)
        ->where('from_user !=', $from_user)
        ->where('from_usertype !=', $from_usertype)
        ->order_by('date_notify','ASC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();

      }

     public function select_count_notification($user_id, $from_user, $from_usertype){ 

        $this->db->select('*')->from('tblnotification')->where('to_user_id', $user_id)->where('unread', 1)->where('from_user !=', $from_user)->where('from_usertype !=', $from_usertype);

        $query=$this->db->get();

        return $query->num_rows();

        $this->db->close();

      }

        public function update_notification($user_id, $from_user, $from_usertype) { 

         $this->db->set("unread", 0); 

         $this->db->where("to_user_id", $user_id); 
         $this->db->where("from_user !=", $from_user); 
         $this->db->where("to_user_id !=", $from_usertype); 

         $this->db->update("tblnotification"); 

      } 

        public function select_user_memos($user_id) { 

         $this->db->select('*')->from('tblnotification as notification')
         ->join('tbluser as user', 'user.user_id = notification.to_user_id', 'inner')
         ->where('to_user_id', $user_id)
         ->where_in('title', array('Memo','Incentive'))
         ->order_by('date_notify','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }

           public function select_user_memos1($from_user, $user_id) { 

         $this->db->select('*')->from('tblnotification as notification')
         ->join('tbluser as user', 'user.user_id = notification.to_user_id', 'inner')
         ->where('from_user', $from_user)
         ->where_in('title', array('Memo','Incentive'))
         ->order_by('date_notify','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }
   //leave forms
   public function select_user_forms($user_id) { 

         $this->db->select('*')->from('tblforms as form')
         ->join('tbluser as user', 'user_id = form.user_id', 'inner')
         ->where('user_id', $user_id)
         ->where_in('title', array('Leave','Form'))
         ->order_by('date_create','DESC');

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }



       public function view_memo($memo_id, $user_id) { 

         $this->db->select('*')->from('tblnotification as notification')
         ->join('tbluser as user', 'user.user_id = notification.to_user_id', 'inner')
         ->where('notification_id', $memo_id)
         ->where('to_user_id', $user_id);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }

    public function view_memo1($memo_id, $user_charge) { 

         $this->db->select('*')->from('tblnotification as notification')
         ->join('tbluser as user', 'user.user_id = notification.to_user_id', 'inner')
         ->where('notification_id', $memo_id)
         ->where('from_user', $user_charge);

        $query=$this->db->get();

        if ($query->num_rows() > 0){

          return $query->result_array();

        }
        else{

            return false;

        }

        $this->db->close();


   }
   


}

?>

