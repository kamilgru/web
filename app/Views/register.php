<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <?php include('template/headers.php'); ?>

    <div class="col-md-6 mt-2">
        <h2 class="text-center text-dark mb-2">Register</h2>
		
	<style>
    @media only screen and (max-width: 414px) {
        body {
            background-color: white;
        }
    }
</style>
	
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<?php
	function display_error($validation,$field) {
		if(isset($validation))
		{
			if($validation->hasError($field))
			{
				return $validation->getError($field);
			}
			else
			{
				return false;
			}
		}
	}
	?>
		

        <?= form_open(); ?>
          <div class='form-group'>
				<label>Full Name</label>
				<input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" value='<?=set_value('fullname')?>'>
				<span class="text-danger"><?= display_error($validation, 'fullname')?></span>
			  </div>
			  <div class='form-group'>
				<label>Email</label>
				<input type="text" name="email" class="form-control" placeholder="Enter Email" value='<?=set_value('email')?>'>
				<span class="text-danger"><?= display_error($validation, 'email')?></span>
			  </div>
			  <div class='form-group'>
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Enter Username" value='<?=set_value('username')?>'>
				<span class="text-danger"><?= display_error($validation, 'username')?></span>
			  </div>
			  <div class='form-group'>
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span class="text-danger"><?= display_error($validation, 'password')?></span>
			  </div>
			  <div class='form-group'>
				<input type="submit" name='register' value='Register' class='btn btn-primary'>
        <?= form_close(); ?>
    </div>
</body>
</html>
