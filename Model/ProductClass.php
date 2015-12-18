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
        $imgs = $this->conex->commitSelect($sql);

//         var_dump($imgs);

        $this->id = $product[0]['idRow'];
        $this->name = utf8_encode($product[0]['name']);
        $this->description = utf8_encode($product[0]['description']);
        $this->longDescription = utf8_encode($product[0]['longDescription']);
        $this->price = $product[0]['price'];
        $this->imgs = $imgs;
        $this->category = $product[0]['idCategory'];
    }

    public function insertProduct() {

        $sql = "INSERT INTO `product`( `name`, `description`, `longDescription`, `price`, `idCategory`) "
                . "VALUES ("
                . "'".utf8_decode($this->name) ."',"
                . "'".utf8_decode($this->description) ."',"
                . "'".utf8_decode($this->longDescription) ."',"
                . "'$this->price',"
                . "'$this->category')";

        if (isset($this->id)) {
            $sql = 'UPDATE `product` SET';
            $sql.= '`idRow` = \'' . $this->id . '\',';
            $sql.= '`name` = \'' . utf8_decode($this->name) . '\',';
            $sql.= '`description` = \'' . utf8_decode($this->description) . '\',';
            $sql.= '`longDescription` = \'' . utf8_decode($this->longDescription). '\',';
            $sql.= '`price` = \'' . $this->price . '\',';
            $sql.= '`idCategory` = \'' . $this->category . '\'';
            $sql.= ' WHERE`idRow` = \'' . $this->id . '\'';
        }

        $product = $this->conex->commitSelect($sql);
        $id = $this->conex->db->lastInsertId();
        
        return $id;
    }
    
    public function deleteProduct(){
        require_once 'ImageClass.php';
//        var_dump($this->imgs);
        
        foreach ($this->imgs as $key => $value) {
            $img = new ImageClass($this->conex);
            $img->fetch($value['idRow']);
            $img->deleteImag();
        }
        
        $conn = $this->db;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM `product` WHERE `idRow` = '$this->id'";
        try {
            $requete = $conn->prepare($sql);
            $rel = $requete->execute();
        } catch (Exception $exc) {
            
            echo 'Error : ' . $exc->getMessage();
        }
    }

}
