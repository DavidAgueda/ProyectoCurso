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
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
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
                    <ul class="nav navbar-nav">
                        <li class="activo"><a href="controller.php?f=index">Home</a></li>
                        <?php

                        for ($i = 0; $i < count($navegador); $i++) {
                            echo '<li><a href="' . $navegador[$i]['url'] . '">' . $navegador[$i]['string'] . '</a></li>';
                        }
                        ?>
                        <li><a href="controller.php?f=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <!-- Example row of columns -->
            
            <?php
//                                    var_dump($clientList);
            ?>
            <div class="row">
                Busqueda por nombre:
                Por email:
                Por numero de telefono:
                por pais:
                por region:
                por ciudad:
                
            </div>
            <div class="row">
                <table class="table">

                    <tbody>
                        
                        <?php for ($i = 0; $i < count($clientList); $i++) { ?>
                            <tr>
                                <td>
                                    <ul>
                                    <li><b>Name : </b> <?php echo $clientList[$i]['name'] ?></li>
                                    <li><b>LastName : </b><?php echo $clientList[$i]['lastName'] ?></li>
                                    <li><b>backorder: </b><?php echo $clientList[$i]['backorder'] ?></li>
                                    <li><b>Number of orders : </b><?php echo $clientList[$i]['nOrders'] ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><b>Email : </b> <?php echo $clientList[$i]['email'] ?></li>
                                        <li><b>Telephone : </b> <?php echo $clientList[$i]['telephone'] ?></li>
                                    </ul>
                 
                                    <hr>
                                    <button onclick="hiddenAddress(this)">Address</button>
                                    
                                        <p class="address"><?php echo $clientList[$i]['Address']['n'].' '. $clientList[$i]['Address']['streer']. ' <br/>'
                                                .$clientList[$i]['Address']['city'].' <br/>'
                                                .$clientList[$i]['Address']['region'].' <br/>'
                                                .' CP '.$clientList[$i]['Address']['zipCode'].' <br/>'
                                                .$clientList[$i]['Address']['country'].' <br/>'; ?>
                                    
                                </td>
<!--                                <td><?php echo $listProductsCart[$i]['price'] ?></td>-->
                                <td> <a class ="btn-danger" href="controller.php?f=client">Change </a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <hr>

            <footer>
                <p>&copy; Company 2015</p>
            </footer>
            
                    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="../../js/vendor/bootstrap.min.js"></script>

        <script src="../../js/main.js"></script>
        
        <script>
            $(document).ready(function(){
                $('.address').hide();
            })
            function hiddenAddress(button){
//                console.log(button);
                console.log();
                $(button).next().toggle();
            }
        </script>
            
  
    </body>
</html>
