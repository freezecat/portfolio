<div id="content">
  
    <div id="log">
        <div>
	   
	        <div class="info"></div>
	        <span id="log_txt">inscription</span>
			
	        <div id="form_signup">
	  
	            <?php require "view/signup.php"; ?>
	   
	        </div>
			
	        <div id="form_login">
	            <?php require "view/login.php"; ?>
	  
	        </div>
			
	        <div style="clear:both;"></div>
	   
	        <div style="position:relative;margin-top:2rem;margin-left:36%;">
	            <button id="signup"><- inscription</button>
	            <button id="login" >connection -></button>
	        </div>
	   
	    </div>
	 
	 <div id="close">X</div>
	 
    </div>
  
   <?php require "controller/".$page.".php"?>
</div>
 
