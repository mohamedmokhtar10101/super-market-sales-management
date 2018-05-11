
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}
?>                     
<h2 class='sectionTitle'>view orders in a  month</h2>
<section class="formSection">
    <form name="salesByMonth" method="post" action="" autocomplete="on">
        <label  for="salesYear">Select a year</label>
        <select id="salesYear" name="salesYear"  onchange="if (this.value != ''){getYearMonths(this.value)};document.getElementsByClassName('errorSpans')[0].innerHTML = ' ';this.className ='recoveryFields'"  class="<?php
if (!empty($errorsMessages["salesYear"])) echo "errorFields"; ?>">      
            <option value='' selected="selected">select a year</option>  
            <?php
            $yearsCount = count($ordersByYear);

            for ($i = 0; $i < $yearsCount; $i++) {

                echo"<option value='{$ordersByYear[$i]['year_']}'>{$ordersByYear[$i]['year_']}</option>";
            }
            ?>

        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['salesYear'] ?></span></span>
        <label  for="salesMonth">Select a month</label>
        <select id="salesMonth" name="salesMonth"onchange="document.getElementsByClassName('errorSpans')[1].innerHTML = ' ';this.className ='recoveryFields'" class="<?php
if (!empty($errorsMessages["salesMonth"])) echo "errorFields"; ?>">      
            <?php
            for ($i = 1; $i <= 12; $i++) {

                echo"<option value='{$i}'>{$i}</option>";
            }
            ?>
        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['salesMonth'] ?></span></span>    
        <input type="submit" name="submit" value="Select"  class="btn btn-primary">
    </form>
</section>
            <?php
            if ($orders == false) {
                echo "<h2 class='generalmessage' sytle='clear: both'>there is no orders in this month</h2>";
            } else {
                include 'views/ordersTable2View.php';
            }
            ?>
