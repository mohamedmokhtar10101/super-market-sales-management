<?php
session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 1 && $_SESSION['type'] != 2)) {
    header("location:index.php");

    die();
}
?>
<h2 class='sectionTitle'> Order  ID <?php echo $orderId."<br/>date : ".$orderDate ?> </h2> 
<div class="tableParent">

    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>

            </tr>


        </thead>
        <tfoot>
            <tr class="success">
                <th scope="row">Total <?php echo count($invoiceItems); ?> items</th>
                 <td colspan="2"></td>
                <td><?php echo $totalQuantity; ?></td>
                <td colspan="3"> Total invoice <?php echo $totalMoney; ?>$</td>
                 

            </tr>
        </tfoot>
        <tbody>
            <?php
            for ($i = 0; $i < count($invoiceItems); $i++) {
                $totalPrice = $invoiceItems[$i]['price'] * $invoiceItems[$i]['quantity'];
                echo "<tr>";
                echo "
                    <td>{$invoiceItems[$i]['id']}</td>
                    <td>{$invoiceItems[$i]['name']}</td>
                    <td>{$invoiceItems[$i]['price']}</td>
                    <td>{$invoiceItems[$i]['quantity']}</td>
                    <td>{$totalPrice}</td>";
                echo "</tr>";
            }
            ?>

        </tbody>

    </table>    
</div>