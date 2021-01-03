<?php

class Database{
    private $host;
    private $user;
    private $password;
    private $dbname;

    public function __construct(){
        $this->host=HOST;
        $this->user=USER;
        $this->password=PASSWORD;
        $this->dbname=DBNAME;
        
        
    }

    public function connect(){
        

        $dsn="mysql:host=".$this->host.";dbname=".$this->dbname;
        
        try{
            $pdo=new PDO($dsn,$this->user,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }catch(Exception $e){
            die('Error:-'.$e->getMessage());
        }
    }
    
}