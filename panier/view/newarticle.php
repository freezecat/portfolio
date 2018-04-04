<div>
    <span>NEW!!</span><br/>
    <div>argument!</div>
    <h1 style="margin-left:5%;"><?= $nom;?></h1>

	<div style="float:left;width:40%;margin-left:5%;">
        <img src="images/<?= $image;?>" width="200" height="200" alt="no"/>
	    <div>Prix: <?= $prix;?> €</div>
	    <a href="index.php?page=panier&id=<?= $idmax;?>"><button class="bouton bouton_success">Ajouter au panier!</button></a>
	</div>


    <div style="float:left;width:40%;margin-right:5%;">
        <?= $description;?>
    </div>
</div>