<?php if($book!=false):?>

<div>
<?php if(isset($_GET["titre"])):?>
  
  <div class="book_float">
  <img src="<?= $book->url;?>" width="200" height="200" alt="no"/>
  </div>
  <div class="book_float">
  TITRE: <span id="livre_titre"><?= $book->titre;?></span><br/>
  AUTEUR: <?= $book->auteur;?><br/>
  NOMBRE: <?= $book->nombre;?> en stock<br/>
  <a href="index.php?page=emprunt&titre=<?=  $book->titre;?>"><button class="btn2 white">emprunter</button></a>
  </div>
  <div class="book_float">
 <br/>
  <?php
  
     
  ?> 
   <?php if($total!=0):?>
   <div class="likes_bar">
     <div style="width:<?= $l;?>%;height:0.3rem;background:green;float:left;"></div>
	 <div style="width:<?= $d;?>%;height:0.3rem;background:lightgreen;float:left;"></div>
     <div class="clear_both;"></div>
	 <div id="likes"><span class="fontawesome-thumbs-up"></span><span><?= $likes;?></span></div>
	 <div id="dislikes"><span class="fontawesome-thumbs-down"></span><span><?= $dislikes;?></span></div>
	  <div class="clear_both;"></div>
   </div>
   <?php else:?>
   0 vote pour ce livre actuellement
   <?php endif?>

<br/><br/>
  <a href="index.php?page=vote&titre=<?= $book->titre;?>"><button class="btn2 white">voter</button></a>
  </div>
  <div style="clear:both;"></div>
<?php endif ?>
</div>
<div id="bande_bleu">
  
</div>
<div>commentaires</div>
<!-- afficher les 3 premiers -->
<div id="liste_com"></div>

<button class="btn2 white" id="btn_com">afficher plus de commentaires</button>
<div><br/>
<hr/>
 Donner votre avis sur ce livre. 
 <form action="index.php?page=livre&titre=<?= $titre;?>" method="post">
   <textarea cols="35" rows="10" name="commentaire"></textarea/><br/>
   <button type="submit" class="btn3">poster</button>
 </form>
</div>
<div id="bande_rouge">
 
</div>
<div>
  <div>D'autres livres du meme auteur</div><br/>
 <?php foreach($autres as $a):?>
 <?php if($a->titre!=$titre):?>

  <div class="other_books">
	  <div><?= $a->titre;?></div>
	  <div><a href="index.php?page=livre&titre=<?= $a->titre;?>"><img src="<?= $a->url;?>" width="100" height="100" alt="no"/></a></div>
  </div>
 
  
  <?php endif?>
 <?php endforeach?>
 <div class="clear_both;"></div>
</div>
<?php else:?>
 <!-- mettre une image comique!-->
  <?= $info;?>
<?php endif?>