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
    if ($_POST['submit'] == "Confirm") {

        try {

            $itemsToAdd = array_diff($_POST, array("submit" => "Confirm"));
            $inventoryItems;
            if ($itemsToAdd == false)
                throw new Exception("<h2 class='sectionTitle error'>Can't make inventory check with no items</h2>");


            $error = false;
            $display = new display("product");
            $i = 0;
            foreach ($itemsToAdd as $id => $quantity) {
                if ($display->dataExists("id", $id)) {
                    if ($quantity < 0)
                        throw new Exception("<h2 class='sectionTitle error'> negative quality is not allowed</h2>");
                    $pQuantity[$i] = $display->getColumnDataById("id", $id, "quantity")['quantity'];
                    $inventoryItems[$i]['product_id'] = $id;
                    $inventoryItems[$i]['actual_quantity'] = $quantity;
                    $inventoryItems[$i]['system_quantity'] = $pQuantity[$i];
                    $i++;
                } else {
                    $add->close();
                    $error = "one item of the order doesn't exist";
                    throw new Exception("<h2 class='sectionTitle error'> $error</h2>");
                }
            }
            $keys = "`day_`, `month_`, `year_`";
            $inventory = assignArrWKeys([date("d"), date("m"), date("Y")], $keys);

            $add = new add("inventorycheck");
            $add->addData($inventory);
            $add->close();
            $display = new Display("inventorycheck");
            $inventoryrId = $display->getMaxColumn("id")["id"];
            $day = $display->getColumnDataById("id", $inventoryrId, "day_")['day_'];
            $month = $display->getColumnDataById("id", $inventoryrId, "month_")['month_'];
            $year = $display->getColumnDataById("id", $inventoryrId, "year_")['year_'];
            $inventoryDate = $day . ' - ' . $month . ' - ' . $year;
            $display->close();
            $add = new add("inventorycheck_products");
            $keys = "`inventory_id`, `product_id`, `actual_quantity` ,`system_quantity`";
            $totalDifferences = 0;
            $i = 0;
            foreach ($itemsToAdd as $id => $quantity) {
                $itemsToAdd = assignArrWKeys([$inventoryrId, $id, $quantity, $pQuantity[$i]], $keys);
                $add->addData($itemsToAdd);
                $totalDifferences += $pQuantity[$i] - $quantity;
                $i++;
            }

            $add->close();
            include "views/inventoryView.php";
            die();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
} {
    include 'views/makeInventoryCheckView.php';
}
?>