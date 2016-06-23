<!DOCTYPE html>
<html lang="en">
    <head>
    		
				<script src="js/main.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Hunters Network</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
       <script src="js/jquery.js"></script>
       
        <link href="css/commentBox.css" rel="stylesheet">
        <link href="css/GoogleThema.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        
   			
   	
     

        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<script>
$(document).ready(function(){
	var my_posts = $("[rel=tooltip]");

	var size = $(window).width();
	for(i=0;i<my_posts.length;i++){
		the_post = $(my_posts[i]);

		if(the_post.hasClass('invert') && size >=767 ){
			the_post.tooltip({ placement: 'left'});
			the_post.css("cursor","pointer");
		}else{
			the_post.tooltip({ placement: 'rigth'});
			the_post.css("cursor","pointer");
		}
	}
});
</script>


    </head>
   
    <body  >
        
        <div class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        <div class="navbar-header">
          
          <div class="navbar-header">
          
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu">
              <li><a href="profile.php"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Profile</a></li>
              <li><a href="glavna.php"><i class="glyphicon glyphicon-dashboard" style="color:#0000aa;"></i> Newsfeed</a></li>
              <li><a href=""><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> Slike</a></li>
              <li class="nav-divider"></li>
              <li><a href="settingsProfil.php"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Settings</a></li>
              <li><a href="odjava.php"><i class="glyphicon glyphicon-plus"></i> Logout</a></li>
          </ul>
          
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          <i class="glyphicon glyphicon-search"></i>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
          <form class="navbar-form pull-left">
              <div class="input-group" style="max-width:470px;">
                <input type="text" onkeyup="getStates(this.value)" class="form-control" style="width:400px;" placeholder="Search" "/>
                <script type="text/javascript">
                	function getStates (value) {
                		$.post("getStates.php",{partialState:value},function (data){
                		$("#results").html(data);
                		});
										
									}
                </script>
                
               
              </div>
          </form>
         
        </div>	
     </div>	
    
</div>
 <div id="results" style="width:300px;  border-radius:5px; background-color:white; float :left; margin-top:2%;   position: fixed;   left: 2%;"></div>



        
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>   