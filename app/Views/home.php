
<?php include ('template/headers.php') ?>

<div class="container mt-4">
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>User Posts</h5>
				</div>
				<div class="card-body">
					<table class="table table-bordered" id="users-list">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Genre</th>
								<th>Description</th>
								<th>Created</th>
                        </tr>
                    </thead>
					<tbody>
						<?php if($post):  ?>
						<?php foreach($post as $row) : ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['genre']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['created_at']; ?></td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
