<?php

/**
 * Description of Conection
 *
 * @author dagueda
 */
class Connexion {

    //put your code here
    var $dataBaseName = '';
    var $host = '';
    var $user = '';
    var $pass = '';
    var $db = '';
    var $dsn = '';
    var $error = '';

    //global $gbd;
    // start connexion 
    public function __construct($dataBaseName, $host, $user, $pass) {
        $this->dataBaseName = $dataBaseName;
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dsn = 'mysql:dbname=' . $this->dataBaseName . ';host=' . $this->host;
//        connexion();
        try {
            $this->db = new PDO($this->dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo 'TOTO';
            echo 'Error: ' . $e->getMessage();
//            $this->insertLog('Error: ' . $e->getMessage(). PHP_EOL);
        }
    }

    // save to database
    public function commit($sql) {

        $rel = false;
        try {
            $requete = $this->db->prepare($sql);
            $rel = $requete->execute();
        } catch (Exception $exc) {
            echo 'Error : ' . $exc->getMessage();
            $this->insertLog('Error: ' . $exc->getMessage(). PHP_EOL);
        }
        return $rel;
    }
    
    // read database
    public function commitSelect($sql) {

        $rel = false;
        try {
            $requete = $this->db->prepare($sql);
            $rel = $requete->execute();
            $red = $requete->fetchAll();
        } catch (Exception $exc) {
            echo 'Error : ' . $exc->getMessage();
            $this->insertLog('Error: ' . $exc->getMessage(). PHP_EOL);
        }
        return $red;
    }

}
