<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}

function defaultDisplay() {
    try {
        $displayObject = new Display("users");
        $usersData = $displayObject->getALLData("type desc");
        $displayObject->close();
        include "views/viewUsersView.php";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function displayItem($id) {
    $displayUserObj = new Display("users");

    return $displayUserObj->getDataById("id", $id);
}

$validator = new Validator();

try {
    $displayObject = new Display("users");
    $usersData = $displayObject->getALLData("type desc");
    $displayObject->close();
    $displayObject = null;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

if ($_GET['action'] && ($_GET['action'] == "delete" || $_GET['action'] == "edit") && $_GET['id']) {
    $usersData = null;
    try {
        $_GET = $validator->santasizeArray($_GET);
        $id = $validator->santasizeString($_GET['id']);
        $id = $validator->cleantIt($id, false);
        if (!$validator->isValidRequired($id))
            throw new Exception("<div class='sectionTitle error'>the id  must not be empty </div>");

        if ($_GET['action'] == "delete") {

            if ($_GET['confirm'] && $_GET['confirm'] == "Yes") {
                $displayUser = new Display("users");
                $userInfo = displayItem($id);
                $rows = $displayUser->getColumnsDataBycolumns(['type' => $userInfo['type']], 'id', ['id']);
                if (count($rows) <= 1)
                    throw new Exception("<div class='sectionTitle error'>at least one branch admin must exist </div>");
                $deleteUser = new Delete("users");
                if (!$deleteUser->doesDataExist("id", $id))
                    throw new Exception("<div class='sectionTitle error'>the user  doesn't exist </div>");
                $deleteUser->deleteDataById("id", $id);
                echo "<div class='sectionTitle actionMessage'> deleted successfully </div>";
                $deleteUser->close();
            }
            else {
                defaultDisplay();
            }
        } else if ($_GET['action'] == "edit") {
            $displayObject = new Display("users");
            if (!$displayObject->dataExists("id", $id)) {
                $displayObject->close();
                throw new Exception("<div class='sectionTitle error'>the user  doesn't exist </div>");
            }
            $userToDisplay = displayItem($id);
            $userId = $id;
            $edit = true;
            include 'views/addUserView.php';
        } else {

            defaultDisplay();
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} elseif ($usersData == FALSE) {
    echo "<h2 class='sectionTitle'>No users to view</h2>";
} else {
    defaultDisplay();
}