<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
header("location:index.php");

die();
}
?>

<h2 class='sectionTitle'>Shortages</h2> 
<div class="formSection" style="margin:0 0!important;clear:both"><input oninput="filter(event,1,[],[],itemsTable,itemsFooter)" style="height:35px" type="text" placeholder="filter results" onfocus="this.placeholder = ''" onblur="this.placeholder = 'filter results'" ></div>
<div class="tableParent">

    <table id="itemsTable" class=" table table-striped table-hover table-bordered">
        <thead>
            <tr class="success">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>

            </tr>


        </thead>
        <tfoot>
            <tr class="success">
                <th scope="row">Total <?php $shortagesCount = count($shortages);
echo $shortagesCount; ?> items</th>
                <td colspan="3"></td>

            </tr>
        </tfoot>
        <tbody>
                <?php
                for($i = 0;
                $i < $shortagesCount;
                $i++)
                {
                echo "<tr>";
                echo "
                    <td>{$shortages[$i]['p_id']}</td>
                    <td>{$shortages[$i]['name']}</td>
                    <td>{$shortages[$i]['date_']}</td>
                    <td><img id='itemImageT' src='{$images[$i]['image']}' alt='{$shortages[$i]['p_id']}'/></td>";
                echo "</tr>";
                }

               
                ?>

        </tbody>

    </table>    
</div>