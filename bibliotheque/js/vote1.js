$(document).ready(function(){
   var likes = $("#vote_like");
   var dislikes = $("#vote_dislike");
   var titre = $("#vote_titre");
   
   
   function like_dislike(elt,value)
   {
     elt.click(function(){
      //alert("likes");
	  $.post("ajax/vote.php",{"vote":value,"titre":titre.html()},function(data){
	     alert(data);
	  });
   });
   }
   
   like_dislike(likes,"likes");
   like_dislike(dislikes,"dislikes");
 
});