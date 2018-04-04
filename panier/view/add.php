<!-- arguments pour s'inscrire... promo newsletter,nouveauté...-->
<?php if(isset($_SESSION["pseudo"],$_SESSION["statut"]) && $_SESSION["pseudo"]!=="" && $_SESSION["statut"]=="administrateur"):?>
    <div id="signup">
        <h1>Ajouter un article</h1>
        <form action="index.php?page=add" method="post" enctype="multipart/form-data">
		
			<div class="signup_input">
		        <label>Nom</label><br/>
		        <input type="text" name="nom" placeholder="nom de l'article"/>
		    </div>
	
	        <div class="signup_input">
	            <label>Prix</label><br/>
	            <input type="integer" name="prix" placeholder="prix"/>
	        </div>
	
            <div class="signup_input">
	            <label>Image</label><br/>
	            <input type="file" name="image"/>
	        </div>
	 
	        <div class="signup_input">
	            <label>Description</label><br/>
	            <textarea cols="40" rows="10" name="description"></textarea>
	        </div>
			
	        <button type="submit" class="bouton bouton_success">Ajouter</button>
        </form>
    </div>
	
<?php else:?>
    FORBIDDEN
<?php endif;?>