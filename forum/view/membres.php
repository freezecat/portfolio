<div>
    <div>
    classement par:
		<select id="membres_select" >
		
		    <?php if(!isset($_GET["letter"])):?>
				<option class="membres_option">date</option>
				<option class="membres_option">ordre alphabetique</option>
			<?php else:?>
				<option class="membres_option">ordre alphabetique</option>
				<option class="membres_option">date</option>
            <?php endif?>
			
		</select>
    </div><br/>
    <div id="alphabetique">
    
    </div>
  
    <?php if(isset($_GET["letter"])):?>
        <h1><span id="letter"><?= $_GET["letter"];?></span></h1>
        <div id="liste_membres"></div>
    <?php else:?>
        <div id="liste_membres"></div>
    <?php endif?>
	
</div>