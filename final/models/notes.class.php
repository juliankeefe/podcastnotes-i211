<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notes
 *
 * @author Bankoleadegboye
 */
class notes {

    //class Podcast {
    //private properties of a Book object
    private $note_id, $episode, $notes, $time;

    //the constructor that initializes all properties
    public function __construct($episode, $notes, $time) {
        $this->episode = $episode;
        $this->notes = $notes;
        $this->time = $time;
    }

    //get the id of a book
    public function getNoteId() {
        return $this->note_id;
    }

    //get the title of a book
    public function getEpisode() {
        return $this->episode;
    }

    public function getNotes() {
        return $this->notes;
    }

    //get the image file name of a book
    public function getTime() {
        return $this->time;
    }

    //set book id
    public function setId($id) {
        $this->note_id = $id;
    }

}
