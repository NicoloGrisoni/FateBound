<?php 
    /**
     * This service return a json which contains the result of the elimination of the profile picture requested
     * It requires the user's ID
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
    $delete = $db->DeleteProfilePicture($_SESSION["IDUser"]);
    if ($delete) {
        $information["status"] = "Success";
    } else {
        $information["status"] = "Failed";
    }

    echo json_encode($information);
?>