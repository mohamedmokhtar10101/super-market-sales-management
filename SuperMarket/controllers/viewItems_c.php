<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}

function defaultDisplay() {
    try {
        $displayObject = new Display("product");
        $itemsData = $displayObject->getALLData("sold_quantity desc");
        $displayObject->close();
        include "views/ViewItemsView.php";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function displayItem($id) {
    $displayItemObj = new Display("product");

    return $displayItemObj->getDataById("id", $id);
}

$validator = new Validator();

try {
    $displayObject = new Display("product");
    $itemsData = $displayObject->getALLData("sold_quantity desc");
    $displayObject->close();
    $displayObject = null;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

if ($_GET['action'] && ($_GET['action'] == "delete" || $_GET['action'] == "edit") && $_GET['id']) {
    $itemsData = null;
    try {
        $_GET = $validator->santasizeArray($_GET);
        $id = $validator->santasizeString($_GET['id']);
        $id = $validator->cleantIt($id, false);
        if (!$validator->isValidRequired($id))
            throw new Exception("<div class='sectionTitle error'>the id  must not be empty </div>");

        if ($_GET['action'] == "delete") {

            if ($_GET['confirm'] && $_GET['confirm'] == "Yes") {

                $deleteItem = new Delete("product");
                if (!$deleteItem->doesDataExist("id", $id))
                    throw new Exception("<div class='sectionTitle error'>the item  doesn't exist </div>");
                $deleteItem->deleteDataById("id", $id);
                echo "<div class='sectionTitle actionMessage'>$id  deleted successfully </div>";
                $deleteItem->close();
            }
            else {
                defaultDisplay();
            }
        } else if ($_GET['action'] == "edit") {
            $displayObject = new Display("product");
            if (!$displayObject->dataExists("id", $id)) {
                $displayObject->close();
                throw new Exception("<div class='sectionTitle error'>the item  doesn't exist </div>");
            }
            $itemToDisplay = displayItem($id);
            $itemId = $id;
            $edit = true;
            include 'views/addNewItemView.php';
        } else {

            defaultDisplay();
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} elseif ($itemsData == FALSE) {
    echo "<h2 class='sectionTitle'>No Items to view</h2>";
} else {
    defaultDisplay();
}