<?php
include("connect.php");
 ob_start();
 if (session_id() == "")
		session_start();
$errorMsg="";
	$select= "select *from korisnik where email = '".$_SESSION['prijatelj_mail']."' ";
		$res = mysql_query($select) or die(mysql_error());
		if (mysql_num_rows($res) >0) {
			$row = mysql_fetch_assoc($res);
		
echo $row['ime'],$row['prezime'];
		}
$post = @$_POST['submit'];

if ($post != "") {
	
		
		$select= "select *from korisnik where email = '".$_SESSION['prijatelj_mail']."' ";
		$res = mysql_query($select) or die(mysql_error());
		if (mysql_num_rows($res) >0) {
		$row = mysql_fetch_assoc($res);
		$ID=$row['ID'];
		$user_from = $_SESSION['ID'];
		
		
		
		
		$create_request = mysql_query("INSERT INTO zahtjevi_prijatelja VALUES ('','$user_from','$ID')");
		$errorMsg = "Your friend Request has been sent!";
		echo  "<script> window.location.close(); </script>";
		
	}}
?>

  <form action="popup_add_friend.php" method="post" id="myForm"
enctype="multipart/form-data">




<input type="submit" name="submit" class="btn btn-success" value="Add as friend" >

</form>
<?php echo $errorMsg;
?>