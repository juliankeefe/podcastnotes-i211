<?php

/*
 * Author: Bankole Adegboye
 * Date: Mar 6, 2016
 * File: database,class.php
 * Description: Description: the Database class sets the database details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'podcast_db',
        'tblPodcast' => 'podcast',
        'tblPodcastCategories' => 'podcast_categories',
        'tblUsers' => 'users',
        'tblnotes' => 'podcast_notes'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
     try{
            
        if (mysqli_connect_errno()!= 0) {
       
            throw new DatabaseException("Connecting to database failed: " . mysqli_connect_error());
     
            }

        }catch (DatabaseException $e) {   
            $message = $e->getMessage();   
        $guesterro= new PodcastError();
        $guesterro->display($message);
        exit();
        
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores movies
    public function getPodcastTable() {
        return $this->param['tblPodcast'];
    }

    //return the name of the table that stores book categories
    public function getPodcastCategoryTable() {
        return $this->param['tblPodcastCategories'];
    }

    public function getPodcastNotesTable() {
        return $this->param['tblnotes'];
    }

    public function getUsersTable() {
        return $this->param['tblUsers'];
    }

}
