<!DOCTYPE html>
<html>
<head>
	<title>Ajax Image Uploading Tutorial</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>


<div class="container">
  <h1>Ajax Image Uploading Tutorial</h1>


  <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
    @csrf
  	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <div class="form-group">
      <label>Image Title:</label>
      <input type="text" name="title" class="form-control" placeholder="Add Title">
    </div>


	<div class="form-group">
      <label>Image File:</label>
      <input type="file" name="image" class="form-control">
    </div>


    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Upload Image</button>
    </div>


  </form>


</div>


<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    event.preventDefault(e);
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error))
      {
    		$("input[name='title']").val('');
    		alert('Image Upload Successfully.');
    	}
      else
      {
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };


  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>


</body>
</html>