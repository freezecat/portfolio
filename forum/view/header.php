<div id="header">
    <div style="position:relative;margin-top:0;">
        <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""):?>
            <span><?= $_SESSION["pseudo"];?></span>
	
            <a href="index.php?page=monprofil"><button class="button button_blue">monprofil</button></a>
	        <a href="index.php?page=logout"><button class="button button_blue">logout</button></a>
    
        <?php else:?>
  
            <a href="index.php?page=signup"><button class="button button_blue">signup</button></a>
            <a href="index.php?page=login"><button class="button button_blue">login</button></a>
			
	    <?php endif?>
    </div>
     
	<div>
	    <div id="nuage1">
  	        <img src="image/cloud.png" width="150" height="50" alt="no"/>
	    </div>
	
	<div style="clear:both;"></div>
	
	    <div id="nuage2">
  	        <img src="image/cloud.png" width="75" height="25" alt="no"/>
	    </div>
		
	</div>
	
	
		
    <div id="header_nav">
        <ul>
	        <li><div class="header_nav_button"><a href="index.php?page=home">HOME</a></div></li>
		    <li><div class="header_nav_button"><a href="index.php?page=themes">FORUM</a></div></li>
		    <li><div class="header_nav_button"><a href="index.php?page=membres">MEMBRES</a></div></li>
		</ul>
    </div>
	
</div>

