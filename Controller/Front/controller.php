<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// puedo crear un usuario que pueda leer y crear una cuenta
require_once '../../app/connection/Connexion.php';
$connection = new Connexion('Ecommerce', 'localhost', 'root', '');
//$connection= new Connexion($dataBaseName, $host, $user, $pass);


$navegador = array(
    array('string' => 'Products ', 'url' => 'controller.php?f=products'),
    array('string' => 'Cart', 'url' => 'controller.php?f=cart'),
    array('string' => 'Login ', 'url' => 'controller.php?f=login')
);

function index() {
    global $navegador;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';

    $slide = array(
        array(
            'title' => 'Vende todo tipos de profuctos',
            'url' => '#',
            'description' => '<strong>Aumenta las ventas de tu tienda</strong> física o simplemente comienza un negocio con poca inversion. Con nuestras soluciones de tiendas online podrás comercializar todo tipo de productos.',
            'image' => 'not-found.png'),
        array(
            'title' => 'Dise&ntilde;os personalizados',
            'url' => '#',
            'description' => 'Claro está que no es lo mismo vender pasteles que productos electrónicos. Nosotros adaptamos tu tienda para que sea <strong>atractiva para tus clientes</strong>.',
            'image' => 'not-found.png'),
        array(
            'title' => 'Simple y funcional',
            'url' => '#',
            'description' => 'Las soluciones que os ofrecemos son de sobra testeadas. Lo simple y conocido normalmente es la mejor solucion.',
            'image' => 'not-found.png')
    );

    $elementos = array(
        array(
            'title' => 'Soluciones para todas las economias',
            'url' => 'oferta/0',
            'description' => 'Te ofrecemos varias posibilidades para que comiences a vender tus productos en <strong>tu tienda online </strong>desde ya. Te ofrecemos la oportunidad de comenzar desde precios realmente interesante que podrás amortizar con tus primeras ventas. Todas nuestras tiendas son desarrolladas con el máximo cuidado y son sobradamente testeadas y probadas.',
            'image' => 'not-found.png'),
        array(
            'title' => 'Tu propia tienda online',
            'url' => 'oferta/0',
            'description' => 'Tanto si tienes una tienda física, como si es tu primera experiencia en el comercio, tener tu propia tienda virtual te aportará <strong>nuevas fuentes de ingresos</strong>. No hay nada más fácil que rellenar tu tienda de productos y esperar a que lleguen los pedidos.',
            'image' => 'not-found.png'),
        array(
            'title' => 'Mejora la posicion en buscadores',
            'url' => 'oferta/0',
            'description' => 'Nuestro <strong>equipo de desarrollo tiene en cuenta las ultimas tecnologias</strong>. Entre estas están las técnicas de posicionamiento SEO que nuestro equipo dedicado pone a vuestra disposición para aumentar las visitas a vuestra tienda.',
            'image' => 'not-found.png'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Creacion de elementos graficos', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Nuestros clientes', 'url' => '#', 'description' => 'description', 'image' => '#')
    );

    require_once '../../View/Front/home.php';
}

function contact() {
    global $navegador;
    $titulo = 'Contacto';
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
    $titulo = 'Products';
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


    $product = new ProductClass($connection);

    $product->fetch($idProduct);

    $titulo = $product->name;
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
    $titulo = 'Cart';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';


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
            }
        }
    }


    require_once '../../View/Front/cart.php';
}

function login() {
    require_once '../../Model/UserClass.php';
    $titulo = 'Login';
    $description = 'Login';
    $palabrasClaves = 'Login';



    global $connection;
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
        header('Location: ../Back/controller.php?f=index');
    }
    if (isset($_POST['close'])) {
        $_SESSION['viewLogin'] = null;
    }


    require_once '../../View/Front/login.php';
}

function okMail() {
    global $navegador;
    $titulo = 'Email enviado con exito';
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

function redire() {
    header('Location: ../home');
}

require_once '../main.php';
