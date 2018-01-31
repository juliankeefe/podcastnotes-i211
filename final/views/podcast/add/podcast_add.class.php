<?php
/*
 * Author: Bankole adegboye
 * Date: Mar 27, 2016
 * File: movie_edit.class.php
 * Description: the display method in the class displays movie details in a form.
 *
 */
class PodcastAdd extends PodcastIndexView {
    


    public function display() {
        //display page header
        parent::displayHeader("Add Podcast");
     
  if (isset($_SESSION['podcast_categories'])) {
            $categories = $_SESSION['podcast_categories'];
        }
                ?>
<br>
<br>
<br>
<br>
<br>

        <div id="main-header">Add Podcast</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/podcast/add"?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <p><strong>Title</strong><br>
                <input name="title" type="text" size="100" value=""></p>
                          <p><strong>Category:</strong>
                <?php
                foreach ($categories as $p_category => $p_id) {
                    $checked = ($categories == $p_category ) ? "checked" : "";
                    echo "<input type='radio' name='category' value='$p_id' $checked> $p_category &nbsp;&nbsp;";
                }
                ?>
            </p>
            
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" value="">
            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"></textarea></p>
            <input type="submit" class="btn btn-primary" name="action" value="Add Podcast">
            <input type="button" class="btn btn-primary" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/podcast/index/"?>"'>  
        </form>
        
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method your code here
}

