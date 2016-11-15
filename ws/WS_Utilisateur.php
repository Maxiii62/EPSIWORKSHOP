<?php

require_once '../ws/require.php';

const ADD_USER = 'addUser';
const UPDATE_USER = 'updateUser';
const GET_USER = 'getUser';
const GET_CLASSEMENT = 'getClassement';
const VERIF_USER = 'verifUser';


class WS_Utilisateur implements IWebServiciable{

    function __construct()
    {

    }

    public function doPost()
    {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']) {
            case ADD_USER :
                $sql = "INSERT INTO Utilisateur ('nom', 'prenom', 'dateNaissance', 'mail',  'password', 'numeroTelephone', 'nombrePoints') VALUES (" .$_POST['nom']. ", ". $_POST['prenom'] . ", ". $_POST['dateNaissance'] . ", ". $_POST['email'] . ", ". $_POST['password'] .", ". $_POST['numeroTelephone'] .",0)";
                return  execReqWithoutResult($sql);
            case UPDATE_USER :
                $sql = "UPDATE UTILISATEUR SET nom = " .$_POST['nom']. ", prenom = " .$_POST['nom']. ", dateNaissance = " .$_POST['dateNaissance']. ", mail = " .$_POST['mail']. ", numeroTelephone = " .$_POST['numeroTelephone']. ", password = " .$_POST['password'];
                return execReqWithoutResult($sql);
            case GET_USER :
                $sql = "SELECT * FROM UTILISATEUR WHERE id = " . $_POST['idUtilisateur'];
                return returnOneLine($sql);
            case GET_CLASSEMENT :
                $sql = "SELECT * FROM Utilisateur ORDER BY nombrePoints";
                return returnOneArray($sql);
            case VERIF_USER :
                $sql = "SELECT * FROM UTILISATEUR WHERE mail = " . $_POST['mail']. " AND password = " .$_POST['password'];
                return returnOneLine($sql);
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }
}