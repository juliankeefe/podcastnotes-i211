<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notes_controller
 *
 * @author Bankoleadegboye
 */
class NotesController {

    private $notes_model;

    //default constructor
    public function __construct() {
        //create an instance of the Podcast Model class
        $this->notes_model = NotesModel::getNotesModel();
    }

    //index action that displays all books
    public function index() {
        //retrieve all books and store them in an array
        $notes = $this->notes_model->list_notes();

        try {

            if (!$notes) {

                throw new NoteErrorException("There was a problem displaying notes.");
            }
        } catch (NoteErrorException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }
        // display all books
        $view = new NotesIndex();
        $view->display($notes);
    }

    //show details of a book
    public function detail($id) {
        //retrieve the specific book
        $notes = $this->notes_model->view_notes($id);


        try {

            if (!$notes) {

                throw new NoteErrorException("There was a problem displaying the  id='" . $id . "'.");
            }
        } catch (NoteErrorException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }

        //display book details
        $view = new NotesDetail();
        $view->display($notes);
    }

    public function edit($id) {
        //retrieve the specific movie
        $notes = $this->notes_model->view_notes($id);


        try {

            if (!$notes) {

                throw new NoteErrorException("There was a problem displaying the  id='" . $id . "'.");
            }
        } catch (NoteErrorException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }

        $view = new NotesEdit();
        $view->display($notes);
    }

    public function add() {

        $notes_model = $this->notes_model->addNotes();

        $view = new NotesAdd();

        $confirm = "The podcast was successfully added.";
        $view->display($confirm);
    }

    public function delete($id) {



        $delete = $this->notes_model->delete_note($id);



        try {

            if (!$delete) {

                throw new NoteErrorException("We are unable to delete this note");
            }
        } catch (NoteErrorException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }

      
        
        $view = new NotesEdit();
        $view->display($notes);

        $ships = $this->notes_model->list_note();

        $view = new NotesIndex();
        $view->display($ships);




        $notes_model = $this->notes_model->deleteNotes($note_id);

        $view = new NotesDelete();

        $confirm = "The podcast was successfully deleted.";
        $view->display($confirm);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new NotesError();

        //display the error page

        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}
