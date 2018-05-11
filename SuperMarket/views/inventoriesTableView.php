
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}
?>
<?php include"deleteModalView.php"?>
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,1,[],[0],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tfoot>
            <tr class="success">

                <th scope="row">Total <?php $inventoriesCount = count($inventories); echo $inventoriesCount; ?> inventory checks</th>
                <td colspan="2"></td>





            </tr>
        </tfoot>
        <tbody>
            <?php
            for ($i = 0; $i < $inventoriesCount; $i++) {
                echo "<tr>";
                echo "
                    <td>{$inventories[$i]['id']}</td>
                    <td>{$inventories[$i]['day_']}-{$inventories[$i]['month_']}-{$inventories[$i]['year_']}</td>
                    <td>
                      <a title ='delete this inventory check' class='action' id='deleteAction' style='cursor:pointer' data-id='{$inventories[$i]["id"]}' onclick='displayConfirmModal(event,\"viewInventoryCheckItems_c\")'><img src='{$site}delete.png'/></a>
                      <a title='inventory checks items' class='action' id='inventoriesDelete' href='?page=controllers/viewInventoryCheckItems_c&action=show&id={$inventories[$i]["id"]}'><img  src='{$site}show.png' alt='inventory check items'></a>

                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>    


</div>