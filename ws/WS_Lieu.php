<?php

require_once '../ws/require.php';

const GET_ALL_MATCH_PER_PHASE = 'getMatchTour';
const GET_TOUR = 'getTour';
const GET_DETAILS_MATCH = 'detail';
const GET_CLASSEMENT_EQUIPE = 'classment';
const GET_ALL = 'all';
const GET_ADD = 'id';
const GET_TEAMS = 'teams';



class WS_Matchs implements IWebServiciable {

    function __construct() {

    }

    public function doPost() {

      if (!isset($_POST['action']))
        Helper::ThrowAccessDenied();

        switch ($_POST['action']){
              case GET_ALL_MATCH_PER_PHASE:

                  $sql = "SELECT id,equipe1,equipe2,dateMatch FROM rencontre
                          WHERE id NOT IN (SELECT idrencontre FROM pari WHERE idUser = ". $_POST['idUser'] ." AND idrencontre IS NOT NULL)
                          AND idTour =" . $_POST['idTour'];

                  return returnOneArray($sql);
              case GET_ALL :
                  $sql = "SELECT Equipe1, Equipe2, Score1, Score2 FROM Rencontre";
                  return returnOneArray($sql);
              case GET_TOUR :
                  $sql = "SELECT idTour,nomTour FROM tour WHERE idTour IN (SELECT DISTINCT idTour FROM rencontre)";
                  return returnOneArray($sql);
              case GET_DETAILS_MATCH :
                  $sql = "SELECT id,equipe1,equipe2,dateMatch FROM rencontre WHERE id=".$_POST['idPari'];
                  return returnOneLine($sql);
              case GET_CLASSEMENT_EQUIPE :
                  $sql = "SELECT nom,SUM()";
                  return returnOneArray($sql);
              case GET_ADD :
              //  $sql = "INSERT INTO Rencontre(Equipe1, Equipe2,idTour,dateMatch) VALUES ('".$_POST['equipe1']"','".$_POST['equipe2']"',".$_POST['id'].",'".$_POST['date']."')";
                  return returnOneArray($sql);
              case GET_TEAMS :
                $sql = "SELECT id,nom FROM equipe";
                return returnOneArray($sql);
              default:
                Helper::ThrowAccessDenied();
              break;
        }
   }
}

?>
