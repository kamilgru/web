<!DOCTYPE html>
<html>
<head>
<div class = "container mt-2 mt-md-5">

	<div class="row">
		<div class="col-md-6 mt-2">
		<h2 class="text-center text-dark mb-2 ">Login</h2>
		<form action="login_process.php" method="post">
	  <div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" <?php if(!empty($_COOKIE['usercookie']))echo $_COOKIE['usercookie']?> id="username" name="username" placeholder="Enter Username">
	  </div>
	  <div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control"<?php if(!empty($_COOKIE['userpassword']))echo $_COOKIE['userpassword']?> id="password" name="password" placeholder="password">
	  </div>
	  <?php if(!empty($_COOKIE['usercookie']) && !empty($_COOKIE['userpassword'])) {?>
	  <div class="form-group">
		<label for="check">Remember Me</label>
		<input type="checkbox" id="check" name="check">
	  </div>
	  <?php }else { ?>
	  <label for="check">Remember Me</label>
		<input type="checkbox" id="check" name="check">
	  <?php } ?>
	  <button type="submit" class="btn btn-primary float-right mt-2">Login</button>
	</form>
	</div>
		<div class="col-md-6 mt-2">
		<h2 class="text-center text-dark mb-2 ">Register</h2>
		<form action="register.php" method="post">
  <div class="form-group">
    <label for="full_name">Full Name</label>
    <input type="text" class="form-control" id="full_name" name="full_name" required="" placeholder="Enter Full Name">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required="" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required="" placeholder="password">
  </div>
  <button type="submit" class="btn btn-primary float-right mt-2">Register</button>
</form>
		</div>
	</div>
	</div>
	
</body>
</html>