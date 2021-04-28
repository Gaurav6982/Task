<?php

class DBController
{
    //databse connection property
    protected $host='localhost';
    protected $user='root';
    protected $password='';
    protected $database='task';

    //connection property
    public $conn=null;

    //call constructor
    public function __construct(){
        $this->conn=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->conn->connect_error)
        {
            echo "Fail".$this->conn->connect_error;
        }
//         echo "Success";
    }
    public function __destruct(){
        $this->closeConnection();
    }
    // for mysqli closeing conection
    public function closeConnection(){
        if($this->conn!=null)
        {
            $this->conn->close();
            $this->conn=null;
        }
    }
}


 