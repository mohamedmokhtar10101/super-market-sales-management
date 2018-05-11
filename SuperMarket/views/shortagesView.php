    <?php
       
    session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}

       if($shortages==false)
       {
           echo "<h2 class='sectionTitle'>You have no shortages</h2>";
       }

       else {
           include 'views/shortagesTableView.php';   
       }
       
       
       
       
       ?>