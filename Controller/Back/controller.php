<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$navegador = array(
    array('string' => 'Order Tracking', 'url' => ''), // esto puede ser el home
    array('string' => 'Placed orders', 'url' => ''), // pasarle un dato para usarlo con admin 
    array('string' => 'My profile ', 'url' => ''), // pasarle un dato para usarlo con admin 
    array('string' => 'Logout', 'url' => '')
);
$navegadorAdmin = array(
    array('string' => 'Client list ', 'url' => 'controller.php?f=clientList'),
    array('string' => 'Products', 'url' => 'controller.php?f=productList'), // lista con todos los productos buscar por categoria nombre...
    array('string' => 'Orders', 'url' => ''), // lista de los ordenes y estado
    array('string' => 'Categorys', 'url' => ''), // lista de las categorias // suprimir anadir
    array('string' => 'Dashboard', 'url' => ''), // pagina principal
    array('string' => 'Logout', 'url' => '')
);

function index() {
    global $navegador;
    global $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';
    // Obtener type user
    $userType = 'admin';
//    $userType = 'user';

    if ($userType == 'user') {
        require_once '../../View/Back/home.php';
    } elseif ($userType == 'admin') {
        $navegador = $navegadorAdmin;
        require_once '../../View/Back/homeAdmin.php';
    }
}

function clientList() {
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

function productList() {
    global $navegadorAdmin;
    $navegador = $navegadorAdmin;

    $titulo = 'Titulo';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';

    $userType = 'admin';
//    $userType = 'user';
    if ($userType == 'admin') {
        $navegador = $navegadorAdmin;

        $listProducts = array(
            array('name' => 'product1',
                'description' => 'Description de product1',
                'longDescription' => 'LONG Description de product1',
                'characteristics' => 'characteristics',
                'price' => '001',
                'img' => 'not-found.png',
                'id' => '01'
            ),
            array('name' => 'product2',
                'description' => 'Description de product2',
                'longDescription' => 'LONG Description de product2',
                'characteristics' => 'characteristics',
                'price' => '002',
                'img' => 'not-found.png',
                'id' => '02'
            ),
            array('name' => 'product3',
                'description' => 'Description de product3',
                'longDescription' => 'LONG Description de product3',
                'characteristics' => 'characteristics',
                'price' => '003',
                'img' => 'not-found.png',
                'id' => '03'
            )
        );


        require_once '../../View/Back/productList.php';
    }
    // Obtener type user
}

function product() {

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

    $product  = array('name' => 'product3',
        'description' => 'Description de product3',
        'longDescription' => 'LONG Description de product3',
        'characteristics' => 'characteristics',
        'price' => '003',
        'imgs' => array(
            'not-found.png',
            'not-found.png',
            'not-found.png'),
        'id' => '03'
    );

    require_once '../../View/Back/Product.php';
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
