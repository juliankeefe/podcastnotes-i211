<?php
/*
 * Author:Bankole Adegboye
 * Date: April 6, 2017
 * Name: book_index.class.php
 * Description: This class defines a method called "display", which displays all book.
 */

class NotesIndex extends NotesIndexView {
    /*
     * the display method accepts an array of book objects and displays
     * them in a grid.
     */

    public function display($notes) {
        //display page header
        parent::displayHeader("The Note view");
        ?>
<br>
<br>
<br>
        <div id="main-header">The Note View </div>

        <div class="container">
            <input type='button'  value="Add Notes" onclick="window.location.href = '<?= BASE_URL ?>/notes/add/'"> 




                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Episode</th>
                            <th>Notes</th>
                            <th>Time</th>
                        </tr>
                    </thead>


                    <?php
                    if ($notes === 0) {
                        echo "No notes was found.<br><br><br><br><br>";
                    } else {
                        //display books in a grid; six book per row 

                        foreach ($notes as $note) {
                            $note_id = $note->getNoteId();
                            $episode = $note->getEpisode();
                            $Notee = $note->getNotes();
                            $time = $note->getTime();
                          
                            
                            echo " <tr> <td> $episode </td> <td>$Notee</td> <td > $time</td></tr>
                         ";
                          
 
                            
                            
                            ?>
                    
                    <br>

                        <?php
                    }
                }
    

                ?>  
                </table>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
