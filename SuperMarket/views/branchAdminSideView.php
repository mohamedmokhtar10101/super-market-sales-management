<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}


$validator = new Validator();
$_GET = $validator->santasizeArray($_GET);
$page = $_GET['page'];
$classes[$page] = "active";
$active[$page] = "background-color:white;color:#3399ff;border:2px solid #3399ff;";
?>
<aside id="sidebar">

    <nav id="nav">
        <a  style="font-size:15px;" onclick="toggle(this)" class="toggle"><div class="bar1"></div><div class="bar2"></div> <div class="bar3"></div></a>
        <ul id="navMenu">

            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/addNewItem_c'] ?>" style="<?php echo $active['controllers/addNewItem_c'] ?> " href="?page=controllers/addNewItem_c#content">Add item </a></li>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/viewItems_c'] ?>" style="<?php echo $active['controllers/viewItems_c'] ?> " href="?page=controllers/viewItems_c#content">View ,Edit and Delete items</a></li>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/viewFastestCashiers_c'] ?>" style="<?php echo $active['controllers/viewFastestCashiers_c'] ?> " href="?page=controllers/viewFastestCashiers_c#content">Fastest chashiers</a></li>

            <li class='navElement' id = 'toggledMenu'><a class='btn btn-primary'>View orders</a> 
                <ul class='subMenu' id='subMenuId' >
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/ordersByYear_c'] ?>" style="<?php echo $active['controllers/ordersByYear_c'] ?> " href="?page=controllers/ordersByYear_c#content">By year</a>
                    </li>
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/ordersByMonth_c'] ?>" style="<?php echo $active['controllers/ordersByMonth_c'] ?> " href="?page=controllers/ordersByMonth_c#content">By Month</a>
                    </li>
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/ordersByDay_c'] ?>" style="<?php echo $active['controllers/ordersByDay_c'] ?> " href="?page=controllers/ordersByDay_c#content">By Day</a>
                    </li>
                </ul>
            </li>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/viewShortages_c'] ?>" style="<?php echo $active['controllers/viewShortages_c'] ?> "  href="?page=controllers/viewShortages_c#content">View shortages</a></li>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/makeInventoryCheck_c'] ?>" style="<?php echo $active['controllers/makeInventoryCheck_c'] ?> "  href="?page=controllers/makeInventoryCheck_c#content">Make an inventory check</a></li>

            <li class='navElement' id = 'toggledMenu2'><a class='btn btn-primary'>View Inventory Checks</a> 
                <ul class='subMenu' id='subMenuId2' >
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/inventoryByYear_c'] ?>" style="<?php echo $active['controllers/inventoryByYear_c'] ?> " href="?page=controllers/inventoryByYear_c#content">By year</a>
                    </li>
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/inventoryByMonth_c'] ?>" style="<?php echo $active['controllers/inventoryByMonth_c'] ?> " href="?page=controllers/inventoryByMonth_c#content">By Month</a>
                    </li>
                    <li>
                        <a class="btn btn-primary <?php echo $classes['controllers/inventoryByDay_c'] ?>" style="<?php echo $active['controllers/inventoryByDay_c'] ?> " href="?page=controllers/inventoryByDay_c#content">By Day</a>
                    </li>
                </ul>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/addUser_c'] ?>" style="<?php echo $active['controllers/addUser_c'] ?> "  href="?page=controllers/addUser_c#content">Add user</a></li>
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/viewUsers_c'] ?>" style="<?php echo $active['controllers/viewUsers_c'] ?> "  href="?page=controllers/viewUsers_c#content">View ,Edit and Delete users</a></li>



        </ul>

    </nav>
</aside>