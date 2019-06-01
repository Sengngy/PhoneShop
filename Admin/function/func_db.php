<?php

    $con = '';
    function db_connect(){
        $servername = 'mysql:dbname=db_phonestore;host=localhost';
        $username = 'root';
        $pass = '';
        $option = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        try{
            global $con;
            $con = new PDO($servername, $username, $pass, $option);
        }catch(PDOException $e){
            echo 'connection failed' . $e->getMessage();
        }
    }

?>