<style type="text/css">
.drop{

	    float: left;
}
</style>

<body>
	<div class="container"> 
			<h2>Archive</h2><br>
			<div class="container">
				<br>

				<!-- dropdown with a search feature -->

	<p class="drop">
	<form action="<?php echo base_url() ?>main/search"  enctype="multipart/form-data"  class="form-group drop" method="POST">
  		<input type="text" name="search">
  		<button type="submit" class="btn btn-primary btn-small" name="submit">Search</button>
  		<br><br>
	</form>
	</p>
				<table class="table table-hover">
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
					<th>Skills</th>
					<th>Options</th>

					<!-- read data sent as assoc array -->

					<?php foreach ($read as $info): ?>
						<tr>
							<td><?php echo $info['first_name'] ?></td>
							<td><?php echo $info['last_name'] ?></td>
							<td><?php echo $info['age'] ?></td>
							<td><?php echo $info['skill'] ?></td>
							<td><a href="<?php echo base_url().'main/edit?id='.$info['id']; ?>">Edit</a>
								&nbsp<a href="<?php echo base_url().'main/delete?id='.$info['id']; ?>" style="color:red">Delete</a></td>
						</tr>
					<?php endforeach ?>
					</table>

			</div>
		</div>
</body>