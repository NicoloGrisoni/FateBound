<?php 
    /**
     * This service return a json which contains the result of the registration made
     * It requires the user's information:
     *      1- username
     *      2- password
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
    $validUsername = $db->CheckUsername($_GET["username"]);
    if (!is_null($validUsername) && $validUsername === false) {
        $registration = $db->Registration($_GET["username"], md5($_GET["password"]));
        if ($registration != -1) {
            $information["status"] = "Success";

            $_SESSION["userId"] = $registration;
        } else {
            $information["status"] = "Failed";
            $information["message"] = "Problem during the execution of the operation requested";
        }
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Username not valid";
    }

    echo json_encode($information);
?>