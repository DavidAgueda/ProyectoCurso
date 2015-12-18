<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../app/config.php';


require_once 'ProductClass.php';
require_once '../app/connection/Connexion.php';
$connection = new Connexion($dbName, $host, $user, $pass);

//var_dump($_POST);

$product  =  new ProductClass($connection);
$product->fetch($_POST['id']);

echo json_encode( $product->imgs );