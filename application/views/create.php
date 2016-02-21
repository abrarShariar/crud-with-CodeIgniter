<html>
<body>

<div class="container">
<h2>Create</h2><br>

<form class="form-inline" method="POST" action="<?php echo base_url() ?>main/new_data"  enctype="multipart/form-data">


 <div class="form-group">
    <label for="fname">First Name: </label>
    <input type="text" class="form-control" id="fname" placeholder="first name" name="fname">
  </div>
  <div class="form-group">
    <label for="lname">Last Name: </label>
    <input type="text" class="form-control" id="lname" placeholder="last name" name="lname">
  </div>

<div class="form-group">
    <label for="age">Age: </label>
    <input type="number" class="form-control" id="age" placeholder="Age" name="age">
  </div>
  <div class="form-group">
    <label for="skill">Skill: </label>
    <input type="text" class="form-control" id="skill" placeholder="your awesome skills" name="skill">
  </div>

  <button type="submit" class="btn btn-primary btn-small" name="post">Submit</button>

</form>
</div>



</body>
</html>