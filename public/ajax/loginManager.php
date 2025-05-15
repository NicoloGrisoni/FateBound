<?php 
    /**
     * This service return a json which contains the information of login just made
     * It requires the username and the password the user has register with
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_GET["username"]) || !isset($_GET["password"])) {
        $information["status"] = "Information problem";
        $information["message"] = "Missing information of username or password";
        echo json_encode($information);
    }

    $db = Database::GetInstance();
    $login = $db->DoLogin($_GET["username"], md5($_GET["password"]));
    if ($login != -1) {
        $information["status"] = "Success";
        $_SESSION["idUser"] = $login;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>