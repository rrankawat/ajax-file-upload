<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Ajax Image Upload</title>
    </head>

    <body>
    	<div class="container">
    		<form method="post" id="upload_form" enctype="multipart/form">
    			<input type="file" name="userfile" id="image_file">

    			<br><br>
    			<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">
    		</form>

    		<br><br>
    		<div id="uploaded_image">

    		</div>
		</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script>
	        $(document).ready(function(){

	            $("#upload_form").on('submit', function(e){
	            	e.preventDefault();
	            	if($('#image_file').val() == "") {
	            		alert("Please select an image!");
	            	} else {

	            		$.ajax({
	            			url: "<?php echo site_url('welcome/ajax_upload'); ?>",
	            			method: "POST",
	            			data: new FormData(this),
	            			contentType: false,
	            			cache: false,
	            			processData: false,
	            			success: function(data) {
	            				console.log('hi');
	            				$('#uploaded_image').html(data);
	            			},
	            			error: function() {
	            				console.log('bye');
	            			}
	            		});
	            	}
	            });
	        });
	    </script>
  	</body>
</html>