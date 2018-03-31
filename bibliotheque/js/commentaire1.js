$(document).ready(function(){
  var btn_com = $("#btn_com");
 
  var titre = $("#livre_titre").html();
  var liste_com = $("#liste_com");
 var i=0;
  function display(i)
	 {
	  
	 $.post("ajax/commentaires.php",{"id":i,"titre":titre},function(data){
	    var txt = "";
		for(var j=0;j<data.length;j++)
		{
		  txt += "Poste par: "+data[j].pseudo+"<br/>"+data[j].commentaire+"<br/><br/>";
		}
		liste_com.html(txt);
        },'json');
	 }
	 
	 display(0);
	 
  btn_com.click(function(){
    //alert($(this).attr("id"));
    i++;

	 display(i);//semble fontionner! ajouter plus de comment!
	 //alert(titre);
	 
	
  });
});