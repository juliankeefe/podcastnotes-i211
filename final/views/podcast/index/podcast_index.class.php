<?php
/*
 * Author:Bankole Adegboye
 * Date: April 6, 2017
 * Name: book_index.class.php
 * Description: This class defines a method called "display", which displays all book.
 */

class PodcastIndex extends PodcastIndexView {
    /*
     * the display method accepts an array of book objects and displays
     * them in a grid.
     */

    public function display($podcasts) {
        //display page header
        parent::displayHeader("List All Podcast");
        ?>


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";


                </script>

        <div id="main-header"> Podcast in the Library</div>

            <div class = "container">     
                    <form  method="get" action="<?= BASE_URL ?>/podcast/search">
                            <input type="text" name="query_terms" id="search_text" placeholder="Search"autocomplete="off" onkeyup="handleKeyUp(event)"/>
                            <button type="submit" name="search_button" id="search_button" >Go</button>
                     
                       </form>
                          <div id="suggestionDiv"></div>

                          <br>
                <input type="button" class="btn btn-lg btn-primary"  value="Add Podcast" onclick="window.location.href = '<?= BASE_URL ?>/podcast/add/'">  
                          <br>
                          <br>

                <?php
                if ($podcasts === 0) {
                    echo "No pocast was found.<br><br><br><br><br>";
                } else {
                    //display books in a grid; six book per row 

                    foreach ($podcasts as $i => $podcast) {
                        $id = $podcast->getId();
                        $title = $podcast->getTitle();
                        $category = $podcast->getCategory();
                        $image = $podcast->getImage();
//                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//                        $image = BASE_URL . "/" . BOOK_IMG . $image;
//                    }
                        if ($i % 3 == 0) {
                            echo "<div class='row'>";
                        }
                        echo "<div class='wrapper'><p><a href='", BASE_URL, "/podcast/detail/$id'><img class = 'img_display'  width='300' height='200' src='" . $image .
                        "'></a><p class ='text'>$title<br> $category<br>" . "</p></p></div>";
                        ?>

                        <?php
                        if ($i % 3 == 5 || $i == count($podcasts) - 1) {
                            echo "</div>";
                        }
                    }
                }
                ?>  

            </div>
                     <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
