# CRUD++
**C**reate **R**ead **U**pdate **D**elete **+** much more handy stuffs you will be using frequently with CodeIgniter !!

[CodeIgniter](https://www.codeigniter.com/userguide3/general/welcome.html) is the perfect choice for getting acquainted with the MVC pattern. CRUD++ is mainly a demo of the control flow of this framework. The code is well-documented so that you can modify and configure with your application.

#Features:


  - *Create* [insert data into database]
  - *Read* [fetch data from database]
  - *Update* [update existing data]
  - *Edit* [edit an existing entry]
  - *Delete* [delete an entry from database]
  - *Search* [search an entry with a specific keyword]
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
	
