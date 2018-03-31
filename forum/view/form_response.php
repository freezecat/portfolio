	    <!-- formulaire pour repondre -->
		<?php if(isset($_GET["id"]) && ctype_digit($_GET["id"]) &&  $key==$_GET['id']):?>
				<div>
						<form action ="index.php?page=themes&theme=<?= $_GET['theme'];?>&sujet=<?= $_GET["sujet"];?>&id=<?= $_GET['id'];?>" method="post">
						<label>Repondre à ce commentaire</label><br/>
						<textarea cols="30" rows="10" type="text" name="commentaire" id= "commentaire" placeholder=""></textarea><br/>
					  
						<div style="width:400px;height:100px;border:1px solid black;">
						<a href="http://mysmiley.net">smileys</a><br/>
						<?php for($i=1;$i<11;$i++):?>
					
						<img class="smileys" style="cursor:pointer;" src="image/smiley<?= $i;?>.gif" alt="no">
						<?php endfor?>
						</div>
						<button type="submit" class="button button_red">repondre</button>
						</form>
				</div>
		    <?php endif?>