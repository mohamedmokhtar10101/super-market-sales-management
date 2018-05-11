<?php

function assignArrWKeys($originalarr , $keys)
{
    
    $keys= str_replace("`", " ", $keys);
    $keys= str_replace(" ", "", $keys);
    $keys=trim($keys);
    $keys=  explode(",", $keys);
    if(count($originalarr)!=count($keys))
        return false;
    $result;
    $i=0;
    foreach($originalarr as $value)
    {
        $result[$keys[$i]]=$value;
        $i++;
        
    }
    return $result;

    
    
}
function doesAccept($file , $extensions)
{
    
    $extension = pathinfo($file)['extension'];
    if(in_array(strtolower($extension), $extensions))
            return true;
        else 
            return false;
    
    
    
}