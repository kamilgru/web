<!DOCTYPE html>
<html lang="en">
<?php include ('template/headers.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
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
        <button type="button" class="btn btn-primary ajaxadd-save">Create Post</button>
      </div>
    </div>
  </div>
</div>
	
	
	<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
	  <input type="hidden" id="id">
	  <div class="form-group">
        <label> Title</label>
		<input type="text" id="title" class="form-control title" placeholder="Enter Title">
		</div>
		<div class="form-group">
		<label> Genre</label>
		<input type="text" id="genre" class="form-control genre" placeholder="Enter Genre">
		</div>
		<div class="form-group">
		<label> Description</label>
		<input type="text" id="description" class="form-control description" placeholder="Enter Description">
      </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxadd-update">Edit Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_id">
                <h4>Are you sure you want to delete?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger home-deletebtn">Yes</button>
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

    $(document).on('click', '.edit_btn', function () {
        var id = $(this).closest('tr').find('.id').text();
		
		$.ajax({
            method: "POST",
            url: "home/edit",
            data: {
				'id': id
			},
			success: function (response) {
				$.each(response, function (key, value) {
					$('#id').val(value['id']);
					$('#title').val(value['title']);
					$('#genre').val(value['genre']);
					$('#description').val(value['description']);
					$('#EditModal').modal('show');
				});
			}
		});
    });
});

    $(document).on('click', '.ajaxadd-update', function () {
		
        var data = {
            'id': $('#id').val(),
            'title': $('#title').val(),
            'genre': $('#genre').val(),
            'description': $('#description').val()
        };

        $.ajax({
            method: "POST",
            url: "home/update",
            data: data,
            success: function (response) {
				$('#EditModal').modal('hide');
				$('.postdata').html("");
				loaddata();
				
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
            }
        });
    });


	$(document).on('click', '.deletebtn', function () {
		
		var id = $(this).closest('tr').find('.id').text(); 
		$('#delete_id').val(id);
		$('#DeleteModal').modal('show');
	});
	
	$(document).on('click', '.home-deletebtn', function () {
		var id = $('#delete_id').val();
		
		 $.ajax({
            method: "POST",
            url: "home/delete",
			data: {
				'id' : id
			},
            success: function (response) {
				$('#DeleteModal').modal('hide');
				$('.postdata').html("");
				loaddata()
				
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
			}
		 });
	});


    function loaddata() {
        $.ajax({
            method: "GET",
            url: "home/getdata",
            success: function (response) {
                $.each(response.post, function (key, value) {
                    $('.postdata').append('<tr>\
                        <td class="id">' + (value['id']) + '</td>\
                        <td>' + (value['title']) + '</td>\
                        <td>' + (value['genre']) + '</td>\
                        <td>' + (value['description']) + '</td>\
                        <td>' + (value['created_at']) + '</td>\
                        <td>\
                            <a href="#" class="badge btn-primary edit_btn">Edit</a>\
                            <a href="#" class="badge btn-primary deletebtn">Delete</a>\
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
					
					$('.postdata').html("");
					loaddata();
					
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
