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
        <div id="Register_Container" class="row card horizontal">
            </br>
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
                    <div id="sauvegarder">
                    <button class="btn waves-effect waves-light" type="button" id="sauvegarder" name="action">Sauvegarder
                    </button></div>
                    <button class="btn waves-effect waves-light" type="button" id="annuler" name="action">Annuler
                    </button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../js/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $('#sauvegarder').click(function() {
            $.ajax({
                url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
                type: 'POST',
                async: false,
                data: {'ws' : 'utilisateur', 'action' : 'addUser','prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': $('#datepicker_register').val()},
                success: function (response) {
                    alert(response);
                },
                error: function (msg) {
                    console.log(msg.responseType);
                    console.log('Problème rencontré dans le réseau.');
                }
            });
        });

    </script>
    </body>
</html>
    <?php
    include '../../fragments/footer.php';

    ?>