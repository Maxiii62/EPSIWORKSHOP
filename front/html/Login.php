<?php
$title = "Inscription";
include '../../fragments/header.php';
?>
<html>
        <div id="login-page" class="row">
            <div class="col s12 z-depth-4 card-panel">
                <form class="login-form">
                    <div class="row">
                        <div class="input-field col s12 center">
                            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                            <p class="center login-form-text">EATinéraire</p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i>
                            <input id="email" type="email">
                            <label for="email" class="center-align">Email</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input id="password" type="password">
                            <label for="password">Mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" >
                            <a id="connexion" class="btn waves-effect waves-light col s12">Connexion</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="Inscription.php">S'inscrire</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="page-forgot-password.html">Mot de passe oublié</a></p>
                        </div>          
                    </div>

                </form>
            </div>
        </div>
        <script type="text/javascript" src="../js/jquery/jquery-1.11.0.min.js"></script>
        <script src="../js/main.js" />
    </body>
</html>
<?php
include '../../fragments/footer.php';

?>