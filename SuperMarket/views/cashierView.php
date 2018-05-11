<?php
session_start();
if (!isset($_SESSION['userName_sm']) || ($_SESSION['type'] != 1 && $_SESSION['type'] != 2)) {
    header("location:index.php");

    die();
}
?>

<h2 class="sectionTitle"><?php if ($edit) echo "Edit order with ID " . $itemId . $oldId;
else echo "make order" ?> </h2>
<form class="formSection" id="sellItemForm" name="sellItemForm" method="post" action="" autocomplete="on">

    <label id="" for="itemToSell">Enter Item id</label>
    <input type = "search"  id="itemToSell" name="itemToSell" oninput="if (this.value != ''){itemInfo(this.value);}"/>
    <label for="quantity">quantity</label> <input type="number" id="quantity" name="quantity"  value="1" min="1" max="" class=""><span class="parentSpan"><span class="errorSpans"></span></span>

    <input id="sellItembtn" name="submit" type="button" value="Add to order" onclick="addItem(document.getElementById('itemToSell').value)" class="btn btn-primary">
    <h2  id="message"></h2>   
</form>

<div id="itemTable" style="display: none;" class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Discount Amount</th>
                <th scope="col">Image</th>

            </tr>

        </thead>
        <tfoot>

        </tfoot>
        <tbody>
            <tr id = "itemData">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><img id='itemImageT' src='' alt=''/></td>

            </tr>

        </tbody>

    </table>    


</div>
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,3,[3,6],[0,2,4],document.getElementsByClassName('tableParent')[1].children[0].querySelectorAll('tbody tr'),document.getElementsByClassName('tableParent')[1].children[0].querySelectorAll('tfoot tr'))" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Discount Amount</th>
                <th scope="col">totol Price</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>

        </thead>
        <tfoot>
            <?php
            $itemsCount = count($orderItems);
            $total['quantity'] = 0;
            $total['totalPrice'] = 0;
            for ($i = 0; $i < $itemsCount; $i++) {
                $total['quantity'] += $orderItems[$i]['quantity'];
                $priceAfter[] = ($orderItems[$i]['price'] - $orderItems[$i]['price'] * $orderItems[$i]['discount'] / 100) * $orderItems[$i]['quantity'];
                $total['totalPrice'] += $priceAfter[$i];
            }
            ?>
            <tr class="success">

                <th id ="totalItems" scope="row">Total <?php echo $itemsCount; ?> items</th>
                <td colspan="2"></td>
                <td id="totalQuantity"><?php echo $total["quantity"] ?></td>
                <td colspan="2"></td>
                <td id ="totalPrice"><?php echo $total["totalPrice"] ?></td>
                <td colspan="3"></td>





            </tr>
        </tfoot>
        <tbody id = "orderItems">

            <?php
            for ($i = 0; $i < $itemsCount; $i++) {
                echo "<tr>";
                echo "
                    
                    <td>{$orderItems[$i]['product_id']}</td>
                    <td>{$orderItems[$i]['p_name']}</td>
                    <td>{$orderItems[$i]['category']}</td>
                    <td>{$orderItems[$i]['quantity']}</td>
                    <td>{$orderItems[$i]['price']}</td>
                    <td>{$orderItems[$i]['discount']}</td>
                    <td>{$priceAfter[$i]}</td>
                    <td><img id='itemImageT' src='{$orderItems[$i]['image']}'  alt='{$orderItems[$i]['product_id']}'/></td> 
                        <td>
                        
 <a id='deleteAction' class='action' title='delete this item' style='cursor:pointer' data-id='{$orderItems[$i]['product_id']}' onclick='delete_row(this)'><img src='delete.png'></a>
                         </td> 
                         <script>addToData({$orderItems[$i]['product_id']},{$orderItems[$i]['quantity']},{$priceAfter[$i]});</script>
";



                echo "</tr>";
            }
            ?>
        </tbody>

    </table>    


</div>
<form class="formSection" id="makeOrder" name="makeOrder" method="post" action="?page=controllers/makeOrder_c" autocomplete="on">
    <input name="oldId" type="hidden" value="<?php echo $itemId . $oldId ?>">
    <input id="makeOrderButton" name="submit" type="submit" value="<?php
    if ($edit == true)
        echo"Edit";
    else
        echo"Confirm";
    ?>"   class="btn btn-primary" >
    <h2  id="message"></h2>   
</form>
