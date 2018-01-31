<?php

/*
 * Author: Bankole Adegboye
 * Date: March 30, 2016
 * Name: podcast.class.php
 * Description: the Book class models a real-world book.
 */

class Podcast {

    //private properties of a Book object
    private $id, $title, $category, $image, $description;

    //the constructor that initializes all properties
    public function __construct($title, $category, $image, $description) {
        $this->title = $title;
        $this->category = $category;
        $this->image = $image;
        $this->description = $description;
    }

    //get the id of a book
    public function getId() {
        return $this->id;
    }

    //get the title of a book
    public function getTitle() {
        return $this->title;
    }

    public function getCategory() {
        return $this->category;
    }

    //get the image file name of a book
    public function getImage() {
        return $this->image;
    }

    //get the description of a book
    public function getDescription() {
        return $this->description;
    }

    //set book id
    public function setId($id) {
        $this->id = $id;
    }

}
