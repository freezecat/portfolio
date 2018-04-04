<div id="panier">
    <?php if($_SESSION["panier"]!=[]):?>
        <table>
		    <tr>
			    <th>Image</th>
			    <th>Nom du produit</th>
			    <th>Prix</th>
			    <th>Quantité</th>
			</tr>
 
            <?php foreach($article as $a):?>
				    <tr>
						<td><img src="images/<?= $a->image;?>" width="150" height="150" alt="non"/></td>
						<td><?= $a->nom;?></td>
						<td><?= $a->prix;?> €</td>
						<td><?= $_SESSION["panier"][$a->id];?></td>
				    </tr>
            <?php endforeach;?>
		</table>
    <?php else:?>
        <p>Votre panier est vide</p>
    <?php endif;?>
</div>

<div>
    Prix total: <?= $_SESSION["total"];?> €
</div>

<a class="white" href="index.php?page=panier">
    <button class="bouton bouton_success">Back</button>
</a>
<a class="white" href="index.php?page=paiement">
    <button class="bouton bouton_danger">Payer</button>
</a>