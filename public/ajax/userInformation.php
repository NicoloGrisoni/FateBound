<?php 
    /**
     * This service return a json which contains the result of the update required by the user
     * It requires the user's ID and the information to update
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
    $user = $db->GetUserInfo($_SESSION["idUser"]);
    if (is_null($user)) {
        $information["status"] = "Failed";
        $information["message"] = "Data not available";
    } else {
        $information["status"] = "Success";
        $information["user"] = $user;
    }

    echo json_encode($information);
?>