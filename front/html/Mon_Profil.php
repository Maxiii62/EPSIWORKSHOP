<body>
<?php
$title = "Mon profil";
include '../../fragments/header.php';

    if (!isset($_SESSION['monUserCo'])){
        header('Location: ../html/Login.php');
    }

?>
    <div id="login-page" class="row">
        <div class="transparence col s12 z-depth-4 card-panel">
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12 center">

                        <p class="center login-form-text">Mon Profil</p>
                    </div>
                </div>

                <ul id="profile-page-about-details" class="collection z-depth-1">
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-action-wallet-travel"></i> Nom</div>
                            <div class="col s7 grey-text text-darken-4 right-align">
                            <?php
                                echo $_SESSION['monUserCo']['nom'];
                            ?>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-social-poll"></i>Pr&eacutenom</div>
                            <div class="col s7 grey-text text-darken-4 right-align">
                            <?php
                                echo $_SESSION['monUserCo']['prenom'];
                            ?>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i>Date de naissance</div>
                            <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                echo $_SESSION['monUserCo']['dateNaissance'];
                                ?></div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>Mail</div>
                            <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                echo $_SESSION['monUserCo']['mail'];
                                ?></div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>T&eacutel&eacutephone</div>
                            <div class="col s7 grey-text text-darken-4 right-align"> <?php
                            echo $_SESSION['monUserCo']['numeroTelephone'];
                            ?></div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>Nombre de points</div>
                            <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                echo $_SESSION['monUserCo']['nombrePoints'];
                                ?></div>
                        </div>
                    </li>
                </ul>

                <div class="row">
                    <div class="input-field col s12" >
                        <a id="modifierProfil" class="btn waves-effect waves-light col s12">Modifier</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php
    include '../../fragments/footer.php';
    ?>

</body>