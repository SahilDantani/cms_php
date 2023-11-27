<?php

class Database{
    public function getConn(){
        $db_host = "localhost";
        $db_user = "cms_www";
        $db_pass = "/y1Z/uR@B7]e7qwn";
        $db_name = "cms";

        $dsn = 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
        try{
            $db = new PDO($dsn,$db_user,$db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }
}

?>