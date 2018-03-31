
<div id="newpassword">
  <span>Nouveau mot de passe</span>
  <form action="index.php?page=newpassword&email=<?= $email;?>&token=<?= $token;?>" method="post">
  
 
	
	
	 <div class="login_input">
	  <label>Entrez votre code</label><br/>
	<input type="text" name="code" placeholder="code"/><br/><br/>
	
	 <label>Entrez votre nouveau mot de passe</label><br/>
	<input type="text" name="password" placeholder="password"/><br/><br/>
	 
	 
	  </div>
	
	<button type="submit" class="bouton bouton_success">Update!</button>
  </form><br/>

</div>
