<!-- arguments pour s'inscrire... promo newsletter,nouveauté...-->
<div id="signup">
    <h1>Sign Up</h1>
    <form action="index.php?page=signup" method="post">
  
        <div class="signup_input">
            <label>Genre</label><br/>
	        <input type="radio" name="gender" value="Homme"/>Homme
            <input type="radio" name="gender" value="Femme"/>Femme
	    </div>
	
	    <div class="signup_input">
            <label>Pseudo</label><br/>
	        <input type="text" name="pseudo" placeholder="pseudo"/>
	    </div>
	
	    <div class="signup_input">
	        <label>Adresse mail</label><br/>
	        <input type="text" name="email" placeholder="email"/>
	    </div>
	
	    <div class="signup_input">
	        <label>Mot de passe</label><br/>
	        <input type="password" name="password" placeholder="password"/>
	    </div>
	 
	    <div class="signup_input">
	        <input type="checkbox" name="newsletter"/> S'inscrire à ma newsletter<br/>
	        (pour rester informer des nouveautes!)
	    </div>
	
	    <button type="submit" class="bouton bouton_success">Sign Up</button>
    </form>
</div>