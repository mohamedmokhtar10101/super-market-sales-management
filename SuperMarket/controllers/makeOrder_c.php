<?php

session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 1 && $_SESSION['type'] != 2)) {
    header("location:index.php");

    die();
}

include "models/functions.php";
if ($_POST) {


    $validator = new Validator();
    $_POST = $validator->santasizeArray($_POST);
    if ($_POST['submit'] == "Confirm" || $_POST['submit'] == "Edit") {

        try {
            if ($_POST['submit'] == "Edit") {
                $str = "Edit";
                $oldId = $_POST['oldId'];
                $_POST = array_diff($_POST, array("oldId" => $oldId));
                $edit = true;
            } else if ($_POST['submit'] == "Confirm") {
                $str = "Confirm";
                unset($_POST['oldId']);
            }
            $itemsToAdd = array_diff($_POST, array("submit" => $str));
            $invoiceItems = null;
            if ($itemsToAdd == false)
                throw new Exception("<h2 class='sectionTitle error'>Can't add order with no items</h2>");


            $error = false;
            $add = new Add("product");
            $display = new display("product");
            $totalMoney = 0;
            $totalQuantity = 0;
            $i = 0;
            foreach ($itemsToAdd as $id => $quantity) {
                if ($add->dataExists("id", $id)) {

                    if ($quantity == 0)
                        continue;
                    else if ($quantity < 0)
                        throw new Exception("<h2 class='sectionTitle error'> negative quality is not allowed</h2>");
                    $pQuantity = $display->getColumnDataById("id", $id, "quantity")['quantity'];
                    $discount = $display->getColumnDataById("id", $id, "discount")['discount'];
                    $price = $display->getColumnDataById("id", $id, "price")['price'];

                    $priceAfterD = ($price - $price * $discount / 100) ;
                    $totalMoney +=  $priceAfterD * $quantity;
                    $totalQuantity += $quantity;
                    $name = $display->getColumnDataById("id", $id, "p_name")['p_name'];
                    $invoiceItems[$i]['id'] = $id;
                    $invoiceItems[$i]['name'] = $name;
                    $invoiceItems[$i]['quantity'] = $quantity;
                    $invoiceItems[$i]['price'] = $priceAfterD;
                    $i++;

                    if ($quantity > $pQuantity) {
                        $error = " the quantity of one item of the order is big";
                        $add->close();
                        throw new Exception("<h2 class='sectionTitle error'> $error</h2>");
                    }
                } else {
                    $add->close();
                    $error = "one item of the order doesn't exist";
                    throw new Exception("<h2 class='sectionTitle error'> $error</h2>");
                }
            }

            $add->close();
            if ($invoiceItems == null)
                throw new Exception("<h2 class='sectionTitle error'> Can't add order with no items</h2>");
            if ($_POST['submit'] == "Edit") {
                $deleteObject = new Delete("orders");
                if (!$deleteObject->doesDataExist("id", $oldId))
                    throw new Exception("<h2 class='sectionTitle error'> Order doesn't exist</h2>");
                $deleteObject->deleteDataById("id", $oldId);
            }
            $keys = "`day_`, `month_`, `year_`, `cashier_id`";
            $order = assignArrWKeys([date("d"), date("m"), date("Y"), $_SESSION["userId"]], $keys);

            $add = new $add("orders");
            $add->addData($order);
            $add->close();
            $display = new Display("orders");
            $orderId = $display->getMaxColumn("id")["id"];
            $day = $display->getColumnDataById("id", $orderId, "day_")['day_'];
            $month = $display->getColumnDataById("id", $orderId, "month_")['month_'];
            $year = $display->getColumnDataById("id", $orderId, "year_")['year_'];
            $orderDate = $day . ' - ' . $month . ' - ' . $year;
            $display->close();
            $add = new add("order_products");
            $keys = "`order_id`, `product_id`, `quantity`";
            foreach ($itemsToAdd as $id => $quantity) {
                $itemsToAdd = assignArrWKeys([$orderId, $id, $quantity], $keys);
                $add->addData($itemsToAdd);
            }

            $add->close();
            include "views/invoiceView.php";
            die();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
} {
    include 'views/cashierView.php';
}
?>