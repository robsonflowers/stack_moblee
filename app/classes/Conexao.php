<?php
class Conexao { 
    static private $db;
    static public function getInstance(){
        if(!isset(self::$db)){
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
            $server = "localhost";
            $user = "root";
            $pass = "";
            $bd = "stack_moblee_db";
            self::$db = new PDO("mysql:host=$server; dbname=$bd; charset=utf8",$user,$pass,$opcoes);
        }
          return self::$db;
    }
}

?>
