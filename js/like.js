function likeAdd(id,brojac){
	$.post("ajax/add_like.php",{ID:id},function(data){
	
		if ( data =='success')
		{
			likeGet(id,brojac)
		}
		else
		{
			alert(data);
		}
	});
}

function likeGet(id,brojac){
	$.post("ajax/get_like.php",{ID:id},function(data){
		$("."+brojac).text(data);
	});
}
