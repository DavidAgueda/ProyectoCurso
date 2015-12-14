<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$navegador = array(
    array('string' => 'Products ', 'url' => 'controller.php?f=products'),
    
    array('string' => 'Cart', 'url' => 'controller.php?f=cart'),
    array('string' => 'Login ', 'url' => '')
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
    global $navegador;
    $titulo = 'Products';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';

    // Cargamos segun la categoria

    $listProducts = array(
        array('name' => 'product1',
            'description' => 'Description de product1',
            'price' => '001',
            'img' => 'not-found.png',
            'id' => '01'
        ),
        array('name' => 'product2',
            'description' => 'Description de product2',
            'price' => '002',
            'img' => 'not-found.png',
            'id' => '02'
        ),
        array('name' => 'product3',
            'description' => 'Description de product2',
            'price' => '003',
            'img' => 'not-found.png',
            'id' => '03'
        )
    );

    require_once '../../View/Front/products.php';
}

function product($idProduct = '') {

    global $navegador;


//    $elementos = array(
//        array('title' => 'Iconos / Logos', 'url' => '#', 
//            'description' => 'Locotipo al menos por 50€ '
//            . '<br/> <a href="https://es.fiverr.com/juanpost/disenar-y-crear-logotipos-e-iconos-para-tu-empresa?context=advanced_search&context_type=rating&context_referrer=search_gigs&pos=1&funnel=78f4a10b-8ed7-4e0d-84a1-0da312864a33"> fiverr</a>'
//            . '<br/> <a href="https://es.fiverr.com/moscovic/hacer-un-logo-sencillo-e-increible-para-ti?context=advanced_search&context_type=rating&context_referrer=search_gigs&pos=15&funnel=78f4a10b-8ed7-4e0d-84a1-0da312864a33"> fiverr</a>'
//            . '<br/> Iconos al menos por 10€'
//            . '<br/> <a href="https://es.fiverr.com/athecrea/hacer-5-iconos-flat-de-la-tematica-que-tu-quieras?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=1&funnel=3c682b56-950d-40f8-b7dc-cc66a03ee80a"> fiverr</a>'
//            . '<br/> <a href="https://es.fiverr.com/marcosramirezx/disenar-2-flat-iconos?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=2&funnel=ce5f9a62-7af2-4acc-9801-7242c4a75a44"> fiverr</a>'
//            . '<br/>'
//            ,
//            'image' => '#'),
//        array('title' => 'Aplicaciones para movil', 'url' => '#', 
//            'description' => 'Si es verdad lo que ofrece por 100€ y gano mucho mucho'
//            . '<br/> <a href="https://es.fiverr.com/itocto/crear-o-modificar-tus-aplicaciones-en-android?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=9&funnel=f174185c-5c6b-46df-a28c-47156c177cc5"> fiverr</a>'
//            . '<br/> <a href="https://es.fiverr.com/nicolasavalo/crear-una-aplicacion-para-android-muy-completa?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=1&funnel=e465696e-1558-4689-afa3-852134ff8692"> fiverr</a>'
//            . '<br/>'
//            , 'image' => '#'),
//        array('title' => 'Paginas web', 'url' => '#',
//            'description' => 'tiene muy buena recomendaciones pero habira que mirar el precio'
//            . '<br/> <a href="https://es.fiverr.com/philsony/crear-un-sitio-web-completo?context=advanced_search&context_type=rating&context_referrer=search_gigs&pos=2&funnel=ad008a96-0547-4f5b-97d1-f5d7dcee9c18"> fiverr</a>'
//            . '<br/>'
//            . '<br/>'
//            , 'image' => '#'),
//        array('title' => 'Seo', 'url' => '#', 'description' => 'description', 'image' => '#'),
//        array('title' => 'Redaccion de articulos', 'url' => '#', 
//            'description' => 'redaccion de articulos'
//            . '<br/> <a href="https://es.fiverr.com/trotaires/escribir-un-articulo-de-calidad-para-tu-blog-o-pagina-web?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=5&funnel=f9b49a8b-7154-4227-93af-0d8424d0d4c5"> fiverr</a>' 
//            . '<br/>', 
//            'image' => '#'),
//        array('title' => 'Tienda online', 'url' => '#', 
//            'description' => 'redaccion de articulos'
//            . '<br/> <a href="https://es.fiverr.com/davidtheset/hacer-tu-ecommerce?context=advanced_search&context_type=rating&context_referrer=search_gigs&source=top-bar&pos=9&funnel=1cb7fbb3-be90-469d-a717-af4886ed9e08"> fiverr</a>' 
//            . '<br/>', 
//            'image' => '#')
//    );
//    require_once '../../View/productos.php';
// cargamos segun id
    $product = array('name' => 'product1',
        'id' => '01',
        'description' => 'description product lang 1',
        'characteristic' => 'characteristic product 1',
        'price' => '001',
        'imgs' => array(
            'not-found.png',
            'not-found.png',
            'not-found.png')
    );

    $titulo = $product['name'];
    $description = $product['description'];
    $palabrasClaves = 'palabrasClaves';


    require_once '../../View/Front/product.php';
}


function cart() {
    global $navegador;
    $titulo = 'Cart';
    $description = 'description';
    $palabrasClaves = 'palabrasClaves';

    // Cargamos segun la cookis

    $listProductsCart = array(
        array('name' => 'product1',
            'description' => 'Description de product1',
            'price' => '001',
            'img' => 'not-found.png',
            'id' => '01'
        ),
        array('name' => 'product2',
            'description' => 'Description de product2',
            'price' => '002',
            'img' => 'not-found.png',
            'id' => '02'
        ),
        array('name' => 'product3',
            'description' => 'Description de product2',
            'price' => '003',
            'img' => 'not-found.png',
            'id' => '03'
        )
    );

    require_once '../../View/Front/cart.php';
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

require_once './main.php';
