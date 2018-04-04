<div class="titre">Bienvenue à la bibliotheque</div>
classement par:
<select class="select">
    <option>ordre alphabetique</option>
    <option>auteur</option>
</select>


<div>
    <?php foreach($liste as $l):?>
		<div style="float:left;width:30%; margin-bottom:1rem;">
		
			<div style="float:left;width:40%;">
			    <a href="index.php?page=livre&titre=<?= $l->titre;?>"><img src="<?= $l->url ?>" width="100" height="100" alt"no"/></a>
			</div>
			
			<div style="float:left;width:40%;">
				<div><?= $l->auteur;?></div>
				<div><?= $l->titre;?></div> 
				<div>quantite disponible:<?= $l->nombre;?></div>
			</div>
		
		</div>
    <?php endforeach ?>
	
    <div style="clear:both;"></div>
 
</div>