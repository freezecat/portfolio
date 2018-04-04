<div>PHOTO DE PROFIL</div>

<div style='width:100px;height:100px; border:1px solid red;'>
<!-- detecte session puis sele$])Cct image from membres where PSEUDO= session-->

    <img src="avatars/<?= $avatar;?>" width="100" height="100" alt="no"/>
</div>

<div>
	<form action="index.php?page=monprofil" method="post" enctype="multipart/form-data">
	    <input type="file" name="fichier"/><br/>
	    <input type="submit" value="valider mon avatar!"/>
	</form>
</div>