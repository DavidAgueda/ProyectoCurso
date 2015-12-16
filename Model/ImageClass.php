<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imageClass
 *
 * @author David Agueda Roblas
 */
class ImageClass {

    var $id;
    var $name;
    var $idProduct;
    var $alt;

    var $db;
    var $conex;

    public function __construct($connection, $name = '', $alt = '', $idProduct = '') {
        $this->conex = $connection;
        $this->db = $connection->db;

//        $this->id       =;
        $this->name = $name;
        $this->idProduct = $idProduct;
        $this->alt = $alt;

    }


    /* Modificar con nuevos datos */


    /* Modificar con nuevos datos */

    public function setInDB() {
        $conn = $this->db;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'INSERT INTO images(name, idProduct, alt) VALUES (\'' . $this->name . '\',\'' . $this->idProduct . '\',\'' . $this->alt . '\')';
        try {
            $requete = $conn->prepare($sql);
            $rel = $requete->execute();
        } catch (Exception $exc) {
            
            echo 'Error : ' . $exc->getMessage();
        }
    }
    
    public function deleteImag() {
        $conn = $this->db;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM `images` WHERE `idRow` = '$this->id'";
        try {
            $requete = $conn->prepare($sql);
            $rel = $requete->execute();
        } catch (Exception $exc) {
            
            echo 'Error : ' . $exc->getMessage();
        }
    }
    
    public function updateImag() {
        $conn = $this->db;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "UPDATE images SET "
                . "idProduct= '$this->idProduct',"
                . "name= '$this->name' ,"
                . "alt= '$this->alt' "
                . "WHERE  idRow ='$this->id'";
        
        try {
            $requete = $conn->prepare($sql);
            $rel = $requete->execute();
        } catch (Exception $exc) {
            
            echo 'Error : ' . $exc->getMessage();
        }
    }

    public function fetch($id = '') {
        // buscar por id 
        // devuelve los datos producto
        $sql = 'SELECT * FROM `images` WHERE `idRow` =\'' . $id . '\'';
        $imag = $this->conex->commitSelect($sql);

        $this->id   = $imag[0]['idRow'];
        $this->name = $imag[0]['name'];
        $this->idProduct = $imag[0]['idProduct'];
        $this->alt = $imag[0]['alt'];
    }

}
