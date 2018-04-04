<div>
    <div>
        <?php if(!isset($_GET["pseudo"])):?>
	    Liste des inscrits:
		
            <?php foreach($membres as $m):?>
	            <div><a href="index.php?page=membres&pseudo=<?= $m->pseudo?>"><?= $m->pseudo;?></a></div>
	        <?php endforeach?>
	
	    <?php else:?>
	  
	        <span style="font-size:30px;"><?= $_GET["pseudo"];?></span><br/>
	        <a href="index.php?page=membres&pseudo=<?= $_GET["pseudo"];?>&detail=emprunt"><button>emprunts en cours</button></a>
	        <a href="index.php?page=membres&pseudo=<?= $_GET["pseudo"];?>&detail=commentaires"><button>commentaires postés</button></a>
	
	        <?php if(isset($_GET["detail"])): ?>
	            <?php if($_GET["detail"]=="emprunt"):?>
		        <!-- emprunt en cours-->
		            <div>emprunt en cours</div><br/>
		            <table border="1px solid red;" style="border-collapse:collapse;">
						<tr>
						    <th>image</th>
						    <th>titre</th>
						    <th>date d'emprunt</th>
						    <th>date de retour</th>
						</tr>
						
		            <?php foreach($livre as $l):?>
		    
			            <?php $emprunt = $membre->emprunt($db,$l->livre_id);?>
			 
                        <?php foreach($emprunt as $e):?>
						
							<tr>
							    <td><a href="index.php?page=livre&titre=<?= $e->titre;?>"><img src="<?= $e->url;?>" width="100" height="100" alt="no"/></a></td>
							    <td><?= $e->titre;?></td>
							    <td><?= date("Y-m-d H:i:s",$l->date_depart);?></td>
							    <td><?= date("Y-m-d H:i:s",$l->date_fin);?></td>
							</tr>
			   
			            <?php endforeach?>
						
			           <!-- afficher emprunt pour chaque $e-->
		            <?php endforeach?>
				    </table>
		        <?php endif?>
				
		        <?php if($_GET["detail"]=="commentaires"):?>
		        <!-- tous les com poste par pseudo,livre ,img...-->
		        <div>commentaires postés</div><br/>
		            <?php foreach($com as $c):?>
					
						<?php $titre = $membre->emprunt($db,$c->livre_id); ?>
					    <div>Titre du livre:
					        <div><a href="index.php?page=livre&titre=<?= $titre[0]->titre;?>"><?= $titre[0]->titre;?></a></div>
					    </div>
						
					    <div>commentaire:<div><?= $c->commentaire;?></div></div><br/>
		 
		            <?php endforeach?>
		        <?php endif?>
				
	        <?php endif?>
	    <?php endif?>
    </div>
</div>