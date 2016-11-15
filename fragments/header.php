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
      <a href="#" class="brand-logo right blue-grey">EATinéraire</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down blue-grey">
        <li><a href="">Carte</a></li>
        <li><a href="">Historique</a></li>
        <li><a href="">Mon profil</a></li>
          <li><a href="../html/Login.php">Connexion</a></li>
      </ul>
    </div>
  </nav>    
        <?php } 
        ?>