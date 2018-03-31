<div>
     <?php foreach($mon_profil as $p):?>
   
      <span><?= $p->pseudo ;?></span><br/>
	  <span>genre : <img src='images/<?= $p->gender ;?>.png' width='20' height='20' alt='no'/></span> (<a href="https://icones8.fr">Pack d’icônes par Icons8</a>)<br/>
	   <span>email : <?= $p->email ;?></span><br/>
	    <span>argent : <?= $p->argent ;?></span> €<br/>
        <span>connecté(e) en tant que : <span style="color:red;"><?= $p->statut ;?></span></span><br/>
	
     <?php endforeach;?>
	 
</div>
 <div>Mes achats:</div>
 
   <?php foreach($mes_achats as $liste):?>
   
     achat effectué le <?=  $liste->date;?><br/>
     <img src="images/<?= unserialize($liste->achats)->image;?>" width="100" height="100" alt="no"/>
	 <span>Nom:<?=  unserialize($liste->achats)->nom;?> Quantité:<?= unserialize($liste->achats)->quantity;?></span>
	 <hr/>
   <?php endforeach;?>
   <div>
   <a class="white" href="index.php"><button class="bouton bouton_success">Home</button></a>
   </div>
 
