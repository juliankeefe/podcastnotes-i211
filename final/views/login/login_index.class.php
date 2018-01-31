<?php

class LoginIndex extends IndexView{
    public function display() {
        parent::displayHeader("Login");
?>

    <br>
    <br>
    <center><h2>Login</h2></center>
<!--</ul>-->
<?php
$message = "Please enter your username and password to login.";
//check the login status
$login_status = '';
if (isset($_SESSION['login_status'])) {
     echo $login_status =  $_SESSION ['login_status'];
}
//the users last login attempt succeeded 
if ($login_status == 1) {
    echo "<center><p>You are logged in as " . $_SESSION['login'] . ".</p></center>";
    echo "<center><a href='logout.php'>Log out</a></center><br />";
    exit();
}
//the user has just registered
if ($login_status == 3) {
    echo "<center><p>Thank you for registering with us. Your account has been created.</p></center>";
    echo "<center><a href='logout.php'>Log out</a><br /></center>";
    exit();
}
//the users last login attempt failed
if ($login_status == 2) {
    $message = "Username or password was invalid. Please try again.";
}
 $_SESSION['login_status']=0;
   echo $_SESSION['login_status'];
?>
<div class="container">
        <!-- display the login form -->
        <form method='post' action="<?=BASE_URL?>/user/validate">
           <div class="form-group">
    <label name="username">Username:</label>
    <input  name='username'  class="form-control" id="email" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button
                        <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'" />     
                 
 
        </form>

</div>
<?php
}
}