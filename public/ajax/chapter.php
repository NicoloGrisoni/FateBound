<?php 
    /**
     * This service return a json which contains all the information of a chapter
     * It requires the ID of the chapter
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_GET["IDChapter"])) {
        $information["status"] = "Information problem";
        $information["message"] = "Missing information about the chapter: ID not passed";
        echo json_encode($information);
    }

    $db = Database::GetInstance();
    $chapter = $db->GetChapter($_GET["IDChapter"]);
    if (!is_null($chapter)) {
        $information["status"] = "Success";
        $information["chapter"] = $chapter;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>