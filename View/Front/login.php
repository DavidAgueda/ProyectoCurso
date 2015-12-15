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

        <style>


            .sobrepuesto{
                position: fixed;
                top: 0px;
                left: 0px;
                z-index: 3;
                height: 100%;
                width: 100%;
                background-color: rgba(50,50,50,0.8);

            }
            .login{
                position: relative;
                top: 40%;
                left: 40%;
                background-color: #ffffff;
                height: 150px;
                width: 250px;
                /*                padding:10px;*/
                border: solid 3px #ccc;
                box-shadow: 10px 20px 10px #000;
            }
            .login button{
                float: right;
                margin: 0px;
                background-color: #ff3333;
                border: none;
                color:#000;

            }
            .login form{
                width: 80%;
                margin: 0px auto;
                clear: both;
            }

            .login form input{
                margin: 5px;
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

                        <li><a href="controller.php?f=contact">Contact</a></li>
                    </ul>
                </div>
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
//            if (!$viewLogin) {
//                
                ?>
                <div class="sobrepuesto">
                    <div class="login">

                        <a href="controller.php?f=index"><button>X</button></a>
                        <form method="POST">
                            <input type="text" name="user"><br/>
                            <input type="password" name="pass"><br/>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                </div>
                <?php
//            }
                ?>

            </div>

            <hr>

            <footer>
                <p>&copy; Company 2015</p>
            </footer>

        </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="../../js/vendor/bootstrap.min.js"></script>

        <script src="../../js/main.js"></script>
        <script src="../../js/cart.js"></script>
        <script src="../../js/vendor/jquery-ui.js"></script>
        <script type="text/javascript">
            $.widget('custom.win', {
                options: {
                    drag: true
                },
                _create: function () {
                    if (this.options.drag) {
                        this.element.draggable({cursor: "move", cursorAt: {top: 0, left: 0}});
                    }
                }
            }

            );

            $('.login').win();

        </script>
    </body>
</html>
