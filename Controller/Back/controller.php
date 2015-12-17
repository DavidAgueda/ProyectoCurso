<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../app/config.php';

session_start();

require_once '../../app/connection/Connexion.php';
$connection = new Connexion($dbName, $host, $user, $pass);


$viewLogin = false;
if (isset($_SESSION['viewLogin'])) {
    $viewLogin = $_SESSION['viewLogin'];
//        
}
if (!$viewLogin) {
    header('Location: ../Front/controller.php?f=index');
}
//    var_dump($_SESSION);
// puedo crear un usuario que pueda modificar suprimir ...


$navegador = array(
    array('string' => 'Order Tracking', 'url' => ''), // esto puede ser el home
    array('string' => 'Placed orders', 'url' => ''), // pasarle un dato para usarlo con admin 
    array('string' => 'My profile ', 'url' => ''), // pasarle un dato para usarlo con admin 
    array('string' => 'Logout', 'url' => 'controller.php?f=logout')
);
$navegadorAdmin = array(
    array('string' => 'Client list ', 'url' => 'controller.php?f=clientList'),
    array('string' => 'Products', 'url' => 'controller.php?f=productList'), // lista con todos los productos buscar por categoria nombre...
    array('string' => 'Orders', 'url' => 'controller.php?f=orders'), // lista de los ordenes y estado
    array('string' => 'Categorys', 'url' => 'controller.php?f=category'), // lista de las categorias // suprimir anadir
    array('string' => 'Dashboard', 'url' => 'controller.php?f=index'), // pagina principal
    array('string' => 'Logout', 'url' => 'controller.php?f=logout')
);

function logout() {
    $_SESSION['viewLogin'] = false;
    $_SESSION['idRow'] = null;
    header('Location: ../Front/controller.php?f=index');
}

function index() {

    require_once '../../Model/UserClass.php';

    global $connection;
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
// Obtener type user

    $user = new UserClass($connection);

    $user->fetch($_SESSION['idRow']);
    $userType = $user->roll;
//    $userType = 'user';

    if ($userType == '0') {
        require_once '../../View/Back/home.php';
    } elseif ($userType == '1') {
        $navegador = $navegadorAdmin;
        require_once '../../View/Back/homeAdmin.php';
    }
}

function clientList() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegadorAdmin;
    $navegador = $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';

    $userType = 'admin';
//    $userType = 'user';
    if ($userType == 'admin') {
        $navegador = $navegadorAdmin;

        $clientList = array(
            array(
                'nameUser' => 'User1',
                'passUser' => 'pass1',
                'name' => 'Jean',
                'lastName' => 'Smit',
                'email' => 'email@email.com',
                'telephone' => '666',
                'Address' => array(
                    'n' => '10',
                    'streer' => 'Mayor',
                    'city' => 'Gotan',
                    'region' => 'BD',
                    'zipCode' => '00000',
                    'country' => 'fantasy'
                ),
                'nOrders' => '001',
                'backorder' => '1',
                'id' => '01'
            ),
            array(
                'nameUser' => 'User2',
                'passUser' => 'pass2',
                'name' => 'Bob',
                'lastName' => 'Hook',
                'email' => 'email@email.com',
                'telephone' => '666',
                'Address' => array(
                    'n' => '10',
                    'streer' => 'Mayor',
                    'city' => 'Gotan',
                    'region' => 'BD',
                    'zipCode' => '00000',
                    'country' => 'fantasy'
                ),
                'nOrders' => '001',
                'backorder' => '0',
                'id' => '01'
            ),
        );


        require_once '../../View/Back/clientList.php';
    }
// Obtener type user
}

function client() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
// Obtener type user
    $userType = 'admin';
//    $userType = 'user';

    if ($userType == 'user') {
        
    } elseif ($userType == 'admin') {
        $navegador = $navegadorAdmin;
    }

    $client = array(
        'nameUser' => 'User1',
        'passUser' => 'pass1',
        'name' => 'Jean',
        'lastName' => 'Smit',
        'email' => 'email@email.com',
        'telephone' => '666',
        'Address' => array(
            'n' => '10',
            'streer' => 'Mayor',
            'city' => 'Gotan',
            'region' => 'BD',
            'zipCode' => '00000',
            'country' => 'fantasy'
        ),
        'nOrders' => '001',
        'backorder' => '1',
        'id' => '01'
    );

    require_once '../../View/Back/client.php';
}

function productList($category = '') {
    require_once '../../Model/ProductClass.php';
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegadorAdmin;
    global $connection;
    $navegador = $navegadorAdmin;

    $titulo = 'Titulo';
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
            'description' => recortar_texto($product->description),
            'longDescription' => recortar_texto($product->longDescription),
            'price' => $product->price,
            'category' => $product->category,
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


    require_once '../../View/Back/productList.php';
}

function product($idProduct = "") {
    require_once '../../Model/ProductClass.php';
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegador;
    global $navegadorAdmin;
    $navegador = $navegadorAdmin;
    global $connection;

    $product = new ProductClass($connection);
//    var_dump($_POST);

    if ($idProduct != '') {

        $product->fetch($idProduct);
        if ($product->imgs == '') {
            $product->imgs = array('not-found.png');
        }

        if (isset($_POST['button']) && $_POST['button'] == 'Save') {
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->longDescription = $_POST['longDescription'];
            $product->price = $_POST['price'];
            $product->category = $_POST['category'];
            
            $product->insertProduct();
        }
        if (isset($_POST['button']) && $_POST['button'] == 'Delete') {
            $product->deleteProduct();
            header('Location: ../Back/controller.php?f=productList');
        }
    } else {
        if (isset($_POST['button']) && $_POST['button'] == 'Save') {
            $product = new ProductClass($connection, $_POST['name'], $_POST['description'], $_POST['longDescription'], $_POST['price'], '', $_POST['category']);
            // cargarlo de categorias 

            $idLastInsert = $product->insertProduct();
            
//            var_dump($idLastInsert);
            if ($idLastInsert != 0) {
                product($idLastInsert);
            }
//            $product->insertProduct();
        }
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

    $titulo = $product->name;
    $description = $product->description;
    $palabrasClaves = 'palabrasClaves';

    require_once '../../View/Back/product.php';
}

function orders() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
// Obtener type user
    $userType = 'admin';
//    $userType = 'user';

    if ($userType == 'user') {
        
    } elseif ($userType == 'admin') {
        $navegador = $navegadorAdmin;
    }


    echo '<h1>orders list</h1>';
    echo '<p>cambiar estado, buscar por terminados, pendientes, enviadas, acuse de recivo, enlace con el cliente y la lista de productos que contiene s</p>';
}

function order() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
// Obtener type user
    $userType = 'admin';
//    $userType = 'user';

    if ($userType == 'user') {
        
    } elseif ($userType == 'admin') {
        $navegador = $navegadorAdmin;
    }


    echo '<h1>un order en concreto</h1>';
    echo '<p>cancelar o modificar</p>';
}

function category() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
// Obtener type user
    $userType = 'admin';
//    $userType = 'user';

    if ($userType == 'user') {
        
    } elseif ($userType == 'admin') {
        $navegador = $navegadorAdmin;
    }


    echo '<h1>muestra Categorias</h1>';
    echo '<p>añadir categorias corregir las que existen</p>';
}

function contact() {
    global $viewLogin;
    if (!$viewLogin) {
        header('Location: ../Front/controller.php?f=index');
    }
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

function recortar_texto($texto, $limite = 100) {
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if ($tamano <= $limite) {
        return $texto;
    } else {
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }
    return $resultado;
}

function addImag() {
    require_once '../../Model/ImageClass.php';
    global $connection;


    if (isset($_POST['idProduct']) || isset($_POST['alt']) || isset($_POST['img'])) {
        //file name
        $fileName = $_FILES['img']['name'];

        $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

        //Obtenemos la extensión (en minúsculas) para poder comparar
        $value = explode('.', $fileName);
        $extension = strtolower(end($value));

        //Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
        if (!in_array($extension, $extensiones)) {
            die('Error : Only the following extensions are allowed ' . implode(', ', $extensiones));
        };


        $img = new ImageClass($connection, $fileName, $_POST['alt'], $_POST['idProduct']);

        $img->setInDB();

        move_uploaded_file($_FILES ['img']['tmp_name'], '../../img/' . $_FILES ['img']['name']);
    }



//    $img = new ImageClass($connection, $name, $alt, $idProduct);
}

function deleteImag() {
    require_once '../../Model/ImageClass.php';
    global $connection;


    if (isset($_POST['id'])) {
        //file name
        $img = new ImageClass($connection);
        $img->fetch($_POST['id']);
        $img->deleteImag();
        unlink('../../img/' . $img->name);
    }
}

function updateImag() {
    require_once '../../Model/ImageClass.php';
    global $connection;

//    var_dump($_POST);

    if (isset($_POST['id'])) {

        $img = new ImageClass($connection);
        $img->fetch($_POST['id']);
        $img->alt = $_POST['alt'];
//            var_dump($img);

        $img->updateImag();
//            unlink('../../img/' .$img->name);
    }
}

function test() {
    echo '<h1>TEST</h1>';
}
