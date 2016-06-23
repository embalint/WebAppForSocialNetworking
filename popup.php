<?php
 ob_start();
 if (session_id() == "")
		session_start();


?>  
   
   <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
        
    }
</script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/uploadSlike.css" >
	<Script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js" ></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 

  <form action="upload.php" method="post" id="myForm"
enctype="multipart/form-data">

<label for="file">Filename:</label>

<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" class="btn btn-success" value="Upload Image" >

</form>
