<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}

include "models/functions.php";
if ($_POST) {


    $validator = new Validator();
    $_POST = $validator->santasizeArray($_POST);
    if ($_POST['submit'] == "Add" || $_POST['submit'] == "Edit") {

        try {
            if ($_POST['submit'] == "Edit") {
                $oldId = $_POST['oldId'];
                $edit = true;
            }
            $post = $_POST;
            unset($post['oldId']);
            unset($post['submit']);
            $keys = "`userName`, `password`, `type`";

            $userToAdd = assignArrWKeys($post, $keys);
            if ($userToAdd == false)
                throw new Exception("<h2 class='sectionTitle error'>stop trying to hack this solid structure</h2>");
            $rules = array(
                "userName" => "santasizeString",
                "password" => "santasizeString",
                "type" => "santasizeInt",
            );

            $userToAdd = $validator->santasizeArray($userToAdd, $rules);
            $rules = array(
                "userName" => "isValidRequired&isValidString",
                "password" => "isValidRequired&isValidString",
                "type" => "isValidRequired&isValidInteger&isPlus",
            );


            $errors = $validator->validateArray($userToAdd, $rules);
            $isThereError = false;
            $errorsMessages;
            foreach ($errors as $key => $value) {
                if (!empty($value) && (strpos($value, "d") !== false)) {
                    $errorsMessages[$key] = "*";
                    $isThereError = true;
                } else if (!empty($value) && strpos($value, "d") == false) {
                    $errorsMessages[$key] = "the field is not valid";
                    $isThereError = TRUE;
                }
            }
            if (!empty($userToAdd['type']) && !$validator->isInRange(1, 3, $userToAdd['type'])) {
                $errorsMessages['type'] = "the field is not valid";
            }

            if ($isThereError) {
                include 'views/addUserView.php';
            } else {
                $addUser = new Add("users");

                if ($_POST['submit'] == "Edit" && !$addUser->dataExists('id', $oldId)) {
                    include 'views/addUserView.php';
                    echo "<h2 class='sectionTitle error' style='font-size:16px;clear:both'>user with this id doesn't exist<h2>";
                    die();
                }
                $displayUser = new Display("users");
                $rows = $displayUser->getColumnsDataBycolumns(["userName" => $userToAdd['userName']], null, ['id']);

                if ($rows)
                    throw new Exception("<div class='sectionTitle error'>this user name is taken try another one </div>");

                if ($_POST['submit'] == "Add") {

                    $addUser->addData($userToAdd);
                    $addUser->close();
                } else if ($_POST['submit'] == "Edit") {

                    $editUserObj = new Update("users");
                    $editUserObj->updateDataById('id', $oldId, $userToAdd);
                    $editUserObj->close();
                }


                if (!$isThereError && $_POST['submit'] == "Add") {
                    echo "<h2 class='sectionTitle actionMessage' >successfully added<h2>";
                } else if (!$isThereError && $_POST['submit'] == "Edit") {
                    echo "<h2 class='sectionTitle actionMessage' >successfully Edited<h2>";
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
} else {
    include 'views/addUserView.php';
}
