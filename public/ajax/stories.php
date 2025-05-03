<?php 
    /**
     * This service return a json which contains the information of all the stories recorded into the database
     */

    require_once("../classes/database.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    $db = Database::GetInstance();

    $stories = $db->GetStories();
    if (!is_null($stories)) {
        $information["status"] = "Success";
        $information["stories"] = $stories;
    } else {
        $information["status"] = "Failed";
        $information["message"] = "Problem during the execution of the operation requested";
    }

    return json_encode($information);
?>