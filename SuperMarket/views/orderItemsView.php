
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 3 && $_SESSION['type'] != 2)) {
    header("location:index.php");
    die();
}
?>
<h2 class='sectionTitle'> Order Id  <?php echo $id ?>  </h2> 
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
                <th scope="col">Total price</th>
                <th scope="col">Image</th>

            </tr>

        </thead>
        <tfoot>
            <?php
            $itemsCount = count($orderItems);
            $total['quantity'] = 0;
            $total['money'] = 0;
            for ($i = 0; $i < $itemsCount; $i++) {
                $total['quantity'] += $orderItems[$i]['quantity'];
                $totalPrice[] = $orderItems[$i]['priceAfter'] * $orderItems[$i]['quantity'];
                $total['totalPrice'] += $totalPrice[$i];
            }
            ?>
            <tr class="success">

                <th scope="row">Total <?php echo $itemsCount; ?> items</th>
                <td colspan="2"></td>
                <td><?php echo $total["quantity"] ?></td>
                <td></td>
                <td><?php echo $total["totalPrice"] ?></td>
                <td></td>
            </tr>
        </tfoot>
        <tbody>
<?php
for ($i = 0; $i < $itemsCount; $i++) {
    echo "<tr>";
    echo "
                    <td>{$orderItems[$i]['product_id']}</td>
                    <td>{$orderItems[$i]['p_name']}</td>
                    <td>{$orderItems[$i]['category']}</td>
                    <td>{$orderItems[$i]['quantity']}</td>
                    <td>{$orderItems[$i]['priceAfter']}</td>
                    <td>{$totalPrice[$i]}</td>
                    <td><img id='itemImageT' src='{$orderItems[$i]['image']}'  alt='{$orderItems[$i]['product_id']}'/></td> ";
    echo "</tr>";
}
?>

        </tbody>

    </table>    


</div>
