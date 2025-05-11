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
    if (!isset($_SESSION["userId"]) || !isset($_SESSION["authToken"])) {
        $information["status"] = "Access problem";
        $information["message"] = "Cannot access, missing authorization";
        echo json_encode($information);
    }

    if (!isset($_GET["IDStory"])) {
        $information["status"] = "Information problem";
        $information["message"] = "Missing information about the story: ID not passed";
        echo json_encode($information);
    }

    $db = Database::GetInstance();
    $interaction = $db->GetInteractionWithStory($_SESSION["IDUser"], $_GET["IDStory"]);
    if (!is_null($interaction)) {
        $information["status"] = "Success";
        $information["interaction"] = $interaction;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>