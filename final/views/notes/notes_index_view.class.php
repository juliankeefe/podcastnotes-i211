<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of podcast_index_view
 *
 * @author Bankoleadegboye
 */
class NotesIndexView  extends IndexView {
  public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "podcast";
            
        </script>
        
<!--        create the search bar 
            <form method="get" action="<?= BASE_URL ?>/podcast/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search movies by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>-->
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }}
