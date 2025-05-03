<?php 
    /**
     * This service return a json which contains the information of a story
     * It requires the ID of the story
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_GET["IDStory"])) {
        $information["status"] = "Information problem";
        $information["message"] = "Missing information about the story: ID missing";
        return json_encode($information);
    }

    $db = Database::GetInstance();
    $story = $db->GetStory($_GET["IDStory"]);
    if (!is_null($story)) {
        $information["status"] = "Success";
        $information["story"] = $story;

        $chapters = $db->GetChaptersOfStory($_GET["IDStory"]);
        if (!is_null($chapters)) {
            $information["chapters"] = $chapters;
        } else {
            $information["chapters"] = "Not available";
        }

        $finals = $db->GetNumberOfFinalOfStory($_GET["IDStory"]);
        if (!is_null($finals)) {
            $information["finals"] = $finals;
        } else {
            $information["finals"] = "Not available";
        }
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    return json_encode($information);
?>