<?php

const GET_MINE = "getMine";
const GET_BYID = "getByid";
const GET_SEARCH = "getSearch";
const GET_DETAILS = "getDetails";
const ADD_RDV = "addRdv";

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
            case ADD_RDV :
                add_rdv();
            default:
                Helper::ThrowAccessDenied();
                break;
        }

        function add_rdv(){

            $sql = "SELECT id FROM Lieu WHERE coordonnees =" . $_POST['coordonnees'] . "AND nom =" . $_POST['nom'];
            $idLieu = returnOneLine($sql);

            if ($idLieu == null){
                $sql = "INSERT INTO LIEU ('coordonnees', 'nom') VALUES (" .$_POST['coordonnees']. ", ". $_POST['nom'] . ")";
                $idLieu = retournemoiunid($sql);
            }

            $sql = "INSERT INTO RDV ('horraire', 'idCreateur', 'date', idLieu ) VALUES (" .$_POST['horraire']. ", ". $_POST['idCreateur'] . ", ". $_POST['date'] . ", " . $idLieu .")";
            $idRdv = retournemoiunid($sql);

            $sql = "INSERT INTO UTILISATEUR_RDV ('idUtilisateur', 'idRdv') VALUES (" .$_POST['idUser']. ", ". $idRdv . ")";
            execReqWithoutResult($sql);

             return true;

        }
    }
}