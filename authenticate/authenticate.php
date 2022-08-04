<?php

class authenticate {
    private $servername = "localhost";
    private $username =  "root";
    private $password = '';
    private $db = "phppractice";
    public $con;
    public $errors = [];

    public function __construct(){
        $this->con = new mysqli($this->servername,$this->username, $this->password, $this->db);
        return $this->con;
    }

    public function addUser($post){
        $name = $this->con->escape_string($_POST['name']);
        $email = $this->con->escape_string($_POST['email']);
        $password = $this->con->escape_string($_POST['password']);

        if (isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "SELECT * FROM `users` where email = '$email'";
                $result = $this->con->query($sql);
                if ($result->num_rows>0){
                    $this->errors[] = "User already exist";
                } else {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
                    $this->con->query($sql);
                }
            } else {
                $this->errors[] =  "Please enter a valid email";
            }
        } else {
            $this->errors[] = "Please fill all the fields";
        }
    }

    public function login($post){
        $email = $this->con->escape_string($_POST['email']);
        $password = $this->con->escape_string($_POST['password']);
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = $this->con->query($sql);

        if ($result->num_rows>0){
            $row = $result->fetch_assoc();
            if ($email === $row['email'] && $password === $row['password']){
                $_session['user'] = array(
                    "email" => $email,
                    
                );
            }
        }
    }

    public function getErrors(){
        return $this->errors;
    }
}