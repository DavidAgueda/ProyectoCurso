<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <?php
//    var_dump($user);
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
                    <div id="name"><h2><?php if(isset($user->name)) echo $user->name; ?></h2></div>
                    <ul class="nav navbar-nav">
                        <li class="activo"><a href="controller.php?f=index">Home</a></li>
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

        <div class="container">
            <!-- Example row of columns -->

            <?php ?>
            <div class="row">
                <p id="mensaje"></p>

            </div>
            <div class="row">
                <?php
                if(!$from){
                ?>
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="submit"  id="save" name="button" type="button" class="btn btn-success " value ="Change my data">

                        </div>
                    </div>
                </form>
                
                  <table class="table">
    <tbody>
      <tr>
        <td>Name :</td>
        <td><?php echo $user->name ;?></td>
      </tr>
      <tr>
        <td>LastName</td>
        <td><?php echo $user->lastName ;?></td>
      </tr>
      <tr>
         <td>Email</td>
        <td><?php echo $user->email ;?></td>
      </tr>
      <tr>
        <td>Birthdate</td>
        <td><?php echo $user->date ;?></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><?php echo $user->sexe ;?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $user->address ;?></td>
      </tr>

    </tbody>
  </table>
                <?php
                }else{
                ?>
                <form class="form-horizontal" method="post" action="">
                    <fieldset>

                        <!-- Form Name -->
                        <legend> User <?php echo $user->name ?>  </legend>
                                        <?php
                    if (isset($_SESSION['idRow'])) { ?>
                        <div class="form-group">
                        <div class="col-md-4">
                            <input type="submit"  id="save" name="button" type="button" class="btn btn-info " value ="Back">

                        </div>
                    </div>
                    <?php }?>
                
              
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name</label>  
                            <div class="col-md-4">
                                <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->name ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="LastName">Last name</label>  
                            <div class="col-md-4">
                                <input id="LastName" name="LastName" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->lastName ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email">Email</label>  
                            <div class="col-md-4">
                                <input id="Email" name="Email" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->email ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Birthdate">Birthdate</label>  
                            <div class="col-md-4">
                                <input id="Birthdate" name="Birthdate" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->date ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Gender">Gender</label>  
                            <div class="col-md-4">
                                <input id="Gender" name="Gender" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->sexe ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Address">Address</label>  
                            <div class="col-md-4">
                                <input id="Address" name="Address" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->address ?>">

                            </div>
                        </div>
                        <hr>
                        <h3>Data connection</h3>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="userName">User name</label>  
                            <div class="col-md-4">
                                <input id="userName" name="userName" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $user->user ?>">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Password">Password</label>  
                            <div class="col-md-4">
                                <input id="Address" name="Password" placeholder="" class="form-control input-md" required="" type="password" value="<?php echo $user->pass ?>">

                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <div class="col-md-4">
<!--                                <input type="submit"  id="delete" name="button" type="button" class="btn btn-danger" value ="Delete">-->
                                <input type="submit"  id="save" name="button" type="button" class="btn btn-success" value ="Save">

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <?php
            }
            ?>
            <hr>
            <div class="row">


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
        <script>
            $("#enviarimagenes").on("submit", function (e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById("enviarimagenes"));

                $.ajax({
                    url: "./controller.php?f=addImag",
                    type: "POST",
                    dataType: "HTML",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (echo) {
                    $("#mensaje").html(echo);

                    if (echo == '') {
                        location.reload();
                    }
                }).fail(function () {
                    alert("Error uploading the picture.");
                });
            });


            function deleteImg(id) {
                var parametros = {
                    "id": id
                };
                $.ajax({
                    data: parametros,
                    url: './controller.php?f=deleteImag',
                    type: 'post'
                }).done(function (echo) {
                    $("#mensaje").html(echo);

                    if (echo == '') {
                        location.reload();
                    }

                });
            }
            function updateImg(id) {
                var parametros = {
                    "id": id,
                    "alt": $('#alt' + id).val()
                };

                console.log(parametros);
                $.ajax({
                    data: parametros,
                    url: './controller.php?f=updateImag',
                    type: 'post'
                }).done(function (echo) {
                    $("#mensaje").html(echo);

                    if (echo == '') {
                        location.reload();
                    }

                });
            }



        </script>

    </body>
</html>
