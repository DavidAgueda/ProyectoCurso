<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../app/config.php';

session_start();
// puedo crear un usuario que pueda leer y crear una cuenta
require_once '../../app/connection/Connexion.php';
$connection = new Connexion($dbName, $host, $user, $pass);
//$connection= new Connexion($dataBaseName, $host, $user, $pass);

$user = '';
$navegador = array(
    array('string' => 'Products ', 'url' => 'controller.php?f=products'),
    array('string' => 'Cart', 'url' => 'controller.php?f=cart'),
    array('string' => 'Login ', 'url' => 'controller.php?f=login'),
    array('string' => 'Register ', 'url' => 'controller.php?f=myProfil')
);

if (isset($_SESSION['idRow'])) {
    require_once '../../Model/UserClass.php';
    $user = new UserClass($connection);
    $user->fetch($_SESSION['idRow']);
    $navegador = array(
        array('string' => 'Products ', 'url' => 'controller.php?f=products'),
        array('string' => 'Cart', 'url' => 'controller.php?f=cart'),
        array('string' => 'My profile ', 'url' => 'controller.php?f=myProfil'), // pasarle un dato para usarlo con admin 
        array('string' => 'Logout', 'url' => '../Back/controller.php?f=logout')
    );
}

function index() {
    require_once '../../Model/functions.php';
    require_once '../../Model/ProductClass.php';
    global $navegador;
    global $user;
    global $connection;

    $titulo = 'David\'s SHOP';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    $slide = array();

    $productsSlide = productsSlide($connection);

    foreach ($productsSlide as $key => $idProduct) {

        $product = new ProductClass($connection);
        $product->fetch($idProduct);

        if (!isset($product->imgs[0]['name'])) {
            $img = 'not-found.png';
        } else {
            $img = $product->imgs[0]['name'];
        }
        $slide[] = array(
            'title' => $product->name,
            'url' => 'controller.php?f=product&o=' . $product->id,
            'description' => $product->description,
            'image' => $img
        );
    }

    require_once '../../View/Front/home.php';
}

function contact() {
    global $navegador;
    global $user;
    $titulo = 'David\'s SHOP - Contact';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    $options = array(
        array('string' => 'Formula basica', 'value' => 'Formula basica'),
        array('string' => 'Formula Media', 'value' => 'Formula Media'),
        array('string' => 'Formula Abanzada', 'value' => 'Formula Abanzada', 'url' => '#', 'description' => array('caracteristica 1', 'caracteristica 2', 'caracteristica 3', 'caracteristica 5'), 'image' => '#'),
        array('string' => 'Formula tienda basica', 'value' => 'Formula tienda basica', 'url' => '#', 'description' => array('caracteristica 1', 'caracteristica 2', 'caracteristica 3'), 'image' => '#'),
        array('string' => 'Formula tienda Media', 'value' => 'Formula tienda Media', 'url' => '#', 'description' => array('caracteristica 1', 'caracteristica 2', 'caracteristica 3', 'caracteristica 4'), 'image' => '#'),
        array('string' => 'Formula tienda Abanzada', 'value' => 'Formula tienda Abanzada', 'url' => '#', 'description' => array('caracteristica 1', 'caracteristica 2', 'caracteristica 3', 'caracteristica 5'), 'image' => '#')
    );

    require_once '../../View/Front/contact.php';
}

function products($category = '') {
    require_once '../../Model/ProductClass.php';
    global $navegador;
    global $connection;
    global $user;
    $titulo = 'David\'s SHOP - Products';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    $send = '';
    if (isset($_GET['s'])) {
        $send = $_GET['s'];
    }

    if ($category == '') {
        $sql = 'SELECT * FROM `product` WHERE name LIKE \'%' . $send . '%\''; //    }elseif($_GET['s'] == ''){
    } else {
        $sql = 'SELECT * FROM `product` WHERE `idCategory` = \'' . $category . '\' AND name LIKE \'%' . $send . '%\'';
    }

    $requete = $connection->commitSelect($sql);

    // Cargamos segun la categoria



    foreach ($requete as $key => $value) {
        $product = new ProductClass($connection);
        $product->fetch($value['idRow']);

        if (!isset($product->imgs[0]['name'])) {
            $img = 'not-found.png';
        } else {
            $img = $product->imgs[0]['name'];
        }

        $listProducts[] = array(
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'img' => $img,
            'id' => $product->id
        );
    }
    // cargarlo de categorias 
    $options = array(
        array(
            'value' => '1',
            'string' => 'Book'
        ),
        array(
            'value' => '2',
            'string' => 'Music'
        )
    );



    require_once '../../View/Front/products.php';
}

function product($idProduct = '') {
    require_once '../../Model/ProductClass.php';
    global $navegador;
    global $connection;
    global $user;


    $product = new ProductClass($connection);

    $product->fetch($idProduct);

    $titulo = 'David\'s SHOP - ' . $product->name;
    $description = $product->description;
    $palabrasClaves = 'palabrasClaves';


    if ($product->imgs == '') {
        $product->imgs = array('not-found.png');
    }
    $product = array('name' => $product->name,
        'id' => $product->id,
        'description' => $product->longDescription,
        'price' => $product->price,
        'imgs' => $product->imgs
    );

    require_once '../../View/Front/product.php';
}

