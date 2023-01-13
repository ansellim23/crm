<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customers_model','customers');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('customers_view');
	}

	public function ajax_list()
	{

	 $rowperpage = 50;
    // Row position
	 $rowno = $_POST['start'];

 
		$list = $this->customers->select_lead_manager_all_lead($rowno,$rowperpage,$_POST['search']['value']);
		$data = array();
	
		foreach ($list as $lead) {
			   $data[]= $lead;
		}
		  $query = $this->customers->getrecordCount($_POST['search']['value']);


		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $query['count'],
						"recordsFiltered" => $query['num_rows'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}
