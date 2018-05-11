<?php
session_start();
if (!isset($_SESSION['userName_sm'])) {
    header("location:index.php");

    die();
}


if($_REQUEST)
{
    include '../includes/autoLoader.php';
        
   try{
        $validator = new Validator();
        $_REQUEST = $validator->santasizeArray($_REQUEST);
        
            
    if(isset($_REQUEST['id']))
    {
        
         $id = $_REQUEST['id'];
        $itemObj = new Display("product","../includes/dataBaseVars.php");
        $item = $itemObj->getDataById("id", $id);
        if($item != false)
        {
            echo implode($item,',');

        }
       
      
    }
    

        
   }
   catch(Exception $ex){
    echo $ex->getMessage();
      }
}







?>
