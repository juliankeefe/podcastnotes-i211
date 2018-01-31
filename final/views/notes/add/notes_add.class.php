<?php
/*
 * Author: Bankole adegboye
 * Date: Mar 27, 2016
 * File: movie_edit.class.php
 * Description: the display method in the class displays movie details in a form.
 *
 */
class NotesAdd extends NotesIndexView {
    


    public function display() {
        //display page header
        parent::displayHeader("Add Note");
     
 
        
//         $category = $podcast->getCategory();
        ?>
<br>
<br>
<br>
<br>
<br>


        <div id="main-header">Add Notes</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/notes/add"?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <p><strong> Episode: </strong><br>
                <input name="episode" type="number" size="100" value=""  ></p>            
            <p><strong>Time</strong>:<br>
                <input type="date" name="time" >
  <p><strong>Notes</strong><br>
                 <textarea name="notes" rows="8" cols="100"></textarea></p>
  
                <input type="submit"  class="btn btn-outline-success" name="action" value="Add Podcast">
            <input type="button" class="btn btn-outline-warning" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/notes/index/"?>"'>  
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method your code here
}

