<?php
 include("header.php");
 include("connect.php");
 ob_start();
 if (session_id() == "")
		session_start();
$id_koment="";
$select= "select *from korisnik where ID = '".$_SESSION['ID']."' ";
$res = mysql_query($select) or die(mysql_error());
if (mysql_num_rows($res) == 1) {
	$row = mysql_fetch_assoc($res);
	$profile_pic=$row['profile_pic'];
}

?>


<div class="container">    
<script src="js/like.js"></script>

<link href="css/profile.css" rel="stylesheet">
<link href="css/timeline.css" rel="stylesheet">
   
<?php
$brojac =0;
						$upit1 = "SELECT *FROM prijatelji where ID_my ='".$_SESSION['ID']."'"; 
						$res1= mysql_query($upit1) or die(mysql_error());
						while($row1 = mysql_fetch_assoc($res1)){
						
					
							$upit = "SELECT * FROM komentari where ID_korisnika_post ='".$row1['ID_his']."' order by ID desc"; 
							$res = mysql_query($upit) or die(mysql_error());
							
						while($row = mysql_fetch_assoc($res)){
								$id_koment=$row['ID'];
								$komentar = $row['Komentar'];
								$Datum = $row['Datum'];
								$select3= "select ID_korisnika_post from komentari where ID = '".$id_koment."' ";
								$res3 = mysql_query($select3) or die(mysql_error());
									if (mysql_num_rows($res3) == 1) 
									{			$row3 = mysql_fetch_assoc($res3);
									
												$select4= "select profile_pic from korisnik where ID = '".$row3['ID_korisnika_post']."' ";
												$res4 = mysql_query($select4) or die(mysql_error());
													if (mysql_num_rows($res4) == 1) 
													{
														$row4 = mysql_fetch_assoc($res4);
														$profile_pic=$row4['profile_pic'];
													}
									}
								
								
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
            echo "<p>".$komentar."</p>";
								
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
            
								}}

             ?>      
        
    </ul>
   
</div>




        

        
    </body>
</html>