<?php
/**
 * Connects to the Database
 */

/**
 * It has static variable to connect only once to Database
 */
namespace core\models\database;
class DbConnection {
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
     * @return PDO_object Resource
     */
    public static function getConnection() {
      if (!isset(self::$connection)) {
        $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        self::$connection = new \PDO("mysql:host=localhost;dbname=stc", "testUser", "testpass", $pdo_options)or die("PDO object not created");
      }
      return self::$connection;
    }

}
