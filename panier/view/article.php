<div id="article">
	<?php foreach($article as $a):?>
	  <div class="info1">
		<span class="article_titre"><?= $a->nom;?></span><br/>
		<img src="images/<?= $a->image;?>" width="300" height="250" alt="NO"/>
		<p>Prix: <?= $a->prix;?> €</p>
		<a class="white" href="index.php?page=panier&id=<?= $a->id;?>"><button class="bouton bouton_success">Ajouter au panier</button></a>
		<a class="white" href="index.php"><button class="bouton bouton_info">Back</button></a>
	  </div>
	  
	  <div class="info2">
		<div>
		 <h2>Description</h2>
		<p><?= $a->description;?></p>
		</div>
	  </div>
	<?php endforeach;?>
</div>
