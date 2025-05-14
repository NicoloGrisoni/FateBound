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


    if (!isset($_GET["newUsername"]) && !isset($_FILES["profilePicture"])) {
        $information["status"] = "Failed";
        $information["message"] = "Missing information: at least one info must be updated";
    } else {
        $db = Database::GetInstance();
        $resultUpdate = false;

        if (isset($_GET["newUsername"])) {
            $resultUpdate = $db->UpdateUsername($_SESSION["idUser"],$_GET["newUsername"]);
        } else if (isset($_FILES['profilePicture'])) {
            $uploadDir = '../images/';
            $fileName = basename($_FILES['profilePicture']['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetPath)) {
                $resultUpdate = $db->UpdateProfilePicture($_SESSION["idUser"], $fileName);
            } else {
                $resultUpdate = false;
            }
        }

        if ($resultUpdate) {
            $information["status"] = "Success";
        } else {
            $information["status"] = "Failed";
            $information["message"] = "Problem during the execution of the operation requested";
        }
    }

    echo json_encode($information);
?>