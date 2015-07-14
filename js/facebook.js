$(function() {

	var app_id = '1482393692053796';
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
  		//console.log(response);
   		
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
          /*$.post("php/comprobar_mail.php",{
          email:response.email,
          nombre:response.name
          },function(data){
          //alert(data);
          //window.location="index.php";
          });*/
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
function Publicar(){
       FB.ui(
       {
         method: 'feed',
         name: 'Restaurantes SACYG',
         link: 'http://sacygrestaurantes.com/',
         caption: '',
         description: 'Donde el estilo, el gusto y el buen comer se adueñan de ti.',
         message: ''
       },
// Si quieres que salga una alerta
       function(response) {
         
       }
     );
 }
 function auto_publishPost() {
                var publish = {
                    method: 'stream.publish',
                    message: 'is learning how to develop Facebook apps.',
                    picture : 'http://www.takwing.idv.hk/facebook/demoapp_jssdk/img/logo.gif',
                    link : 'http://www.takwing.idv.hk/facebook/demoapp_jssdk/',
                    name: 'This is my demo Facebook application (JS SDK)!',
                    caption: 'Caption of the Post',
                    description: 'It is fun to write Facebook App!',
                    actions : { name : 'Start Learning', link : 'http://www.takwing.idv.hk/tech/fb_dev/index.php'}
                };
 
                FB.api('/me/feed', 'POST', publish, function(response) {  
                    alert(response);
                });
            }; 