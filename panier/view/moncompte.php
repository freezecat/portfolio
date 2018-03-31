<!-- arguments pour s'inscrire... promo newsletter,nouveauté...-->
<div id="moncompte">
  <h1>Modifier mon compte</h1>
  <form action="index.php?page=moncompte" method="post">
  
  <?php foreach($membre as $m):?>
  
 
    <div class="signup_input">
    <label>Genre</label><br/>
	
	
	<?php if($m->gender == "Homme"):?>
	    <input type="radio" name="gender" value="Homme" checked/>Homme
        <input type="radio" name="gender" value="Femme"/>Femme
   
    <?php else:?>
	 	<input type="radio" name="gender" value="Homme"/>Homme
        <input type="radio" name="gender" value="Femme" checked/>Femme
    <?php endif;?>
	</div>
	
	 <div class="signup_input">
    <label>Pseudo</label><br/>
	<input type="text" name="pseudo" value="<?= $m->pseudo;?>"/>
	 </div>
	
	 <div class="signup_input">
	  <label>Adresse mail</label><br/>
	<input type="text" name="email" value="<?= $m->email;?>"/>
	 </div>
	
	 <div class="signup_input">
	  <label>Mot de passe</label><br/>
	<input type="password" name="password" placeholder="entrez un nouveau mot de passe"/>
	 </div>
	 

	  <div class="signup_input">
	  	<?php if($m->newsletter == 0):?>
	    <input type="checkbox" name="newsletter"/> S'inscrire à ma newsletter
		<?php else:?>
		<input type="checkbox" name="newsletter" checked/> S'inscrire à ma newsletter
		<?php endif;?>
	 </div>
	 	<?php endforeach;?>

	<button type="submit" class="bouton bouton_success">Sign Up</button>
  </form>
</div>