<?php
 include("connect.php");
 	if (session_id() == "")
		session_start();
 $partialStates = $_POST['partialState'];
 if ($partialStates=="")
 {
 	
 }
 else {
   
 
 $states = mysql_query("SELECT * FROM korisnik where ime LIKE '%$partialStates%'");

 while($state = mysql_fetch_array($states))
 {
 	if ($_SESSION['email']==$state['email'])
	{
		
	}
	else {
		
	
 	echo "<div><a href='profile2.php?email=".$state['email']."'> ".$state['ime']." " .$state['prezime']." " .$state['email']."</a></div>";
 }}}
 ?>
