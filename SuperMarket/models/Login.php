<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author mohamed mokhtar
 */

class Login extends DataBase {
    private $userName;
    private $password;
    private $connection;
    
    public function Login($userName,$password)
    {
        parent::DataBase("../includes/dataBaseVars.php");
        $this->setData($userName, $password);
        
    }
      private function setData($userName,$password)
  {
      
      $this->userName=$userName;
      $this->password=$password;
     
      try{
          $this->connection=$this->connect();
          
        } catch (Exception $ex) {
              echo $ex->getMessage();
        }
      
  }
    public function user_exists()
    {
        
        $query="select * from users where userName='$this->userName' and password='$this->password'";
        $result=  $this->connection->query($query);
        if($result==false)
        {
            $this->close();
            throw new Exception("cannot select the specefied user");
        }
      else {
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
           return $row;
        }
      else{
             $this->close();
             return false;
           }
      }
    }
}
