<?php 
    /**
     * This service return a json which contains al the options related to a chapter
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
    $options = $db->GetOptionsOfChapter($_GET["IDChapter"]);
    if (!is_null($options)) {
        $information["status"] = "Success";
        $information["options"] = $options;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    echo json_encode($information);
?>