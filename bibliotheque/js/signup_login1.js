$(document).ready(function(){
   var sl = $("#signup_login");
   var log = $("#log");
   var close = $("#close");
   
   var signup = $("#signup");
   var login = $("#login");
   
   var form_login = $("#form_login");
   var form_signup = $("#form_signup");
   //bouton submit dans view/login.php et view/signup.php
   var submit = $(".submit");
   
  
   var email_login = $("#email_login");
   var password_login = $("#password_login");
   
    var pseudo_signup = $("#pseudo_signup");
   var email_signup = $("#email_signup");
   var password_signup = $("#password_signup");
   
   var txt = $("#log_txt");
   var info = $(".info");
   
   sl.click(function(e){
   e.preventDefault();
   
    log.css("display","block");
	
   });
     close.click(function(){
	 
	     log.css("display","none");
	  });
	  
	signup.click(function(){
	  txt.html("inscription");
	  $(this).css("display","none");
	  login.css("display","block");
	  form_login.css("display","none");
	  form_signup.css("display","block");
	});
	login.click(function(){
	  txt.html("connection");
	    $(this).css("display","none");
	  signup.css("display","block");
	  	  form_login.css("display","block");
	  form_signup.css("display","none");
	  
	});
	 
	submit.click(function(){
	  
	  if($(this).html() == "signup")
	  {
	  //console.log($(this).html()+" "+pseudo_signup.val()+" "+email_signup.val()+" "+password_signup.val());
	  //post ajax/signup.php
	  $.post("ajax/signup.php",{"pseudo":pseudo_signup.val(),"email":email_signup.val(),"password":password_signup.val()},function(data){
	       info.html(data);
		   pseudo_signup.empty();
		   email_signup.empty();
		   password_signup.empty();
	  });
	  }
	    if($(this).html() == "login")
	  {
	 // console.log($(this).html()+" "+email_login.val()+" "+password_login.val());
	  //post ajax/login.php
	  
	    $.post("ajax/login.php",{"email":email_login.val(),"password":password_login.val()},function(data){
	     
		location.reload();
		  
	  });
	  
	  }
	  
	});
});