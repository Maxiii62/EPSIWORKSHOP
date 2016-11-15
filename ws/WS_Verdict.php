<?php
const ADD_VERDICT = 'addVerdict';
const GET_VERDICT = 'getVerdict';

class WS_Verdict implements IWebServiciable {

    function __construct()
    {

    }

    public function doPost()
    {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']) {
            case ADD_VERDICT :
                $sql = "INSERT INTO VERDICT('note', 'description', 'idRdv') VALUES ( " . $_POST['note'] . ", " . $_POST['description'] . " , " . $_POST['idRdv'] . ")";
                return execReqWithoutResult($sql);
            case GET_VERDICT :
                $sql = "SELECT * FROM Verdict WHERE idVerdict = " . $_POST['idVerdict'];
                return returnOneArray($sql);
            default:
                Helper::ThrowAccessDenied();
                break;

        }
    }
}