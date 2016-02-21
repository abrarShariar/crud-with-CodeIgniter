
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">	
 <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css"> -->
<html>
<head>
<style type="text/css">

	#navbar{

/*		width:25%;
*/		background-color: rgba(6, 8, 8, 0.84);

}
.nav li a{
	color: #B75133;

}
.container{
	text-align: center;
}
.table{
	    font-size: medium;
}

</style>

<title>CRUD with CodeIgniter</title>
</head>
<body>
	<!-- navbar -->
	<div id="navbar" >
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a href="<?php echo base_url() ?>main/create">Create</a></li>
			<li role="presentation"><a href="<?php echo base_url() ?>main/read">Read</a></li>
			<li role="presentation"><a href="<?php echo base_url() ?>main/archive ">Archive</a></li>
		</ul>
	</div>
	<div class="container">
		
		<h3>Demo of <em>CRUD</em> using CodeIgniter</h2>
	</div>
</body>
</html>