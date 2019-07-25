<?php
class Database{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "bci";
    public  $conn;
    public $dsn = 'mysql:host=$host;dbname=$db';

    public function  __construct()
    {
        $this->getConnection();
    }
    public  function getConnection(){
        try
        {
            $this->conn=new PDO('mysql:dbname=bci;host=127.0.0.1','root','');
        }
        catch (PDOException $e)
        {
            echo "Error".$e->getMessage();
        }
    }
}