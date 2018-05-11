<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}


    try {
        $displayObject = new Display("orders");
        $cashiers = $displayObject->getALLDataAbout("cashier_id","id","orders_num",["userName"],"users","id", "orders_num desc");
        $displayObject->close();
        if($cashiers)
        include "views/fastestCashiersView.php";
        else
            echo "<h2 class='sectionTitle'>There's no orders made to judge</h2> ";
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }