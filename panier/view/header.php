<div id="header">
  <div id="log">
  
  <?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""):?>
    <button class="bouton bouton_mon_profil"><?= $_SESSION["pseudo"];?><span class="entypo-down-dir"></span></button>
		<div id="monprofil_params">
		  <ul>
		    <li><span class="fontawesome-user"></span><a href="index.php?page=monprofil">Mon profil</a></li>
		    <li><span class="fontawesome-edit"></span><a href="index.php?page=moncompte">Mon compte</a></li>
		    <li><span class="fontawesome-credit-card"></span><?= $_SESSION["argent"] ;?> €</li>
			<li><span class="fontawesome-signout"></span><a href="index.php?page=logout">Deconnection</a></li>
		
		  </ul>
		</div>
	<?php else:?>
	<a href="index.php?page=login"><button class="bouton_log">log in</button></a>
  <a href="index.php?page=signup"><button class="bouton_log">sign up</button></a>
  <?php endif?>
  

  </div>
   
 
    
   
  <div id="search">
	  <input type="text" name="search" id="input_search" placeholder="Rechercher un article"/>
	  <button class="bouton bouton_success" id="search_button">go!</button><br/>
	   <div id="search_list"></div>
  </div>
  <div class="navigation">
     <a href="index.php"><span  style="margin-left:2rem; font-size:2rem; top:10px; color:red;" class="entypo-home" title="Accueil"></span></a>
	 
  <a href="index.php?page=panier"><span style="margin-left:2rem; font-size:2rem; top:10px; color:green;" class="fontawesome-shopping-cart" title="Votre panier"></span></a>
  	<?php if(isset($_SESSION["statut"]) && $_SESSION["statut"]=="administrateur"):?>
			
			 <a href="index.php?page=add"><span style="margin-left:2rem; font-size:2rem; top:10px; color:purple;" class="iconicstroke-plus-alt" title="Ajouter un article"></span></a>
			  <a href="index.php?page=delete"><span  style="margin-left:2rem; font-size:2rem; top:10px; color:brown;" class="entypo-cup" title="Supprimer un article"></span></a>
			  
			 
			<?php endif;?>
  </div>
 
</div>