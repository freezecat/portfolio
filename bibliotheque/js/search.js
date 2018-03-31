$(document).ready(function(){
   var search = $(".search");
   var btn = $(".btn_search");
   var result = $("#search_result");
   
  
   
   search.keyup(function(){
   
	 
	 $.post("ajax/search.php",{"search":search.val()},function(data){
	   
	   var txt = "";
		for(var i=0;i<data.length;i++)
		{
		
		  txt += "<div class='single_search_result'>"+data[i].titre+"</div>";
		}
		result.html(txt);
		
		 var single = $(".single_search_result");
   	
	    single.click(function(){
		   
		  // search.val($(this).html());
	
		  window.location.href = "index.php?page=livre&titre="+$(this).html();
		});
		
		//button go!
		btn.click(function(){
		   window.location.href = "index.php?page=livre&titre="+search.val();
		});
		
	 },'json');
	  
     result.css("display","block");

	   
   });
   
     
});