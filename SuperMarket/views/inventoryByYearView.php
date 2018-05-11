
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
   header("location:index.php");
   die();
}
?>
<h2 class='sectionTitle'>view inventory checks in a  year</h2>
<section class="formSection">
    <form name="inventoriesByYear" method="post" action="" autocomplete="on">
        <label  for="inventoriesYear">Select a year</label>
        <select id="inventoriesYear" name="inventoriesYear" onchange="document.getElementsByClassName('errorSpans')[0].innerHTML = ' ';this.className ='recoveryFields'"  class="<?php
if (!empty($errorsMessage)) echo "errorFields"; ?>" >      
            <?php
            $yearsCount = count($inventoriesByYear);

            for ($i = 0; $i < $yearsCount; $i++) {

                echo"<option value='{$inventoriesByYear[$i]['year_']}'>{$inventoriesByYear[$i]['year_']}</option>";
            }
            ?>
        </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessage?></span></span>    
        <input type="submit" name="submit" value="Select"  class="btn btn-primary">
    </form>
</section>
  <?php
       
       if($inventories==false)
       {
         echo "<h2 class='generalmessage' sytle='clear: both'>there is no inventory checks in this year</h2>";
       }

       else {
           include 'views/inventoriesTableView.php';   
       }
       
       
       
       
       ?>
