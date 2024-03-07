
<?php include ('template/headers.php') ?>

<!DOCTYPE html>
<html>
<head>
<div class = "container mt-2 mt-md-5">

	<div class="row">
		<div class="col-md-6 mt-2">
		<h2 class="text-center text-dark mb-2 ">Login</h2>
		<?php $validation = \Config\Services::validation(); ?>
		<form action="<?= base_url('admin/login') ?>" method="POST">
		  <?= csrf_field() ?>
		  <?php if(!empty(session()->getFlashdata('success'))) : ?>
				<div class="alert alert-success">
					<?= session()->getFlashdata('success') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		<?php if (!empty(session()->getFlashdata('fail'))) : ?>
				<div class="alert alert-danger">
					<?= session()->getFlashdata('fail') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
	  <div class="form-group">
		<label for="login_id">Username</label>
		<input type="text" class="form-control" <?php if(!empty($_COOKIE['usercookie']))echo $_COOKIE['usercookie']?>placeholder="Enter Username" 
		name="login_id" value="<?= set_value('login_id') ?>">
	  </div>
	  <?php if($validation->getError('login_id')): ?>
		<div class="d-block text-danger">
			<?= $validation->getError('login_id') ?>
		</div>
	  <?php endif; ?>
	  <div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control"<?php if(!empty($_COOKIE['userpassword']))echo $_COOKIE['userpassword']?> name="password" placeholder="password"
		value="<?= set_value('password') ?>">
	  </div>
	  <?php if($validation->getError('password')): ?>
		<div class="d-block text-danger">
			<?= $validation->getError('password') ?>
		</div>
	  <?php endif; ?>
	  <?php if(!empty($_COOKIE['usercookie']) && !empty($_COOKIE['userpassword'])) {?>
	  <div class="form-group">
		<label for="check">Remember Me</label>
		<input type="checkbox" id="check" name="check">
	  </div>
	  <?php }else { ?>
	  <label for="check">Remember Me</label>
		<input type="checkbox" id="check" name="check">
	  <?php } ?>

	  <input class="btn btn-primary float-right mt-2" type="submit" value="Sign In">
	</form>
	</div>
</body>
</html>
