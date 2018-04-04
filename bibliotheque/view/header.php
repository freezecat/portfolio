<div id="header">

    <nav class="menu">
	    <ul>
		    <li><a href="index.php?page=home">home</a></li>
			
		    <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""):?>
		        <li><a href="index.php?page=logout" id="logout">logout</a></li>
		    <?php else:?>
		  	    <li><a href="#" id="signup_login">signup/login</a></li>
		    <?php endif?>
		  
		    <li><a href="index.php?page=livres">bibliotheque</a></li>
		    <li><a href="index.php?page=membres">membres</a></li>
			
		    <!-- petit symbole en 'boucle'-->
		    <li><input type="text" class="search" placeholder="rechercher un livre"><button class="btn1 green btn_search">go</button></li>
		</ul>
	</nav>
	
    <div id="search_result"></div>
	
    <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""):?>
        <?= $_SESSION["pseudo"];?>
	<?php endif ?>
	
	<img src="image/book1.png" width="200" height="200" alt="no" style="float:right;">
	<img src="image/book2.png" width="200" height="200" alt="no" style="float:right;">
	
</div>