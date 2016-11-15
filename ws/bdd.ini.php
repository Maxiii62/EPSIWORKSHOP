<?php
function getConnexion(){
try
{
    $pdo = new PDO('mysql:host=localhost:3306;dbname=workshopeatineraire', 'root', '');
    return $pdo;
}
catch(Exception $e)
{
    echo 'Echec de la connexion à la base de données';
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    exit();
}
}
function returnOneLine($var){
     try
        {
            $pdo = getConnexion();
            $pdo->beginTransaction();
            $res = $pdo->query($var);
            if ($res) {
                $row = $res->fetch(PDO::FETCH_ASSOC);
                return $row;
            }
        }
        catch(Exception $e) //en cas d'erreur
        {
            //on annule la transation
            $pdo->rollback();
            //on affiche un message d'erreur ainsi que les erreurs
            echo 'Tout ne s est pas bien passé voir les erreurs ci-dessous<br />';
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
            //on arrête l'exécution s'il y a du code après
            exit();
        }
}
function returnOneArray($var){
    try
        {
            $pdo = getConnexion();
            $pdo->beginTransaction();
            $res = $pdo->query($var);
            if ($res) {
                return $res->fetchAll();
            }
        }
        catch(Exception $e) //en cas d'erreur
        {
            //on annule la transation
            $pdo->rollback();
            //on affiche un message d'erreur ainsi que les erreurs
            echo 'Tout ne s est pas bien passé voir les erreurs ci-dessous<br />';
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
            //on arrête l'exécution s'il y a du code après
            exit();
        }
}
function execReqWithoutResult($var){
      try{
            $pdo = getConnexion();
            $res = $pdo->prepare($var);
            $res->execute();
            $res->closeCursor();
            return "ok" ;
        }
        catch(Exception $e)
        {
            $ret = 'error';
            return $ret;
        }
}

function retournemoiunid($var){
      try{
            $pdo = getConnexion();
            $res = $pdo->prepare($var);
            $res->execute();
            $id = $res->lastInsertId();
            $res->closeCursor();
            return $id ;
        }
        catch(Exception $e)
        {
            $ret = 'error';
            return $ret;
        }
}
?>
