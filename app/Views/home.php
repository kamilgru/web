<!DOCTYPE html>
<html lang="en">
<?php include ('template/headers.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <label> Title</label> <span id="error_title" class="text-danger ms-3"></span>
		<input type="text" class="form-control title" placeholder="Enter Title">
		<label> Genre</label> <span id="error_genre" class="text-danger ms-3"></span>
		<input type="text" class="form-control genre" placeholder="Enter Genre">
		<label> Description</label> <span id="error_description" class="text-danger ms-3"></span>
		<input type="text" class="form-control description" placeholder="Enter Description">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxadd-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
	
	<div class = "col-md-12">
		<div class="card">
			<div class="card-header">
				<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-end">Add data</a>
</head>
<body>
	<table class="table table-striped table-bordered" style="width:100%">
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
		<tbody class = "postdata">

	
	
	<script>
	$(document).ready(function () {
		loaddata();
	});
	
	function loaddata()
	{
		$.ajax({
			method: "GET",
			url: "home/getdata",
			success: function (response) {
				//console.log(response.post);
				$.each(response.post, function (key, value) {
					//console.log(value['id']);
					$('.postdata').append('<tr>\
						<td class="id">' + (value['id'])+'</td>\
						<td class="id">' + (value['title'])+'</td>\
						<td class="id">' + (value['genre'])+'</td>\
						<td class="id">' + (value['description'])+'</td>\
						<td class="id">' + (value['created_at'])+'</td>\
						<td>\
						<a href="#" class ="badge btn-primary edit_btn">Edit</a>\
						<a href="#" class ="badge btn-primary deletebtn">Delete</a>\
					</td>\
					</tr>');
					
				});
				
			}
	});
}
	
		
$(document).ready(function () {
    $(document).on('click','.ajaxadd-save', function (){
        if($.trim($('.title').val()).length == 0){
            error_title = 'please enter title';
            $('#error_title').text(error_title);
        }else{
            error_title = '';
            $('#error_title').text(error_title);
        }
        
        if($.trim($('.genre').val()).length == 0){
            error_genre = 'please enter genre';
            $('#error_genre').text(error_genre);
        }else{
            error_genre = '';
            $('#error_genre').text(error_genre);
        }
        
        if($.trim($('.description').val()).length == 0){
            error_description = 'please enter description';
            $('#error_description').text(error_description);
        }else{
            error_description = '';
            $('#error_description').text(error_description);
        }
        
        if(error_title != '' || error_genre != '' || error_description != '')
        {
            return false;
        }
        else
        {
            var data = {
                'title': $('.title').val(),
                'genre': $('.genre').val(),
                'description': $('.description').val(),
            };

            $.ajax({
                method: "POST",
                url: "home/store",
                data: data,
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    $('#exampleModal').find('input').val('');
					
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        }
    }); 
});

	</script>
</body>
</html>
