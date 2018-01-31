<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class UserController {

    private $user_model;

    public function __construct() {
        $this->user_model = UserModel::getUserModel();
        
    }
    
    public function index() {

        $view = new LoginIndex();
        $view->display();
    }

    public function register() {
  $view = new RegisterIndex();
        $view->display();    }

    public function insert() {
        // add user
    }

    public function login() {

        $view = new LoginIndex();
        $view->display();
    }

    public function validate() {
        $login = $this->user_model->userLogin();

        if (!$login) {
            $message = "An error has occured while trying to log in.";
            $this->error($message);
            return;
        }
    $view = new WelcomeIndex();
        $view->display();
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

//unset all the session variables
        $_SESSION = array();

//delete the session cookies
        setcookie(session_name(), "", time() - 3600);

//destroy the session 
        session_destroy();


        $view = new WelcomeIndex();
        $view->display();
    }
    
 

}
