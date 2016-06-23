<?php
 include("header2.php");
 include("connect.php");
 ob_start();
 if (session_id() == "")
		session_start();



$post = @$_POST['post'];

if ($post != "") {
date_default_timezone_set('Europe/Zagreb');
$date = date('Y-m-d H:i:s');



$sqlCommand = "INSERT INTO komentari VALUES('', '$post','$date','','".$_SESSION['ID']."')";  
$query = mysql_query($sqlCommand) or die (mysql_error()); 


}

$select= "select *from korisnik where ID = '".$_SESSION['ID']."' ";
$res = mysql_query($select) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
	$row = mysql_fetch_assoc($res);
	$profile_pic=$row['profile_pic'];
}
?>





<div class="container">
   <div class="page-header text-center">
		<link href="css/komentar.css" rel="stylesheet">
		<link href="css/profile.css" rel="stylesheet">
		<link href="css/timeline.css" rel="stylesheet">
		<script src="js/like.js"></script>
		<form class="form-signin" role="form"  method="post" >
  
        <h2 class="form-signin-heading">Comment</h2>

       	<textarea id="post" name="post" rows="4"></textarea>
       	
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="send" type="submit">Accept</button>
      </form>
      
    </div>
   
		
  
    
<?php
$brojac=0;            
							
							$upit = "SELECT *FROM komentari where ID_korisnika_post='".$_SESSION['ID']."' order by ID desc"; 
							$res = mysql_query($upit) or die(mysql_error());
							
							while($row = mysql_fetch_assoc($res)){
								$id_koment=$row['ID'];
								$komentar = $row['Komentar'];
								$ID = $row['ID'];
								$Datum = $row['Datum'];
								
?>

  <ul class="timeline">
      
  <div  class="timeline-inverted">
  	
          
          <div class="timeline-panel">
          	
            <div class="timeline-heading">
            	
              		<?php
		
                           $file_path="upload/".$profile_pic." ";
                           echo "<img src=\"".$file_path."\" alt=\"error\">"; 
        
                          ?>
              
            
            <div class="timeline-body">
                <?php
            echo "<div class='komentar'>".$komentar."</div>";
								
             ?>
             
            </div>
            
            <div class="timeline-footer">
          			
                <a ><i class="glyphicon glyphicon-thumbs-up" name="like" onclick="likeAdd(<?php echo $id_koment;?>,<?php echo $brojac;?>)" id="like" role="button"></i></a>

                <span class="<?php echo $brojac++;?>">  </span>
                <div class="date-timeline">
                <?php echo $Datum ?>
             </div>
            </div>
          </div>
        </div>  
  <?php
            
								}

             ?>      
        
    </ul>
   
</div>




        

        
    </body>
</html>