<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}
$validator = new Validator();

if ($_GET['action'] && ($_GET['action'] == "show" || $_GET['action'] == "delete") && $_GET['id']) {

    try {
        $_GET = $validator->santasizeArray($_GET);
        $id = $validator->santasizeString($_GET['id']);
        $id = $validator->cleantIt($id, false);
        if (!$validator->isValidRequired($id))
            throw new Exception("<div class='sectionTitle error'>the id  must not be empty </div>");
        $displayObject = new Display("inventoryCheck_products");
        if (!$displayObject->dataExists("inventory_id", $id))
            echo "<div class='sectionTitle error'>$id  doesn't exist </div>";
        if ($_GET['action'] == "show") {
            $inventoryrId = $id;
            $inventoryItems = $displayObject->getDataById("inventory_id", $id, true);
            $totalDifferences = 0;
            $displayObject->close();
            $displayObject = new Display("inventoryCheck");
            $day = $displayObject->getColumnDataById("id", $inventoryrId, "day_")['day_'];
            $month = $displayObject->getColumnDataById("id", $inventoryrId, "month_")['month_'];
            $year = $displayObject->getColumnDataById("id", $inventoryrId, "year_")['year_'];
            $inventoryDate = $day . ' - ' . $month . ' - ' . $year;
            foreach ($inventoryItems as $item) {
                $totalDifferences += $item['system_quantity'] - $item['actual_quantity'];
            }
            include"views/inventoryView.php";
        }
        else
        {
            $deleteObject = new Delete("inventoryCheck");
            $deleteObject->deleteDataById("id", $id);
            echo "<h2 class='sectionTitle actionMessage' >successfully Deleted<h2>";
        }
         $displayObject->close();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>      