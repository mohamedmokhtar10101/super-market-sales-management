<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author mohamed mokhtar
 */
class Upload {
   private $to;
   private $from;
   
   public function uploadFile($from ,$to)
   {
       if(!is_file($from))
       {
           throw new Exception("cann't upload the file because it is not  a file");
           
       }
       move_uploaded_file($from, $to);
       return true;
    
   }
}
