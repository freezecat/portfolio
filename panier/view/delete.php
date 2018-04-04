<?php if(isset($_SESSION["pseudo"],$_SESSION["statut"]) && $_SESSION["pseudo"]!=="" && $_SESSION["statut"]=="administrateur"):?>

    <div id="pagination2">
        <?php for($i=1;$i<=$nbr_page;$i++):?>
		
            <?php if(isset($_GET["p"])): ?>
			
                <?php if($i == intval($_GET["p"])): ?>
                    <a href="index.php?page=delete&p=<?= $i;?>">
					    <div class="pages page_selected"><?= $i;?></div>
					</a>
                <?php else: ?>
	                <a href="index.php?page=delete&p=<?= $i;?>">
					    <div class="pages pagination"><?= $i;?></div>
					</a>
	            <?php endif;?>
	
	        <?php else: ?>
	            <a href="index.php?page=delete&p=<?= $i;?>">
				    <div class="pages pagination"><?= $i;?></div>
				</a>
	        <?php endif;?>
			
        <?php endfor;?><br/>
    </div>

    <span>Supprimer un article</span><br/>
	
    <?php  foreach($articles as $a):?>
        <span>Nom: <?= $a->nom;?></span><br/>
        <img src="images/<?= $a->image;?>" width="100" height="100" alt="no"/>
        <span>Prix:<?= $a->prix;?> € </span>
		<a class="white" href="index.php?page=delete&id=<?= $a->id;?>">
		    <button class="bouton bouton_danger">Supprimer</button>
		</a><br/><hr/>
    <?php endforeach;?>
	
<?php else: ;?>
    FORBIDDEN
<?php endif;?>