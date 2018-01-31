<?php

/*
 * Author: Bankole Adegboye
 * Date: April 6, 2017
 * File: movie_controller.class.php
 * Description: the book controller 
 *
 */

class PodcastController {

    private $podcast_model;

    //default constructor
    public function __construct() {
        //create an instance of the Podcast Model class
        $this->podcast_model = PodcastModel::getPodcastModel();
    }

    //index action that displays all books
    public function index() {
        //retrieve all books and store them in an array
        $podcasts = $this->podcast_model->list_podcast();

                  try{
            
        if (!$podcasts) {
       
            throw new DataMissingException("There was a problem displaying movies.");
     
            }

        }catch (DataMissingException $e) {   
            $message = $e->getMessage();   
        $guesterro= new PodcastError();
        $guesterro->display($message);
        exit();
        
        }
        // display all books
        $view = new PodcastIndex();
        $view->display($podcasts);
    }

    //show details of a book
    public function detail($id) {
        //retrieve the specific book
        $podcast = $this->podcast_model->view_podcast($id);
        
             try{
            
        if (!$podcast) {
       
            throw new DataMissingException("There was a problem displaying the podcast id='" . $id . "'.");
     
            }

        }catch (DataMissingException $e) {   
            $message = $e->getMessage();   
        $guesterro= new PodcastError();
        $guesterro->display($message);
        exit();
        
        }

        //display book details
        $view = new PodcastDetail();
        $view->display($podcast);
    }

    //search movies
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query_terms']);

        //if search term is empty, list all movies

        try {

            if ($query_terms == "") {
                throw new DataMissingException("Please Enter a valid input");
            }
        } catch (DataMissingException $e) {
            $message = $e->getMessage();
            $guesterro = new PodcastError();
            $guesterro->display($message);
            exit();
        }

        //search the database for matching movies
        $podcasts = $this->podcast_model->search_podcast($query_terms);

             try{
            
        if ($podcasts === false) {
       
            throw new DataMissingException("An error has occurred.");
     
            }

        }catch (DataMissingException $e) {   
            $message = $e->getMessage();   
        $guesterro= new PodcastError();
        $guesterro->display($message);
        exit();
        
        }
        //display matched movies
        $search = new PodcastSearch();
        $search->display($query_terms, $podcasts);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $podcasts = $this->podcast_model->search_podcast($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($podcasts) {
            foreach ($podcasts as $podcast) {
                $titles[] = $podcast->getTitle();
            }
        }

        echo json_encode($titles);
    }

    public function add() {

        $podcast_model = $this->podcast_model->addPodcast();

        $view = new PodcastAdd();

        $confirm = "The podcast was successfully added.";

        $view->display($confirm);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new PodcastError();

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
