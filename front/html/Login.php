<body>
    <?php
    $title = "EATinéraire";
    include '../../fragments/header.php';
    ?>
    <main>
        <div id="login-page" class="row">
            <div class="transparence col s12 z-depth-4 card-panel">
                <form class="login-form">
                    <div class="row">
                        <div class="input-field col s12 center">
                            <img src="../img/logo.png" alt="" height="280" width="280" class="circle responsive-img valign profile-image-login">
                            <p class="center login-form-text">Connexion</p>
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
                    </div>

                </form>
            </div>
        </div>
    </main>
    <?php
    include '../../fragments/footer.php';
    ?>
</body>