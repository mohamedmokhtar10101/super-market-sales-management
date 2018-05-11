<?php

session_start();
if(!isset($_SESSION['userName_sm'])|| $_SESSION['type'] != 3)
{
    header("location:index.php");

    die();
}





?>

<h2 class="sectionTitle"> Make Inventory Check </h2>
<form class="formSection" id="sellItemForm" name="sellItemForm" method="post" action="" autocomplete="on">

    <label id="" for="itemToSell">Enter Item id</label>
    <input type = "search"  id="itemToSell" name="itemToSell" oninput="if (this.value != ''){itemInfo(this.value);}"/>
    <label for="quantity">quantity</label> <input type="number" id="quantity" name="quantity"  value="1" min="1" max="" class=""><span class="parentSpan"><span class="errorSpans"></span></span>

    <input id="sellItembtn" name="submit" type="button" value="Add" onclick="addItemToInventory(document.getElementById('itemToSell').value)" class="btn btn-primary">
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
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,3,[1],[0,1],document.getElementsByClassName('tableParent')[1].children[0].querySelectorAll('tbody tr'),document.getElementsByClassName('tableParent')[1].children[0].querySelectorAll('tfoot tr'))" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
            </tr>

        </thead>
        <tfoot>
            
            <tr class="success">

                <th id ="totalItems" scope="row">Total 0 items</th>
                <td id="totalQuantity">0</td>
                <td ></td>





            </tr>
        </tfoot>
        <tbody id = "inventoryItems">

           
        </tbody>

    </table>    


</div>
<form class="formSection" id="makeInventoryCheck" name="makeInventoryCheck" method="post" action="?page=controllers/makeInventoryCheck_c" autocomplete="on">
    <input id="makeInventoryCheckButton" name="submit" type="submit" value="Confirm"  class="btn btn-primary" >
    <h2  id="message"></h2>   
</form>
