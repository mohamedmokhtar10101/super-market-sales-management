<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}

if ($_REQUEST) {
    include '../includes/autoLoader.php';

    try {
        $validator = new Validator();
        $_REQUEST = $validator->santasizeArray($_REQUEST);


        if (isset($_REQUEST['y']) && isset($_REQUEST['m']) && $validator->isValidInteger($_REQUEST['y']) && $validator->isValidInteger($_REQUEST['m'])) {


            $year = $_REQUEST['y'];
            $month = $_REQUEST['m'];
            $displayObject = new Display("orders", "../includes/dataBaseVars.php");
            $salesMonth = $displayObject->getColumnsDataBycolumns(array("year_" => $year, "month_" => $month), false, array("distinct day_"));

            if ($salesMonth != false) {

                foreach ($salesMonth as $value)
                    echo "<option value='{$value['day_']}'>{$value['day_']}</option>";
            }
        }
    } catch (Exception $ex) {
        echo "<option value='{$value['day_']}'>{$ex->getMessage()}</option>";
    }
}
?>
