<?php 
    /**
     * This service return a json which contains the information of the last interaction made by a user with a story
     * It requires the user's ID and the ID of the story
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_SESSION["idUser"])) {
        $information["status"] = "Access problem";
        $information["message"] = "Cannot access, missing authorization";
        echo json_encode($information);
    }

    $db = Database::GetInstance();
    $interactions = $db->GetLastInteractionByUser($_SESSION["idUser"]);
    if (!is_null($interactions)) {
        $information["status"] = "Success";
        $information["interactions"] = $interactions;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>