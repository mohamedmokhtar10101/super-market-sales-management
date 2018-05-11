<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}
?>
<h2 class='sectionTitle'>fastest cashiers</h2> 
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="filter(event,1,[],[],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">

    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Number of orders</th>
            </tr>


        </thead>
        <tfoot>
            <tr class="success">
                <th scope="row">Total <?php echo count($cashiers) ?> cashiers</th>
                <td colspan="2"></td>

            </tr>
        </tfoot>
        <tbody>

                <?php
                for ($i = 0; $i < count($cashiers); $i++) {
                    echo "<tr>";
                    echo "
                    <td>{$cashiers[$i]['cashier_id']}</td>
                    <td>{$cashiers[$i]['userName']}</td>
                    <td>{$cashiers[$i]['orders_num']}</td>";
                    echo "</tr>";
                }
                ?>



        </tbody>

    </table>    
</div>