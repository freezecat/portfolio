<div id="alerte">
    <span class='alerte_msg'>Identifiez-vous !
	    <a href='index.php?page=login'>Log In</a>
    </span>
    <div id='alerte_close' onclick="msg_close('alerte_close')">X</div>
</div>

<div id="panier">
    <?php if($_SESSION["panier"]!=[]):?>
        <table>
		    <tr>
			    <th>Image</th>
			    <th>Nom du produit</th>
			    <th>Prix</th>
			    <th>Quantité</th>
			    <th>Supprimer</th>
		    </tr>
			
            <?php foreach($article as $a):?>
                <tr>
                    <td><img src="images/<?= $a->image;?>" width="150" height="150" alt="non"/></td>
                    <td><?= $a->nom;?></td>
                    <td><?= $a->prix;?> €</td>
                    <td>
                        <form method="post"action="index.php?page=update&id=<?= $a->id;?>">
  
                            <!--"name" different pour chaque produit , par exemple name = "qte1" pour l'article dont l'id =1.-->
                            <input id="qte" type="integer" name="qte<?= $a->id;?>" value="qte"/>
                            <button class="bouton bouton_info" type="submit">update</button> 
                        </form><br/><br/>
                        <?= $_SESSION["panier"][$a->id];?>
                    </td>
                    <td><a class="white" href="index.php?page=supprimer&id=<?= $a->id;?>"><button class="bouton bouton_danger">Supprimer</button></a></td>
                </tr>
            <?php endforeach;?>
        </table>
		
    <?php else:?>
        <p>Votre panier est vide</p>
    <?php endif;?>
</div>


<a class="white" href="index.php"><button class="bouton bouton_success">Back</button></a>
<?php if($_SESSION["panier"]!=[]):?>

	<?php if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=""):?>
	    <a class="white" href="index.php?page=achat"><button class="bouton bouton_danger">confirmer l'achat</button></a>
	<?php else:?>
	 <!-- voire alerte.js -->
	    <button class="bouton bouton_danger"  onclick="msg('alerte')">confirmer l'achat</button>
	<?php endif;?>
	
<?php endif;?>