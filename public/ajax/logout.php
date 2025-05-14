<?php 
    /**
     * This service return a json which contains the result of the logout the user has required
     * It requires the user's ID
     */

    if (!isset($_SESSION)) {
        session_start();
    }

    $information = [];
    if (!isset($_SESSION["idUser"])) {
        $information["status"] = "Access problem";
        $information["message"] = "Cannot access, missing authorization";
        echo json_encode($information);
    }

    unset($_SESSION["idUser"]);
    
    $information["status"] = "Success";
    $information["message"] = "Logout successfully done";
    echo json_encode($information);
?>