<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

	// var $table = 'customers';
	// var $column_order = array(null, 'FirstName','LastName','phone','address','city','country'); //set column field database for datatable orderable
	// var $column_search = array('FirstName','LastName','phone','address','city','country'); //set column field database for datatable searchable 
	// var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// private function _get_datatables_query()
	// {
		
	// 	$this->db->from($this->table);

	// 	$i = 0;
	
	// 	foreach ($this->column_search as $item) // loop column 
	// 	{
	// 		if($_POST['search']['value']) // if datatable send POST for search
	// 		{
				
	// 			if($i===0) // first loop
	// 			{
	// 				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	// 				$this->db->like($item, $_POST['search']['value']);
	// 			}
	// 			else
	// 			{
	// 				$this->db->or_like($item, $_POST['search']['value']);
	// 			}

	// 			if(count($this->column_search) - 1 == $i) //last loop
	// 				$this->db->group_end(); //close bracket
	// 		}
	// 		$i++;
	// 	}
		
	// 	if(isset($_POST['order'])){
	// 		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	// 	} 
	// 	else if(isset($this->order)){
	// 		$order = $this->order;
	// 		$this->db->order_by(key($order), $order[key($order)]);
	// 	}
	// }

	// function get_datatables()
	// {
	// 	$this->_get_datatables_query();
	// 	if($_POST['length'] != -1)
	// 	$this->db->limit($_POST['length'], $_POST['start']);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function count_filtered()
	// {
	// 	$this->_get_datatables_query();
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }

	// public function count_all()
	// {
	// 	$this->db->from($this->table);
	// 	return $this->db->count_all_results();
	// }

	 // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 

      $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')
        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        // ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC'); 

    if($search != ''){
      $this->db->like('lead.contact_number', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

   public function select_lead_manager_all_lead($rowno,$rowperpage,$search=""){ 
        $data = array();
        $item = array();
        $results = array();

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        // ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC'); 

            if($search != ''){
			      $this->db->like('lead.contact_number', $search);
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


  // Select total records
  public function getrecordCount($search = '') {

        $this->db->select('lead.*, user.*, assign_user.firstname as fname, assign_user.lastname as lname')->from('tbllead as lead')

        ->join('tbluser as user', 'lead.user_id = user.user_id', 'inner')
        ->join('tbluser as assign_user', 'lead.user_id = assign_user.user_id', 'inner')

        // ->where('lead.manager_id', $manager_id)

        ->order_by('lead.date_create','ASC'); 
		   if($search != ''){
			    $this->db->like('lead.contact_number', $search);
		    }

          $query = $this->db->get();
 
  	   return array("count" =>$this->db->count_all_results(), "num_rows" => $query->num_rows()) ;

  }

}
