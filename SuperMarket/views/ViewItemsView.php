
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
   header("location:index.php");
   die();
}
?>
<h2 class="sectionTitle">View Edit and Delete items</h2>

<?php include "deleteModalView.php";?>

<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,5,[3,7,8,9,10],[0,2,4,5,6],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Quantity</th>
                <th scope="col">Cost</th>
                <th scope="col">Price</th>
                 <th scope="col">Discount</th>
                <th scope="col">total cost</th>
                <th scope="col">Sold Quantity</th>
                <th scope="col">Money for sold</th>
                <th scope="col">Earnings</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>


        </thead>
        <tfoot>
            <tr class="success">

                <?php
                  
                    $total['quantity']=0;
                    $total['sold_quantity']=0;
                    $total['cost']=0;
                    $total['money']=0;
                    $total['profits']=0;
                    for($i = 0; $i < count($itemsData); $i++ )
                    {
                    $total['quantity']+=$itemsData[$i]['quantity'];
                    $total['sold_quantity']+=$itemsData[$i]['sold_quantity'];
                    $total['cost']+=$itemsData[$i]['total_cost'];
                    $total['money']+=$itemsData[$i]['total_money'];
                    $total['profits']+=$itemsData[$i]['profits'];
                    }
                        
                   ?>
                <th scope="row">Total <?php echo count($itemsData);?> items</th>
                <td colspan="2"></td>
                <td ><?php echo $total['quantity']?></td>
                <td colspan="3"></td>
                <td><?php echo $total['cost']?></td>
                <td><?php echo $total['sold_quantity']?></td>
                <td><?php echo $total['money']?></td>
                <td><?php echo $total['profits']?></td>
                <td colspan="3"></td>

            </tr>
        </tfoot>
        <tbody>
               <?php 
                     
                    
                    for($i = 0; $i < count($itemsData); $i++ )
                    {
                        echo "<tr>";
                        echo "
                    <td>{$itemsData[$i]['id']}</td>
                    <td>{$itemsData[$i]['p_name']}</td>
                    <td>{$itemsData[$i]['category']}</td>
                    <td>{$itemsData[$i]['quantity']}</td>
                    <td>{$itemsData[$i]['cost']}</td>
                    <td>{$itemsData[$i]['price']}</td>
                    <td>{$itemsData[$i]['discount']}</td>
                    <td>{$itemsData[$i]['total_cost']}</td>
                    <td>{$itemsData[$i]['sold_quantity']}</td>
                    <td>{$itemsData[$i]['total_money']}</td>
                    <td>{$itemsData[$i]['profits']}</td>
                    <td><img id='itemImageT' src='{$itemsData[$i]['image']}'  alt='{$itemsData[$i]['id']}'/></td>
                    <td>
                        <a title ='delete this item' class='action' id='deleteAction' style='cursor:pointer' data-id='{$itemsData[$i]["id"]}' onclick='displayConfirmModal(event,\"viewItems_c\")'><img src='{$site}delete.png'/></a>
                        <a title='edit this item' class='action' id='editAction' href='?page=controllers/viewItems_c&action=edit&id={$itemsData[$i]["id"]}'><img src='{$site}edit.png'></a>
                    </td>";
                    echo "</tr>";
                    }
                    
                            
                            
                            
                    ?>
                   



            </tr>

        </tbody>

    </table>    


</div>
