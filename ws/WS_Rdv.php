<?php

require_once '../ws/require.php';

const GET_MINE = "getMine";
const GET_BYID = "getByid";
const GET_SEARCH = "getSearch";
const GET_DETAILS = "getDetails";
const ADD_RDV = "addRdv";
const GET_ALL_LIEUX = "getAllLieux";

class WS_Rdv implements IWebServiciable
{

    function __construct()
    {

    }

    public function doPost()
    {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']) {
            case GET_MINE :
                $sql = "SELECT rdv.horraire, rdv.dateRdv, lieu.nomLieu FROM Rdv rdv INNER JOIN utilisateur_rdv urdv ON urdv.idRdv = rdv.id AND Lieu lieu ON lieu.id = rdv.idLieu  WHERE urdv.idUser =" . $_POST['idUser'];
                return returnOneArray($sql);
            case GET_BYID :
                $sql = "SELECT rdv.horraire, rdv.dateRdv, lieu.nomLieu FROM Rdv rdv INNER JOIN utilisateur_rdv urdv ON urdv.idRdv = rdv.id AND Lieu lieu ON lieu.id = rdv.idLieu  WHERE urdv.idRdv =" . $_POST['idRdv'];
                return returnOneLine($sql);
            case GET_SEARCH :
                $sql = "SELECT rdv.horraire, rdv.dateRdv, lieu.nomLieu FROM Rdv rdv INNER JOIN utilisateur_rdv urdv ON urdv.idRdv = rdv.id AND Lieu lieu ON lieu.id = rdv.idLieu  WHERE lieu.nom = " . $_POST['idLieu'] . " AND rdv.horraire = ". $_POST['horraire'] . " AND rdv.date = ". $_POST['date'];
                return returnOneArray($sql);
            case GET_DETAILS :
                $sql = "SELECT * FROM Rdv rdv INNER JOIN Utilisateur user ON user.id = rdv.idCreateur LEFT JOIN Verdict verd ON verd.idRdv = rdv.id WHERE rdv.id ="  . $_POST['idRdv'];
                return returnOneArray($sql);
            case GET_ALL_LIEUX:
                $sql = "SELECT * FROM lieu";
                return returnOneArray($sql);
            case ADD_RDV :
                $sql = "SELECT idLieu FROM Lieu WHERE coordonnees ='".$_POST['coordonnees']."' AND nomLieu ='".$_POST['nom']."'";
                $idLieu = returnOneLine($sql);

                if ($idLieu['idLieu'] == null){

                    $sql = "INSERT INTO LIEU (coordonnees, nomLieu) VALUES ('".$_POST['coordonnees']."','".$_POST['nom']."')";
                    $idLieu = execReqWithoutResult($sql);


                    $sql = "SELECT MAX(idLieu) as id FROM LIEU";
                    $idLieu = returnOneLine($sql);

                    $idLieu = $idLieu['id'];
                }else{
                  $idLieu = $idLieu['idLieu'];
                }



                $sql = "INSERT INTO RDV (horaire, idCreateur, dateRdv, idLieu, nbPlaces ) VALUES ('".$_POST['horaire']."','".$_POST['idUser']."','".$_POST['date']."','".$idLieu."', '".$_POST['nbPlaces']."')";
                execReqWithoutResult($sql);

                $sql = "SELECT MAX(idRDV) as id FROM rdv";
                $idRdv = returnOneLine($sql);

                $idRdv = $idRdv['id'];

                $sql = "INSERT INTO UTILISATEUR_RDV (idUtilisateur, idRdv) VALUES  ('".$_POST['idUser']."','".$idRdv."')";

                execReqWithoutResult($sql);

                return true;
            default:
                Helper::ThrowAccessDenied();
                break;
        }

    }
}
