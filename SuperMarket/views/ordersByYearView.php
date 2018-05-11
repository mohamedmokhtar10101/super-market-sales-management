
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
   header("location:index.php");
   die();
}
?>
<h2 class='sectionTitle'>view orders in a  year</h2>
<section class="formSection">
    <form name="salesByYear" method="post" action="" autocomplete="on">
        <label  for="salesYear">Select a year</label>
        <select id="salesYear" name="salesYear" onchange="document.getElementsByClassName('errorSpans')[0].innerHTML = ' ';this.className ='recoveryFields'"  class="<?php
if (!empty($errorsMessage)) echo "errorFields"; ?>" >      
            <?php
            $yearsCount = count($ordersByYear);

            for ($i = 0; $i < $yearsCount; $i++) {

                echo"<option value='{$ordersByYear[$i]['year_']}'>{$ordersByYear[$i]['year_']}</option>";
            }
            ?>
        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessage?></span></span>    
        <input type="submit" name="submit" value="Select"  class="btn btn-primary">
    </form>
</section>
  <?php
       
       if($orders==false)
       {
         echo "<h2 class='generalmessage' sytle='clear: both'>there is no orders in this year</h2>";
       }

       else {
           include 'views/ordersTable2View.php';   
       }
       
       
       
       
       ?>
