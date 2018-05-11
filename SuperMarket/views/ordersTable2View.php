
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}
?>
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,3,[1,2],[0,1,2],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total money</th>
                <th scope="col">Date</th>
                 <th scope="col">Cashier ID</th>
                <th scope="col">Action</th>

            </tr>

        </thead>
        <tfoot>
            <?php
            $ordersCount = count($orders);
            $total['quantity'] = 0;
            $total['money'] = 0;
            for ($i = 0; $i < $ordersCount; $i++) {
                $total['quantity'] += $orders[$i]['quantity'];
                $total['money'] += $orders[$i]['money'];
            }
            ?>
            <tr class="success">

                <th scope="row">Total <?php echo $ordersCount; ?> orders</th>

                <td><?php echo $total['quantity']; ?></td>
                <td><?php echo $total['money']; ?></td>
                <td colspan="3"></td>





            </tr>
        </tfoot>
        <tbody>
            <?php
            for ($i = 0; $i < $ordersCount; $i++) {
                echo "<tr>";
                echo "
                    <td>{$orders[$i]['id']}</td>
                    <td>{$orders[$i]['quantity']}</td>
                    <td>{$orders[$i]['money']}</td>
                    <td>{$orders[$i]['day_']}-{$orders[$i]['month_']}-{$orders[$i]['year_']}</td>
                    <td>{$orders[$i]['cashier_id']}</td>
                    <td>
                    
                      <a title='order items' class='action' id='items' href='?page=controllers/viewOrderItems_c&action=show&id={$orders[$i]["id"]}'><img  src='{$site}show.png' alt='items'></a>
                     </td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>    


</div>