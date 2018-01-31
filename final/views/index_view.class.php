<?php
/*
 * Author: Bankole Adegboye 
 * Date: Mar 6, 2016
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
      
        //variables for users login, name, and role
        $login = '';
        $name = '';
        $role = 0;
        $id = 1;
//if the user has logged in, retrieve login, name, and role
        if (isset($_SESSION['login'])AND isset($_SESSION['name'])AND isset($_SESSION['role'])) {
            $login = $_SESSION['login'];
            $name = $_SESSION['name'];
            $role = $_SESSION['role'];
            // $id = $_SESSION['id'];
        }
        
        ?>

        <!DOCTYPE html>
        <html>
<!--            <head>
                <title> <?php echo $page_title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";

   
                </script>

            </head>
            <body>

                <ul>  

                    <li><a class="active" href="<?= BASE_URL ?>/index">Home</a></li>
                    <li><a href="<?= BASE_URL ?>/notes/index">Notes</a></li>

                    <li><a href="<?= BASE_URL ?>/podcast/index">Browse</a></li>
                    <li id="search">
                        
                                                <div id="suggestionDiv"></div>
                    </li>
                 
                        
                </ul>-->
                   
        <title><?php echo $page_title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href=" <?= BASE_URL ?>/www/css/style.css" />
    </head>
    
    <body style="background-color: <?php echo $bgcolor ?>">

        <!--Bootstrap code -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=" <?=BASE_URL?>/index"><img src=" <?= BASE_URL ?> /www/img/logo_1.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                    <li><a class="active" href="<?= BASE_URL ?>/index">Home</a></li>
                    <li><a href="<?= BASE_URL ?>/notes/index">Notes</a></li>

                    <li><a href="<?= BASE_URL ?>/podcast/index">Browse</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (empty($login)) {
                            echo "<li><a href='", BASE_URL, "/user/register'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                            echo "<li><a href='", BASE_URL, "/user/login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        } else {
                       
                            echo "<li class=\"dropdown\">
                                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">", $name,
                            "<span class = \"caret\"></span></a>";
                            echo "<ul class=\"dropdown-menu\">
                                <li><a href='", BASE_URL,"/user/account'>Edit Appearance</a></li>
                                <li><a href='", BASE_URL,"/user/logout'>Logout</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
   
                
                <?php
            }

//end of displayHeader function
            //this method displays the page footer
            public static function displayFooter() {
                ?>
                <br><br><br>

                <div id="footer">
    <hr width="95%" />
    &copy <?php echo date("Y") ?> Podcast Jams.inc All Rights Reserved.
</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    }

}

//end of displayFooter function

