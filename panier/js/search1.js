var search_list = document.getElementById("search_list");
var input_search = document.getElementById("input_search");
 var search_button = document.getElementById("search_button");
 
input_search.onkeyup = function()
{
   search_list.style.display="block";

    if(input_search.value=="")
   {
     search_list.style.display="none";
   }
   
 var form = new FormData();
   form.append("search",input_search.value);
   
  
    var request = new XMLHttpRequest();
		
	request.onreadystatechange = function(){
	
	   if(this.readyState == 4 && this.status == 200)
	   {

		  
		  var obj = JSON.parse(this.responseText);
		  
		  
		  var out="<ul class='search_list_result'>";
		   
			
			for(var i=0;i<obj.length;i++)
			{
			out += "<li class='single_result'>"+obj[i].nom+"</li>";
			
			   
			}
			out += "</ul>";

	     search_list.innerHTML =out;
		 
		  var single_result = document.getElementsByClassName("single_result");
		  
		
		   
		  for(var k=0;k<obj.length;k++)
			{
			 
			
		       
			      single_result[k].onclick = function()
				  {
				    
					 
					 window.location = "index.php?page=article&nom="+this.childNodes[0].nodeValue
					 
					 
				  /*
				        		  for(var l=0;l<obj.length;l++)
			              {
			               
				         single_result[l].setAttribute("class","single_result");
					      }
						 this.setAttribute("class","single_result search_selected");
						 
						 input_search.value = this.childNodes[0].nodeValue;
					
						 this.onclick = function()
						 {
						        search_list.style.display="none";
							
						 }
						 */
				  };
		    }
			
		  

		
	   }
	}
		 request.open("POST","ajax/search.php",true);
		  request.send(form);
      
	  
		
		
      
 };
 
 //bouton go!
search_button.onclick = function()
{

   
   location.href="index.php?page=article&nom="+input_search.value;
};

 
  
