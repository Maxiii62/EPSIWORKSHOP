<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php if($title != "EATinéraire"){
            
        ?>
  <nav>
    <div class="navbar-fixed blue-grey ">
      <ul id="nav-mobile" class="hide-on-med-and-down blue-grey">
          <div class="left">
            <li><a href="">Carte</a></li>
             <li><a href="">Historique</a></li>
             <li><a href="">Mon profil</a></li>
          </div>
          <div class="right">
              <li><a class="" href="../html/Inscription.php">Inscription</a></li>
              <li><a class="" href="../html/Login.php">Connexion</a></li>
              <li><a class="" href="../html/Login.php">Déconnexion</a></li>
          </div>
      </ul>
    </div>
  </nav>
        <?php } 
        ?>