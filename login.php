<?php
	include("connect.php");
	ob_start();
	if (session_id() == "")
		session_start();
$error_msg="";
if(isset($_POST['email'])) {
$email = $_POST['email'];
$lozinka = $_POST['lozinka'];

$upit = "SELECT * FROM korisnik WHERE email='".$email."' AND password='".$lozinka."' LIMIT 1"; 
$res = mysql_query($upit) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
$row = mysql_fetch_assoc($res);
$_SESSION['ID'] = $row['ID'];
$_SESSION['email'] = $row['email'];
$_SESSION['ime'] = $row['ime'];
$_SESSION['prezime'] = $row['prezime'];
header( "Location: glavna.php" );


exit();
} else {
$error_msg = "<p class='obavijesti'>Pogrešno korisničko ime ili lozinka</p>";



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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <title>Hunters Network</title>
  <body>

    <div class="container">
      <div class="header">
      
       
      </div>
  
    

<form class="form-signin" role="form" method="post" >
    <div class="kontenjer">
     <a  href="index.php" role="button"><span class="glyphicon glyphicon-home"></span></a>
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo $error_msg; ?>
        <input type="text" class="form-control" name="email" id="korisnicko_ime" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Password" required>
       
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>
</div></div>
  </body>