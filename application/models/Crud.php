<?php 
	class Crud extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//[INSERT]
	public function insert_data(){
		$fname=$this->input->post('fname');				//fetch data sent by form over POST using specific input name
		$lname=$this->input->post('lname');
		$age=$this->input->post('age');		
		$skill=$this->input->post('skill');
		$insert_data = array(							//array of all data to be inserted into db
			'first_name'=>$fname,
			'last_name'=>$lname,
			'age' => $age,
			'skill' => $skill,
			);

				//on successful insert of data
		         if($this->db->insert('demo', $insert_data)){		//load array to database
		         													//show success message
		         		 echo "Congratulations ".$insert_data['first_name']." your data was successfully inserted !!<br><br>";
		         		 echo "<a href='".base_url()."main/read'>"."Main Page </a>";												 
		     		}else{
		     			echo "Sorry ".$insert_data['first_name']." your data was not inserted !!<br><br>";
		     			echo "<a href='".base_url()."'>"."Main Page </a>";	
		     		}
			}

			//fetch/READ data from database [SELECT]
			public function read_data(){
				$query = $this->db->query('SELECT * FROM demo ORDER BY id DESC');		//show the latest inserted data first
				return $query->result_array();
			}

			//fetch/READ data from database
			public function edit_data(){
				$id=$_REQUEST['id'];
				$query = $this->db->get_where('demo', array('id' => $id));			//get the row specified by id from the table demo
				return $query->result_array();										//return the query result
			}
			//UPDATE data
			public function update_data($id){

					$fname=$this->input->post('fname');
					$lname=$this->input->post('lname');
					$age=$this->input->post('age');
					$skill=$this->input->post('skill');

					$data = array(
						'first_name' => $fname,
						'last_name' => $lname,
						'age' => $age,
						'skill' => $skill,
						);
					$this->db->where('id', $id);
					
					if($this->db->update('demo', $data)){						//check if update was successfull
						return true;
					}else{
						return false;
					}
				}


			//DELETE data
			public function delete_data($id){
				
				if($this->db->delete('demo',array('id'=>$id))){
					return true;
				}else{
					return false;
				}

			}

			//check if first_name && last_name is unique
			public function distinct_data($allData){
				
				$fname=$this->input->post('fname');
				$lname=$this->input->post('lname');
				foreach ($allData as $info) {
					if($info['first_name']==$fname && $info['last_name']==$lname){
						return false;
					}
				}
				return true;
			}

	}
 ?>