function cart() {
    require_once '../../Model/ProductClass.php';
    global $navegador;
    global $connection;
    global $user;
    $titulo = 'David\'s SHOP -Cart';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    $totalPrice = 0;
    if (isset($_COOKIE['Products'])) {
        if ($_COOKIE['Products'] != '[]' || $_COOKIE['Products'] != NULL) {
            $productsCart = $_COOKIE['Products'];


            $productsCart = str_replace("[", "", $productsCart);
            $productsCart = str_replace("]", "", $productsCart);

            if ($productsCart != '') {
                $productsCart = explode(",", $productsCart);
                foreach ($productsCart as $key => $value) {
                    $product = new ProductClass($connection);
                    $product->fetch($value);

                    if (!isset($product->imgs[0]['name'])) {
                        $img = 'not-found.png';
                    } else {
                        $img = $product->imgs[0]['name'];
                    }

                    $listProductsCart[] = array(
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'img' => $img,
                        'id' => $product->id
                    );

                    $totalPrice = floatval($product->price) + $totalPrice;
                }
            }
        }
    }


    require_once '../../View/Front/cart.php';
}

function login() {
    require_once '../../Model/UserClass.php';

    global $connection;
    global $user;

    $titulo = 'David\'s SHOP -Login';
    $description = 'Login';
    $palabrasClaves = 'Login';
    $viewLogin = false;
    if (isset($_SESSION['viewLogin'])) {
        $viewLogin = $_SESSION['viewLogin'];
        //        
    }
    if (isset($_POST['user']) && isset($_POST['pass'])) {

//        $user = new UserClass($connection, $user, $email, $pass, $name, $lastName, $date, $sexe, $address);
        $user = new UserClass($connection, $_POST['user'], $_POST['pass']);
        $viewLogin = $_SESSION['viewLogin'] = $user->login();

        $user->getUser();
        $_SESSION['idRow'] = $user->id;
        $_POST['user'] = null;
        $_POST['pass'] = null;
    }

    if ($viewLogin) {
        if ($user->roll == 1) {
            header('Location: ../Back/controller.php?f=index');
        } elseif ($user->roll == 2) {
            header('Location: ../Front/controller.php?f=index');
        } else {
            header('Location: ../Front/controller.php?f=index');
        }
    }
    if (isset($_POST['close'])) {
        $_SESSION['viewLogin'] = null;
    }


    require_once '../../View/Front/login.php';
}

function okMail() {
    global $navegador;
    global $user;
    $titulo = 'David\'s SHOP - Email enviado con exito';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    $empresa = 'Super sitios web';

    $contenido = array(
        'title' => 'Gracias por ponerse en contanto con nosotros',
        'texto' => 'Hemos recivido su email. Lo mas temprano posible nos '
        . 'pondremos en contacto con usted para concreatar todos los '
        . 'detalles de su proyecto'
        . '<br/>'
        . 'Le saluda atentamente todo el equipo de <strong>' . $empresa . ''
        . '</strong>s'
    );
    require_once '../okmail.php';
}

function myProfil() {
    global $navegador;
    global $user;
    global $connection;
    $titulo = 'David\'s SHOP - My Profile';
    $description = '';
    $palabrasClaves = 'palabrasClaves';

    $from = false;

    if ($user == '') {
        require_once '../../Model/UserClass.php';
        $user = new UserClass($connection);
//        var_dump($user);
        $from = true;
    }

    if (!empty($_POST)) {
        if ($_POST['button'] == 'Save') {

            if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Error : Email not valid")</script>';
                $from = true;
            } else {
                
                if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $_POST['Birthdate']) === 0) {
                    echo '<script>alert("Error : Date not valid")</script>';
                }
//                $user->user = $_POST['name'];
//                $user->pass = $_POST['LastName'];
                $user->name = $_POST['name'];
                $user->lastName = $_POST['LastName'];
                $user->date = $_POST['Birthdate'];
                $user->email = $_POST['Email'];
                $user->sexe = $_POST['Gender'];
                $user->address = $_POST['Address'];
                $user->user = $_POST['userName'];
                $user->pass = $_POST['Password'];
//                $user->roll = $_POST[''];
                $id = $user->setInDB();
                if ($id != 0) {
                    $_SESSION['idRow'] = $id;
                    header('Location: ../Front/controller.php?f=index');
                }
            }
        } elseif ($_POST['button'] == 'Change my data') {
            $from = true;
        } elseif ($_POST['button'] == 'Back') {
            $from = false;
        }
    }


//    var_dump($user);

    require_once '../../View/Back/myProfil.php';
}

function redire() {
    header('Location: ../home');
}

require_once '../main.php';
