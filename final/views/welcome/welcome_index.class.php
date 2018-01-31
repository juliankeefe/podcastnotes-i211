<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * Name: index.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Podcast Media Library Home");

        ?>    

<!--
<img height="400" width="1000" src="http://www.imgbase.info/images/safe-wallpapers/miscellaneous/8_bit/18462_8_bit_nyan_cat.jpg ">   -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/round-about.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <br>
        <br>
    <br>
    <br>
    <br>
 <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="http://mylifechurch.info/october2016/wp-content/uploads/sites/4/2015/10/podcast-e1444392134944-750x450.png" alt="">
            </div>
            <div class="col-md-6">
                <h2>About Modern Business</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>
        <!-- /.row -->

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About Us
                    <small>It's Nice to Meet You!</small>
                </h1>
                <p>Here are our Teams that build this website.</p>
            </div>
        </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Team</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="http://i0.kym-cdn.com/entries/icons/original/000/002/252/me-gusta.jpg" alt="">
                <h3>Bankole Adegboye
                    <small>sophomore </small>
                </h3>
                <p> Bankole Adegboye is a sophomore who is majoring in Informatics with minors in japanes and loves memes .</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" style="width:200px;height:200px; " src="http://i1.kym-cdn.com/photos/images/newsfeed/001/129/809/05d.jpg" alt="">
                <h3>Julian Keefe
                    <small>senior</small>
                </h3>
                <p>Julian Keefe is  a senior informatics student with minors in business and  HCC. He LOVVVES podcasts !</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="http://i2.kym-cdn.com/photos/images/masonry/000/882/708/01e.png" alt="">
                <h3>Trevor Miller
                    <small>Sophomore</small>
                </h3>
                <p>Trevor Miller  is a sophomore who is majoring in Informatics with minors in Business and Spanish.</p>
            </div>
        
               
        </div>


                <?php
                //display page footer
                parent::displayFooter();
            }

        }
        