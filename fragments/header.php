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
            <div class="nav-wrapper black white-text ">
                <ul id="nav-mobile" class="hide-on-med-and-down blue-grey">
                    <div class="left">
                        <li><a href="../html/Appointements.php">Carte</a></li>
                        <li><a href="../html/ranking.php">Classement</a></li>
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Informations<i class="material-icons right">arrow_drop_down</i></a></li>
                    </div>
					
                    <div class="right">

                        <?php
                        if (isset($_SESSION['monUserCo'])) {
                            echo "<li><a href='../html/Mon_Profil.php'>Mon profil</a></li>
                                   <li><a id='deconnexion' class=''>Déconnexion</a></li>
                          ";
                        } else {
                            echo "<li><a class='' href='../html/Inscription.php'>Inscription</a></li>
                            <li><a class='' href='../html/Login.php'>Connexion</a></li>";
                        }
                        ?>

                    </div>
                </ul>
			<ul id="dropdown1" class="dropdown-content">
  <li><a href="../html/presentation.php">Présentation</a></li>
    <li class="divider"></li>
  <li><a href="../html/Points.php">Comment gagner des points ?</a></li>
  <li class="divider"></li>
  <li><a href="../html/Partenaires.php">Partenaires</a></li>
</ul>
            </div>
        </nav>
