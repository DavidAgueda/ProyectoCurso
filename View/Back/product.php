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
            ?>
            <div class="row">
                <p id="mensaje"></p>
                anadir foto decidir si la foto es la principal, modificar, desacticar

            </div>
            <div class="row">
                <form class="form-horizontal" method="post" action="">
                    <fieldset>

                        <!-- Form Name -->
                        <legend> Id : <?php echo $product->id ?> </legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Product name</label>  
                            <div class="col-md-4">
                                <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text" value="<?php echo $product->name ?>">

                            </div>
                        </div>
                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="description">Description</label>
                            <div class="col-md-4">                     
                                <textarea class="form-control" id="description" name="description"><?php echo $product->description ?></textarea>
                            </div>
                        </div>
                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="longDescription">Long Description</label>
                            <div class="col-md-4">                     
                                <textarea class="form-control" id="longDescription" name="longDescription"><?php echo $product->longDescription ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="price">Price</label>
                            <div class="col-md-4">                     
                                <input id="price" name="price" class="form-control input-md" required="" type="number" value="<?php echo $product->price ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category">Category</label>
                            <div class="col-md-4">
                                <select id="category" name="category" class="form-control">
                                    <?php
                                    for ($i = 0; $i < count($options); $i++) {
                                        if ($options[$i]['value'] == $product->category) {
                                            echo '<option value="' . $options[$i]['value'] . '" selected>' . $options[$i]['string'] . '</option>';
                                        } else {
                                            echo '<option value="' . $options[$i]['value'] . '">' . $options[$i]['string'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="submit"  id="delete" name="button" type="button" class="btn btn-danger" value ="Delete">
                                <input type="submit"  id="save" name="button" type="button" class="btn btn-success" value ="Save">

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <?php if ($product->id != '') { ?>
                <div class="row">
                    <h2>Images</h2>
                    <form class="form-horizontal" accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >

                        <input hidden type="text" name="idProduct" value="<?php echo $product->id ?>" />
                        <div class="form-group">

                            <label class="col-md-4 control-label"  for="alt">Alt</label>
                            <div class="col-md-4">
                                <input class="form-control input-md" type="text" name="alt" id="alt"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"  for="image">Image</label>
                            <div class="col-md-4">
                                <input class="form-control input-md" type="file" name="img" id="image"/>
                            </div>

                            <button  class="btn btn-default" type="submit">Send</button>

                        </div>

                    </form>
                </div>
                <?php
            }
            ?>

            <hr>

            <div class="row" id="imgs">

            </div>


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
            readImgs();
        })
        function hiddenAddress(button) {
//                console.log(button);
            console.log();
            $(button).next().toggle();
        }
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
                    readImgs();
                }
            }).fail(function () {
                alert("Error uploading the picture.");
            });
        });


        var funtDelete = function deleteImg(id) {
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
                    readImgs();
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
                    readImgs();
                }

            });
        }

        function readImgs() {
            var parametros = {
                "id": <?php echo $_GET['o'] ?>
            };
            $.ajax({
                data: parametros,
                url: '../../Model/getImgsAjax.php',
                type: 'post'
            }).done(function (echo) {
                echo = JSON.parse(echo);
                $('#imgs').html('');
//                    console.log(echo[0]['name'])
                for (var i = 0; i < echo.length; i++) {
                    var div = $('<div/>');
                    div.addClass('col-md-4 col-xs-4');
                    var img = $('<img/>');
                    img.addClass('thumbnail');
                    img.attr('src', '../../img/' + echo[i]['name']);
                    img.attr('alt', echo[i]['alt']);
                    img.attr('style', 'width:200px;height:200px;');

                    var label = $('<label/>');
                    label.addClass('col-md-4 control-label');
                    label.attr('for', 'alt' + echo[i]['idRow']);
                    label.html('Alt');

                    var input = $('<input/>');
                    input.addClass('form-control input-md');
                    input.attr('id', 'alt' + echo[i]['idRow']);
                    input.attr('name', 'alt' + echo[i]['idRow']);
                    input.attr('required', '');
                    input.attr('type', 'text');
                    input.attr('value', echo[i]['alt']);

                    var button1 = $('<button/>');
                    button1.addClass('btn btn-danger');
                    button1.attr('type', 'button');
                    button1.attr('onclick', "funtDelete(" + echo[i]['idRow'] + ")");
                    button1.html('Delete');

                    var button2 = $('<button/>');
                    button2.addClass('btn btn-success');
                    button2.attr('type', 'button');
                    button2.attr('onclick', "updateImg(" + echo[i]['idRow'] + ")");
                    button2.html('Save');


                    div.append(img);
                    div.append(label);
                    div.append(input);
                    div.append(button1);
                    div.append(button2);

                    $('#imgs').append(div);
                }
            });
        }

    </script>

</body>
</html>
