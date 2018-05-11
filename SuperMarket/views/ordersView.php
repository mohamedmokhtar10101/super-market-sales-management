
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 2) {
   header("location:index.php");
   die();
}
?>              
<h2 class='sectionTitle'>Orders of all the time</h2>
 <?php
            if ($orders == false) {
                echo "<h2 class='generalmessage' sytle='clear: both'>there is no orders in this day</h2>";
            } else {
                include 'views/ordersTableView.php';
            }
            ?>
