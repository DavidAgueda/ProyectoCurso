<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function productsSlide($connexion) {

    $sql = "SELECT idRow FROM `product`\n"
            . "ORDER BY `product`.`idRow` DESC LIMIT 3";
    $result = $connexion->commitSelect($sql);
    
    return array($result[0]['idRow'],$result[1]['idRow'],$result[2]['idRow']);
    
}

