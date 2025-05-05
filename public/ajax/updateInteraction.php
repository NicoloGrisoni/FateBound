<?php 
    /**
     * This service return a json which contains the result of the update to the record which contains 
     * the last interaction made by a user with a story
     * 
     * It requires the user's ID and the ID of the chapter
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_SESSION["IDUser"]) || !isset($_SESSION["authToken"])) {
        $information["status"] = "Access problem";
        $information["message"] = "Cannot access, missing authorization";
        echo json_encode($information);
    }

    if (!isset($_GET["IDChapter"])) {
        $information["status"] = "Information problem";
        $information["message"] = "Missing information about the chapter: ID missing";
        echo json_encode($information);
    }

    $db = Database::GetInstance();
    $update = $db->UpdateInteractionWithStory($_SESSION["IDUser"], $_GET["IDChapter"]);
    if ($update) {
        $information["status"] = "Success";
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>