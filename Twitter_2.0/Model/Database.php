<?php
//klasa odpowiedzialna za tworzenie obiektu mysqli i połączenia
class Database{
    static protected $dbUser='root';
    static protected $dbPass='root';
    static protected $dbName='Tweeter_db';
    static protected $dbHost='localhost';
    
    static function createConnection(){
        return $conn= new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
    }
}

