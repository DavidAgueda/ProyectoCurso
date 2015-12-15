<?php

//use AddressClass;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserClass
 *
 * @author David Agueda
 */
class UserClass {

    var $id;
    var $user;
    var $pass;
    var $name;
    var $lastName;
    var $date;
    var $email;
    var $sexe;
    var $address;
    var $roll;
    var $db;
    var $conex;

    public function __construct($connection, $user = '', $pass = '', $email = '', $name = '', $lastName = '', $date = '', $sexe = '', $address = '', $roll = '') {
        $this->conex = $connection;
        $this->db = $connection->db;

//        $this->id       =;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->date = $date;
        $this->email = $email;
        $this->sexe = $sexe;
        $this->address = $address;
        $this->roll = $roll;
    }

    public function login() {
        $count = $this->_checkCredentials();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    private function _checkCredentials() {
        $conn = $this->db;

        $sql = 'SELECT idrow FROM `user` WHERE '
                . 'pass = \'' . $this->pass . '\' '
                . 'AND user = \'' . $this->user . '\'';
        $result = $conn->query($sql)->rowCount();
        if (!$result) {
            return 0;
        }
        return $result;
    }

    /* Modificar con nuevos datos */

    public function getUser() {
        $conn = $this->db;
        $sql = 'SELECT * FROM `user` WHERE pass = \'' . $this->pass . '\' and user = \'' . $this->user . '\'';
        $result = $conn->query($sql);
        if ($result) {
            foreach ($result as $row) {
//                var_dump($row);
                $this->id = $row['idRow'];
                $this->user = $row['user'];
                $this->pass = $row['pass'];
                $this->name = $row['name'];
                $this->roll = $row['idRoll'];
                return array($row['user'], $row['pass'], $row['name']);
            }
        }
        return false;
    }

    /* Modificar con nuevos datos */

    public function setInDB() {
        $conn = $this->db;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO user(user, pass, name) VALUES (\'' . $this->user . '\',\'' . $this->pass . '\',\'' . $this->name . '\')';
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
        $sql = 'SELECT * FROM `user` WHERE `idRow` =\'' . $id . '\'';
        $user = $this->conex->commitSelect($sql);

        $this->id   = $user[0]['idRow'];
        $this->user = $user[0]['user'];
        $this->pass = $user[0]['pass'];
        $this->name = $user[0]['name'];
        $this->roll = $user[0]['idRoll'];
    }

}
