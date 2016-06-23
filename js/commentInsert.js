 $(document).ready(function(){
 	
 	$('#insertBtn').click(function(){
 		postBtnClick();
 		 	});
 	
 });

	function postBtnClick()
	{
		// textarea text
 		var text = $('#post').val();
 		var userID =$('#userID').val();
 		if (text.length >0 && userID != null)
 		
 		{
 			
 			$.post("/ajax/commentInsert.php",
 			{
 				task : "commentInsert",
 				user: userID,
 				comment : text
 			}
 			
 		).success(
 			function(data)
 			{
 				commentInsert();
 				console.log("resposnes text :" + data);
 			});
 			console.log( text );

 		}
 		else
 		{
 		 console.log( "bla");
 		}
 		$('#post').val("");
	}
	
	function commentInsert()
	{
		var t = '';
		 t +=  '<ul class="timeline">';
     t +=   '<li>';
     t +=    '<div class="timeline-badge primary"><a><i class="glyphicon glyphicon-record" rel="tooltip" <?php echo "title=" .$Datum.""?> id=""></i></a></div>';
     t +=    '<div class="timeline-panel">';
     t +=    ' <div class="timeline-heading">';
     t +=      '<img class="img-responsive" src="hunter.jpg" />';           
     t +=     '</div>';
     t +=    '<div class="timeline-body">'; 
     t +=   '</div>';        
     t +=    '<div class="timeline-footer">';
     t +=      ' <a><i class="glyphicon glyphicon-thumbs-up"></i></a>';
     t +=      ' <a><i class="glyphicon glyphicon-share"></i></a>';
     t +=     ' <a class="pull-right">Continuar Lendo</a>';
     t +=  ' </div>';
     t += '</div>';
     t +=  '</li>';
     t += '  </ul>';
     $ ('.timeline').prepend(t);
	}
