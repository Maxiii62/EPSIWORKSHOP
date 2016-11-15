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
                $sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `dateNaissance`, `mail`, `password`, `numeroTelephone`, `nombrePoints`) VALUES ('" .$_POST['nom']. "', '". $_POST['prenom'] . "', '1994-01-01', '". $_POST['email'] . "', '". $_POST['password'] ."', '". $_POST['numeroTelephone'] ."',0)";
                execReqWithoutResult($sql);
                return $sql;
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
                $sql = "SELECT idUtilisateur, nom, prenom FROM UTILISATEUR WHERE mail = '" . $_POST['email']. "' AND password = '" .$_POST['password'] ."'";
                return returnOneLine($sql);
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }
}