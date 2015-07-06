$(function() {

	var app_id = '455179211327146';
	var scopes = 'email, user_friends';

	var btn_login = '<a href="#" id="login" >'+
          '<img src="img/registra_facebook.png" height="20">'+
          'Registrate para recibir promociones'+
          '</a>';

	var div_session ="<div id='facebook-session' style='padding-top:10px;'>"+
					  "<img width='40'>  "+
            "<strong > </strong>  "+
            "</div>";


	window.fbAsyncInit = function() {

	  	FB.init({
	    	appId      : app_id,
	    	status     : true,
	    	cookie     : true, 
	    	xfbml      : true, 
	    	version    : 'v2.3'
	  	});


	  	FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response, function() {});
	  	});
  	};

  	var statusChangeCallback = function(response, callback) {
  		console.log(response);
   		
    	if (response.status === 'connected') {
      		getFacebookData();
    	} else {
     		callback(false);
    	}
  	}

  	var checkLoginState = function(callback) {
    	FB.getLoginStatus(function(response) {

      		callback(response);
    	});
  	}
//***
  	var getFacebookData =  function() {
  		FB.api('/me', function(response) {
        if(response.name.length > 0)
        {
          $.post("php/comprobar_mail.php",{
          email:response.email,
          nombre:response.name
          },function(data){
          //alert(data);
          //window.location="index.php";
          });
        }
        
	  		$('#login').after(div_session);
	  		$('#login').remove();
	  		$('#facebook-session strong').text("Bienvenido: "+response.name);
	  		$('#facebook-session img').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
	  	  //alert("tu nombre es: "+response.name+ "Email: "+response.email);
        
      });
  	}
//***
  	var facebookLogin = function() {
  		checkLoginState(function(data) {
  			if (data.status !== 'connected') {
  				FB.login(function(response) {

  					if (response.status === 'connected')
  						getFacebookData();
  				}, {scope: scopes});
  			}
  		})
  	}
//**
  	var facebookLogout = function() {
  		checkLoginState(function(data) {
  			if (data.status === 'connected') {
				FB.logout(function(response) {
          $.post("php/cerrar_sesion.php",{},function(data){
            window.location="index.php";
          });
					$('#facebook-session').before(btn_login);
					$('#facebook-session').remove();
				})
			}
  		})

  	}



  	$(document).on('click', '#login', function(e) {
  		e.preventDefault();

  		facebookLogin();
  	})

  	$(document).on('click', '#logout', function(e) {
  		e.preventDefault();

  		if (confirm("¿Está seguro?"))
  			facebookLogout();
  		else 
  			return false;
  	})

})
