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
        <!--[if lt IE 8]>
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
                    <div id="name"><h2><?php if (isset($user->name)) echo $user->name; ?></h2></div>
                    <ul class="nav navbar-nav">
                        <li class="activo"><a href="../../index.php">Home</a></li>
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
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">

                <table class="table">

                    <tbody>
                        <?php
                        if (isset($listProductsCart)) {
                            for ($i = 0; $i < count($listProductsCart); $i++) {
                                ?>
                                <tr>
                                    <td>
                                        <img src="../../img/<?php echo $listProductsCart[$i]['img'] ?>" alt="" style="width:150px;height:150px;">
                                    </td>
                                    <td>
                                        <h3><?php echo $listProductsCart[$i]['name'] ?></h3>
                                        <p class="description"><?php echo $listProductsCart[$i]['description'] ?></p>
                                    </td>
                                    <td class="price"><?php echo $listProductsCart[$i]['price'] .'&nbsp;€' ?></td>
                                    <td><button  onclick="removeCookie(<?php echo $listProductsCart[$i]['id'] ?>)" class ="bnt btn-danger" role="button">remove from cart </button></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>

            </div>

            <hr>
            <div>
                <p class=>Total price : <span class="price"><?php echo $totalPrice ?> € </span> </p>
                <br>
            </div>
            <div>
                <?php
                    if (isset($_SESSION['idRow'])) {
                        echo    '<a class="btn btn-success glyphicon " href="" roll="button">VALIDATE PURCHASE</a>';
                    }else{
                        echo    '<a class="btn btn-danger glyphicon " href="controller.php?f=login" roll="button">To connect</a>    
                                <a class="btn btn-danger glyphicon " href="controller.php?f=myProfil" roll="button">Fegister</a> ';
                    }
                
                ?>
                
                <br>
            </div>

            <footer>
                <p>&copy; Company 2015</p>
            </footer>
        </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="../../js/vendor/bootstrap.min.js"></script>

        <script src="../../js/main.js"></script>
        <script src="../../js/cart.js"></script>
    </body>
</html>
