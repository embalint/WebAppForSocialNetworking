<?php
include("../connect.php");
if (session_id() == "")
session_start();
$id= $_POST['ID'];
$update = "Update  komentari  set `like` = `like`+1 where ID=$id";
				
	if (mysql_query($update)) {

		echo 'success';
	}
	else {
	echo	mysql_error();
		

	}
		
?>
