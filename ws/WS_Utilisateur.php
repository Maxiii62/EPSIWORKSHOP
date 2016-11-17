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

                if ($_POST['nom'] == null || $_POST['prenom'] == null|| $_POST['datepicker_register'] == null|| $_POST['email'] == null|| $_POST['password'] == null|| $_POST['numeroTelephone'] == null){
                    Helper::ThrowAccessDenied();
                }

                $sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `dateNaissance`, `mail`, `password`, `numeroTelephone`, `nombrePoints`) VALUES ('" .$_POST['nom']. "', '". $_POST['prenom'] . "', '1994-01-01', '". $_POST['email'] . "', '". $_POST['password'] ."', '". $_POST['numeroTelephone'] ."',0)";
                execReqWithoutResult($sql);
                return "GG";
            case UPDATE_USER :

                if ($_POST['id'] == null || $_POST['nom'] == null || $_POST['prenom'] == null|| $_POST['datepicker_register'] == null|| $_POST['email'] == null|| $_POST['password'] == null|| $_POST['numeroTelephone'] == null){
                    Helper::ThrowAccessDenied();
                }

                $sql = "UPDATE UTILISATEUR SET nom = '" .$_POST['nom']. "', prenom = '" .$_POST['prenom']. "', dateNaissance = '" .$_POST['datepicker_register']. "', mail = '" .$_POST['email']. "', numeroTelephone = '" .$_POST['numeroTelephone']. "', password = '" .$_POST['password']."' WHERE idUtilisateur = " .$_POST['id'];
                execReqWithoutResult($sql);
                $sql = "SELECT * FROM UTILISATEUR WHERE idUtilisateur = '" . $_POST['id']. "'";
                return returnOneLine($sql);
            case GET_USER :
                $sql = "SELECT * FROM UTILISATEUR WHERE id = " . $_POST['idUtilisateur'];
                return returnOneLine($sql);
            case GET_CLASSEMENT :
                $sql = "SELECT * FROM Utilisateur ORDER BY nombrePoints DESC ";
                return returnOneArray($sql);
            case VERIF_USER :
                $sql = "SELECT * FROM UTILISATEUR WHERE mail = '" . $_POST['email']. "' AND password = '" .$_POST['password'] ."'";
                return returnOneLine($sql);
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }
}