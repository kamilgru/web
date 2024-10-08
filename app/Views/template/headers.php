<!DOCTYPE html>
<html>
<head>
	<title>MuscleMinder</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light container">
	  <a class="navbar-brand" href="<?=base_url('admin/home')?>">MuscleMinder</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="<?=base_url('admin/login')?>">Login</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?= base_url('admin/register')?>">Register</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?= route_to('admin.logout') ?>">Logout</a>
		  </li>
		</ul>
	  </div>
	</nav>