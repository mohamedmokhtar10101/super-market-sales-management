<?php
session_start();
if(!isset($_SESSION['userName_sm'])|| $_SESSION['type'] != 3)
{
    header("location:index.php");

    die();
}
function displayCategories()
{
    try {
       
        $categoriesObj = new Display("product");
        return $categoriesObj->getAllColumnData("category");
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

}
$categories = displayCategories();

?>
<h2 class="sectionTitle"><?php if($edit==true)echo"edit $itemId$oldId"; else echo"Add new Item";?></h2>
      
        <form class="formSection" id="addNewItem" name="addNewItem" method="post" action="?page=controllers/addnewItem_c" autocomplete="on" enctype="multipart/form-data">
            <label for="itemId">Item Id</label><input  id="itemId"  class="<?php  $st = ";document.getElementsByClassName('errorSpans')[0].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["id"]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="id"  type="text"  placeholder="Enter item id here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter item id here !'" value="<?php if($errorsMessages['id']==null)echo $itemsToAdd['id']; if($edit == true)  echo $itemToDisplay['id'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['id'] ?></span></span><br/>
            <label for="itemName">Item Name</label><input id="itemName" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[1].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["p_name" ]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="p_name" type="text"  placeholder="Enter item name here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter item name here !'" value="<?php if($errorsMessages['p_name']==null)echo $itemsToAdd['p_name']; if($edit == true)  echo $itemToDisplay['p_name'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['p_name'] ?></span></span><br/>
            <label for="itemCategory">Item Category</label><input id="itemCategory" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[2].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["category"]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="category" type="text" list="categories" placeholder="Enter category here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter category here !'" value="<?php if($errorsMessages['category']==null)echo $itemsToAdd['category']; if($edit == true)  echo $itemToDisplay['category'];?>" autocomplete="off"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['category'];?></span></span><br/>
            <label for="itemCost">Item Cost</label><input id="itemCost" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[3].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["cost"]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="cost" type="text"  placeholder="Enter cost here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter cost here !'" value="<?php if($errorsMessages['cost']==null)echo $itemsToAdd['cost']; if($edit == true)  echo $itemToDisplay['cost'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['cost'] ?></span></span><br/>
            <label for="itemQuantity">Item Quantity</label><input id="itemQuantity" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[4].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["quantity" ]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="quantity" type="text"  placeholder="Enter quantity here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter quantity here !'" value="<?php if($errorsMessages['quantity']==null)echo $itemsToAdd['quantity']; if($edit == true)  echo $itemToDisplay['quantity'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['quantity'] ?></span></span><br/>
            <label for="itemPrice">Item Price</label><input id="itemPrice" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[5].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["price"]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="price" type="text"  placeholder="Enter  price here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter price here !'" value="<?php if($errorsMessages['price']==null)echo $itemsToAdd['price']; if($edit == true)  echo $itemToDisplay['price'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['price'] ?></span></span><br/>
            <label for="itemDiscount">Item Discount</label><input id="itemDiscount" class="<?php  $st = ";document.getElementsByClassName('errorSpans')[7].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if(!empty($errorsMessages["discount"]))echo "errorFields\"oninput = \"$st1$st\"";?>" name="discount" type="text"  placeholder="Enter discount here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter  discount here !'" value="<?php if($errorsMessages['discount']==null)echo $itemsToAdd['discount']; if($edit == true)  echo $itemToDisplay['discount'];?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['discount'] ?></span></span><br/>
            <label for="itemImage">Item Image</label><input id="itemImage"  class="<?php  $st = ";document.getElementsByClassName('errorSpans')[8].innerHTML = ' '";$st1="this.className ='recoveryFields'" ;if ($errorsMessages['image']!="*")if(!empty($errorsMessages['image']))echo "errorFields\"onfocus = \"$st1$st\"";?>" name="image" type="file" accept="image/*"><span class="parentSpan"><span class="errorSpans"><?php  if ($errorsMessages['image']!="*") echo $errorsMessages['image']; ?></span></span><br/>
            <input name="oldId" type="hidden" value="<?php echo $itemId.$oldId?>">
            <input id="addItem" name="submit" type="submit" value="<?php if($edit==true)echo"Edit"; else echo"Add";?>" class="btn btn-primary">
        </form>
        <datalist id="categories">
     
                <?php 
                
                foreach($categories as $value)
                {
                    echo " <option value='{$value['category']}'>";
                }
                ?>
           
        </datalist>
