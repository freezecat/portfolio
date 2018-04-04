//$c)]
$(document).ready(function(){
//alert("hu");
   var thumb_up = $(".thumb_up");
   var thumb_down = $(".thumb_down");
 
   var likes = $(".likes");
   var dislikes = $(".dislikes");
   
    var tab = [];
		var table =[];
		var tabl = [];
		
	
	thumb_up.click(function(e){
	e.preventDefault();
	//alert("hj");
	  var attribute = $(this).attr("id");
		   var index = attribute.replace("thumb_up","");
		   $.post("ajax/likes3.php",{"id":index,"vote":"likes"},function(data){
		     alert(data);
		   });
	});
	
	thumb_down.click(function(e){
	e.preventDefault();
	//alert("hk");
	   var attribute = $(this).attr("id");
		   var index = attribute.replace("thumb_down","");
		   $.post("ajax/likes3.php",{"id":index,"vote":"dislikes"},function(data){
		      alert(data);
		    });
	});
	
	//alert(thumb_up.length+" "+thumb_down.length);
	for(var i=0;i<thumb_up.length;i++)
			{
			 var attribute = thumb_up[i].getAttribute("id");
			  var index = attribute.replace("thumb_up","");
		      
              		  //alert(index);
			  
			     $.post("ajax/display.php",{"id":index},function(data){
		      
			 // alert(data.id+" "+data.likes+" "+data.dislikes);
			 		$("#likes"+data.id).html(data.likes);	  
			    $("#dislikes"+data.id).html(data.dislikes);	
		       //  console.log(data.id+" "+data.commentaire_id);
		   },'json');
		   
			   
			   
			}
	
});
	
	