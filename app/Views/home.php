<!DOCTYPE html>
<html lang="en">
<?php include ('template/headers.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css" />
	
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>
	<script>
		new DataTable('#post');
	</script>

</head>
<body>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Genre</th>
		<th>Description</th>
		<th>Created</th>
		<th>Action</th>
        </tr>
        </thead>
		
			 <?php
				foreach($post as $row){
				?>
				 <tr> <!-- Add this line -->
				 <td><?php echo $row['id']; ?></td>
				 <td><?php echo $row['title']; ?></td>
				 <td><?php echo $row['genre']; ?></td>
				 <td><?php echo $row['description']; ?></td>
				 <td><?php echo $row['created_at']; ?></td>
				 <td>
					<a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
					<a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnDelete">Delete</a>
					</td>
					</tr>
					<?php
					}
					?>
	
	<script>
		new DataTable('#example');
	</script>
</body>
</html>
