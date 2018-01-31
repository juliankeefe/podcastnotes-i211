<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * Name: search.class.php
 * Description: this script defines the SearchMovie class. The class contains a method named display, which
 *     accepts an array of Movie objects and displays them in a grid.
 */

    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */
class PodcastSearch extends PodcastIndexView {


     public function display($terms, $podcasts) {
        //display page header
        parent::displayHeader("Search Results");
        ?>


        <br>
        <br>
        <br>
        <br>
        <br>

        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($podcasts)) ? "( 0 - 0 )" : "( 1 - " . count($podcasts) . " )");
            ?>
        </span>
        <hr>

       <!-- display all records in a grid -->
               <div class="grid-container">
            <?php
           
            if ($podcasts === 0) {
                echo "No podcast was found.<br><br><br><br><br>";
            }
            
            
            else {
                //display movies in a grid; six movies per row
                foreach ($podcasts as $i => $podcast) {
                    $id = $podcast->getId();
                    $title = $podcast->getTitle();
        $category = $podcast->getCategory();
        $image = $podcast->getImage();
//                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//                        $image = BASE_URL . "/" . MOVIE_IMG . $image;
//                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                 echo "<div class='wrapper'><p><a href='", BASE_URL, "/podcast/detail/$id'><img class = 'img_display'  width='300' height='200' src='" . $image .
                    "'></a><p class ='text'>$title<br> $category<br>" . "</p></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($podcasts) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <a href="<?= BASE_URL ?>/podcast/index">Go to Podcast list</a>
        <?php
        //display page footer
        parent::displayFooter();
    
     }  

}




