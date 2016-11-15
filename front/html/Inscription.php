<?php
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
        <div id="login-page" class="row card horizontal">
            <h3 class="center">Inscription</h3>
            <div class="row">
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
                            <input id="datepicker_register" type="date" class="validate" placeholder="Date de naissace">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder
                    </button>
                    <button class="btn waves-effect waves-light" type="button" name="action">Annuler
                    </button>
                </form>
            </div>
        </div>
    </body>
    <?php
    include '../../fragments/footer.php';
    ?>