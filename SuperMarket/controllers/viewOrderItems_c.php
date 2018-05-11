<?php

session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 3 && $_SESSION['type'] != 2) ) {
    header("location:index.php");
    die();
}
$validator = new Validator();

if ($_GET['action'] && ($_GET['action'] == "show" ) && $_GET['id']) {

    try {
        $_GET = $validator->santasizeArray($_GET);
        $id = $validator->santasizeString($_GET['id']);
        $id = $validator->cleantIt($id, false);
        if (!$validator->isValidRequired($id))
            throw new Exception("<div class='sectionTitle error'>the id  must not be empty </div>");
        $displayObject = new Display("order_products");
        if (!$displayObject->dataExists("order_id", $id))
            echo "<div class='sectionTitle error'>$id  doesn't exist </div>";

        $orderItems = $displayObject->getColumnsDataByJoin("product_id", ["quantity"], ["p_name", "category", "image", "(price - price * discount / 100)  as priceAfter "], "product", "id","order_id",$id);
        $displayObject->close();
        include"views/orderItemsView.php";
    } 
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>      