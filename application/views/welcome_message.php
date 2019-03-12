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
    		<br>
    		<h2 align="center">Upload Multiple files using codeigniter</h2>

    		<br>
    		<div class="col-md-6" align="right">
    			<label>Select Multiple files</label>
    		</div>

    		<div class="col-md-6">
    			<input type="file" name="files" id="files" multiple />
    		</div>
    		<div style="clear: both"></div>

    		<br><br>
    		<div id="uploaded_images" class="row"></div>
		</div>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="<?php echo base_url('assets/js/dropzone.js'); ?>"></script>
	    <script>
	        $(document).ready(function(){

	            $("#files").change(function(){
	            	var files = $("#files")[0].files;
	            	var error = '';
	            	var form_data = new FormData();

	            	for(var count=0; count<files.length; count++){
	            		var name = files[count].name;
	            		var extension = name.split('.').pop().toLowerCase();
	            		if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
	            			error += "Invalid " + count + " Image File";
	            		} else {
	            			form_data.append("files[]", files[count]);
	            		}
	            	}

	            	if(error == '') {
	            		$.ajax({
	            			url: "<?php echo site_url('welcome/ajax_upload'); ?>",
	            			method: "POST",
	            			data: form_data,
	            			contentType: false,
	            			cache: false,
	            			processData: false,
	            			beforeSend: function() {
	            				$('#uploaded_images').html('<label class="text-success">Uploading...</label>');
	            			},
	            			success: function(data) {
	            				console.log('hi');
	            				$('#uploaded_images').html(data);
	            				$('#files').val('');
	            			},
	            			error: function() {s
	            				console.log('bye');
	            			}
	            		});
	            	} else {
	            		alert(error);
	            	}

	            });

	        });
	    </script>
  	</body>
</html>