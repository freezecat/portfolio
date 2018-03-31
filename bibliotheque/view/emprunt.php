<div>
<?php if(isset($_GET["titre"])):?>
  <div style="float:left;width:25%;">
  <img src="<?= $book->url;?>" width="200" height="200" alt="no"/>
  </div>
  <div style="float:left;width:25%;">
  TITRE: <span id="livre_titre"><?= $book->titre;?></span><br/>
  AUTEUR: <?= $book->auteur;?><br/>
  NOMBRE: <?= $book->nombre;?> en stock<br/>
  
  </div>

  <div style="clear:both;"></div>

<hr/>
<div><?=  $info;?></div>
<form action="index.php?page=emprunt&titre=<?= $book->titre;?>" method="post">
  <label>Duree de l'emprunt en jours</label><br/>
  <select name="duree">
    
	 <option>7</option>
	  <option>15</option>
	   <option>30</option>
  </select><br/><br/>
  <button type="submit">emprunter</button>
</form>
<hr/>
<div>Emprunts en cours: faire profil.php qui liste ses com postés et ses emprunts en cours du pseudo</div>

    <table border="1px solid black;" style=" border-collapse: collapse;">
	  <tr>
	    <th>Emprunteur</th>
		<th>date d'emprunt</th>
		<th>date de retour</th>
	  </tr>
		<?php foreach($emprunt as $e):?>
		<tr>
		  <td><a href="index.php?page=membres&pseudo=<?= $e->pseudo;?>"><?= $e->pseudo;?></a></td>
		  <td><?= date("Y-m-d H:i:s",$e->date_depart);?></td>
		  <td><?= date("Y-m-d H:i:s",$e->date_fin);?></td>
		</tr>
	
		
		<?php endforeach?>

	</table>
  
<?php endif ?>
</div>