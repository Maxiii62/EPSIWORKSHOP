<!DOCTYPE html>

<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="../../materialize/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/google.css">
        <link href="../../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper blue-grey ">
                <ul id="nav-mobile" class="hide-on-med-and-down blue-grey">
                    <div class="left">
                        <li><a href="">Carte</a></li>

                    </div>
                    <div class="right">

                        <?php
                        if (isset($_SESSION['monUserCo'])) {
                            echo "<li><a id='deconnexion' class=''>Déconnexion</a></li>
                          <li><a href=''>Mon profil</a></li>";
                        } else {
                            echo "<li><a class='' href='../html/Login.php'>Connexion</a></li>
                          <li><a class='' href='../html/Inscription.php'>Inscription</a></li>";
                        }
                        ?>

                    </div>
                </ul>
            </div>
        </nav>
