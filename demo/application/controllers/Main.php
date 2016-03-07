<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Crud');

		$this->load->helper(array('form', 'url','html'));
        
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
		$this->load->view('create');
	}

	//for create/insert
	public function create(){
		$this->load->view('index');
		$this->load->view('create');
	}

	// This function is called to INSERT data into the database
	public function new_data(){
		$this->load->library('form_validation');			
        //setting rules for each individual input fields
		$this->form_validation->set_rules('fname','First Name','required|alpha_numeric_spaces');		
		$this->form_validation->set_rules('lname','Last Name','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('skill','Skills','alpha_numeric_spaces');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('index');
			$this->load->view('create');
			echo "<h3 style='color:red;text-align:center'>Please Enter valid information !!</h3>";
		}else{
			//check if first_name/last_name already exists
			$allData=$this->Crud->read_data();
			//var_dump($allData);
			if($this->Crud->distinct_data($allData)){
				$this->Crud->insert_data();
			}else{
				echo "<h3 style='color:red;text-align:center'>You are already registered !!</h3>";
				$this->create();
			}
		}
	}	

		//for READ/fetch data
	public function read(){
		$this->load->view('index');
		$data['read'] = $this->Crud->read_data();
		//var_dump($data);
		$this->load->view('read',$data);
	}

		//for displaying the archive (SELECT * )
	public function archive(){
		$this->load->view('index');
		$data['read'] = $this->Crud->read_data();
		$this->load->view('archive',$data);
	}

	//for EDIT specific row of data
	public function edit(){
		$this->load->view('index');
		//$id=$_REQUEST['id'];								//get the id passed by url				
		$data['edit_info'] = $this->Crud->edit_data();		//get the row to be edited
		$this->load->view('edit', $data);
	}
	
	//method for UPDATE
	public function update(){
		$id=$_REQUEST['id'];
		//checking if input data is valid
	if($this->form_validation->run() == FALSE){				
		echo "<br><h3 style='color:red;text-align:center'>Please Enter valid information !!</h3>";
		$this->edit();
	}
	else{
		if($this->Crud->update_data($id)){
			echo "<h3 style='text-align:center'>Successfully updated !! </h3>";
		}else{
			echo "<h3 style='text-align:center'> Update Failed !! </h3>?>";
		}
		$this->read();
		}	
	}

	public function delete(){
		$id=$_REQUEST['id'];
		if($this->Crud->delete_data($id)){
			echo "<h3 style='text-align:center'>Entry Successfully deleted !!</h3>";
		}else{
			echo "<h3 style='text-align:center'>Failed to delete entry !! Try Again</h3>";
		}
		$this->archive();
	}


	//for SEARCH of data (all)
	public function search(){
		$text=$this->input->post('search');						//get the text to search 
		$result=$this->Crud->search_id($text);						//get all data from db

		if(count($result)==0){
			echo "<br><h3 style='color:red;text-align:center'>No result found!!</h3>";
			$this->load->view('index');

			//$this->archive();
		}else{
			$this->read_specific($result);
		}

		//for DEBUGGING
		//var_dump($result);
		//var_dump($allData);
	}

	public function read_specific($result){
		$data['read']=$this->Crud->read_specific_data($result);
		$this->load->view('index');
		$this->load->view('search_result',$data);

		//...test code [DEBUG]
		// foreach ($data as $key => $value) {
		// 	foreach ($value as $key2 => $value2) {
		// 		echo $value2['first_name'];
		// 	}
		// 	echo "<br>";
		// }
	}

	public function search_filter(){
			$text=$this->input->post('search_text');						//get the text to search 
			$filter=$this->input->post('filter');

			$result=$this->Crud->search_filterId($text,$filter);
		//if no data found show error
		if(count($result)==0){
			echo "<br><h3 style='color:red;text-align:center'>No result found!!</h3>";
			$this->load->view('index');	
		}else{
			$this->read_specific_filter($result);
		}
	}

	public function read_specific_filter($result){
		$data['read']=$this->Crud->read_specific_data($result);
		$this->load->view('index');
		$this->load->view('search_result_filter',$data);
	}
}
?>