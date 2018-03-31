<?php
//structure des commentaires
function buildTree( $ar, $pid=0 ) {
							$op = array();
							foreach( $ar as $key=>$item ) {
								if( $item['parent_id'] == $pid ) {
									$op[$item['id']] = array(
										'sujet_id' => $item["sujet_id"],
										'commentaire' => $item["commentaire"],
										'parent_id'=> $item["parent_id"],
										'pseudo'=>$item["pseudo"],
										'date'=>$item["date"],
										'avatar'=>$item["avatar"]
									     //intro order_id
										 //haque fois que je réponds à 1 ommentaire
										 //je lui intro un order_id et j'update ave
									);
									// using recursion
									
									$children =  buildTree( $ar, $item['id'] );
									if($children) {
									
										$op[$item['id']]['children'] = $children;
									}
									
								}
							}
							return $op;
						}
	
				
	//fonction pour afficher dans la vue view/sujet.php ,les reponses de commentaires
	
	function enfants($table)
				{
		          	 global $smileys,$tab;
				    if(isset($table['children']))
				   {
				   //echo 'ENFANT';
				     
				
					 
					  echo "<div style='margin-left:1rem;'>";
				     foreach($table['children'] as $key=>$table)
					 {
					   echo $table['avatar']."<br/>";
					   
					    if(empty($table['avatar']))
						{
						  $table['avatar'] = "anonymous.png";
						}
					   echo   "<div><img src='avatars/".$table['avatar']."' border='1px solid black;'width='60' height='60' alt='no'/>'".$table['pseudo']." a posté le ".$table['date']."</div>";
					  echo str_replace($tab,$smileys,$table['commentaire']);
					   //echo $table['commentaire']."<br/>";  
					   echo '<br/><a id="repondre='.$key.'" href="index.php?page=themes&theme='.$_GET["theme"].'&sujet='.$_GET["sujet"].'&id='.$key.'">Repondre</a>';
					 echo "<a href='#' class='fontawesome thumb_up' id='thumb_up".$key."'><span class='fontawesome-thumbs-up'></span></a><span class='likes' id='likes".$key."'>0</span><a href='#' class='fontawesome thumb_down' id='thumb_down".$key."'><span class='fontawesome-thumbs-down'></span></a><span class='dislikes' id='dislikes".$key."'>0</span><br/>";
					   
					   
					   //formulaire
					   
					     require "view/form_response.php";
						 
						 enfants($table);
					 }
					  
					  
					echo "</div>";
				   }
				   
				}

 ?>