<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <?php
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo $palabrasClaves; ?>"
              <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/main.css">

        <script src="../../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
<!--        [if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="jumbotron">
            <h1><?php echo $titulo; ?></h1>
            <p><?php echo $description; ?></p>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container">
                
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse in" aria-expanded="true">
                    <div id="name"><h2><?php if(isset($user->name)) echo $user->name; ?></h2></div>
                    <ul class="nav navbar-nav">
                        <li class=""><a href="../../index.php">Home</a></li>
                        <?php
                        for ($i = 0; $i < count($navegador); $i++) {
                            if ($navegador[$i]['string'] == 'Cart') {
                                echo '<li><a  id="cart" href="' . $navegador[$i]['url'] . '"><span class="glyphicon glyphicon-shopping-cart"> </span> ' . $navegador[$i]['string'] . '</a></li>';
                            } else {
                                echo '<li><a href="' . $navegador[$i]['url'] . '">' . $navegador[$i]['string'] . '</a></li>';
                            }
                        }
                        ?>
                        <li><a href="controller.php?f=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="container">
                <h2  class="col-md-2 col-md-offset-5">Latest Articles</h2>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                    <?php
                    for ($i = 0; $i < count($slide); $i++) {
                        if ($i == 0) {
                            echo '<div class = "item active">
                                        <a href="'.$slide[$i]['url'].'">
                                            <img src="../../img/'.$slide[$i]['image'].'" alt="" style="width:400px;height:400px;">
                                            <h2>' . $slide[$i]['title'] . '</h2>
                                            <p>' . $slide[$i]['description'] . '</p>
                                        </a>
                                    </div>';
                        } else {
                            echo '<div class = "item ">
                                        <a href="'.$slide[$i]['url'].'">    
                                            <img src="../../img/'.$slide[$i]['image'].'" alt="" style="width:400px;height:400px;">
                                            <h2>' . $slide[$i]['title'] . '</h2>
                                            <p>' . $slide[$i]['description'] . '</p>
                                        </a>
                                    </div>';
                        }
                    }
                    ?>
                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < count($slide); $i++) {
                            if ($i == 0) {
                                echo '<li class="active" data-target="#carousel-example-generic" data-slide-to="' . $i . '" class=""></li>';
                            } else {
                                echo '<li data-target="#carousel-example-generic" data-slide-to="' . $i . '" class=""></li>';
                            }
                        }
                        ?>
                    </ol>
                </div>


                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <br/>
        <div class="container">
            <!-- Example row of columns -->
            
            <hr>

            <footer>
                <p>&copy; Company 2015</p>
            </footer>
            
                    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="../../js/vendor/bootstrap.min.js"></script>

        <script src="../../js/main.js"></script>
        <script src="../../js/cart.js"></script>
    </body>
</html>
