$(document).ready(function(){
   //alert("ok");
   
   var comment = $("#commentaire");
   var smileys = $(".smileys");
   smileys.click(function()
   {
      //alert($(this).index());
	        
	   var index = $(this).index();
	   var tab = ["","","jump!","'o'",":)","-D",":(","lov","--!","snif!","Oo",":p"];
	   var nex = comment.val()+" "+tab[index]+" ";
	  	
		//message et smiley dans le textarea
		comment.val(nex);
    });
	
	
   
});