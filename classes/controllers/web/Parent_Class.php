<?php
require_once('../includes/Database.php');
require_once('../includes/Queries.php');
class Parent_Class{
    protected $conn;
    protected $query;
    public function __construct(){
        $this->conn = (new Database())->getConnection();
        $this->query = new Queries();

    }

    public function login($email , $password){
        $query = "SELECT * FROM patients WHERE email = '$email' AND password = '$password'";
        $result = $this->query->readDataCustom($query);
        if(sizeof($result)==1){
            return $result;
        }
        return false;
    }

    public function register($data){
        $this->query->addData($data);
        
    }
}
?>