<?php
$title = "Inscription";
include '../../fragments/header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        
        <title>Inscription</title>
		
	</head>
    <body>
       
            <div id="login-page" class="row">
			 <div id="Register_Container" class="row card horizontal">
            <h3 class="center">Inscription</h3>
                <form class="col s12">
				
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate">
                            <label for="password">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="telephone" type="email" class="validate">
                            <label for="telephone">Telephone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="datepicker_register" type="date" class="validate" placeholder="Date de naissace">
                        </div>
                    </div>
                    <span id="sauvegarder">
                    <button class="btn waves-effect waves-light" type="button" id="sauvegarder" name="action">Sauvegarder
                    </button>
                    </span>
                    <button class="btn waves-effect waves-light" type="button" id="annuler" name="action">Annuler
                    </button>
                </form>
				  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">First Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>
    </form>
  </div>
        
            </div>
        </div>
        <script type="text/javascript" src="../js/jquery/jquery-1.11.0.min.js"></script>
        <script src="../js/main.js" />
    </body>
</html>
<?php
include '../../fragments/footer.php';

?>