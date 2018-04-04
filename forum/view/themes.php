<?php if(!isset($_GET["theme"]) && !isset($_GET["sujet"])): ?>
	<span>navigation</span>
		<nav>
		    <div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:black;display:block;" href="index.php?page=home">Home</a></div>
			<div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:blue;display:block;" href="index.php?page=<?= $_GET["page"];?>"><?= $_GET["page"];?></a></div>
			<div class="forum_nav_clear"></div>
        </nav>
	
	    <?php foreach($theme as $t):?>
			<div style="float:left; width:30%; text-align:center;">
			    <img src="image/theme<?= $t->id;?>.jpg" width="200" height="200" alt="no"/>
			    <div style="position:relative;margin-top:-7rem;"><a style="color:white;text-decoration:none;" href="index.php?page=themes&theme=<?= UTF8_encode($t->theme);?>"><?= UTF8_encode($t->theme);?></a></div>
			</div>
        <?php endforeach?>
      
<?php endif ?>

<?php if(isset($_GET["theme"]) && !isset($_GET["sujet"])):?>
    <span>navigation</span>
	<nav>
		<div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:black;display:block;" href="index.php?page=home">Home</a></div>
	    <div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:blue;display:block;" href="index.php?page=<?= $_GET["page"];?>"><?= $_GET["page"];?></a></div>
	    <div class="forum_nav"><a style="text-decoration:none;font-size:1.5rem;color:green;display:block;" href="index.php?page=<?= $_GET["page"];?>&theme=<?= $_GET["theme"];?>"><?= $_GET["theme"];?></a></div>
		<div class="forum_nav_clear"></div>
    </nav>
	
    <?php foreach($sujet as $s):?>
	    <div><a href="index.php?page=themes&theme=<?= UTF8_encode($_GET["theme"]);?>&sujet=<?= UTF8_encode($s['sujet']);?>"><?= UTF8_encode($s['sujet']);?></a></div><br/>
    <?php endforeach ?><hr/>
		
	<form action ="index.php?page=themes&theme=<?= $_GET['theme'];?>" method="post">
		<div class="margin-input">
		    <label>titre du sujet</label><br/>
	        <input type="text" name="titre" placeholder=""/>
		</div>
	    <button type="submit" class="button button_red">poster</button>
	</form>
       
<?php endif ?>
		 
	

  
  
   
  
  
