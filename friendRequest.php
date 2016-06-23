<?php
include("connect.php");
 ob_start();
 if (session_id() == "")
		session_start();


$user =$_SESSION['ID'];
$friendRequests = ("SELECT * FROM zahtjevi_prijatelja WHERE user_to='".$_SESSION['ID']."'");
$res = mysql_query($friendRequests) or die(mysql_error());
if (mysql_num_rows($res) ==0) {
 echo "You have no friend Requests at this time.";
 $user_from = "";
}
else
{
		echo "	<form action='friendRequest.php' method='post' id='myForm' enctype='multipart/form-data'>";
		echo "			<select name='tip' id='tip' />";
		echo "<option value='0'>This users want to be your friends </option>";
 while ($get_row = mysql_fetch_assoc($res)) {
  $id = $get_row['ID']; 
  $user_to = $get_row['user_to'];
  $user_from = $get_row['user_from'];
	


	$friendname= ("SELECT * FROM korisnik WHERE ID='".$user_from."'");
	$res1 = mysql_query($friendname) or die(mysql_error());
		if (mysql_num_rows($res1) >0) 
		{
			$row1 = mysql_fetch_assoc($res1);

				
					
					echo "<option value='$user_from'>".$row1['ime']."  ".$row1['prezime']."</option><br>";
				
if(isset($_POST['acceptrequest']))
    {	
?>
  <script>
  location.reload();
 
</script>
<?php
			$ID_kor = $_POST['tip'];	
			$provjera= ("SELECT * FROM prijatelji WHERE ID_his='".$ID_kor."' and ID_my='".$_SESSION['ID']."'");
			$resul = mysql_query($provjera) or die(mysql_error());
			if (mysql_num_rows($resul) >0) 
			{
				
			}
			else {
			$insert = "INSERT INTO prijatelji  VALUES ('','".$_SESSION['ID']."','$ID_kor ')";
				
			if (mysql_query($insert)) {
		
			$insert1 = "INSERT INTO prijatelji  VALUES ('','$ID_kor ','".$_SESSION['ID']."')";
			
	
	if (mysql_query($insert1)) {
		$ID_kor = $_POST['tip'];	
		$delete_request = mysql_query("DELETE FROM zahtjevi_prijatelja WHERE user_to='".$_SESSION['ID']."' && user_from='$ID_kor'");
  	mysql_query($delete_request);
		echo "U added a friend";
	}}

}




}
if(isset($_POST['ignorerequest']))
    {
    	echo "bum";


	$delete_request = mysql_query("DELETE FROM zahtjevi_prijatelja WHERE user_to='".$_SESSION['ID']."'and user_from='$ID_kor'");
  	echo $delete_request;
  	mysql_query($delete_request);
		echo "U declined friend!";
}
 
		}}
	echo "	</select>";
	echo  "<br><input type='submit' name='acceptrequest' value='Accept Request'>";
  echo" <input type='submit' name='ignorerequest' value='Ignore Request'>";
  echo "</form>";
  }		
?>


