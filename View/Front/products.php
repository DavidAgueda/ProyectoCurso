﻿<!doctype html>
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
                    <div id="name"><h2><?php if(isset($user->name)) echo $user->name; ?></h2></div>
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
            <div class="container">

                <form class="form-horizontal" method="GET" action="./controller.php?f=products">
                    <fieldset>


                        <!--                         Select Basic -->
                        <div class="form-group">
                            <input hidden id="f" name="f"  value="products" type="text">
                            <label class="col-md-4 control-label" for="type">Category</label>
                            <div class="col-md-4">
                                <select id="o" name="o" class="form-control">
                                    <?php
                                    echo '<option value="">ALL</option>';
                                    for ($i = 0; $i < count($options); $i++) {
                                        echo '<option value="' . $options[$i]['value'] . '">' . $options[$i]['string'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="type">Name</label>
                            <div class="col-md-4">
                                <input id="s" name="s"  value="" type="text">        
                            </div>
                            <!-- Button -->

                            <button  class="btn btn-primary">Send</button>
                        </div>


                    </fieldset>
                </form>
            </div>
        </nav>
<!--        <p>visitar esto para .htaccess https://www.addedbytes.com/articles/for-beginners/url-rewriting-for-beginners/</p>
        <p>Lista de cosas ha hacer</p>
        <ol>
            <li>que no puedan meter codigo en el formulario de contacto</li>
            <li>redireccionar despues del email</li>
            <li>pagina de error ( mejorar ya que el css de pende de la posicion y los enlaces tambien )</li>
            <li>crear una pagina donde mostrar varios productos (las estilo tienda o fiverr)</li>
            <li>crear fichero .htaccess</li>
            <li>crear un estilo mas atractivo</li>
            <li>rellenar los textos</li>
            <li>hacer un sistema en el que despues de pagar (paypal) puede descargar el  fichero <br> http://entredesarrolladores.com/3051/como-integrar-una-pasarela-pago-paypal-tienda-virtual-con-php</li>
        </ol>-->
        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">

                <?php
                for ($i = 0; $i < count($listProducts); $i++) {

//                    var_dump($listProducts[$i]);
                    echo '  <div class="col-md-4">
                                    <img src="../../img/' . $listProducts[$i]['img'] . '" alt="" style="width:200px;height:200px;">
                                    <h2>' . $listProducts[$i]['name'] . '</h2>
                                        <hr/>
                                    <p class="description"> ' . $listProducts[$i]['description'] . '</p>
                                    <p class="price"> ' . $listProducts[$i]['price'] . ' €</p>
                                    <p><a class="btn btn-success" href="controller.php?f=product&o=' . $listProducts[$i]['id'] . '" role="button">More &raquo;</a></p>
                                   <!-- <p><a class="btn btn-success" href="controller.php?f=product' . $listProducts[$i]['id'] . '" role="button">More &raquo;</a></p> -->
                                </div>';
                    if ((($i + 1) % 3) == 0) {
                        echo'<div class="row"></div>';
                    }
                }
                ?>

            </div>

            <hr>

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
