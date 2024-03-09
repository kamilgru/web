<?php include ('template/headers.php') ?>

	<div class="row pl-0">
		<div class="col-md-8">
		
		<?php
			if(session()->getFlashData('status'))
			{
				?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Data</strong> <?= session()->getFlashData('status'); ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php 
			}
		?>
			<h2>Uploading New Post</h2>

			<form action="<?= base_url('admin/add') ?>" method="POST">
			  <div class="form-group">
			    <label> Title</label>
			    <input type="text" name= "title" class="form-control" placeholder="Enter post name"> 
			  </div>

			  <div class="form-group"> 
			    <label> Genre</label>
			    <input type="text" name= "genre" class="form-control"  placeholder="Enter genre name"> 
			  </div>
			  
			  <div class="form-group">
			    <label> Description</label>
			    <input type="text" name="description" class="form-control" placeholder="Enter description"> 
			  </div>
			  
			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add new post</button>
			  
			</form>  
		</div>
</div>		
		

