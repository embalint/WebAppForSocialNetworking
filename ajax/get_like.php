<?php
 include("../connect.php");
  ob_start();
 if (session_id() == "")
		session_start();
 $id= $_POST['ID'];
 $select= "select *from komentari where ID = '".$id."' ";
 $res = mysql_query($select) or die(mysql_error());
if (mysql_num_rows($res) >0) {
	$row = mysql_fetch_assoc($res);
	$like=$row['like'];
	echo $like;
}
else {
	{
		echo	mysql_error();
	}
}
?>