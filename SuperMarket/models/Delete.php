<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Delete
 *
 * @author mohamed mokhtar
 */
class Delete extends DataBase {
    private $table;
    private $connection;
    public function Delete($table , $vars=null)
    {
        if(isset($vars))
        parent::DataBase($vars);
        else 
          parent::DataBase("includes/dataBaseVars.php");
      $this->table = $table;
      $this->connection=  $this->connect();
    }
    public function deleteDataById($idKey,$id)
    {
        $query = "delete from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("<h2 class='sectionTitle error' style='font-size:20px;clear:both'>Can't Delete this product because it is associated to some enteties<h2>");
       
        return TRUE;
            
        
        
        
        
    }
    public function doesDataExist($idKey,$id)
    {


        
        $query="select $idKey from $this->table where $idKey='$id'";
        $result=  $this->connection->query($query);
        if($result==false)
        {
            $this->close();
            throw new Exception("cannot get the data");
        }
      else {
        if($result->num_rows>0){
         
           return true;
        }
      else{
             return false;
           }
      }
    }

    

}
