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
    if(isset($_POST['submit']) && $_POST['submit'] == 'Select' && isset($_POST['salesYear']) && isset($_POST['salesMonth']) && isset($_POST['salesDay']) )
    {
        $rules = array(
            "salesMonth"=>"isValidRequired&isValidInteger&isPlus",
            "salesYear"=>"isValidRequired&isValidInteger&isPlus",
            "salesDay"=>"isValidRequired&isValidInteger&isPlus"
            );
            $errors = $validator->validateArray($_POST, $rules);  
            $isThereError = false;
            $errorsMessages;
                $mask = FALSE;
                if($ordersByYear!=false)
                foreach ($ordersByYear as $value)
                {
                    if($value['year_']==$_POST['salesYear'])
                    {
                        $mask = true;
                        break;
                    }
                }
                if(!$mask)
                   $errors["salesYear"].="g"; 
                 
                
                    if(!in_array($_POST['salesMonth'],array(1,2,3,4,5,6,7,8,9,10,11,12)))
                        $errors["salesMonth"].="g";
                    for($c=1;$c<=31;$c++)
                      $arr[] = $c;
                       if(!in_array($_POST['salesDay'],$arr))
                        $errors["salesDay"].="g";
                        
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
                include "views/ordersByDayView.php";  
            }
            else
            {

                   $orders = $displayObject->getColumnsDataBycolumns( array("year_"=>$_POST['salesYear'],"month_"=>$_POST['salesMonth'],"day_"=>$_POST['salesDay']),"money desc");
                   $displayObject->close();
                   include "views/ordersByDayView.php";      

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
include "views/ordersByDayView.php";      
}