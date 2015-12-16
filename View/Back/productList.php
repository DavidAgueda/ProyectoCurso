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
            
            nav label{
                color: white;
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
                        <li class="activo"><a href="../../index.php">Home</a></li>
                        <?php
                        for ($i = 0; $i < count($navegador); $i++) {
                            echo '<li><a href="' . $navegador[$i]['url'] . '">' . $navegador[$i]['string'] . '</a></li>';
                        }
                        ?>
                        <li><a href="controller.php?f=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
                        <div class="container">

                <form class="form-horizontal" method="GET" action="./controller.php?f=products">
                    <fieldset>


                        <!--                         Select Basic -->
                        <div class="form-group">
                            <input hidden id="f" name="f"  value="productList" type="text">
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
                            <label class="col-md-4 control-label" for="type">Send</label>
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

        <div class="container">
            <!-- Example row of columns -->

            <?php
//                                    var_dump($listProducts);
            ?>
            <div class="row">
                <p><a  class ="btn btn-info glyphicon glyphicon-plus" href="controller.php?f=product" roll="button">Add Product </a></p>

            </div>
            <div class="row">
                <table class="table">

                    <tbody>

                        <?php for ($i = 0; $i < count($listProducts); $i++) { ?>
                            <tr>
                                <td>
                                    <p><b>ID : </b> <?php echo $listProducts[$i]['id'] ?></p>
                                </td>
                                <td>
                                    <ul>
                                        <li><b>Name : </b> <?php echo $listProducts[$i]['name'] ?></li>
                                        <li><b>Small Description : </b><?php echo $listProducts[$i]['description'] ?></li>
                                        <li><b>Long Description: </b><?php echo $listProducts[$i]['longDescription'] ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <img class="thumbnail" src="../../img/<?php echo $listProducts[$i]['img'] ?>" alt="" style="width:200px;height:200px;">



                                </td>
                                <td>
                                    <p><b>Price : </b><?php echo $listProducts[$i]['price'] ?></p>



                                </td>
                                
    <!--                                <td><?php echo $listProducts[$i]['price'] ?></td>-->
                                <td> <a  class ="btn btn-danger glyphicon glyphicon-pencil" href="controller.php?f=product&o=<?php echo $listProducts[$i]['id'] ?>" roll="button">Change </a></td>
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
            $(document).ready(function () {
                $('.address').hide();
            })
            function hiddenAddress(button) {
//                console.log(button);
                console.log();
                $(button).next().toggle();
            }
        </script>


    </body>
</html>
