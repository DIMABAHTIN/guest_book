<?php

class Db {

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=' . DB_SERVER . ';dbname=blog', DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function __destruct() {
        $this->db = null;
    }

}