<div class="container">
    <div id="pagination1">
        <?php for($i=1;$i<=$page_total;$i++): ?>
		
            <?php if(isset($_GET["p"])): ?>
			
				<?php if($i == intval($_GET["p"])): ?>
				    <a href="index.php?p=<?= $i;?>"><div class="pages page_selected"><?= $i;?></div></a>
				<?php else: ?>
				    <a href="index.php?p=<?= $i;?>"><div class="pages pagination"><?= $i;?></div></a>
				<?php endif;?>
				
			<?php else: ?>
				<a href="index.php?p=<?= $i;?>"><div class="pages pagination"><?= $i;?></div></a>
			<?php endif;?>
			
        <?php endfor;?>
    </div>
	
    <?php foreach($articles as $a):?>
	  
	    <div class="article">
			<div class="art">
				<img src="images/<?= $a->image;?>" width="200" height="160" alt=""/><br/>
				<p><?= $a->nom;?></p>
				<p>Prix:<?= $a->prix;?>€</p>
				<a class="white" href="index.php?page=panier&id=<?= $a->id;?>">
				    <button class="bouton bouton_success">ajouter au panier</button>
				</a>
				<a class="white" href="index.php?page=article&nom=<?= $a->nom;?>">
				    <button class="bouton bouton_info">info</button>
				</a>
			</div>
        </div>
	  
    <?php endforeach;?>
	
</div>
