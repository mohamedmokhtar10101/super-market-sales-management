<?php
session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}
$selected[$userToDisplay['type']] = "selected='selected'";

?>
<h2 class="sectionTitle"><?php if ($edit == true) echo"edit ".$userToDisplay['userName'];
else echo"Add new User"; ?></h2>

<form class="formSection" id="addNewUser" name="addNewUser" method="post" action="?page=controllers/addUser_c" autocomplete="on" enctype="multipart/form-data">
    <label for="userName">UserName</label><input  id="userName"  class="<?php $st = ";document.getElementsByClassName('errorSpans')[0].innerHTML = ' '";
$st1 = "this.className ='recoveryFields'";
if (!empty($errorsMessages["userName"])) echo "errorFields\"oninput = \"$st1$st\""; ?>" name="userName"  type="text"  placeholder="Enter item id here !" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item id here !'" value="<?php if ($errorsMessages['userName'] == null) echo $userToAdd['userName'];
if ($edit == true) echo $userToDisplay['userName']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['userName'] ?></span></span><br/>
    <label for="password">Password</label><input  id="password"  class="<?php $st = ";document.getElementsByClassName('errorSpans')[1].innerHTML = ' '";
$st1 = "this.className ='recoveryFields'";
if (!empty($errorsMessages["password"])) echo "errorFields\"oninput = \"$st1$st\""; ?>" name="password"  type="text"  placeholder="Enter item id here !" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item id here !'" value="<?php if ($errorsMessages['password'] == null) echo $userToAdd['password'];
if ($edit == true) echo $userToDisplay['password']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['password'] ?></span></span><br/>
    <label for="type">User type</label> <select id="type" name="type" class="<?php $st = ";document.getElementsByClassName('errorSpans')[2].innerHTML = ' '";
$st1 = "this.className ='recoveryFields'";
if (!empty($errorsMessages["type"])) echo "errorFields\"onchange = \"$st1$st\""; ?>">
        <option value='1' <?php echo $selected[1]?>>cashier</option>
        <option value='2' <?php echo $selected[2]?>>supervisor    </option>
        <option value='3' <?php echo $selected[3]?>>branch admin</option>
    </select><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['type']?></span></span>    

        <input name="oldId" type="hidden" value="<?php echo $userId . $oldId ?>">
        <input id="addUser" name="submit" type="submit" value="<?php if ($edit == true) echo"Edit";
else echo"Add"; ?>" class="btn btn-primary">
        </form>