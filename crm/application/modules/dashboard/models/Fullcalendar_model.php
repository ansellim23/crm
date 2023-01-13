<?php

class Fullcalendar_Model extends CI_Model
{
	function fetch_all_event(){

		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
	function fetch_all_company(){
		$this->db->where('type', 'Company');
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
	function fetch_stats_agent($user_id){
		$this->db->where('type', 'Stats');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
	function fetch_all_personal(){
		$this->db->where('type', 'Personal');
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
    function fetch_personal_agent($user_id){
		$this->db->where('type', 'Personal');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}



	public function view_event($type, $status_event){
		$this->db->where('type', 'TimeLine');
		$this->db->or_where('type', $type);
		$this->db->where_in('status_event', $status_event);
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
   public function view_status_event($type, $status_event){
		$this->db->where('type', $type);
		$this->db->where_in('status_event', $status_event);
			$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
	public function view_event_user($type, $status_event, $user_id){
		$this->db->where('type', 'TimeLine');
		$this->db->or_where('type', $type);
		$this->db->where_in('status_event', $status_event);
		$this->db->where_in('user_id', $user_id);
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}
	public function view_status_event_user($type, $status_event, $user_id){
		$this->db->where('type', $type);
		$this->db->where_in('status_event', $status_event);
		$this->db->where_in('user_id', $user_id);
		$this->db->order_by('event_id');
		return $this->db->get('tblevent');
	}


	function insert_event($data)
	{
		$this->db->insert('tblevent', $data);
	}

	function update_event($data, $event_id)
	{
		$this->db->where('event_id', $event_id);
		$this->db->update('tblevent', $data);
	}

	function delete_event($event_id)
	{
		$this->db->where('event_id', $event_id);
		$this->db->delete('tblevent');
	}
	function select_exist_datequater($start_date, $end_date){
        $this->db->select('*')->from('tblevent')

        ->where('DATE_FORMAT(event_start, "%Y-%m-%d") = "'.$start_date.'"')
        ->where('DATE_FORMAT(event_end, "%Y-%m-%d") = "'.$end_date.'"');
        $query=$this->db->get();

        if ($query->num_rows() > 0){

           return true;

        }

        else{

            return false;

        }

        $this->db->close();

      }
        public function select_user_events($user_id,$start,$end,$status){
        $this->db->select('*')->from('tblevent')
        ->where('to_user', $user_id)
        ->where('event_level', $status)
        ->where("DATE_FORMAT(event_start, '%Y-%m-%d %H:%i:%s') BETWEEN '".$start."'  AND '".$end."'");
        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return $query->result_array();
        }
        else{
            return false;
        }
        $this->db->close();
      }


       public function select_event_id($event_id){

        $this->db->select('*')->from('tblevent')->where(array('event_id ' => $event_id));

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