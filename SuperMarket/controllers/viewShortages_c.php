<?php

session_start();
if (!isset($_SESSION['userName_sm']) || $_SESSION['type'] != 3) {
    header("location:index.php");

    die();
}

  
try{
     
    $displayObject = new Display("shortages");
    $shortages = $displayObject->getALLData("date_ desc");
    if($shortages!=false){
    foreach ($shortages as $value)
    $images[] = $displayObject->getDataByIdSimpleJoin("p_id", $value['p_id'], "product", "id", "image");
    }
    $displayObject->close();
    
    
    
    include "views/shortagesView.php";

    }
   
catch(Exception $ex)
{
        echo $ex->getMessage();
    
        
}

