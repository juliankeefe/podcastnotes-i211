<?php
/*
 * Author: Bankole Adegboye
 * Date: April 6, 2017
 * Name: book_view.class.php
 * Description: This class defines a method "display".
 *              The method accepts a book object and displays the details of the book in a table.
 */

class PodcastDetail extends PodcastIndexView {

    public function display($podcast, $confirm = "") {
        //display page header
        parent::displayHeader("Podcast Details");


        //retrieve book details by calling get methods
        $id = $podcast->getid();
        $title = $podcast->getTitle();
        $category = $podcast->getCategory();
        $image = $podcast->getImage();
        $description = $podcast->getDescription();


//        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//            $image = BASE_URL . '/' . BOOK_IMG . $image;
//        }
        ?>

        <div id="main-header">Podcast Details</div>
        <hr>
        <!-- display book details in a table -->
        <table id="detail">

            <tr>

                <td style="width: 150px; margin-left:34%; padding:3px 16px; height:1000px;">
                    <img src="<?= $image ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 130px; margin-left:25%; padding:1px 16px; height:100px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>Category:</strong></p>
                    <p><strong>Description:</strong></p>

                </td>
                <td>
                    <p><?= $title ?></p>
                    <p><?= $category ?></p>                
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                    <a href="<?= BASE_URL ?>/podcast/index">Go to podcast list</a>

                </td>
            </tr>
        </table>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method 
}
