	<body>
	<div class="container"> 
			<h2>Read</h2><br>
			<div class="container">
				<!-- search by filter -->
	<div id="search_filter">
		<strong>Search by filter: </strong>
		<form method="POST" action="<?php echo base_url() ?>main/search_filter">
		<select name="filter">
 	 		<option value="username">Username</option>
  			<option value="age">Age</option>
  			<option value="skill">Skill</option>
		</select>
		<input type="text" name="search_text">
		<input type="submit" value="Search" class="btn btn-primary" name="search">
		</form>
	</div>
	<br><br>
				<table class="table table-hover">
					<th>Username</th>
					<th>Age</th>
					<th>Skills</th>

					<!-- read data sent as assoc array -->
					<?php
					foreach ($read as $key => $value)
						foreach ($value as $key2 => $info) : ?>
						<tr>
							<td><?php echo $info['first_name']."_".$info['last_name'] ?></td>
							<td><?php echo $info['age'] ?></td>
							<td><?php echo $info['skill'] ?></td>
						</tr>
					<?php endforeach ?>
					</table>
			</div>
		</div>

	</body>	
