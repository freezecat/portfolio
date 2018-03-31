$(document).ready(function(){
 
   var thumb_up = $(".thumb_up");
   var thumb_down = $(".thumb_down");
 
   var likes = $(".likes");
   var dislikes = $(".dislikes");
	
	//alert(thumb_up.length);
	    var tab = [];
		var table =[];
		var tabl = [];
	  	for(var i=0;i<thumb_up.length;i++)
			{
			  var attribute = thumb_up[i].getAttribute("id");
			  var index = attribute.replace("thumb_up","");
			
			   $.post("ajax/display.php",{"id":index},function(data){
			 
			   //var obj = jQuery.parseJSON(data);
			
			     //alert(obj.id+" "+obj.commentaire_id+" "+obj.likes+" "+obj.dislikes);
			    //alert($("#likes"+obj.commentaire_id).attr("id"));
		          
		         //obj.ommentaire_id obtenu je dois identifier le span dans lequel affiher
				 //ici $("#likes"+obj.commentaire_id)! si j'ai clique sur le 4e lien,obj.commentaire_id vaut 4.
				 
				 
				$("#likes"+data.commentaire_id).html(data.likes);	  
			    $("#dislikes"+data.commentaire_id).html(data.dislikes);	
                      					  
			   },'json');
			   
			  
			}
	   

			 
			   
		
			  
			
	
	
	  thumb_up.click(function(e)
	  {
		   e.preventDefault();
		   var attribute = $(this).attr("id");
		   var index = attribute.replace("thumb_up","");
		   $.post("ajax/likes.php",{"id":index,"vote":"likes"},function(data){
		      alert(data.info);
			// alert(data.commentaire_id+" "+data.likes);
		   },'json');
	  });
	  
	    thumb_down.click(function(e)
	  {
		   e.preventDefault();
		   var attribute = $(this).attr("id");
		   var index = attribute.replace("thumb_down","");
		   $.post("ajax/likes.php",{"id":index,"vote":"dislikes"},function(data){
		      alert(data.info);
			  //alert(data.commentaire_id+" "+data.dislikes);
		   },'json');
	  });
	

   
 
   
   
   
   

	 
   
});
