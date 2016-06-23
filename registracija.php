<?php
		include("connect.php");
	if (session_id() == "")
		session_start();

$poruka="";	
if(isset($_POST['ime'])) {

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$mail = $_POST['email'];
$remail = $_POST['reemail'];
$lozinka = $_POST['lozinka'];
$relozinka = $_POST['relozinka'];

	if ($mail == $remail && $lozinka == $relozinka)
	{
	




		$select= "select *from korisnik where email = '".$mail."' ";
		$res = mysql_query($select) or die(mysql_error());
		if (mysql_num_rows($res) >0) 
		{
			echo "<h2 align='center'>U are already registered!</h2>";
		}
		
		else
		{
			$insert = "INSERT INTO korisnik  VALUES ('','$ime','$prezime','','$mail','$lozinka','')";
				
			if (mysql_query($insert)) 
			{
			echo "<h2 align='center'>You have been successfully registered!</h2>";
			}
			else 
			{
				echo "Error with insert" . mysql_error();
			}
		
	}
		} 
		else 
		{
			$poruka="Passwords or e-mail do not match!";
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
      
    <title>Hunters Network</title>
  <body>

    <div class="container">
      <div class="header">
      
       
      </div>


    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
<form class="form-signin" role="form" method="post" >
     <a  href="index.php" role="button"><span class="glyphicon glyphicon-home"></span></a>
        <h2 class="form-signin-heading">Please register</h2>
        <?php echo $poruka; ?>
        <input type="text" class="form-control" name="ime" id="korisnicko_ime" placeholder="Name" required autofocus>
        <input type="text" class="form-control" name="prezime" id="lozinka" placeholder="Last name" required>
        <input type="text" class="form-control" name="email" id="email" placeholder="Your e-mail" required>
        <input type="text" class="form-control" name="reemail" id="email" placeholder="Re-enter e-mail" required>
        <input type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Password" required>
        <input type="password" class="form-control" name="relozinka" id="lozinka" placeholder="Re-enter Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>
</div>
  </body>