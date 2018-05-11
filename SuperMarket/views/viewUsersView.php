
<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
   header("location:index.php");
   die();
}
$types[] = "cashier";
$types[] = "supervisor";
$types[] = "branch admin";
?>
<h2 class="sectionTitle">View Edit and Delete users</h2>

<?php include "deleteModalView.php";?>

<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="    filter(event,1,[],[0],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">    
    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">UserName</th>
                <th scope="col">Password</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>

            </tr>


        </thead>
        <tfoot>
            <tr class="success">

                <th scope="row">Total <?php echo count($usersData);?> users</th>
                <td colspan="4"></td>
              

            </tr>
        </tfoot>
        <tbody>
               <?php 
                     
                    
                    for($i = 0; $i < count($usersData); $i++ )
                    {
                        echo "<tr>";
                        echo "
                    <td>{$usersData[$i]['userName']}</td>
                    <td>{$usersData[$i]['password']}</td>
                    <td>{$types[$usersData[$i]['type'] - 1]}</td>
                    <td>
                        <a title ='delete this item' class='action' id='deleteAction' style='cursor:pointer' data-id='{$usersData[$i]["id"]}' onclick='displayConfirmModal(event,\"viewUsers_c\")'><img src='{$site}delete.png'/></a>
                        <a title='edit this item' class='action' id='editAction' href='?page=controllers/viewUsers_c&action=edit&id={$usersData[$i]["id"]}'><img src='{$site}edit.png'></a>
                    </td>";
                    echo "</tr>";
                    }
                    
                            
                            
                            
                    ?>
                   



            </tr>

        </tbody>

    </table>    


</div>
