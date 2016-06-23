<?php

 include("header.php");
 include("connect.php");
 ob_start();
 if (session_id() == "")
		session_start();
$select= "select *from korisnik where ID = '".$_SESSION['ID']."' ";
$res = mysql_query($select) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
$row = mysql_fetch_assoc($res);
$ID=$row['ID'];
$im=$row['ime'];
$prez=$row['prezime'];
$mje=$row['mjesto'];
$email=$row['email'];
$pass=$row['password'];
$profile_pic=$row['profile_pic'];
if(isset($_POST['ime'])) {

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$mjesto = $_POST['mjesto'];
$mail = $_POST['email'];
$lozinka = $_POST['lozinka'];	



$update = "Update  korisnik  set ime='".$ime."',prezime='".$prezime."',mjesto='".$mjesto."',email='".$mail."',password='".$pass."' 
where ID='".$_SESSION['ID']."'";
				
	if (mysql_query($update)) {
		echo "<h1 align='center'>Podaci su uspješno uspisani.</h1>";
		header("Location: settingsProfil.php");
		
			} else {
				echo "Pogreška kod unosa podataka u bazu podataka:" . mysql_error();
				
				}
  
}	
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<Script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js" ></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
	<script src="script.js"></script>
      
    <title>Hunters Network</title>
    
  <body>

    <div class="container">
      <div class="header">
    
      </div>

<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/profileChange.css" rel="stylesheet">
		<form class="form-signin" role="form" method="post" " >
        
		<div class="slika"><?php
		
		
                           $file_path="upload/".$profile_pic." ";
                           echo "<img src=\"".$file_path."\" alt=\"error\">"; 
        
                          ?>
                      
		<h3 style="float :right;"> Profile owner : <?php  echo $_SESSION['ime']," ",$_SESSION['prezime']?></h3>
		</div>
		<br />
        <input type="text" class="form-control" name="ime" id="korisnicko_ime" value="<?php echo $im ?> " placeholder="Name" required autofocus>
        <input type="text" class="form-control" name="prezime" id="prezime" value="<?php echo $prez ?>"" placeholder="Last name" required>
        <input type="text" class="form-control" name="mjesto" id="mjesto" value="<?php echo $mje ?>" placeholder="Country" required>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>"  placeholder="Your e-mail" required>
        <input type="text" class="form-control" name="emailP" id="emailP" value="<?php echo $email ?>" placeholder="Re-enter e-mail" required>
         <input type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Password" required>
        <script>
function myFunction() {
    window.open("popup.php", "myWindow", "toolbar=yes, scrollbars=yes, resizable=yes, top=200, left=500, width=400, height=300");
}
</script>
<button onclick="myFunction()">Upload photo</button>

        <button class="btn btn-lg btn-primary btn-block" name="submit"  type="submit">Accept</button>
    
      </form>


</div>

  </body>
 