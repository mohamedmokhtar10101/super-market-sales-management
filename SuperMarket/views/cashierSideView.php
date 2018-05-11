<?php
session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 1 && $_SESSION['type'] != 2) ) {
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
            <li class="navElement"><a class="btn btn-primary <?php echo $classes['controllers/makeOrder_c'] ?>" style="<?php echo $active['controllers/makeOrder_c'] ?> " href="?page=controllers/makeOrder_c#content"> make order</a></li>
        </ul>

    </nav>
</aside>