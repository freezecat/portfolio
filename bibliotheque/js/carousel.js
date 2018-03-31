$(document).ready(function(){
  //alert("oj");
  var carousel = $(".image_pic");
 //utiliser animate
 
  
      // console.log($(carousel[0]).attr("src"));
   //https://stackoverflow.com/questions/4114870/jquery-value-attr-is-not-a-function

 
function go(i)
{
  setTimeout(function(){
   
 
	 console.log(i);
	
	 //console.log(carousel[i]);
	 
	   
	 for(var j=0;j<carousel.length;j++)
	 {
	  
	   if(i==j)
	   {
	  // $(carousel[j]).css("display","block");
	    $(carousel[j]).fadeIn(2000);
	   }else
	   {
        $(carousel[j]).fadeOut(4000);
	   }
	  
	 } 
   
},8000*i);
}

function depart()
{
	for(var i=0;i<carousel.length;i++)
	{
	  
	  go(i);
	  
	}
}

depart();


setInterval(function(){
for(var i=0;i<carousel.length;i++)
	{
	  
	  go(i);
	  
	}
},8000*carousel.length);


});
