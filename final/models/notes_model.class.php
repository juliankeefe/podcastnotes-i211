<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notes_model
 *
 * @author Bankoleadegboye
 */
class NotesModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblPodcastnotes;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPodcastnotes = $this->db->getPodcastNotesTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one BookModel instance
    public static function getNotesModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new NotesModel();
        }
        return self::$_instance;
    }

    /*
     * the list_book method retrieves all book from the database and
     * returns an array of book objects if successful or false if failed.
     * Books should also be filtered by category and/or sorted by titles or category if they are available.
     */

    public function list_notes() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblPodcastnotes;


        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            return false;

        //if the query succeeded, but no book was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned books
        $note = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $note = new notes(stripslashes($obj->episode), stripslashes($obj->notes), stripslashes($obj->time));

            //set the id for the book
            $note->setId($obj->note_id);

            //add the book into the array
            $notes[] = $note;
        }
        return $notes;
    }

    function deleteNotes($note_id) {
        $sql = "DELETE FROM " . $this->tblPodcastnotes . " WHERE note_id ='$note_id'";
        echo $sql;
        //execute the query
        $query = $this->dbConnection->query($sql);

        try {

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
    }

    //add a guest into the "Podcast" table in the database
    public function addNotes() {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'episode') ||
                !filter_has_var(INPUT_POST, 'notes') ||
                !filter_has_var(INPUT_POST, 'time')) {

            return false;
        }
  try {

            if ($episode == "" ||$notes=="" ||$time=="") {
                throw new DataMissingException("Please Enter a valid input");
            }
        //retrieve data for the new movie; data are sanitized and escaped for security.
        $episode = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'episode', FILTER_SANITIZE_NUMBER_FLOAT)));
        $notes = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING)));
        $time = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'time', FILTER_SANITIZE_NUMBER_FLOAT)));

        //construct an INSERT query
        $sql = "INSERT INTO " . $this->db->getPodcastNotesTable() . " VALUES(NULL, '$episode', '$notes', '$time' '')";
        $query = $this->dbConnection->query($sql);
// This is a try the operation that makes sure the database is getting the sql insert query correctly to the MYsql server.

        } catch (DataMissingException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }
      
        try {
            

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
    }

}
