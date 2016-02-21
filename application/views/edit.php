<body>
		<div class="container">
<h2>Update</h2><br>

<?php foreach ($edit_info as $info):?>
<form class="form-inline" method="POST" action="<?php echo base_url().'main/update?id='.$info['id']; ?>"enctype="multipart/form-data">
 <div class="form-group">
    <label for="fname">First Name: </label>
    <input type="text" class="form-control" id="fname" placeholder="first name" name="fname" value="<?php echo $info['first_name']?>">
  </div>
  <div class="form-group">
    <label for="lname">Last Name: </label>
    <input type="text" class="form-control" id="lname" placeholder="last name" name="lname" value="<?php echo $info['last_name']?>">
  </div>

<div class="form-group">
    <label for="age">Age: </label>
    <input type="number" class="form-control" id="age" placeholder="Age" name="age" value="<?php echo $info['age']?>">
  </div>
  <div class="form-group">
    <label for="skill">Skill: </label>
    <input type="text" class="form-control" id="skill" placeholder="your awesome skills" name="skill" value="<?php echo $info['skill']?>">
  </div>
  <button type="submit" class="btn btn-success btn-small" name="post">Update</button>
  <?php endforeach?>

</form>
</div>




</body>	