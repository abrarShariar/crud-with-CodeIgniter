<html>
<body>

<div class="container">
<h2>Create</h2><br>

<form class="form" method="POST" action="<?php echo base_url() ?>main/new_data"  enctype="multipart/form-data">


 <div class="form-group">
    <label for="fname">First Name: </label>
    <input type="text" class="form-control" id="fname" placeholder="first name" name="fname">
    <small style="color:red">*Letters and spaces only</small>
  </div>
  <br>
  <div class="form-group">
    <label for="lname">Last Name: </label>
    <input type="text" class="form-control" id="lname" placeholder="last name" name="lname">
    <small style="color:red">*Letters and spaces only</small>
  </div>
  <br>

<div class="form-group">
    <label for="age">Age: </label>
    <input type="number" class="form-control" id="age" placeholder="Age" name="age">

  </div>
  <br>
  <div class="form-group">
    <label for="skill">Skill: </label>
    <input type="text" class="form-control" id="skill" placeholder="your awesome skills" name="skill">
    <small style="color:red">*Alpha numeric and spaces only</small>
  </div>
  <br>

  <button type="submit" class="btn btn-primary" name="post">Submit</button>

</form>
</div>



</body>
</html>