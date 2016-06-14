<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnection
 *
 * @author Troate
 */
class DbConnection {
    //put your code here
    /**
     * @var PHPPlatform Private Static, so no one can access it, and its available through out the project once initialized
     */
    private static $connection=null;
    
    /**
     * Conctructor made private so no one can access it
     */
    private function __construct() {}

    /**
     * __clone() made private so no one can access it
     */
    private function __clone() {}
    
    /**
     * __wakeup() made private so no one can access it
     */
    private function __wakeup() {
    
}
    /**
     * Connects to Database, if connection already doesnot exist otherwise returns same connection and also connects to database
     * @param string $dbType Type of the Database
     * @param string $server Name of Server
     * @param string $dbName Name of Database
     * @param string $userName Username
     * @param string $pass Password
     * @return PDO_object Resource
     */
    public static function getConnection() {
      if (!isset(self::$connection)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$connection = new PDO("mysql:host=localhost;dbname=stc", "testUser", "testpass", $pdo_options)or die("PDO object not created");
      }
      return self::$connection;
    }

}