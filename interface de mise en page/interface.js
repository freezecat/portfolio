
//alert(txt.innerHTML);

var go = document.querySelector("#go");



go.onclick = function(){
  //alert("ij");
  
  //exemple mis en gras!
  function getSelection()
{
var txt = document.querySelector("#txt");
txt.focus();

   var result = txt.innerHTML;
   var selection = window.getSelection();
   //alert("selection: " + selection);
   
   //alert(result);
   //alert(txt.innerHTML.indexOf(selection) + " " + selection);
   
   //txt.innerHTML = "<strong>"+selection+"</strong>";
    
	var r = result.replace(selection,"<strong>"+ selection +"</strong>");
	//alert(r);
	txt.innerHTML = r;
}
  getSelection();
};
