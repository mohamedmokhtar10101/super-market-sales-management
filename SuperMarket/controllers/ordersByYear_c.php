<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}
     $displayObject = new Display("orders");
     $ordersByYear = $displayObject->getAllColumnData("DISTINCT  year_");
  if($_POST)
  {
try{
    $validator = new Validator();
    $_POST = $validator->santasizeArray($_POST);
    if($_POST['submit'] && $_POST['submit'] == 'Select' && isset($_POST['salesYear']) )
    {
        $rules = array(
            "salesYear"=>"isValidRequired&isValidInteger&isPlus"
            );
            $errors = $validator->validateArray($_POST, $rules);  
            $isThereError = false;
            $errorsMessage;
            foreach($errors as $value)
            {
                if(!empty($value)&&(strpos($value,"d")!==false)){
                $errorsMessage = "*";
                $isThereError = true;
                
                }
                else if(!empty($value)&&(strpos($value,"r")!==false))
                {
                    $errorsMessage = "the field must be integer";
                    $isThereError = TRUE;
                }
            }
            if($isThereError)
            {
                $displayObject->close();
                include "views/ordersByYearView.php";  
            }
            else
            {
                $mask=false;
                foreach ($ordersByYear as $value)
                {
                    if($value['year_'] == $_POST['salesYear'])
                    {
                        $mask = true;
                        break;
                    }
                    
                    
                }
               if($mask)
               {
                 
                   
                   $orders = $displayObject->getColumnsDataBycolumns( array("year_"=>$_POST['salesYear']),"money desc");
               
                   $displayObject->close();
                   include "views/ordersByYearView.php";     
                   
                   
                   
                   

               }
 
               else {
     
                     $errorsMessage = " the year must be in the range";
                    $isThereError = TRUE;
                    include "views/ordersByYearView.php";   
                    $displayObject->close();
               }
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
    else if($ordersByYear ==false)
  {
      echo "<h2 class='sectionTitle'>No orders to view</h2>";
  }
 else {
     
 
     $orders = $displayObject->getALLData("money desc");

     $displayObject->close();
include "views/ordersByYearView.php";      
}