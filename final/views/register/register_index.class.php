<?php

class RegisterIndex extends IndexView {

    public function display() {
        parent::displayHeader("Login");
        ?>
        <html>
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <br>

                <!-- display the registration form -->
                <form method='post' action="<?= BASE_URL ?>/user/register/validate">
                    <p> Please create an account.<br><br></p>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input name="firstname" type="text" class="form-control" id="First Name">

                    </div>
                         <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input name="lastname" type="text" class="form-control" id="First Name">

                    </div>
                    <div class="form-group">
                        <label for="username">User Name:</label>
                        <input name="username" type="text" class="form-control" id="First Name">

                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button
                    <button  value="Cancel" class="btn btn-default" onclick="window.location.href = <?= BASE_URL ?>'/podcast/index'" > Cancel</button>    


                </form>
                
        </div>
        </html>

        <?php
    }

}
