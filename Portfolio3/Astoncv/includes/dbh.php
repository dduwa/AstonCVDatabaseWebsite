<?php

class Dbh {
    private $host = "localhost";
    private $user = "u-210044641";
    private $pwd = "G2Rv9Ds6kDtmMNt";
    private $dbName = "u_210044641_astoncv";

    protected function connect() { 
        try{
       
        $dsn = 'mysql: host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

        }catch (PDOException $ex) {
            print "Error!: " . $ex->getMessage() . "<br/>";


        }
    
       
    }
}
