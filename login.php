<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<?php require_once ('functions/config.inc.php'); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?=$siteTitle;?> - Login</title>
        <link rel="stylesheet" type="text/css" href="/css/login.css"/>
		<script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="/js/jquery.md5.js"></script>
		</head>
    <body class="small login">
    	<div id="wrapper">
			<div id="header"><h1><a href="/">Evea-Group Services</a></h1></div>
			<div class="container">
				<div id="topcorners"><div class="cleft"></div><div class="cright"></div></div>
				<div id="content">
					<form id="loginForm" method="post" action="/login.action.php">
						<table class="login" style="margin-left: auto; margin-right: auto;">
							<tr>
								<td><p class="mtop0 mbottom025"><strong><label for="email">Utilisateur</label></strong></p><input id="email" tabindex="1" class="inputtext" type="text" name="email" /></td>
							</tr>
							<tr>
								<td><p class="mtop05 mbottom025"><strong><label for="password">Mot de passe</label></strong></p><input tabindex="2" class="inputtext" type="password" name="password" id="password" /></td>
							</tr>
							<tr>
								<td>
								<p class="mtop025 mbottom0"><a href="#">Mot de passe oubli&eacute;?</a>
								</p></td> 
							</tr>
							<tr>
								<td><p class="mtop025 mbottom0"><input type="checkbox" name="remember" id="rememberMe" tabindex="3"/> <label for="rememberMe">Se souvenir de moi</label></p></td>
							</tr>
							<tr>
								<td style="padding-top: 10px;"><input class="bprimarypub80" type="submit" tabindex="4" value="Connexion" /></td>
							</tr>
						</table>
					</form>
				</div>
				<div id="bottomcorners"><div class="cleft"></div><div class="cright"></div></div>
			</div>
		</div>
    	<div id="footer">
			<!--p>
				<a href="/privacy/">Privacy Policy</a> <span>|</span>
				<a href="/tos/">Terms of Service</a> <span>|</span>
				<a href="">Cr&eacute;dits</a>
			</p-->
			<p>Copyright &copy; 2011 / 2012 <a href="http://www.evea-group.com/" target="_blank">Evea-Group</a>. Damien Talec.</p>
		</div>
		
<script>
  /* attach a submit handler to the form */
  $("#loginForm").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault(); 
        
    /* get some values from elements on the page: */
    var $form = $( this ),
        email = $form.find( 'input[name="email"]' ).val(),
        pwd = $form.find( 'input[name="password"]' ).val(),
        url = $form.attr( 'action' );
	
    /* Send the data using post and put the results in a div */
    $.post( url, { user: email, passwd: $.md5(pwd) },
      function( data ) {
		if ( data == 1 ) {
			$(location).attr('href', '/');
		}
		else { alert('Erreur!'); }
      }
    );
  });
</script>
    </body>
</html>