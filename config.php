<?php
    function db() {
        $connexion = null;
        $host= 'localhost';
        $dbname = "ecommerce";
        $username = 'admin';
        $password = 'Admin1234!';

        try {
            $connexion = new PDO("mysql:host=".$host.";dbname=".$dbname, $username, $password);
            $connexion->exec("set names utf8");
        } catch (PDOException $th) {
            echo "Erreur de connection: ". $th->getMessage();
        }
        return $connexion;
    }
?>
