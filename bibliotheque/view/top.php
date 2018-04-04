<table id="toplist">
    <tr>
		<th class="toplist_td">Place</th>
		<th class="toplist_td">Titre</th>
		<th class="toplist_td">Image</th>
		<th class="toplist_td">Nombre de likes</th>
    </tr>
	
    <?php foreach($book as $index=>$b):?>
	
    <?php $info = $top->display($db,$b->livre_id);?>
    <!-- n'affiche que les 3 premiers du classement!-->

        <?php if($index<=2):?>  
            <tr>
                <td class="toplist_td"><span id="index<?= $index+1;?>"><?= $index+1;?></span></td>
   
                    <?php foreach($info as $in):?>
					    <td class="toplist_td"><?= $in->titre;?></td>
					    <td class="toplist_td"><a href="index.php?page=livre&titre=<?= $in->titre;?>"><img src="<?= $in->url;?>" width="200" height="200" alt="non"/></a></td>
					<?php endforeach?>
	
                <td class="toplist_td"><span><?= $b->m;?></span></td>
	        </tr>
        <?php endif?>
 
    <?php endforeach?>
	
</table>

