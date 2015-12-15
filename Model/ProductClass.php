<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author David Agueda
 */
class ProductClass {

    //put your code here
    var $id;
    var $name;
    var $description;
    var $longDescription;
    var $price;
    var $imgs;
    var $category;
    var $db;
    var $conex;

    public function __construct($conex, $name = '', $description = '', $longDescription = '', $price = '', $imgs = '', $category = '') {
        // si esta vacio nada
        $this->conex = $conex;
        $this->db = $conex->db;

        // $this->id;
        $this->name = $name;
        $this->description = $description;
        $this->longDescription = $longDescription;
        $this->price = $price;
        $this->imgs = $imgs;
        $this->category = $category;
    }

    public function fetch($id = '') {
        // buscar por id 
        // devuelve los datos producto
        $sql = 'SELECT * FROM `product` WHERE `idRow` =\'' . $id . '\'';
        $product = $this->conex->commitSelect($sql);
        $sql = 'SELECT * FROM `images` WHERE `idProduct` =\'' . $id . '\'';
        $imgs= $this->conex->commitSelect($sql);
         
//         var_dump($imgs);
        
        $this->id               = $product[0]['idRow'];
        $this->name             = $product[0]['name'];
        $this->description      = $product[0]['description'];
        $this->longDescription  = $product[0]['longDescription'];
        $this->price            = $product[0]['price'];
        $this->imgs             = $imgs;
        $this->category         = $product[0]['idCategory'];
        
        
    }

    private function insertProduct() {
        // si no existe guardar y si existe modificar
    }

}
