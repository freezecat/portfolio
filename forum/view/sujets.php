   
   <?php if(isset($_GET["theme"]) && isset($_GET["sujet"])):?>
       
	    <span>navigation</span>
		<nav>
		    <div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:black;display:block;" href="index.php?page=home">Home</a></div>
			<div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:blue;display:block;" href="index.php?page=<?= $_GET["page"];?>"><?= $_GET["page"];?></a></div>
			<div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:green;display:block;" href="index.php?page=<?= $_GET["page"];?>&theme=<?= $_GET["theme"];?>"><?= $_GET["theme"];?></a></div>
			<div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:red;display:block;" href="index.php?page=<?= $_GET["page"];?>&theme=<?= $_GET["theme"];?>&sujet=<?= $_GET["sujet"];?>"><?= $_GET["sujet"];?></a></div>
			<div class="forum_nav_clear"></div>
        </nav>
		<?php foreach($comment as $key=>$c):?>
	  
	       <!-- un element de tab[0] sera remplace par smileys[0] et ainsi de suite -->
		    <!-- tant pis display uniquement eux dont parent_id ==0-->
			<?php if($c['parent_id']==0): ?>
		   <div>
		      <?php if(empty($c['avatar'])):?>
			   <?php $c['avatar']= "anonymous.png";?>
			  <?php endif?>
		     <div><img src="avatars/<?= $c['avatar'];?>" border="1px solid black;" width="80" height="80" alt="no"/><?= $c['pseudo'];?> a posté le <?= $c['date'];?></div>
		   <?= str_replace($tab,$smileys,$c['commentaire']); ?>
		      
			
			
			
		   </div><br/>
		   
		   
		   
		   <a id="repondre<?= $key;?>" href='index.php?page=themes&theme=<?= $_GET['theme'];?>&sujet=<?= $_GET['sujet'];?>&id=<?= $key;?>'>Repondre</a>
		   <!-- boutons like dislike-->
		   <a href="#" class="fontawesome thumb_up" id="thumb_up<?= $key;?>"><span class="fontawesome-thumbs-up"></span></a><span class="likes" id="likes<?= $key;?>">0</span><a href="#" class="fontawesome thumb_down" id="thumb_down<?= $key;?>"><span class="fontawesome-thumbs-down"></span></a><span class="dislikes" id="dislikes<?= $key;?>">0</span>
		   <?php endif ?>
		   
		   <?php 
		   require "view/form_response.php";
		   ?>
		   
	
			 
			 <!-- enfants-->
			  <?php 
			
		         // liste les enfants du commentaire 
				enfants($c);
			   
			  ?>
			   
			
			
		    <hr/>
		   
	    <?php endforeach ?>
	    
		
	     <div style="width:100%;height:3rem;background:green;"></div>
		 <!-- pas de get id ,on poste un commentaire -->
	     <?php if(!isset($_GET["id"])): ?>
				<form action ="index.php?page=themes&theme=<?= $_GET['theme'];?>&sujet=<?= $_GET['sujet'];?>" method="post">
				<label>Poster un commentaire</label><br/>
				<textarea cols="30" rows="10" type="text" name="commentaire" id= "commentaire" placeholder=""></textarea><br/>
			  
				<div style="width:400px;height:100px;border:1px solid black;">
				<a href="http://mysmiley.net">smileys</a><br/>
				<?php for($i=1;$i<11;$i++):?>
			
				<img class="smileys" style="cursor:pointer;" src="image/smiley<?= $i;?>.gif" alt="no">
				<?php endfor?>
				</div>
				<button type="submit" class="button button_red">poster</button>
				</form>
		<?php endif ?>
    <?php endif?>