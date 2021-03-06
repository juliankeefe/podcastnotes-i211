<?php

/*
 * Author: Bankoole Adegboye
 * Date: April 5, 2017
 * File: book_error.class.php
 * Description: if their is a case where the books cannot be found this page is available to direct user to the homepage.
 *
 */
class NotesError extends PodcastIndexView {
 public function display($message) {

        //display page header
        parent::displayHeader("Error");
        ?>

        <div id="main-header">Error</div>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='<?= BASE_URL ?>/www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><hr>
        <a href="<?= BASE_URL ?>/podcast/index">Back to Podcast list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }}
