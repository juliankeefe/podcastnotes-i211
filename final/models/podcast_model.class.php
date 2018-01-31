<?php

/*
 * Author: Bankole Adegboye
 * Date: April 5, 2017
 * File: book_model.class.php
 * Description: the book model
 * 
 */

class PodcastModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblPodcast;
    private $tblPodcastCategories;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPodcast = $this->db->getPodcastTable();
        $this->tblPodcastCategories = $this->db->getPodcastCategoryTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }


        //initialize book categories
        if (!isset($_SESSION['podcast_categories'])) {
            $categories = $this->get_podcast_category();
            $_SESSION['podcast_categories'] = $categories;
        }
    }

    //static method to ensure there is just one BookModel instance
    public static function getPodcastModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new PodcastModel();
        }
        return self::$_instance;
    }

    /*
     * the list_book method retrieves all book from the database and
     * returns an array of book objects if successful or false if failed.
     * Books should also be filtered by category and/or sorted by titles or category if they are available.
     */

    public function list_podcast() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblPodcast . "," . $this->tblPodcastCategories .
                " WHERE " . $this->tblPodcast . ".category=" . $this->tblPodcastCategories . ".category_id";

        //execute the query
          try {
        $query= $this->dbConnection->query($sql);

            if (!$query) {

                $errmsg = $this->dbConnection->error;
                throw new DatabaseException("Location: index.php?action=error&message=$errmsg");
            }
        } catch (DatabaseException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        } 
        //if the query succeeded, but no book was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned books
        $podcast = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $podcast = new Podcast(stripslashes($obj->title), stripslashes($obj->category), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $podcast->setId($obj->id);

            //add the book into the array
            $podcasts[] = $podcast;
        }
        return $podcasts;
        
    }

    /*
     * the viewBook method retrieves the details of the book specified by its id
     * and returns a book object. Return false if failed.
     */

    public function view_podcast($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblPodcast . "," . $this->tblPodcastCategories .
                " WHERE " . $this->tblPodcast . ".category=" . $this->tblPodcastCategories . ".category_id" .
                " AND " . $this->tblPodcast . ".id='$id'";

        //execute the query
          try {
        $query= $this->dbConnection->query($sql);

            if (!$query) {

                $errmsg = $this->dbConnection->error;
                throw new DatabaseException("Location: index.php?action=error&message=$errmsg");
            }
        } catch (DatabaseException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        } 
        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $podcast = new Podcast(stripslashes($obj->title), stripslashes($obj->category), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $podcast->setId($obj->id);

            return $podcast;
        }

        return false;
    }

    //search the database for movies that match words in titles. Return an array of movies if succeed; false otherwise.
    public function search_podcast($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        $sql = "SELECT * FROM " . $this->tblPodcast . "," . $this->tblPodcastCategories .
                " WHERE " . $this->tblPodcast . ".category=" . $this->tblPodcastCategories . ".category_id" .
                " AND " . $this->tblPodcast  . ".id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query

        // the search failed, return false. 
         try {
        $query= $this->dbConnection->query($sql);

            if (!$query) {

                $errmsg = $this->dbConnection->error;
                throw new DatabaseException("Location: index.php?action=error&message=$errmsg");
            }
        } catch (DatabaseException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        } 

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $podcasts = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
               $podcast = new Podcast(stripslashes($obj->title), stripslashes($obj->category), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $podcast->setId($obj->id);

            //add the book into the array
            $podcasts[] = $podcast;
        }
        return $podcasts;
    }
    
      //add a guest into the "Podcast" table in the database
    public function addPodcast() {  
           //if the script did not received post data, display an error message and then terminite the script immediately
         if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'category') || 
                !filter_has_var(INPUT_POST, 'description')){

            return false;
        }
try {

            if ($title == ""||$category==""||$image==""||$description="") {
                throw new DataMissingException("Please Enter a valid input");
            }
       
        //retrieve data for the new movie; data are sanitized and escaped for security.
        $title = $this->dbConnection-> real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $category = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
        
        //construct an INSERT query(
        $sql = "INSERT INTO " . $this->db->getPodcastTable(). " VALUES(NULL,'$title', '$category', '$image', '$description')";
    //query string for update 
// This is a try the operation that makes sure the database is getting the sql insert query correctly to the MYsql server.
 //execute the query
         } catch (DataMissingException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }
        
        try {
        $query= $this->dbConnection->query($sql);

            if (!$query) {

                $errmsg = $this->dbConnection->error;
                throw new DatabaseException("Location: index.php?action=error&message=$errmsg");
            } else{
                header("Location: ../podcast/index");
            }
        } catch (DatabaseException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }     
    }
        
       
    
     

    //get all book category
    private function get_podcast_category() {
        $sql = "SELECT * FROM " . $this->tblPodcastCategories;

        //execute the query

    try {
        $query= $this->dbConnection->query($sql);

            if (!$query) {

                $errmsg = $this->dbConnection->error;
                throw new DatabaseException("Location: index.php?action=error&message=$errmsg");
            }
        } catch (DatabaseException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }  
        //loop through all rows
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $categories[$obj->category] = $obj->category_id;
        }
        return $categories;
    }
}
    


