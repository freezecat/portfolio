<?php 





require "functions/pagination.php";
$page_total = nbr_page("articles",4);
$articles = pagination("articles",4);



require "view/home.php";
?>