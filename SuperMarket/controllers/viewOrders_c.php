<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 2) {
    header("location:index.php");

    die();
}

function defaultDisplay() {
    try {
        $displayObject = new Display("orders");
        $orders = $displayObject->getALLData("money desc");
        $displayObject->close();
        include "views/ordersView.php";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
function displayItem($id) {
    $displayObject = new Display("order_products");
    return $displayObject->getColumnsDataByJoin("product_id", ["quantity"], ["p_name", "category", "image", "price", "discount"], "product", "id","order_id",$id);
}

$validator = new Validator();

try {
    $displayObject = new Display("orders");
    $orders = $displayObject->getALLData("money desc");
    $displayObject->close();;
    $displayObject = null;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

if ($_GET['action'] && ($_GET['action'] == "delete" || $_GET['action'] == "edit") && $_GET['id']) {
    $orders = null;
    try {
        $_GET = $validator->santasizeArray($_GET);
        $id = $validator->santasizeString($_GET['id']);
        $id = $validator->cleantIt($id, false);
        if (!$validator->isValidRequired($id))
            throw new Exception("<div class='sectionTitle error'>the id  must not be empty </div>");

        if ($_GET['action'] == "delete") {

            if ($_GET['confirm'] && $_GET['confirm'] == "Yes") {

                $deleteItem = new Delete("orders");
                if (!$deleteItem->doesDataExist("id", $id))
                    throw new Exception("<div class='sectionTitle error'>the order  doesn't exist </div>");
                 $deleteItem->close();
                 $deleteItem = new Delete("order_products");
                 $deleteItem->deleteDataById("order_id", $id);
                 $deleteItem = new Delete("orders");
                 $deleteItem->deleteDataById("id", $id);
                echo "<div class='sectionTitle actionMessage'>$id  deleted successfully </div>";
                $deleteItem->close();
            }
            else {
                defaultDisplay();
            }
        } else if ($_GET['action'] == "edit") {
             $displayObject = new Display("orders");
            if (!$displayObject->dataExists("id", $id)) {
                $displayObject->close();
                throw new Exception("<div class='sectionTitle error'>the order  doesn't exist </div>");
            }
            $orderItems = displayItem($id);
            $itemId = $id;
            $edit = true;
            include 'views/cashierView.php';
        } else {

            defaultDisplay();
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} elseif ($orders == FALSE) {
    echo "<h2 class='sectionTitle'>No orders to view</h2>";
} else {
    defaultDisplay();
}
?>