<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author mohamed mokhtar
 */
class DataBase {
    
    private $host;
    private $userName;
    private $password;
    private $dataBase;
    private $port;
    private $connection;
    public function DataBase($dataBaseVars)
    {
        if(is_file($dataBaseVars)&& file_exists($dataBaseVars))
        {
            include $dataBaseVars;
              $this->host=$host;
              $this->userName=$user;
              $this->password=$password;
              $this->dataBase=$dataBase;
              $this->port=$port;
        }
        else {
            
            throw new Exception("the file ".$dataBaseVars."is not found");
            
        }
      
        
        
    }
     
    public function connect()
    {

        $this->connection=new mysqli($this->host,  $this->userName,  $this->password,  $this->dataBase,  $this->port);
        if($this->connection->connect_error)
            throw new Exception ("the connection can't be established");
        
        return $this->connection;
    }
    
    public function close()
    {
        $this->connection->close();  
    }
    
    
    
    
    
}
