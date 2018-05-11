<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}
?>                         
<h2 class='sectionTitle'>view days in a  day</h2>
<section class="formSection">
    <form name="inventoriesByYear" method="post" action="" autocomplete="on">
        <label  for="inventoriesYear">Select a year</label>
        <select id="inventoriesYear" name="inventoriesYear" onchange="if (this.value != ''){getYearMonthsForInventories(this.value)};document.getElementsByClassName('errorSpans')[0].innerHTML = ' ';this.className ='recoveryFields'"  class="<?php
if (!empty($errorsMessages["inventoriesYear"])) echo "errorFields"; ?>">      
            <option value='' selected="selected">select a year</option>     
            <?php
            $yearsCount = count($inventoriesByYear);

            for ($i = 0; $i < $yearsCount; $i++) {

                echo"<option value='{$inventoriesByYear[$i]['year_']}'>{$inventoriesByYear[$i]['year_']}</option>";
            }
            ?>
        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['inventoriesYear']?></span></span>
        <label  for="inventoriesMonth">Select a month</label>
        <select id="inventoriesMonth" name="inventoriesMonth" onchange="if (this.value != ''){getMonthDaysForInventories(this.value)};document.getElementsByClassName('errorSpans')[1].innerHTML = ' ';this.className ='recoveryFields'"  class="<?php
if (!empty($errorsMessages["inventoriesMonth"])) echo "errorFields"; ?>">      
            <option value='' selected="selected">select a month</option> 
            <?php
            for ($i = 1; $i <= 12; $i++) {

                echo"<option value='{$i}'>{$i}</option>";
            }
            ?>


        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['inventoriesMonth']?></span></span>  
        <label  for="inventoriesDay">Select a day</label>
        <select id="inventoriesDay" name="inventoriesDay"   onchange="document.getElementsByClassName('errorSpans')[2].innerHTML = ' ';this.className ='recoveryFields'" class="<?php
if (!empty($errorsMessages["inventoriesDay"])) echo "errorFields"; ?>">      
            <?php
            for ($i = 1; $i <= 31; $i++) {

                echo"<option value='{$i}'>{$i}</option>";
            }
            ?>
        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['inventoriesDay']?></span></span>    
        <input type="submit" name="submit" value="Select"  class="btn btn-primary">
    </form>
</section>
        <?php
            if ($inventories == false) {
                echo "<h2 class='generalmessage' sytle='clear: both'>there is no inventory checks in this day</h2>";
            } else {
                include 'views/inventoriesTableView.php';
            }
            ?>
