

var btn = document.getElementsByClassName("bouton_mon_profil");
var dropdown = document.getElementById("monprofil_params");

var trigger = false;
if(typeof btn !== undefined)
{
	btn[0].onclick = function(){

	   if(trigger == false)
	   {
	   dropdown.style.display="block";
	   trigger = true;
	   }
	   else
	   {
		 dropdown.style.display="none";
	   trigger = false;
	   }
	};
}