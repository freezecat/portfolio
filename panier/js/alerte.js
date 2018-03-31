

function msg(el1){

    
     var alerte =document.getElementById(el1);
	
	alerte.style.display = "block";
	
 }
 
 
function msg_close(el){

     var close = document.getElementById(el);
	 close.onclick = function()
	  
	 {
	   
	    this.parentNode.style.display = "none";
            
	 }
	
 }
 

 
