$(document).ready(function(){
  
  var select = $("#membres_select");
 
  var option = $(".membres_option");
   	var alpha = $("#alphabetique");
	var liste_membres = $("#liste_membres");
	
	  function list(data)
	  {
	     for(var i=0;i<data.pseudo.length;i++)
		   {
		      //alert(data.pseudo[i]+" "+data.date[i]+" "+data.avatar[i]);
			  
			  var img_elt = document.createElement("img");
			  if(data.avatar[i]!="")
			  {
			  img_elt.src = "avatars/"+data.avatar[i];
			  }
			  else
			  {
			  img_elt.src = "avatars/anonymous.png";
			  }
			  img_elt.width= "100";
			  img_elt.height = "100";
			  img_elt.alt = "non";
			  liste_membres.append(img_elt);
			  
			  var info_elt = document.createElement("span");
			  var info_txt = data.pseudo[i]+" inscrit le "+data.date[i]+"<br/><br/>";
			  info_elt.append(info_txt);
			  liste_membres.append(info_txt);
			  
		   }
	  }
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
		
	  }
	    if($(this).val() == "ordre alphabetique")
	  {
	     //var option_selected = $(this).val();
		 letters();
		 liste_membres.html("");
	  
	  }
  });
    if(select.val() == "ordre alphabetique")
	  {
	  letters();
	    var letter =  $("#letter").html();
	     $.post("ajax/membres.php",{"option":select.val(),"letter":letter},function(data){
		   //alert(data.pseudo.length);
		   list(data);
		
		 },'json');
	  }
	  
	  if(select.val() == "date")
	  {
	   $.post("ajax/membres.php",{"option":select.val(),"letter":letter},function(data){
	
	    list(data);
	
	   },'json');
	  }
 
    
	  
});