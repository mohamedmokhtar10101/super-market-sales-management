<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3 ) {
    header("location:index.php");

    die();
}
?>
<h2 class='sectionTitle'> Inventory Check  ID <?php echo $inventoryrId."<br/>date : ".$inventoryDate ?> </h2> 
<div class="tableParent">
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,2,[3],[0,2],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Actual Quantity</th>
                <th scope="col">System Quantity</th>
                <th scope="col">difference</th>
                

            </tr>


        </thead>
        <tfoot>
            <tr class="success">
                <th scope="row">Total <?php echo count($inventoryItems); ?> items</th>
                <td colspan="2"></td>
                <td ><?php echo $totalDifferences;?></td>

            </tr>
        </tfoot>
        <tbody>
            <?php
            for ($i = 0; $i < count($inventoryItems); $i++) {
                $difference = $inventoryItems[$i]['system_quantity'] - $inventoryItems[$i]['actual_quantity'];
                echo "<tr>";
                echo "
                    <td>{$inventoryItems[$i]['product_id']}</td>
                    <td>{$inventoryItems[$i]['actual_quantity']}</td>
                    <td>{$inventoryItems[$i]['system_quantity']}</td>
                    <td>{$difference}</td>";
                echo "</tr>";
            }
            ?>

        </tbody>

    </table>    
</div>