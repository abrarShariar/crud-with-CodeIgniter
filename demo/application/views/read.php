	<body>
		<div class="container"> 
			<h2>Read</h2><br>
			<div class="container">

				<table class="table table-hover">
					<th>Username</th>
					<th>Age</th>
					<th>Skills</th>

					<!-- read data sent as assoc array -->
					<?php foreach ($read as $info): ?>
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
