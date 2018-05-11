<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");
    die();
}

     $displayObject = new Display("inventoryCheck");
     $inventoriesByYear = $displayObject->getAllColumnData("DISTINCT  year_");
  if($_POST)
  { 
try{
    $validator = new Validator();
    $_POST = $validator->santasizeArray($_POST);
    if(isset($_POST['submit']) && $_POST['submit'] == 'Select' && isset($_POST['inventoriesYear']) && isset($_POST['inventoriesMonth']) && isset($_POST['inventoriesDay']) )
    {
        
        $rules = array(
            "inventoriesMonth"=>"isValidRequired&isValidInteger&isPlus",
            "inventoriesYear"=>"isValidRequired&isValidInteger&isPlus",
            "inventoriesDay"=>"isValidRequired&isValidInteger&isPlus"
            );
            $errors = $validator->validateArray($_POST, $rules);  
            $isThereError = false;
            $errorsMessages;
                $mask = FALSE;
                if($inventoriesByYear!=false)
                foreach ($inventoriesByYear as $value)
                {
                   
                    if($value['year_']==$_POST['inventoriesYear'])
                    {
                        $mask = true;
                        break;
                    }
                }
                if(!$mask)
                   $errors["inventoriesYear"].="g"; 
                 
                    if(!in_array($_POST['inventoriesMonth'],array(1,2,3,4,5,6,7,8,9,10,11,12)))
                        $errors["inventoriesMonth"].="g";
                    for($c=1;$c<=31;$c++)
                      $arr[] = $c;
                       if(!in_array($_POST['inventoriesDay'],$arr))
                        $errors["inventoriesDay"].="g";
                        
            foreach($errors as $key=>$value)
            {
                if(!empty($value)&&(strpos($value,"d")!==false)){
                $errorsMessages[$key] = "*";
                $isThereError = true;
                
                }
                else if(!empty($value)&&strpos($value,"r")!==false)
                {
                    $errorsMessages[$key] = "the field must be integer";
                    $isThereError = TRUE; 
                }
                else if(!empty($value)&&strpos($value,"g")!==false)
                {
                   
                    $errorsMessages[$key] = "the field must be in the range";
                    $isThereError = TRUE;
                }
            }
            if($isThereError)
            {
                $displayObject->close();
                include "views/inventoryByDayView.php";  
            }
            else
            {

                   $inventories = $displayObject->getColumnsDataBycolumns( array("year_"=>$_POST['inventoriesYear'],"month_"=>$_POST['inventoriesMonth'],"day_"=>$_POST['inventoriesDay']));
                   $displayObject->close();
                   include "views/inventoryByDayView.php";      

            }
                
            
    }
 else {
     $displayObject->close();
     throw new exception("<h2 class='sectionTitle error'>stop trying to hack this solid structure</h2>");
        
    }

   

    }
   
catch(Exception $ex)
{
        echo $ex->getMessage();
    
        
}

  }
  else if($inventoriesByYear ==false)
  {
      echo "<h2 class='sectionTitle'>No inventory checks to view</h2>";
  }
 else {
     
 
     $inventories = $displayObject->getALLData();
     $displayObject->close();
include "views/inventoryByDayView.php";      
}