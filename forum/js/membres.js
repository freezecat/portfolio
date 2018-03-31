$(document).ready(function(){
  // alert("membres");
  var select = $("#membres_select");
  //alert(select.val());
  var option = $(".membres_option");
   	var alpha = $("#alphabetique");
	
	  function letters()
	  {
	 
		var letters  = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
		var text = "";
		var node = [];
		for(var i = 0;i<letters.length;i++)
		{
		 node[i] = document.createElement("a");
		  
		  	node[i].append(letters[i]);
			node[i].href = "index.php?page=membres&letter="+letters[i];
			node[i].style.marginLeft = "1rem";
			
		}
	   alpha.append(node);
	  }
	
  select.change(function(){
      //alert($(this).val());
	  
	
	  
	  
	  if($(this).val() == "date")
	  {
	        window.location.href = "index.php?page=membres";
		$.post("ajax/membres.php",{"option":$(this).val()},function(data){
		alert(data);
		});
	  }
	    if($(this).val() == "ordre alphabetique")
	  {
	     var option_selected = $(this).val();
		 letters();
	    var letter =  $("#letter");
		alert("hu");
		
	
		/*
			get param letter
		$.post("ajax/membres.php",{"option":$(this).val()},function(data){
		alert(data);
		});
		*/
	  }
  });
 
	  
});