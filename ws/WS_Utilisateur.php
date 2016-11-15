<?php

    const ADD_USER = 'addUser';
    const UPDATE_USER = 'updateUser';
    const GET_USER = 'getUser';
    const GET_CLASSEMENT = 'getClassement';

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
                $sql = "INSERT INTO Utilisateur ('nom', 'prenom', 'dateNaissance', 'mail', 'numeroTelephone', 'nombrePoints') VALUES (" .$_POST['nom']. ", ". $_POST['prenom'] . ", ". $_POST['dateNaissance'] . ", ". $_POST['numeroTelephone'] .", 0)";
                return  execReqWithoutResult($sql);
            case UPDATE_USER :
                $sql = "UPDATE UTILISATEUR SET nom = " .$_POST['nom']. ", prenom = " .$_POST['nom']. ", dateNaissance = " .$_POST['dateNaissance']. ", mail = " .$_POST['mail']. ", numeroTelephone = " .$_POST['numeroTelephone'];
                return execReqWithoutResult($sql);
            case GET_USER :
                $sql = "SELECT * FROM UTILISATEUR WHERE id = " . $_POST['idRdv'];
                return returnOneLine($sql);
            case GET_CLASSEMENT :
                $sql = "SELECT * FROM Utilisateur ORDER BY nombrePoints";
                return returnOneArray($sql);
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }
}