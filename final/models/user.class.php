<?php

class Login{
    private $user_id, $email, $first_name, $last_name , $username, $password;
    
    public function __construct($email, $first_name, $last_name, $password){
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
      //  $this->username = $username;
        $this->password = $password;
    }
    public function getId(){
        return $this->user_id;
    }
    public function getEmail(){
        //return $this->email;
        if($this->email){
            return $this->email;
        }
        else{
            echo "Email does not exist!";
        }
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setId($id){
        $this->user_id = $id;
    }
}
?>