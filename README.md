# CRUD++
**C**reate **R**ead **U**pdate **D**elete **+** much more handy stuffs you will be using frequently with CodeIgniter !!

[CodeIgniter](https://www.codeigniter.com/userguide3/general/welcome.html) is the perfect choice for getting acquainted with the MVC pattern. CRUD++ is mainly a demo of the control flow of this framework. The code is well-documented so that you can modify and configure with your application.

#Features:


  - *Create* [insert data into database]
  - *Read* [fetch data from database]
  - *Update* [update existing data]
  - *Edit* [edit an existing entry]
  - *Delete* [delete an entry from database]
  - *Search All* [search all entry with a specific keyword]
  - *Search Filter* [search specific column entry with a specific keyword]
  - *Form Validation* [validate form to restrict/secure entry]
  - *Register/Sign up* [register new user with unique username]
  - *Login/Sign in* [let registered users sign in using valid password]
  
# Directory Structure:

After unpacking the project you will find the following  directory structure :
	
	./assets
		-css
		-fonts
		-js
	./demo
		-application
			..
			-config
			-controllers
			-models
			-views
			..
		-system
		..


In this demo we will only be working in the directories shown above. Keep the rest of the other directories untouched. 

# Prepare DB

I am using MYSQLi for this demo. The database name is set to **heisenbug**. You can drag and drop the SQL query below and create a table. <br>
**Note: For keeping things simple name your DB 'heisenbug' and create the table for this demo. Later you can change accordingly** 

	CREATE TABLE demo (id int PRIMARY KEY AUTO_INCREMENT,
			first_name varchar(255),
			last_name varchar(255),
			age int,
			skill varchar(255));


# Configure with your application:

[Download](https://github.com/abrarShariar/crud/archive/master.zip) and **Change the folder name to *crud* and place it under the htdocs folder of your Xampp installation directory**<br> 
Your path should look like this

	../htdocs/crud/

Now Follow the steps mentioned below to configure CRUD++ with your application

###Config Database

Open *../application* directory. Here you will find the *config* subfolder. Open the *database.php* file under this sub-folder. Your path should be like:

      ../application/config/database.php

Open the *database.php* file. In the lower section you will find the following code

    $db['default'] = array(
	  'dsn'	=> '',
	  'hostname' => 'localhost',	//your host name
	  'username' => 'root',			//username of your db
	  'password' => '',				//password of your db
	  'database' => 'heisenbug',			//your db name
	  ...
	  ..

I am setting the *hostname* to 'localhost' cause I will be tesing it from localhost. I will be using a database named 'heisenbug'.<br>
In case you are not using 'MySQLi' as your database driver then you have to change the following accordingly

      'dbdriver' => 'mysqli',       //set your db driver accoridngly
     
###Config base_url

By default the base_url id set in:

	 ../application/config/config.php
	 
You will notice the following code:

	$config['base_url'] = 'http://localhost/crud/demo';

Keep it untouched for now, later you can configure the path according to your application controller.
I have also removed the 'index.php' from CI's default URI path. Read [Clean URI](https://github.com/TheHeisenbugs/Sustainable-Tourism/blob/abrar/clean_uri.md) 

###Config route

Open the 'routes.php' file in the following path

	../application/config/routes.php
	
Here you will find:

	$route['default_controller'] = 'main';
	$route['404_override'] = '';

that is, the 'default_controller' is set to 'main'. Leave it untouched for now. I am using the controller *Main* as the default for this demo.

###Controller

The only controller we will use for this demo is *Main*. See [Code](https://github.com/abrarShariar/crud/blob/master/demo/application/controllers/Main.php). There are **13** functions including the constructor. Each of the function is specified for a particular task which can be implied from its naming.<br> Example :
The **new_data()** function creates a new entry into the database and returns a error/success message after checking valid form input.


	// This function is called to INSERT data into the database
	public function new_data(){
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
	
###Model

*Crud* is the default model for this demo. See [Code](https://github.com/abrarShariar/crud/blob/master/demo/application/models/Crud.php). The function **11** functions and each interacts with the db for a specific task. Their functionality can be implied by their naming <br> Example: The function **update_data()** updates an already existing entry in the db


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
					
					if($this->db->update('demo', $data)){		//check if update was successfull
						return true;
					}else{
						return false;
					}
				}
	
###View 

The view is separated into **7** files. Here also the filename is identical to its functionality. Bootstrap's CSS has been linked in the *index.php* file.<br>
**NOTE: The frontend is kept as minimal as possible cause this demo mostly focus the control flow of CI in the backend**

# Up & Running

Considering you have followed the above steps precisely, its time to ignite your *CodeIgniter* !! . From your default browser run :

	http://localhost/crud/demo/
	
Explore the code and send **Pull Requests** !!<br>

**NOTE: The code is well-documented as much as possible. If you find any piece of code utterly indigestible feel free to open an issue, I will definately look into it**
